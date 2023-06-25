<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'name',
        'name2',
        'category_id',
        'review',
        'comment',
        'callNumber',
        '_token',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_item', 'category_id', 'item_id');
    }
}
