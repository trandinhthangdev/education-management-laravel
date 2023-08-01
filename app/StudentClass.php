<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $table = 'student_classes';

	protected $fillable = [
        'student_id', 'class_id', 'student_module_id'
    ];

    public function Student()
    {
    	return $this->belongsTo('App\Student', 'student_id', 'id');
    }

    public function Class()
    {
    	return $this->belongsTo('App\Classs', 'class_id', 'id');
    }

    public function StudentModule()
    {
    	return $this->belongsTo('App\StudentModule', 'student_module_id', 'id');
    }
}
