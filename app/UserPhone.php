<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPhone extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'phone2',
        'ddd',
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
