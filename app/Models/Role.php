<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['user_id', 'name', 'description'];

    public function users(){
        return $this->belongsToMany('App\User');
    }

//    public function permissions(){
//        return $this->hasMany('App\Models\Permission');
//    }
}
