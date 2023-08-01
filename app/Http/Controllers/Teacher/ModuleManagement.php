<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Teacher;
use App\Module;
use App\TeacherModule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ModuleManagement extends Controller
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
        $teacher_module = TeacherModule::orderBy('id', 'DESC')->where('teacher_id', $teacher_id)->paginate(5);
        return view('teacher.pages.module-management', ['module' => $module, 'teacher_module' => $teacher_module]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $teacher = DB::table('teachers')->where('user_id', '=', $user_id)->first();
        $teacher_id = $teacher->id;

        $data_teacher_module = $request->all();
        $data_teacher_module['teacher_id'] = $teacher_id; 

        TeacherModule::create($data_teacher_module);   
        return response()->json(['res_type' => 'success', 'response' => 'Created Module Successfully !']);
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
        $teacher_module = TeacherModule::find($id);
        if($teacher_module->delete())
        {
            return response()->json(['res_type' => 'success', 'response' => 'Created Module Successfully !']);
        }
    }
}
