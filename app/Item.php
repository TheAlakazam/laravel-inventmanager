<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'items';
    protected $fillable = [
        'Item_Description', 'Stock', 'Issued', 'Returned', 'Purchased'
    ];
}
