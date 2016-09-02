<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Sche extends Model
{
    protected $table = 'sche';
    protected $primaryKey = 'sh_id';
    public $timestamps = false;
    protected $guarded = [];
}
