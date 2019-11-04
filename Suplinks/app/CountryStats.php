<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryStats extends Model
{
    protected $fillable = ['country', 'id_link', 'clicks'];
}
