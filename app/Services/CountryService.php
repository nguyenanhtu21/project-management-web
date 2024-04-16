<?php
namespace App\Services;
use App\Repositories\CountryRepository;
use App\Models\Country;


class CountryService{
    private $countryRepository;
    public function __construct(CountryRepository $countryRepository){
        $this->countryRepository = $countryRepository;
    }

    public function getAllCountries(){
        $countries = $this->countryRepository->getAll();
        return $countries;
    }

    public function create(array $countryData){
        $country = new Country();
        $country->name = $countryData['name'];
        $country->code = $countryData['code'];
        $country->description = $countryData['description'];
        $this->countryRepository->save($country);
    }

    public function update($id, array $countryData){
        $country = $this->countryRepository->getById($id);
        $country->name = $countryData['name'];
        $country->code = $countryData['code'];
        $country->description = $countryData['description'];
        $this->countryRepository->save($country);
    }

    public function delete($id){
        $this->countryRepository->delete($id);
    }
    
    public function getById($id){
        $country = $this->countryRepository->getById($id);
        return $country;
    }
}
