<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Message extends Model
{
    

    protected $fillable = [
        'user_id','messaged_user_id','message'
    ];

    public function messageFromUser(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'messaged_user_id', 'id');
    }
}
