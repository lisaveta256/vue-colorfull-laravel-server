<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfoTarif extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'tarif_id',
        'short_description',
        'perks',
        'abstract_painting',
        'line_painting',
        'pensil_painting',
        'natural_painting',
        'links'
    ];
    public function tarifMain(){
        return $this->belongsTo(Tarif::class, 'tarif_id', 'id');
    }
}
