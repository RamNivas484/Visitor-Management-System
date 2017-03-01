<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use DB;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'age', 'phonenumber', 'email', 'password', 'whoareu', 'visitortype', 'companyname', 'companylocation', 'companywebsite', 'pv_empdept', 'pv_empname', 'empdept', 'empid', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function boot()
    {
      parent::boot();
      static::creating(function ($user){
        $user->token = str_random(40);
      });
    }
    public function hasVerified()
    {
      $this->verified = true;
      $this->token = null;
      $this->save();
    }
}
