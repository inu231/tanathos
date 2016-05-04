<?php namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $fillable = ['author', 'title', 'body'];

}
