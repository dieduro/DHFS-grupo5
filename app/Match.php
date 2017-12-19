<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Match extends Model {
    protected $fillable = [
      'sport_id', 'nplayers', 'date', 'time', 'street_number', 'locality', 'city', 'country', 'comment', 'user_id', 'photo', 'active'
    ];

    public function user() {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sport() {
      return $this->belongsTo(Sport::class, 'sport_id', 'id');
    }

}
