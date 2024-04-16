<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use App\Http\Requests\CountryRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private $countryService;
    public function __construct(CountryService $countryService){
        $this->countryService = $countryService;
    }

    public function index(){
        $countries = $this->countryService->getAllCountries();
        return view('country.index',['countries'=>$countries]);
    }

    public function create(){
        return view('country.create_country');
    }

    public function store(CountryRequest $request){
        $this->countryService->create($request->input());
        return redirect('/dashboard/country')->with('success','Thêm bản ghi thành công');
    }

    public function edit($id){
        $country = $this->countryService->getById($id);
        return view('country.edit',['country'=>$country]);
    }

    public function update(CountryRequest $request, $id){
        $this->countryService->update($id,$request->input());
        return redirect('/dashboard/country')->with('success','Cập nhật bản ghi thành công');
    }

    public function destroy($id){
        $this->countryService->delete($id);
        return redirect()->back();
    }

}
