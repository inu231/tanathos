<?php namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Tag extends Model {

    use Sortable;

    protected $fillable = ['name', 'description'];
    protected $sortable = ['name', 'description'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'post_id', 'tag_id');
    }

}
