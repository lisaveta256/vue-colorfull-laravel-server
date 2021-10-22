<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Resources\CountryResource;

class CountryController extends Controller
{
    public function getIndex(){
        $countries = Country::all();
        return CountryResource::collection($countries);
    }
}
