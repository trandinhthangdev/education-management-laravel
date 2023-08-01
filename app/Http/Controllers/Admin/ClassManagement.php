<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\Classs;
use App\Teacher;
use Illuminate\Support\Facades\DB;
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
        $class = Classs::orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.class-management',['class' => $class, 'module' => $module]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data_class = $request->all();
        $data_class['class_code'] = "C".randomString(4);
        while(DB::table('classes')->where('class_code', '=', $data_class['class_code'])->count())
        {
            $data_class['class_code'] = "C".randomString(4);
        }
        $teacher_id = $data_class['teacher_id'];
        $module_id = $data_class['module_id'];

        $teacher_module = TeacherModule::where('teacher_id',$teacher_id)->where('module_id', $module_id)->first();

        $data_class['teacher_module_id'] = $teacher_module->id;
        // return response()->json($data_class);
        Classs::create($data_class);
        return response()->json(['res_type' => 'success', 'response' => 'Created Class Successfully !']);
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
        $class = Classs::find($id);
        if($class->delete())
        {
            return response()->json(['res_type' => 'success', 'response' => 'Deleted Class Successfully !']);
        }
    }

    public function getTeacherModule(Request $request)
    {
        $module_id = $request->module_id;
        $teacher_module = DB::table('teacher_modules')->where('module_id', $module_id)->get();

        $teacher = array();

        foreach($teacher_module as $tea_mod)
        {
            $teacher_id = $tea_mod->teacher_id;
            array_push($teacher, Teacher::find($teacher_id));
        }
        return response()->json($teacher);
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
