<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentModule extends Model
{
    protected $table = 'student_modules';

	protected $fillable = [
        'student_id', 'module_id'
    ];

    public function Student()
    {
    	return $this->belongsTo('App\Student', 'student_id', 'id');
    }

    public function Module()
    {
    	return $this->belongsTo('App\Module', 'module_id', 'id');
    }

    public function StudentClass()
    {
        return $this->hasMany('App\StudentClass', 'student_module_id', 'id');
    }
}
