<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cast;
use App\Models\Combo;
use App\Models\Director;
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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
class WebController extends Controller
{
    function __construct()
    {
        $cloud_name = cloud_name();
        view()->share('cloud_name', $cloud_name);
    }

    public function home()
    {
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
            'code' => rand(10000000, 9999999999)
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

    public function ticketPayment(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        $ticket->holdState = false;
        $ticket->totalPrice = $request->totalPrice;
        $ticket->save();

        return response('', 200);
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
        $roomTypes = RoomType::all();
        $movies = Movie::whereDate('releaseDate', '<=', Carbon::today()->format('Y-m-d'))
            ->where('endDate', '>=', Carbon::today()->format('Y-m-d'))
            ->where('status', 1)->get();


        return view('web.pages.schedulesMovie', [
            'movies' => $movies,
            'theaters' => $theaters,
            'cities' => $cities,
            'date_cur' => $date_cur,
            'city_cur' => $city_cur,
            'roomTypes' => $roomTypes,
            'theaters_city' => $theaters_city,
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
        $movies = Movie::all()->where('status', 1);
        $movieGenres = MovieGenres::all();
        $rating = Rating::all();
        return view('web.pages.movies', [
            'movies' => $movies,
            'movieGenres' => $movieGenres,
            'rating' => $rating,
            'casts' => $casts,
            'directors' => $directors
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
    public function news()
    {
        $news = News::all();
        return view('web.pages.news',['news'=>$news]);
    }
    public function signIn(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Vui lòng nhập email hoặc số điện thoại!',
                'password.required' => 'Vui lòng nhập mật khẩu!'
            ]
        );
        $email = Auth::attempt(['email' => $request['username'], 'password' => $request['password']]);
        $phone = Auth::attempt(['phone' => $request['username'], 'password' => $request['password']]);
        if ($email || $phone) {
            if($request->has('rememberme')){
                Cookie::queue(Cookie::make('username',$request->username,10080));//10080 = 7 days,Thời gian lưu cookie
                Cookie::queue(Cookie::make('password_email',$request->password,10080));
            }
            return redirect('/')->with('success','Chào mừng bạn '.Auth::user()->fullName.' !');
        } else {
            return redirect('/')->with('warning','Sai tài khoản hoặc mật khẩu');
        }
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'fullName' => 'required|min:1',
            'email' => 'nullable|required_without:phone|max:255|unique:users',
            'phone' => 'nullable|required_without:email|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:12|unique:users',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ], [
            'fullName.required' => 'Vui lòng nhập họ tên',
            'email.required_without' => 'Vui lòng nhập mail hoặc số điện thoại ',
            'email.unique' => 'Email đã tồn tại ',
            'phone.min'=>'Vui lòng nhập tối thiểu 10 số',
            'phone.max'=>'Chỉ được nhập tối đa 12 số',
            'phone.required_without' => 'Vui lòng nhập mail hoặc số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'repassword.required' => 'Vui lòng nhập lại mật khẩu',
            'repassword.same' => "Mật khẩu nhập lại không trùng khớp",
        ]);
        $user = new User([
            'fullName'=>$request['fullName'],
            'password'=>bcrypt($request['password']),
            'email'=>$request['email'],
            'phone'=>format_phone_number($request['phone']),
            'code'=>rand(1000000000000000, 9999999999999999),
            'point'=>0,
        ]);
        $user->save();
        $user->syncRoles('user');
        $token = Str::random(20);
        $to_email = $request['email'];
        $link_verify = url('/verify-email?email='.$to_email.'&token='.$token);
        if(isset($request->email)){
            Mail::send('web.pages.verify_account_mail', [
                'to_email' => $to_email,
                'link_verify'=>$link_verify,
            ], function ($email) use ($to_email) {
                $email->subject('Kích hoạt tài khoản: '.$to_email);
                $email->to($to_email);
            });
            return redirect('/')->with('success', 'Đăng ký thành công,vui lòng kiểm tra email để kích hoạt tài khoản !');
        }else{
            return redirect('/')->with('success', 'Đăng ký thành công tài khoản !');
        }


    }

    public function signOut()
    {
        Auth::logout();
        return redirect('/')->with('success','Đăng xuất thành công');
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
        return view('web.pages.profile', ['user' => $user,'sum'=>$sum]);
    }

    public function editProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $email = User::where('email', $request->email)->get()->first();
        $phone = User::where('phone', $request->phone)->get()->first();
        if ($phone && $user->phone != $phone->phone) {
            return redirect('/profile')->with('warning', 'This phone number is already exists');
        }
        $user->fullName = $request->fullName;
        $user->phone = $request->phone;
        $user->save();
        return redirect('/profile')->with('success', 'Update profile successfully!');
    }
    public function changePassword(Request $request){
        $user = User::find(Auth::user()->id);
        if(Hash::check($request['oldpassword'], $user->password)){
            $request->validate([
                'password' => 'required',
                'repassword' => 'required|same:password'
            ],[
                'password.required' => 'Please type new password',
                'repassword.required' => 'Please type passsword again',
                'repassword.same' => "Password again isn't correct"
            ]);
            if($request['password'] == $request['oldpassword']){
                return redirect('/profile')->with('danger',"The new password is the same as the old password");
            }
            $user['password'] = bcrypt($request['password']);
            $user->save();
        }else{
            return redirect('/profile')->with('danger',"Old password isn't correct");
        }
        return redirect('/signOut')->with('success','Update password successfully!');
    }
    public function forgot_password(Request $request){
        $data = $request['email'];

        $user_email = User::where('email','=',$data)->first();

        if($user_email){
            $count = $user_email->count();
            if($count == 0){
                return redirect()->back()->with('warning','Email not found in system');
            }
            else{
                $token = Str::random(20);
                $user = User::find($user_email->id);
                $user->remember_token = $token;
                $user->save();

                //send mail
                $to_email = $data;
                $name = $user->fullName;
                $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');

                $link_reset_password = url('/update-password?email='.$to_email.'&token='.$token);
                Mail::send('web.pages.reset_password_mail', [
                'name' => $name,
                'to_email' => $to_email,
                'now'=>$now,
                'link_reset_password'=>$link_reset_password,
            ], function ($email) use ($name,  $to_email,$now) {
                $email->subject('Xác nhận cập nhật lại mật khẩu ngày: '.$now);
                $email->to($to_email, $name);
            });
            }
            return redirect()->back()->with('success','Please check your email to reset password !');
        }else{
            return redirect()->back()->with('warning','Email not found in system');
        }

    }
    public function update_password(){
        return view('web.pages.update_password');
    }
    public function Post_update_password(Request $request){
        $token = Str::random(20);
        $user = User::where('email','=',$request['email'])->where('remember_token','=',$request['token'])->first();
        $count = $user->count();
        if($count >0){
            $reset = User::find($user->id);
            $request->validate([
                'password' => 'required',
                'repassword' => 'required|same:password'
            ],[
                'password.required' => 'Please type new password',
                'repassword.required' => 'Please type passsword again',
                'repassword.same' => "Password again isn't correct"
            ]);
            $reset['password'] = bcrypt($request['password']);
            $reset['remember_token'] = $token;
            $reset->save();
            return redirect('/')->with('success','Thay đổi mật khẩu thành công');
        }else{
            return redirect('/')->with('warning','Vui lòng nhập lại vì đường dẫn hết thời gian sử dụng');
        }
    }
    public function verify_email(){
        $token = Str::random(20);
        $email = $_GET['email'];
        $user = User::where('email','=',$email)->first();
        $count = $user->count();
        if($count>0){
            $verify = User::find($user->id);
            $verify['email_verified'] = 1;
            $verify['remember_token'] = $token;
            $verify->save();
            return redirect('/')->with('success','Kích hoạt tài khoản thành công');
        }
        else{
            return redirect('/')->with('warning','Vui lòng nhập lại vì đường dẫn hết thời gian sử dụng');
        }
    }
    public function contact(){
        $user = User::find(Auth::user()->id);
        return view('web.pages.contact',['user'=>$user]);
    }
    public function ticketPaid_image(Request $request) {

        function base64ToImage($base64_string, $output_file) {
            $file = fopen($output_file, "wb");

//            $data = explode(',', $base64_string);

            fwrite($file, base64_decode($base64_string));
            fclose($file);

            return $output_file;
        }

        $imgbase64 = substr($request->image, 22);

        $img = base64ToImage($imgbase64, 'img.png');
        $name = Auth::user()->fullName;

        $email_cus = Auth::user()->email;

        $cloud = Cloudinary::upload($img, [
            'folder' => 'ticket_user',
            'format' => 'png',
        ])->getPublicId();

        Mail::send('web.pages.ticket_mail', [
            'name' => $name,
            'cloud' => $cloud,
        ], function ($email) use ($name, $email_cus) {
            $email->subject('Vé xem phim tại HM Cinema');
            $email->to($email_cus, $name);
        });

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
            'user_id' => $request->user_id,
            'message'=>  $request->message
        ]);
        $feedback->save();
        return response()->json(['success'=>'Thông tin của bạn đã được gửi thành công. HMCinema xin cảm ơn ý kiến của bạn về hệ thống !']);
    }
}
