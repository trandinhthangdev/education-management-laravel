<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    protected $table = 'classes';

	protected $fillable = [
       	'module_id', 'name', 'class_code', 'teacher_id', 'teacher_module_id'
    ];

    public function Teacher()
    {
    	return $this->belongsTo('App\Teacher', 'teacher_id', 'id');
    }

    public function Module()
    {
    	return $this->belongsTo('App\Module', 'module_id', 'id');
    }

    public function StudentClass()
    {
        return $this->hasMany('App\StudentClass', 'module_id', 'id');
    }

    public function TeacherModule()
    {
        return $this->belongsTo('App\TeacherModule', 'teacher_module_id', 'id');
    }
}
