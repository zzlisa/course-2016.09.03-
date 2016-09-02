<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $table = 'college';
    protected $primaryKey = 'col_id';
    public $timestamps = false;
    protected $guarded = [];
}
