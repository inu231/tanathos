<?php

return [

    /*
    spec columns
    */
    'columns' => [
        'alpha'    => [
            'rows' => ['content','title','description', 'email', 'name', 'slug'],
            'class' => 'fa fa-sort-alpha',
        ],
        'amount'   => [
            'rows' => ['amount', 'price'],
            'class' => 'fa fa-sort-amount'
        ],
        'numeric'  => [
            'rows' => ['created_at', 'updated_at', 'level', 'id', 'phone_number', 'parent_id'],
            'class' => 'fa fa-sort-numeric'
        ],
    ],

    /*
    defines icon set to use when sorted data is none above (alpha nor amount nor numeric)
    */
    'default_icon_set' => 'fa fa-sort',

    /*
    icon that shows when generating sortable link while column is not sorted
    */
    'sortable_icon'    => 'fa fa-sort',

    /*
    suffix class that is appended when ascending order is applied
    */
    'asc_suffix'        => '-asc',

    /*
    suffix class that is appended when descending order is applied
    */
    'desc_suffix'       => '-desc',

    /*
    default anchor class, if value is null none is added
    */
    'anchor_class'      => null,

    /*
    relation - column separator. ex: detail.phone_number means relation "detail" and column "phone_number"
     */
    'uri_relation_column_separator' => '.'

];
