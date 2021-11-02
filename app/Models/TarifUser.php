<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tarif_id',
        'status'
    ];
    protected $dispatchesEvents = [
        'created'=>\App\Events\TarifUserEvent::class,
    ];
   /* protected static function booted(){
        static::created(function($tarif_user){
           // dd($tarif_user);
        });
    }*/
    public function tarif(){
        return $this->belongsTo(Tarif::class, 'tarif_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
