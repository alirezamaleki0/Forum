<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //Define Relations
    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function thread()
    {
        $this->belongsTo(Thread::class);
    }
}
