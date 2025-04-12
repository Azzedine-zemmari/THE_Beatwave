<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    use HasFactory;   
    use SoftDeletes;

    protected $table = 'events'; 
    protected $primaryKey = 'eventId';
    public $incrementing = true; 
    protected $keyType = 'int'; 
    protected $dates = ['deleted_At'];

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
        'place',
        'organizerId',
        'deleted_at'
    ];
    public function purchase(){
        return $this->hasMany(EventPurchase::class);
    }
    public function artist(){
        return $this->belongsTo(User::class,'artistId','id');
    }
}
