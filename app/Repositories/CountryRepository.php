<?php

namespace App\Repositories;
use App\Models\Country;

class CountryRepository
{

    public function getAll(){
        $countries = Country::all();
        return $countries;
    }

    public function getById($id){
        $country = Country::find($id);
        return $country;
    }

    public function getByCode($code){
        $country = Country::whereCode($code)->first();
        return $country;
    }

    public function save(Country $country){
        $country->save();
    }

    public function delete($id){
        $country = Country::find($id);
        $country->delete();
    }

}
