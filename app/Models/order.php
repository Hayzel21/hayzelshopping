<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class order extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'orders';
    protected $fillable=[

        'vocherNo',
        'qty',
        'total',
        'paymentSlip',
        'paymentID',
        'itemID',
        'userID'
    ];
}
