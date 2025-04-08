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
}
