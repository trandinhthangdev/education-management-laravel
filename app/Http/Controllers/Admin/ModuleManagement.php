<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Module;
use Validator;

class ModuleManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.module-management',['module' => $module]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'name'             => 'min:5|max:255|unique:modules,name'
            ]
            ,
            [
                'name.unique'              => ':attribute already exists in the system !',
                'name.min'              => ':attribute must be at least 5 characters long !',
                'name.max'              => ':attribute must be a maximum of 255 characters long !'
            ]
            ,
            [
                'name'             => 'Module'
            ]
        );
        // $request->validate(
        //     [
        //         'name'             => 'min:5|max:255|unique:modules,name'
        //     ]
        //     ,
        //     [
        //         'module.unique'              => ':attribute already exists in the system !',
        //         'name.min'              => ':attribute must be at least 5 characters long !',
        //         'name.max'              => ':attribute must be a maximum of 255 characters long !'
        //     ]
        //     ,
        //     [
        //         'name'             => 'Module'
        //     ]
        // );
        if($validator->fails())
        {
            return response()->json(['res_type' => 'error', 'response' => $validator->errors()]);
        }
        else
        {
            $data_module = $request->all();

            $data_module['module_code'] = "M".randomString(4);
            while(DB::table('modules')->where('module_code', '=', $data_module['module_code'])->count())
            {
                $data_module['module_code'] = "M".randomString(4);
            }
            Module::create($data_module);
            return response()->json(['res_type' => 'success', 'response' => 'Created Module Successfully !']);
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
        // return response()->json($request);   
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
        $module = Module::find($id);
        return response()->json($module);
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
        $module = Module::find($id);
        $validator = Validator::make($request->all(), 
            [
                'name'             => 'min:5|max:255|unique:modules,name,'.$id,
            ]
            ,
            [
                'name.unique'              => ':attribute already exists in the system !',
                'name.min'              => ':attribute must be at least 5 characters long !',
                'name.max'              => ':attribute must be a maximum of 255 characters long !'
            ]
            ,
            [
                'name'             => 'Module'
            ]
        );

        if($validator->fails())
        {
            return response()->json(['res_type' => 'error', 'response' => $validator->errors()]);
        }
        else
        {
            $data_module = $request->all();
            $module->update($data_module);
            return response()->json(['res_type' => 'success', 'response' => 'Created Module Successfully !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        if($module->delete())
        {
            return response()->json(['res_type' => 'success', 'response' => 'Deleted Module Successfully !']);
        }
    }
}
