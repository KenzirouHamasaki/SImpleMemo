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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
