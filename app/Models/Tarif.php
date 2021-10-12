<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarif extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'price'
    ];
    public function tarifUser(){
        return $this->hasMany(TarifUser::class, 'tarif_id', 'id');
    }
    public function info(){
        return $this->hasMany(InfoTarif::class, 'tarif_id', 'id');
    }
}
