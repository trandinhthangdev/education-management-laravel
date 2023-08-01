<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
 	protected $table = 'teachers';

	protected $fillable = [
        'user_id', 'name', 'birthday', 'teacher_code', 'sex', 'district', 'province', 'country', 'image', 'cv', 'status'
    ];

    public function User()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function TeacherModule()
    {
    	return $this->hasMany('App\TeacherModule', 'teacher_id', 'id');
    }

   
}
