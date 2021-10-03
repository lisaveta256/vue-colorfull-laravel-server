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
}
