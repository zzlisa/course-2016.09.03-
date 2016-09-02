<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classroom';
    protected $primaryKey = 'clar_id';
    public $timestamps = false;
    protected $guarded = [];
}
