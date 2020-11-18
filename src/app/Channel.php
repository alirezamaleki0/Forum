<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //Define Relations
    public function threads()
    {
        $this->hasMany(Thread::class);
    }
}
