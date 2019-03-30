<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    //
    protected $table = 'borrow';
    protected $fillable = [
        'Item ID', 'Borrower ID', 'Quantity', 'Issue Date', 'Return Date', 'Reason'
    ];
}
