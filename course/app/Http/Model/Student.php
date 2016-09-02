<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'stu_id';
    public $timestamps = false;
    protected $guarded = [];
}
