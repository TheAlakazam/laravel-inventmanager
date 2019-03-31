<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    //
    protected $table = 'borrow';
    public $timestamps = false;
    protected $fillable = [
        'Item_ID', 'Borrower_ID', 'Quantity', 'Issue_Date', 'Return_Date', 'Reason', 'Item_Description', 'Issuer_ID'
    ];
    protected $casts = [
        'Issue_Date' => 'datetime',
        'Return_Date' => 'datetime',
    ];
}
