<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_name',
        'two_char_country_code',
        'three_char_country_code'
    ];
    public function account(){
        return $this->hasMany(Account::class);
    }
}
