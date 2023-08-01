<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeacherInformation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $teacher = DB::table('teachers')->where('user_id', '=', $user_id)->first();
        return view('teacher.pages.teacher-information',['teacher'=>$teacher]);
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
        $teacher = Teacher::find($id);
        $user_id = $teacher['user_id'];
        $user = User::find($user_id);
        $teacher->email = $user->email;
        return response()->json($teacher);
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
        $teacher = Teacher::find($id);
        $teacher_code = $teacher['teacher_code'];
        $old_image = $teacher['image'];
        
        if($request->hasFile('image'))
        {
            $image_file = $request->image;
            $extension_image_file = $image_file->getClientOriginalExtension();
            $name_image_file = $teacher_code . '.' .$extension_image_file;
            if($old_image != 'teacher-default.png')
            {
                unlink('uploads/images/teachers/'. $old_image);
            }
            $image_file->move('uploads/images/teachers', $name_image_file);

            $data_teacher = $request->all();
            $data_teacher['image'] = $name_image_file;

            $teacher->update($data_teacher);
        }
        else
        {
            $data_teacher = $request->all();
            $data_teacher['image'] = $old_image;

            $teacher->update($data_teacher);
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
