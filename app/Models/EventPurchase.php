<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPurchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'eventId',
        'transactionId'
    ];
    public function event(){
        // (2nd params foreign key in purchaseTable, 3d params the id in event table)
        return $this->belongsTo(Event::class,'eventId','eventId');
    }
}
