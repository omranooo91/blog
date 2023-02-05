<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;


class Auth extends Controller
{
    public function login()
    {
        return view('dashboard.login');
    }

    public function register()
    {
        return view('dashboard.register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $result = $user->save();
        if($result) {
            return back()->with('success','You are registered successfully');
        }else{
            return back()->with('fail','Something wrong');
        }

    }

    public function loginUser(Request $request){
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->id);
                $request->session()->put('name',$user->name);
                return redirect()->route('dashboard');
            }else{
                return back()->with('fail','Password is wrong');
            }
        }else{
            return back()->with('fail','This email is not registered');
        }

    }


    public function dashboard(){
        return view('dashboard.index');
    }


    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
