<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Profess extends Model
{
    protected $table = 'profess';
    protected $primaryKey = 'pro_id';
    public $timestamps = false;
    protected $guarded = [];
}
