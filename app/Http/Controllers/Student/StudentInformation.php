<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;


class StudentInformation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $student = DB::table('students')->where('user_id', '=', $user_id)->first();
        return view('student.pages.student-information',['student'=>$student]);
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
        $student = Student::find($id);
        $user_id = $student['user_id'];
        $user = User::find($user_id);
        $student->email = $user->email;
        return response()->json($student);
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
        $student = Student::find($id);
        $student_code = $student['student_code'];
        $old_image = $student['image'];
        
        if($request->hasFile('image'))
        {
            $image_file = $request->image;
            $extension_image_file = $image_file->getClientOriginalExtension();
            $name_image_file = $student_code . '.' .$extension_image_file;
            if($old_image != 'student-default.png')
            {
                unlink('uploads/images/students/'. $old_image);
            }
            $image_file->move('uploads/images/students', $name_image_file);

            $data_student = $request->all();
            $data_student['image'] = $name_image_file;

            $student->update($data_student);
        }
        else
        {
            $data_student = $request->all();
            $data_student['image'] = $old_image;

            $student->update($data_student);
        }
        return response()->json(["response" => "Update Successfully !"]);
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

}
