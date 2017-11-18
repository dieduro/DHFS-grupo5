<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class Match extends Model {
    protected $fillable = [
      'sport', 'nplayers', 'date', 'place', 'description', 'user_id'
    ];

    public function user() {
      return $this->belongsTo('User', 'user_id', 'id');
    }
}
