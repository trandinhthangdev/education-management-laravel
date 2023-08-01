<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\User;
use Illuminate\Support\Facades\DB; 

class TeacherConfirmController extends Controller
{
    public function confirm($teacher_code)
    {
    	DB::table('teachers')->where('teacher_code', $teacher_code)->update(['status' => '1']);
    	return redirect()->route('welcome');
    }
}
