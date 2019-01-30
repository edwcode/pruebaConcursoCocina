<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $table = 'platos';
   public function InversaPlateUser(){
   		return $this->belongsTo('App\User','users_id');
   }
   public function plateVote()
    {
        return $this->hasMany('App\Vote','platos_id');
    }
}
