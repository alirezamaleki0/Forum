<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //Define Relations
    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function channel()
    {
        $this->belongsTo(Channel::class);
    }

    public function answers()
    {
        $this->hasMany(Answer::class);
    }
}

