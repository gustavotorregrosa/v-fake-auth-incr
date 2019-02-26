<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Papel extends Model
{
    use SoftDeletes;
    protected $table = "papel";
    protected $guarded = [];
    

}
