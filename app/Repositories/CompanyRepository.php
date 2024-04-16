<?php

namespace App\Repositories;
use App\Models\Company;

class CompanyRepository{
    
    public function getAll(){
        $companies = Company::all();
        return $companies;
    }

    public function delete($id){
        $company = Company::find($id);
        $company->delete();
    }

    public function findById($id){
        $company = Company::find($id);
        return $company;
    }

    public function save(Company $company){
        $company->save();
    }

    public function existsByCode($code){
        return Company::where('code',$code)->exists();
    }


}