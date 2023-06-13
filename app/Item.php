<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'name',
        'name2',
        'category',
        'review',
        'comment',
        'callNumber',
        '_token',
    ];
}
