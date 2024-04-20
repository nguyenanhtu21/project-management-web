<?php

namespace App\Http\Controllers;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\UserRequest;
use App\Services\CompanyService;
use App\Services\RoleService;
use App\Services\UserService;


class UserController extends Controller
{
    private $userService;
    private $companyService;
    private $roleService;
    public function __construct(UserService $userService, CompanyService $companyService, RoleService $roleService){
        $this->userService = $userService;
        $this->companyService = $companyService;
        $this->roleService = $roleService;
    }

    public function index(){
        $users = $this->userService->getAll();
        return view('user.index', ['users'=> $users]);
    }

    public function create(){
        $companies = $this->companyService->getAll();
        $roles = $this->roleService->getAll();
        return view('user.create_user', ['companies'=> $companies, 'roles'=> $roles]);
    }

    public function store(UserRequest $userRequest, PersonRequest $personRequest){
        try{
            $this->userService->create($userRequest->all(), $personRequest->all());
            return redirect('/dashboard/user');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id){
        $user = $this->userService->getById($id);
        $companies = $this->companyService->getAll();
        $roles = $this->roleService->getAll();
        return view('user.edit', ['user'=> $user, 'companies'=> $companies, 'roles'=>$roles]);
    }

    public function update($id, UserRequest $userRequest, PersonRequest $personRequest){
        $userData = $userRequest->only('email', 'password', 'is_active', 'role_id');
        $personData = $personRequest->only('full_name', 'birthdate', 'gender', 'address', 'company_id', 'phone_number');
        $this->userService->update($id, $userData, $personData);
        return redirect('/dashboard/user');
    }

    public function destroy($id){
        $this->userService->delete($id);
        return redirect()->back();
    }
}
