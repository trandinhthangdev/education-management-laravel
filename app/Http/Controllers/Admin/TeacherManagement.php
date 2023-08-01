<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\Student;
use App\User;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\TeacherConfirmMail;

class TeacherManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.teacher-management',['teacher' => $teacher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendMailToTeacher($id)
    {
        $teacher = Teacher::find($id);
        $teacher_code = $teacher->teacher_code;
        $user_id = $teacher->user_id;
        $user = User::find($user_id);
        DB::table('teachers')->where('id', $id)->update(['status' => -1]);

        Mail::to($user->email)->send(new TeacherConfirmMail($teacher_code));
        return response()->json(['res_type' => 'success', 'response' => 'Sent confirmation email to the teacher !']);
    }
}
