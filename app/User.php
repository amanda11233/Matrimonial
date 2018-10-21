<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name','age','height','gender','country','citizen_status',
        'language','marital_status','disability',
        'family_type','family_status','religion','sub_caste',
        'caste','family_values','education','college','employed_in','income',
        'diet','drinks','smoke','email', 'password','occupation',
        'photo','about_me','phone','address','account_for'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function liked_user(){
        return $this->belongsToMany(User::class  ,'likes' , 'user_id' , 'liked_user_id');
    }
    public function user(){
        return $this->belongsToMany(User::class);
    }
    public function reported_user(){
        return $this->belongsToMany(User::class  ,'reports' , 'user_id' , 'reported_user_id');
    }
    
}
