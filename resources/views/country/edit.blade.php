@extends('master')
@section('main')
<form method="post" action="/dashboard/country/update/{{$country->id}}">
    @csrf
    <div class="form-group">
        <label for="country-code">Coutry code</label>
        <input type="text" class="form-control" id="country-code" value="{{$country->code}}" name="code"
            placeholder="Enter country code">
    </div>
    <div class="form-group">
        <label for="country-name">Coutry name</label>
        <input type="text" class="form-control" id="country-name" value="{{$country->name}}" name="name"
            placeholder="Enter country name">
    </div>
    <div class="form-group">
        <label for="country-description">Description</label>
        <input type="text" class="form-control" id="country-description" value="{{$country->description}}"
            name="description" placeholder="Enter country descripton">
    </div>
    <input type="submit" class="btn btn-info mt-2" value="Lưu">
</form>
@endsection