<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artistInvitation extends Model
{
    use HasFactory;
    protected $fillable = [
        'artistId',
        'eventsId',
        'organizerId'
    ];
}
