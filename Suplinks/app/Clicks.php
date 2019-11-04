<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clicks extends Model
{
    protected $fillable = ['clicks', 'id_link', 'date'];
}
