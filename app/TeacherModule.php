<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherModule extends Model
{
    protected $table = 'teacher_modules';

	protected $fillable = [
        'teacher_id', 'module_id'
    ];

    public function Teacher()
    {
    	return $this->belongsTo('App\Teacher', 'teacher_id', 'id');
    }

    public function Module()
    {
    	return $this->belongsTo('App\Module', 'module_id', 'id');
    }

    public function Classs()
    {
        return $this->belongsTo('App\Classs', 'teacher_module_id', 'id');
    }
}
