<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\Classs;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\TeacherModule;
use App\StudentModule;
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
        $user_id = Auth::user()->id;
        $student = DB::table('students')->where('user_id', '=', $user_id)->first();
        $student_id = $student->id;
        $student_module = StudentModule::where('student_id', $student_id)->get();


        // $module = Module::where();
        // $user_id = Auth::user()->id;
        // $student = DB::table('students')->where('user_id', '=', $user_id)->first();
        // $student_id = $student->id;
        $student_class = StudentClass::where('student_id', $student_id)->get();
        return view('student.pages.class-management',['student_module' => $student_module, 'student_class'=> $student_class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $student = DB::table('students')->where('user_id', '=', $user_id)->first();
        $student_id = $student->id;
        $data_student_class = $request->all();
        $class_id = $data_student_class['class_id'];
        $module_id = Classs::find($class_id)->module_id;

        $student_module = StudentModule::where('module_id', $module_id)->where('student_id', $student_id)->first();
        $student_module_id = $student_module->id;
        $data_student_class['student_module_id'] = $student_module_id;
        $data_student_class['student_id'] = $student_id;
        if(!StudentClass::where('student_id', $student_id)->where('student_module_id', $student_module_id)->where('class_id', $class_id)->count())
        {
            StudentClass::create($data_student_class);   
            return response()->json(['res_type' => 'success', 'response' => 'Register Class Successfully !']);  
        }    
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
        $student_class = StudentClass::find($id);
        if($student_class->delete())
        {
            return response()->json(['res_type' => 'success', 'response' => 'Deleted Class Successfully !']);
        }
    }

    public function getClassModule(Request $request)
    {
        $module_id = $request->module_id;
        $class_module = DB::table('classes')->where('module_id', $module_id)->get();

        // $teacher = array();

        // foreach($teacher_module as $tea_mod)
        // {
        //     $teacher_id = $tea_mod->teacher_id;
        //     array_push($teacher, Teacher::find($teacher_id));
        // }
        return response()->json($class_module);

    }
}
