<?php namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PostCategory extends Model {

    use Sortable;

    protected $fillable = ['name', 'description'];
    //protected $sortable = ['name', 'description'];
    protected $sortable = ['name', 'description'];

    protected $table = "post_categories";

    public function posts()
    {
      return $this->belongsTo(Post::class);
    }


}
