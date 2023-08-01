<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
    	$user_id = Auth::user()->id;
        $student = DB::table('students')->where('user_id', '=', $user_id)->first();
        return view('student.pages.home',['student'=>$student]);
    }
}
