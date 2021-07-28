<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrance extends Model
{
    protected $fillable = ['house_id', 'name', 'number'];

    public $timestamps = false;

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

}
