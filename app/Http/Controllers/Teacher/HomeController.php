<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\Student;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
    	$user_id = Auth::user()->id;
        $teacher = DB::table('teachers')->where('user_id', '=', $user_id)->first();
        return view('teacher.pages.home',['teacher'=>$teacher]);
    }
}
