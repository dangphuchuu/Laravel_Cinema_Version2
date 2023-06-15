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
        if ($user->hasRole('admin')) {
            return response()->json(['error' => "Can't Delete Admin Account !"]);
        } else {
            User::destroy($id);
            return response()->json(['success' => 'Delete Successfully']);
        }

    }

    //Profile
    public function profile()
    {
        if (Auth::check()) {
            $user = Auth()->user();
        } else {
            return redirect('admin/sign_in');
        }
        return view('admin.profile', ['user' => $user])->with('roles', 'permissions');
    }
    public function Postprofile(Request $request){
        $user = User::find(Auth::user()->id);
        if ($request['checkPassword'] == 'on') {
            $request->validate([
                'password' => 'required',
                'repassword' => 'required|same:password'
            ], [
                'password.required' => 'Type new password',
                'repassword.required' => 'Type passsword again',
                'repassword.same' => "Password again isn't correct"
            ]);
            $request['password'] = bcrypt($request['password']);
        }
        $user->update($request->all());
        return redirect('admin/sign_out')->with('success', 'Update Successfully');
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

    public function status(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user->hasRole('admin')) {
            return response()->json(['error' => "Can't change Admin Status!"]);
        } else {
            $user['status'] = $request->active;
            $user->save();
        }
    }
}
