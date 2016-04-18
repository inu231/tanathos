<?php namespace Modules\Admin\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;

class Admin extends Authenticatable {

  use Sortable;
  protected $table = 'admins';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

   protected $sortable = [
      'name', 'email', 'created_at',
   ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password',
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];



}
