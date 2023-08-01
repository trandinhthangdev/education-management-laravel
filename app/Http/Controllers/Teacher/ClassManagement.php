<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\Classs;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\TeacherModule;
use App\StudentClass;

class ClassManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::all();
        $user_id = Auth::user()->id;
        $teacher = DB::table('teachers')->where('user_id', '=', $user_id)->first();
        $teacher_id = $teacher->id;
        $teacher_class = Classs::where('teacher_id',$teacher_id)->get();
        return view('teacher.pages.class-management',['teacher_class' => $teacher_class]);
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

    public function viewStudentClass(Request $request)
    {
        $class_id = $request->class_id;
        $student_class = StudentClass::where('class_id', $class_id)->get();
        foreach($student_class as $key => $value)
        {
            $value->name = $value->Student->name;
            $value->student_code = $value->Student->student_code;
        }
       
        return response()->json($student_class);
    }
}
