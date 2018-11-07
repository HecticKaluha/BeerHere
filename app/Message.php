<?php

namespace App;

class Message extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
