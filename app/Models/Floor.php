<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = ['name', 'number'];

    public $timestamps = false;

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
}
