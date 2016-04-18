<?php namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model {

    use Sortable;

    protected $fillable = ['title', 'body', 'user_id', 'slug', 'post_category_id'];
    protected $sortable = ['title', 'body', 'created_at', 'user_id'];
    protected $table = "posts";

    public function user()
    {
      return $this->belongsTo(\App\User::class);
    }

    public function postCategory()
    {
      return $this->hasOne(PostCategory::class, 'id', 'post_category_id');
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id')->withTimestamps();
    }

    public function getTagListAttribute()
    {
      return $this->tags->lists('id');
    }

}
