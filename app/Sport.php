<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = ['name', 'players'];

    public function matches() {
      return $this->hasMany('\App\Match', 'sport_id', 'id');
    }
 }
