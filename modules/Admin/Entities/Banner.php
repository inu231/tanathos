<?php namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Kyslik\ColumnSortable\Sortable;

class Banner extends model implements StaplerableInterface {

    use Sortable, EloquentTrait;

    protected $sortable = [];

    protected $fillable = ['name', 'avatar'];

    public function __construct(array $attributes = array()) {
        //var_dump($attributes);
        $this->hasAttachedFile('avatar', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
            ],
            //'url' => '/data/:class_name/:attachment/:id_partition/:filename',
            //'path' => ':app_root/storage:url',
        ]);

        parent::__construct($attributes);
    }


}
