<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrance extends Model
{
    protected $fillable = ['name', 'number'];

    public $timestamps = false;

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
