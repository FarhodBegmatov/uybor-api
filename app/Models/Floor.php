<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = ['house_id', 'entrance_id', 'name', 'number'];

    public $timestamps = false;

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
}
