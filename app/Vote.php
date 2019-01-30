<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votaciones';
    public function InversaVotePlate(){
   		return $this->belongsTo('App\Plate','platos_id');
   }
    public function InversaVoteUser(){
   		return $this->belongsTo('App\User','users_id');
   }
}
