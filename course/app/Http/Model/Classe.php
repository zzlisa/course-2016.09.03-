<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $table = 'classe';
    protected $primaryKey = 'cla_id';
    public $timestamps = false;
    protected $guarded = [];
}
