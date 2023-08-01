<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'students';

	protected $fillable = [
        'user_id', 'name', 'birthday', 'student_code', 'sex', 'district', 'province', 'country', 'image'
    ];

    public function User()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function StudentModule()
    {
        return $this->hasMany('App\StudentModule', 'student_id', 'id');
    }

    public function StudentClass()
    {
        return $this->hasMany('App\StudentClass', 'student_id', 'id');
    }
}
