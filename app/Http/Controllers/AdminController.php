<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    function __construct()
    {
    }

    public function home()
    {
        return view('admin.home.list');
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


    //User
    public function user()
    {
        $users = User::orderBy('id', 'DESC')->with('roles', 'permissions')->Paginate(20);
        return view('admin.user_account.list', ['users' => $users]);
    }

    //Staff
    public function staff()
    {
        $staff = User::orderBy('id', 'DESC')->with('roles', 'permissions')->Paginate(20);
        $permission = Permission::orderBy('id', 'asc')->get();

        return view('admin.staff_account.list', ['staff' => $staff, 'permission' => $permission]);
    }

    public function postCreate(Request $request)
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

    public function postPermission(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        if ($user->hasRole('admin')) {
            return redirect('admin/staff')->with('warning', 'Cannot change permission for admin!');
        } else {
            if (array_key_exists('permission', $data)) {
                $user->syncPermissions($data['permission']);
            } else {
                return redirect('admin/staff')->with('warning', 'Please check least 1 Permission!');
            }
        }


        return redirect('admin/staff')->with('success', 'Updated Permission Sucessfully !');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if($user->hasRole('admin')){
            return response()->json(['error' => "Can't Delete Admin Account !"]);
        }
        else{
            User::destroy($id);
            return response()->json(['success' => 'Delete Successfully']);
        }

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
    public function status(Request $request){
        $user = User::find($request->user_id);
        if($user->hasRole('admin')){
            return response()->json(['error' => "Can't change Admin Status!"]);
        }
       else{
           $user['status'] = $request->active;
           $user->save();
       }
    }
}
