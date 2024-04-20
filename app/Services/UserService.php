<?php

namespace App\Services;
use App\Models\Person;
use App\Repositories\UserRepository;
use App\Repositories\CompanyRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService{

    private $userRepository;
    private $companyRepository;
    public function __construct(UserRepository $userRepository, CompanyRepository $companyRepository){
        $this->userRepository = $userRepository;
        $this->companyRepository = $companyRepository;
    }

    public function create(array $userData, array $personData){
        DB::beginTransaction();
        try{
            $user = new User();
            $user->email = $userData['email'];
            $user->password = $userData['password'];
            if(!isset($userData['is_active'])){
                $userData['is_active']=0;
            }else{
                $user->is_active = $userData['is_active'];
            }
            $this->userRepository->save($user);

            $person = new Person();
            $person->fill($personData);
            $user->person()->save($person) ;
            $user->roles()->attach($userData['role_id']);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            throw new \Exception($e);
        }
    }

    public function getAll(){
        return $this->userRepository->getAll();
    }

    public function getById($id){
        $user = $this->userRepository->getById($id);
        return $user;
    }

    public function update($id, array $userData, array $personData){
        DB::beginTransaction();
        try{
            $user = $this->userRepository->getById($id);
            $user->email = $userData['email'];
            if(isset($userData['password'])){
                $user->password = $userData['password'];
            }
            if(!isset($userData['is_active'])){
                $userData['is_active']=0;
                $user->is_active = $userData['is_active'];
            }else{
                $user->is_active = $userData['is_active'];
            }
            $this->userRepository->save($user);

            $person = new Person();
            $person->fill($personData);
            $user->person()->update($personData);
            $user->roles()->sync($userData['role_id']);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            throw new \Exception($e);
        }
    }

    public function delete($id){
        $this->userRepository->delete($id);
    }
}