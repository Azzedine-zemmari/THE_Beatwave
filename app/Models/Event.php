<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;   
    protected $table = 'events'; 
    protected $primaryKey = 'eventId';
    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $fillable = [
        'nom',
        'description',
        'date',
        'taketPrice',
        'stockeTicket',
        'numberOfPlace',
        'image',
        'artistId',
        'categorieId',
        'place'
    ];
    public function purchase(){
        return $this->hasMany(EventPurchase::class);
    }
    public function artist(){
        return $this->belongsTo(User::class,'artistId','id');
    }
}
