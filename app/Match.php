<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model {
    protected $fillable = ['name', 'datetime', 'place'];
}
