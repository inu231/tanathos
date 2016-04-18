<?php namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Page extends Model {

    use Sortable;

    protected $fillable = ["title","content","html", "parent_id"];

    protected $sortable = ['title', 'created_at', 'content', 'parent_id'];

    protected $table = 'pages';

    public function pageCategories()
    {
      return $this->hasOne(Modules\Admin\Entities\PageCategory::class);
    }
}
