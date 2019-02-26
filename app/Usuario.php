<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Usuario extends Model
{
    use SoftDeletes;
    protected $table = "usuario";
    protected $hidden = ['senha'];
    protected $guarded = [];


    public function papel(){
        return $this->belongsTo('App\Papel', 'id_papel');
    }
    
}
