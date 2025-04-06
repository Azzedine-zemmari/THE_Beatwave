<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events_submission extends Model
{
    use HasFactory;
    protected $fillable = [
        'organizerId',
        'artistId',
        'eventId',
        'status'
    ];
}
