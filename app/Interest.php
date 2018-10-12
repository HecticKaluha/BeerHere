<?php

namespace App;

class Interest extends Model
{
    public function users(){
        return $this->belongsToMany(User::class, 'interest_user');
    }
}
