<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static find($id)
 */
class Channel extends Model
{
    protected $fillable =[
        'name', 'slug'
    ];
    //Define Relations
    public function threads()
    {
        $this->hasMany(Thread::class);
    }
}
