<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plan';
    protected $primaryKey = 'pl_id';
    public $timestamps = false;
    protected $guarded = [];
}
