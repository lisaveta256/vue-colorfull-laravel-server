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
    public function tarif(){
        return $this->belongsTo(Tarif::class, 'tarif_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
