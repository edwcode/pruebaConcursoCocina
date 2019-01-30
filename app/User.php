<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','rols_id','period_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function InversaUserPeriod(){
        return $this->belongsTo('App\Period','period_id');
   }
   public function UserVote()
    {
        return $this->hasMany('App\Vote','users_id');
    }
    public function UserPlate()
    {
        return $this->hasMany('App\Plate','users_id');
    }
}
