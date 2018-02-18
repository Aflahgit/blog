<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function getDashboard()
    {
        return view('pages.dashboard');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users|max:128',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

    	$username = $request['username'];
    	$email = $request['email'];
    	$password = Hash::make($request['password']);

    	$user = new User();
    	$user->username = $username;
    	$user->email = $email;
    	$user->password = $password;

    	$user->save();

        Auth::login($user);

    	return redirect()->route('dashboard');
    }

    public function postSignIn(Request $request)
    {
    	if( Auth::attempt([ 'email' => $request['email'], 'password' => $request['password'] ]) )
        {
            return redirect()->route('dashboard');
        }

        return redirect()->back();
    }
}
