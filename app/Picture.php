<?php

namespace App;


class Picture extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
