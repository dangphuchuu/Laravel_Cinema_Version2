<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    function __construct()
    {
    }
    public function home()
    {
        return view('admin.home.list');
    }

   

    //Cinematics
    public function cinema()
    {
        return view('admin.cinema.list');
    }
    public function create_cinema()
    {
        return view('admin.cinema.create');
    }
    public function edit_cinema()
    {
        return view('admin.cinema.edit');
    }

    //Schedule Movie
    public function schedule()
    {
        return view('admin.schedules.list');
    }
    public function create_schedule()
    {
        return view('admin.schedules.create');
    }
    public function edit_schedule()
    {
        return view('admin.schedules.edit');
    }

    //Events
    public function events()
    {
        return view('admin.events.list');
    }
    public function create_events()
    {
        return view('admin.events.create');
    }
    public function edit_events()
    {
        return view('admin.events.edit');
    }

    //Book Ticket
    public function book_ticket()
    {
        return view('admin.book_ticket.list');
    }

    //User
    public function user()
    {
        $users = User::with('roles', 'permissions')->get();
        return view('admin.user_account.list', ['users' => $users]);
    }

    //Staff
    public function staff()
    {
        $staff = User::with('roles', 'permissions')->get();
        return view('admin.staff_account.list', ['staff' => $staff]);
    }
    public function create_staff(Request $request)
    {
        $request->validate([
            'fullName' => 'required|min:1',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required',
        ], [
            'fullName.required' => 'fullName is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'phone.required' => 'Phone is required',
            'phone.unique' => 'Phone already exists'
        ]);
        $request['password'] = bcrypt($request['password']);
        $staff = User::create($request->all());
        $staff->syncRoles('staff');
        return redirect('/admin/staff')->with('success', 'Create Account Successfully!');
    }

    //Banners
    public function banners()
    {
        return view('admin.banners.list');
    }
    public function create_banners()
    {

        return redirect('admin.banners.create');
    }
    public function edit_banners()
    {
        return view('admin.banners.edit');
    }

    //statistical
    public function statistical()
    {
        return view('admin.statistical.list');
    }
    //Sign_in
    public function sign_in()
    {
        return view('admin.sign_in');
    }
    public function Post_sign_in(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Please enter your email!',
                'password.required' => 'Please enter your password!'
            ]
        );
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('admin');
        } else {
            return redirect('admin/sign_in')->with('warning', "Sign in unsuccessfully!");
        }
    }
    public function sign_out()
    {
        Auth::logout();
        return redirect('admin/sign_in');
    }
}
