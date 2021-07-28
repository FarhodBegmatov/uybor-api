<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoldHouse extends Model
{
    protected $fillable = ['client_id', 'apartment_id', 'summa'];

    public $timestamps = false;
}
