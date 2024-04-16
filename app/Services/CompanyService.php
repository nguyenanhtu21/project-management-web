<?php

namespace App\Services;
use App\Repositories\CompanyRepository;
use App\Models\Company;

class CompanyService{
    private $companyRepository;
    public function __construct(CompanyRepository $companyRepository){
        $this->companyRepository = $companyRepository;
    }

    public function getAll(){
        return $this->companyRepository->getAll();
    }

    public function create(array $data){
        if($this->companyRepository->existsByCode($data['code'])){
            $error = 'Mã công ty đã tồn tại';
            return $error;
        }
        $company = new Company();
        $company->code = $data['code'];
        $company->name = $data['name'];
        $company->address = $data['address'];
        $this->companyRepository->save($company);
    }

    public function update(array $data, $id){
        $company = $this->companyRepository->findById($id);
        $company->name = $data['name'];
        $company->code = $data['code'];
        $company->address = $data['address'];
        $this->companyRepository->save($company);
    }

    public function delete($id){
        $this->companyRepository->delete($id);
    }

    public function findById($id){
        return $this->companyRepository->findById($id);
    }
}