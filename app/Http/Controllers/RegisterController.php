<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Teacher;
use App\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function getRegister()
    {
    	return view('register');
    }

    public function postRegister(Request $request)
    {
    	$request->validate(
    		[
    			'email' 			=> 'unique:users,email',
    			'password' 			=> 'min:8|max:255',
    			'repeat_password' 	=> 'same:password'
    		]
    		,
    		[
    			'email.unique' 				=> ':attribute already exists in the system !',
    			'password.min' 				=> ':attribute must be at least 8 characters long !',
    			'password.max' 				=> ':attribute must be a maximum of 255 characters long !',
    			'repeat_password.same' 		=>  ':attribute must be the same as the password fleid!'
    		]
    		,
    		[
    			'email' 			=> 'This email',
    			'password'		 	=> 'Password',
    			'repeat_password' 	=> 'Repeat Password'
    		]
    	);
    	if(isset($request->cv))
    	{
    		$data_user = array();
    		$data_user['email'] = $request->email ;
    		$data_user['role'] = $request->role;
    		$data_user['password'] = Hash::make($request->password);
    		$user_id = User::create($data_user)->id;

    		$data_teacher = array();
    		$data_teacher['user_id'] = $user_id;

    		$data_teacher['teacher_code'] = "T".randomString(4);
    		while(DB::table('teachers')->where('teacher_code', '=', $data_teacher['teacher_code'])->count())
    		{
				$data_teacher['teacher_code'] = "T".randomString(4);
    		}

            $cv_file = $request->cv;
            $extension_cv_file = $cv_file->getClientOriginalExtension();
            $name_cv_file = $data_teacher['teacher_code'] . "." . $extension_cv_file;
            $cv_file->move('uploads/cvs', $name_cv_file);

    		$data_teacher['cv'] = $name_cv_file;
    		Teacher::create($data_teacher);
    		
            return redirect()->route('hello-new-teacher');
    		
    	}
    	else
    	{
    		$data_user = array();
    		$data_user['email'] = $request->email ;
    		$data_user['role'] = $request->role;
    		$data_user['password'] = Hash::make($request->password);
    		$user_id = User::create($data_user)->id;

    		$data_student = array();
    		$data_student['user_id'] = $user_id;

    		$data_student['student_code'] = "S".randomString(4);
    		while(DB::table('students')->where('student_code', '=', $data_student['student_code'])->count())
    		{
				$data_student['student_code'] = "S".randomString(4);
    		}

    		Student::create($data_student);
    		$user = User::find($user_id);
            Auth::login($user);
            return redirect()->route('student.home'); 
    	}
    }
}
