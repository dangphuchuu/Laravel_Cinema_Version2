<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cast;
use App\Models\Combo;
use App\Models\Director;
use App\Models\Discount;
use App\Models\Feedback;
use App\Models\Movie;
use App\Models\MovieGenres;
use App\Models\News;
use App\Models\Post;
use App\Models\Price;
use App\Models\Rating;
use App\Models\RoomType;
use App\Models\Schedule;
use App\Models\Seat;
use App\Models\SeatType;
use App\Models\Theater;
use App\Models\Ticket;
use App\Models\TicketCombo;
use App\Models\TicketSeat;
use App\Models\User;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class WebController extends Controller
{
    public function __construct()
    {
        $cloud_name = env('CLOUD_NAME');
        return view()->share('cloud_name', $cloud_name);
    }

    public function home()
    {
//        $discount = Discount::all();
//        dd($discount);
        Schedule::where('date', '<', date('Y-m-d'))->update(['status' => false]);
        Schedule::where('date', '=', date('Y-m-d'))->where('endTime', '<=', date('H:i:s'))->update(['status' => false]);
        Movie::where('endDate', '<', date('Y-m-d'))->update(['status' => false]);

        $news = News::orderBy('id', 'DESC')->where('status',1)->take(3)->get();
        $banners = Banner::get()->where('status', 1);
        $movies = Movie::get()->where('status', 1)->where('endDate', '>', date('Y-m-d'))->take(6);
        return view('web.pages.home', ['movies' => $movies, 'banners' => $banners,'news'=>$news]);
    }

    public function movieDetail($id, Request $request)
    {
        $movie = Movie::find($id);
        $roomTypes = RoomType::all();
        $cities = [];
        $theaters = Theater::where('status', 1)->get();
        foreach ($theaters as $theater) {
            if (array_search($theater->city, $cities)) {
                continue;
            } else {
                array_push($cities, $theater->city);
            }
        }
        if (isset($request->city)) {
            $city_cur = $request->city;
        } else {
            $city_cur = $cities[0];
        }
        if (isset($request->date)) {
            $date_cur = $request->date;
        } else {
            $date_cur = date('Y-m-d');
        }
        $theaters_city = Theater::where('status', 1)->where('city', $city_cur)->get();
        return view('web.pages.movieDetail', [
            'movie' => $movie,
            'theater_city' => $theaters_city,
            'date_cur' => $date_cur,
            'cities' => $cities,
            'city_cur' => $city_cur,
            'roomTypes' => $roomTypes,
            'theaters' => $theaters,
            'theaters_city' => $theaters_city,
        ]);
    }

    public function ticket($schedule_id)
    {
        Ticket::where('holdState', false)->where('hasPaid', false)->where('schedule_id', $schedule_id)->delete();
        $ticketsHolds = Ticket::where('holdState', true)->where('schedule_id', $schedule_id)->get();
        foreach ($ticketsHolds as $ticketsHold) {
            $time = strtotime(date('Y-m-d H:i:s')) - strtotime($ticketsHold->created_at);

            if ($time > (9*60)) {
                $ticketsHold->delete();
            }

        }
        $seatTypes = SeatType::all();
        $combos = Combo::where('status', 1)->get();
        $tickets = Ticket::where('schedule_id', $schedule_id)->get();
        $schedule = Schedule::find($schedule_id);
        if (strtotime($schedule->startTime) < strtotime('17:00')) {
            $price = Price::where('generation', 'vtt')
                ->where('day', 'like', '%' . date('l', strtotime($schedule->date)) . '%')
                ->where('after', '08:00')->get()->first()->price;
        } else {
            $price = Price::where('generation', 'vtt')
                ->where('day', 'like', '%' . date('l', strtotime($schedule->date)) . '%')
                ->where('after', '17:00')->get()->first()->price;
        }
        $roomSurcharge = $schedule->room->roomType->surcharge;
        $room = $schedule->room;
        $movie = $schedule->movie;

        return view('web.pages.ticket', [
            'schedule' => $schedule,
            'room' => $room,
            'seatTypes' => $seatTypes,
            'roomSurcharge' => $roomSurcharge,
            'price' => $price,
            'movie' => $movie,
            'tickets' => $tickets,
            'combos' => $combos,
        ]);
    }

    public function ticketPostCreate(Request $request)
    {
        foreach ($request->ticketSeats as $seat) {
            $seatdbs = TicketSeat::select('ticketseats.row', 'ticketseats.col')
                ->join('tickets', 'tickets.id', '=', 'ticketseats.ticket_id')
                ->where('tickets.schedule_id', $request->schedule)
                ->get();
            foreach ($seatdbs as $seatdb) {
                if ($seat[0] == $seatdb->row && $seat[1] == $seatdb->col) {
                    return response('', 401);
                }
            }
        }
        $ticket = new Ticket([
            'schedule_id' => $request->schedule,
            'user_id' => Auth::user()->id,
            'holdState' => true,
            'status' => true,
            'code' => rand(1000000000, 9999999999)
        ]);
        $ticket->save();
        foreach ($request->ticketSeats as $seat) {
            $ticketSeat = new TicketSeat([
                'row' => $seat[0],
                'col' => $seat[1],
                'price' => $seat[2],
                'ticket_id' => $ticket->id,
            ]);
            $seat = Seat::where('row', $seat[0])->where('col', $seat[1])->where('room_id', $ticket->schedule->room_id)->get()->first();
            $ticketSeat->seatType = $seat->seatType->name;
            $ticketSeat->save();
        }

        return response()->json(['ticket_id' => $ticket->id]);

    }

    public function ticketDelete(Request $request)
    {
        Ticket::destroy($request->ticket_id);
        return response('delete success', 200);
    }

    public function ticketComboCreate(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        foreach ($request->ticketCombos as $ticketCombo) {
            $combo = Combo::find($ticketCombo[0]);
            $details = '';
            foreach ($combo->foods as $food) {
                $details .= $food->pivot->quantity . ' ' . $food->name . ' + ';
            }
            $details = substr($details, 0, -3);
            $newTkCb = new TicketCombo([
                'comboName' => $combo->name,
                'comboPrice' => $combo->price,
                'comboDetails' => $details,
                'quantity' => $ticketCombo[1],
                'ticket_id' => $ticket->id
            ]);

            $newTkCb->save();
            unset($newTkCb);
        }

        return response('add combo success', 200);
    }

    public function ticketComboDelete(Request $request)
    {
        TicketCombo::where('ticket_id', $request->ticket_id)->delete();
        return response('delete combos success', 200);
    }

    public function ticketCompleted($id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            if (Auth::user()->id !== $ticket->user_id) {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
        return view('web.pages.ticketPaid', [
            'ticket' => $ticket,
        ]);
    }

    public function schedulesByMovie(Request $request)
    {
        $theaters = Theater::where('status', 1)->get();
        $roomTypes = RoomType::all();
        $movies = Movie::whereDate('releaseDate', '<=', Carbon::today()->format('Y-m-d'))
            ->where('endDate', '>=', Carbon::today()->format('Y-m-d'))
            ->where('status', 1)->get();


        return view('web.pages.schedulesMovie', [
            'movies' => $movies,
            'theaters' => $theaters,
            'roomTypes' => $roomTypes,
        ]);
    }

    public function schedulesByTheater(Request $request)
    {
        $cities = [];
        $theaters = Theater::where('status', 1)->get();
        foreach ($theaters as $theater) {
            if (array_search($theater->city, $cities)) {
                continue;
            } else {
                array_push($cities, $theater->city);
            }
        }
        if (isset($request->date)) {
            $date_cur = $request->date;
        } else {
            $date_cur = date('Y-m-d');
        }
        $roomTypes = RoomType::all();
        $movies = Movie::whereDate('releaseDate', '<=', Carbon::today()->format('Y-m-d'))
            ->where('endDate', '>=', Carbon::today()->format('Y-m-d'))
            ->where('status', 1)->get();

        return view('web.pages.schedulesTheater', [
            'movies' => $movies,
            'theaters' => $theaters,
            'cities' => $cities,
            'date_cur' => $date_cur,
            'roomTypes' => $roomTypes,
        ]);
    }

    public function movies()
    {
        $casts = Cast::all();
        $directors = Director::all();
        $movies = Movie::all()->where('status', 1)
            ->where('releaseDate', '<=', date('Y-m-d'))
            ->where('endDate', '>', date('Y-m-d'));
        $moviesSoon = Movie::all()->where('status', 1)->where('releaseDate', '>', date('Y-m-d'));
        $moviesEarly = Movie::join('schedules', 'movies.id', '=', 'schedules.movie_id')
            ->select('movies.*')
            ->where('movies.status', 1)
            ->where('schedules.early', true)->groupBy('movies.name')->get();
        $movieGenres = MovieGenres::all();
        $rating = Rating::all();
        return view('web.pages.movies', [
            'movies' => $movies,
            'movieGenres' => $movieGenres,
            'rating' => $rating,
            'casts' => $casts,
            'directors' => $directors,
            'moviesEarly' => $moviesEarly,
            'moviesSoon' => $moviesSoon
        ]);
    }

    public function movieFilter(Request $request)
    {
        $casts = Cast::all();
        $directors = Director::all();
        $movieGenres = MovieGenres::all();
        $rating = Rating::all();


        if ($request->casts == null && $request->directors == null && $request->movieGenres == null && $request->rating == null) {
            return redirect('/movies');
        } else {

            $query = 'SELECT id FROM movies ';
            $join = '';
            $where = ' WHERE ';
            $groupby = ' GROUP BY movies.id';
            $arr = [];
            if ($request->movieGenres) {
                $i = 0;
                foreach ($request->movieGenres as $genre) {
                    $i++;
                    $join .= ' INNER JOIN moviegenres_movies AS genre_' . $i . ' ON movies.id = genre_' . $i . '.movie_id';
                    $where .= 'genre_' . $i . '.movieGenre_id = ? AND ';
                }
                $arr = array_merge($arr, $request->movieGenres);
            }
            if ($request->casts) {
                $i = 0;
                foreach ($request->casts as $cast) {
                    $i++;
                    $join .= ' INNER JOIN casts_movies AS cast_' . $i . ' ON movies.id = cast_' . $i . '.movie_id';
                    $where .= 'cast_' . $i . '.cast_id = ? AND ';
                }
                $arr = array_merge($arr, $request->casts);
            }
            if ($request->directors) {
                $i = 0;
                foreach ($request->directors as $director) {
                    $i++;
                    $join .= ' INNER JOIN directors_movies AS director_' . $i . ' ON movies.id = director_' . $i . '.movie_id';
                    $where .= 'director_' . $i . '.director_id = ? AND ';
                }
                $arr = array_merge($arr, $request->directors);
            }
            if ($request->rating) {
                $where .= 'rating_id = ? AND ';
                array_push($arr, $request->rating);
            }

            $query .= $join .= $where;
            $query = substr($query, 0, -5);
            $query .= $groupby;
            $moviesquery = DB::select($query, $arr);
            $movies_id = [];
            foreach ($moviesquery as $item) {
                array_push($movies_id, $item->id);
            }
            $movies = Movie::find($movies_id);

            return view('web.pages.movies', [
                'movies' => $movies,
                'movieGenres' => $movieGenres,
                'rating' => $rating,
                'casts' => $casts,
                'directors' => $directors
            ]);
        }


    }

    public function search(Request $request)
    {
        $request->validate(
            [
                'word' => 'required|min:3',
            ],
            [
                'word.required' => 'Please enter your word!',
            ]
        );
        $result = new Collection();
        $movies = Movie::select('movies.*')
            ->join('movieGenres_movies', 'movies.id', '=', 'movieGenres_movies.movie_id')
            ->join('movie_genres', 'movieGenres_movies.movieGenre_id', '=', 'movie_genres.id')
            ->join('casts_movies', 'movies.id', '=', 'casts_movies.movie_id')
            ->join('directors_movies', 'movies.id', '=', 'directors_movies.movie_id')
            ->join('casts', 'casts_movies.cast_id', '=', 'casts.id')
            ->join('directors', 'directors_movies.director_id', '=', 'directors.id')
            ->where('movie_genres.name', 'like', '%' . $request->word . '%')
            ->orWhere('movies.name', 'like', '%' . $request->word . '%')
            ->orWhere('casts.name', 'like', '%' . $request->word . '%')
            ->orWhere('directors.name', 'like', '%' . $request->word . '%')->groupBy('movies.name')->get();

        $posts = Post::where('title', 'like', '%' . $request->word . '%')->get();

        foreach ($movies as $movie) {
            $movie->setAttribute('type', 'movie');
            $result->push($movie);
        }
        foreach ($posts as $post) {
            $post->setAttribute('type', 'post');
            $result->push($post);
        }
        return view('web.pages.search', ['result' => $result]);
    }

    public function events()
    {
        $posts = Post::all();
        return view('web.pages.events', [
            'posts' => $posts
        ]);
    }
    public function news(Request $request)
    {
        $news = News::all();
        return view('web.pages.news',['news'=>$news]);
    }

    public function profile()
    {
        if (Auth::check()) {
           $user = Auth::user();
        } else {
            return redirect('/');
        }
        $sum = 0 ;
        foreach($user['ticket'] as $ticket)
        {
            $sum+= $ticket['totalPrice'];
        }
        $sum_percent = ($sum*100)/4000000;
        return view('web.pages.profile', ['user' => $user,'sum'=>$sum,'sum_percent'=>$sum_percent]);
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'phone'=>'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:12',
        ],[
            'phone.regex'=>'Số điện thoại từ 0-9 và không bao gồm kí tự',
            'phone.min'=>'Nhập tối thiểu 10 số',
            'phone.max'=>'Nhập tối đa 12 số',
        ]);
        $user = User::find(Auth::user()->id);
        $email = User::where('email',"=", $request->email)->first();
        $phone = User::where('phone',"=", $request->phone)->first();
        if ($phone && $user->phone != $phone->phone) {
            if(!isset($request->phone) ){
                return redirect('/profile')->with('warning', 'Không được để trống !');
            }
//            dd($user->phone);
            return redirect('/profile')->with('warning', 'Số điện thoại này đã tồn tại trong hệ thống');
        }
        if ($email && $user->email != $email->email) {
            if(!isset($request->email) ){
                return redirect('/profile')->with('warning', 'Không được để trống !');
            }
            return redirect('/profile')->with('warning', 'email này đã tồn tại trong hệ thống');
        }
        $token = Str::random(20);
        $to_email = $request['email'];
        $link_verify = url('/verify-email?email='.$to_email.'&token='.$token);
        $user->fullName = $request->fullName;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if($user->isDirty('email'))//check value has changed
        {
            $user->email_verified = 0;
        }
        $user->save();
        if(isset($request->email) && $user['email_verified'] == 0){
            Mail::send('web.pages.verify_account_mail', [
                'to_email' => $to_email,
                'link_verify'=>$link_verify,
            ], function ($email) use ($to_email) {
                $email->subject('Kích hoạt tài khoản: '.$to_email);
                $email->to($to_email);
            });
            return redirect('/profile')->with('success', 'Vui lòng kiểm tra mail để kích hoạt !');
        }
        return redirect('/profile')->with('success', 'Update profile successfully!');
    }

    public function contact(){
        return view('web.pages.contact');
    }
    public function ticketPaid_image(Request $request) {

//        function base64ToImage($base64_string, $output_file) {
//            $file = fopen($output_file, "w+");
//
////            $data = explode(',', $base64_string);
//
//            fwrite($file, base64_decode($base64_string));
//            fclose($file);
//
////            return $file;
//            return $output_file;
//        }

        $imgbase64 = substr($request->image, 22);
        Storage::put('public/tickets/ticket_img.png', base64_decode($imgbase64));

//        $img = base64ToImage($imgbase64, 'img.png');
        $img = asset('storage/tickets/ticket_img.png');
        $name = Auth::user()->fullName;
//        echo $img;
        $cloud = Cloudinary::upload($img, [
            'folder' => 'ticket_user',
            'format' => 'png',
        ])->getPublicId();
//        $cloud = '';

        $email_cur = Auth::user()->email;

//        if(isset(Auth::user()->email) && Auth::user()->email_verified == true)
//        {
            Mail::send('web.pages.ticket_mail', [
                'name' => $name,
                'cloud' => $cloud,
                'cloud_name' => cloud_name(),
            ], function ($email) use ($email_cur) {
                $email->subject('Vé xem phim tại HM Cinema');
                $email->to($email_cur);
            });
//        }
        return response();
    }
    public function refund_ticket(Request $request){
        $ticket = Ticket::find($request->ticket_id);
        $user = User::find($ticket['user_id']);
        $money_payment = 0 ;
        if($ticket['schedule']['date'] == date("Y-m-d" ))
        {
            if(strtotime($ticket['schedule']['startTime'])-3600 <= strtotime(date("H:i:s"))){

                return response()->json(['error'=>'Đã quá thời gian hoàn vé mong quý khách thông cảm !']);
            }
        }
        if($ticket['schedule']['date'] < date("Y-m-d" ))
        {
            return response()->json(['error'=>'Đã quá thời gian hoàn vé mong quý khách thông cảm !']);
        }
        if($ticket['hasDiscount'] == 1)
        {
            return response()->json(['error'=>'Vé đã áp dụng mã khuyến mãi nên không thể hoàn lại. Mong quý khách thông cảm !']);
        }
        foreach($user['ticket'] as $ticket)
        {
            $money_payment += $ticket['totalPrice'];
        }
        if ($money_payment< 4000000)
        {
            $user['point'] = $user['point'] -($ticket['totalPrice']*5/100) +  $ticket['totalPrice'] ;
            $user->save();
        }
        else
        {
            $user['point'] = $user['point'] -($ticket['totalPrice']*10/100) +  $ticket['totalPrice'] ;
            $user->save();
        }
        $ticket->delete();
        return response()->json(['success'=>'Gửi yêu cầu thành công,vé sẽ được hoàn vào điểm thưởng vui lòng kiểm tra điểm thưởng trong profile !']);
    }
    public function events_detail($id){
        $post = Post::find($id);
        $post_all = Post::where('status',1)->where('id',"!=",$id)->take(4)->get();
        return view('web.pages.events_detail',['post'=>$post,'post_all'=>$post_all]);
    }
    public function news_detail($id){
        $news = News::find($id);
        $news_all = News::where('status',1)->where('id',"!=",$id)->take(4)->get();
        return view('web.pages.news_detail',['news'=>$news,'news_all'=>$news_all]);
    }
    public function feedback(Request $request){
        $feedback = new Feedback([
            'fullName' => $request->fullName,
            'message' =>  $request->message
        ]);
        if ($request->email) {
            $feedback->email = $request->email;
        }
        if ($request-> phone) {
            $feedback->phone = $request->phone;
        }
        $feedback->save();
        return response()->json([
                'success'=>'Thông tin của bạn đã được gửi thành công. HMCinema xin cảm ơn ý kiến của bạn về hệ thống !',
            ]);
    }
    public function ticket_apply_discount(Request $request){
        $code = $request->discount;
        $discount = Discount::all()->where('status',1);
        foreach($discount as $value){
            if($value['code'] == $code)
            {
                return response()->json([
                    'success'=>"Áp dụng mã thành công",
                    'percent'=>$value['percent'],
                ]);
            }
        }
        return response()->json(['error'=>'Mã giảm giá không tồn tại !']);
    }
}
