<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function reported(){
        return $this->belongsTo(User::class, 'reported_user_id' ,'id');
    }
}
