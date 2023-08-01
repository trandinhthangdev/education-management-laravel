<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function getLogin()
    {
    	return view('login');
    }

    public function postLogin(Request $request)
    {
    	$request->validate(
    		[
    			'password' 			=> 'min:8|max:255',
    		]
    		,
    		[
    			'password.min' 		=> ':attribute must be at least 8 characters long !',
    			'password.max' 		=> ':attribute must be a maximum of 255 characters long !'
       		]
    		,
    		[
    			'password'		 	=> 'Password'
    		]
    	);
    	$email = $request->email;
    	$password = $request->password;
    	$remember = $request->remember;

    	if(Auth::attempt(['email' => $email, 'password' => $password, 'role' => 1], $remember))
    	{
    		return redirect()->route('admin.home');
    	} 
    	else if(Auth::attempt(['email' => $email, 'password' => $password, 'role' => 2], $remember))
    	{
    		if(Auth::check())
    		{
    			$user_id = Auth::user()->id;
    			$teacher = DB::table('teachers')->where('user_id', '=', $user_id)->first();
    			if($teacher->status)
    			{
					return redirect()->route('teacher.home');
    			}
                else
                {
                    return redirect()->route('login')->with('response', 'Your teacher account has not been approved yet !');
                }
    		}
    	}
    	else if(Auth::attempt(['email' => $email, 'password' => $password, 'role' => 3], $remember))
    	{
			return redirect()->route('student.home');
    	}
    	else
    	{
    		return redirect()->route('login')->with('response', 'Login Unsuccessful !');
    	}
    }

}
