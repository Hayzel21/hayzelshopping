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
        'status',
        'paymentSlip',
        'payment_id',
        'item_id',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
