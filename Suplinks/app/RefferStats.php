<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefferStats extends Model
{
    protected $fillable = ['reffer', 'id_link', 'clicks'];
}
