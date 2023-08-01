<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';

	protected $fillable = [
       	'name', 'module_code', 'status'
    ];

    public function TeacherModule()
    {
    	return $this->hasMany('App\TeacherModule', 'module_id', 'id');
    }

    public function StudentModule()
    {
    	return $this->hasMany('App\StudentModule', 'module_id', 'id');
    }
}
