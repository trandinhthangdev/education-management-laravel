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

class ModuleManagement extends Controller
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
        $module = Module::orderBy('id', 'DESC')->paginate(5);
        return view('student.pages.module-management',['module' => $module, 'student_module' => $student_module]);
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
        $module_id = $request->module_id;
        if($request->status == 0)
        {
            $data_student_module = $request->all();
            $data_student_module['student_id'] = $student_id;
            if(!StudentModule::where('module_id',$module_id)->where('student_id', $student_id)->count())
            {
                StudentModule::create($data_student_module);
                return response()->json(['res_type' => 'success', 'response' => 'Registered Module Successfully !']);
            }    
        }
        else
        {
            $student_module = StudentModule::where('module_id',$module_id)->where('student_id', $student_id)->get();
            foreach ($student_module as $std_mod) {
                $std_mod->delete();
            }                
            return response()->json(['res_type' => 'success', 'response' => 'Unregistered Module Successfully !']);
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
        //
    }
}
