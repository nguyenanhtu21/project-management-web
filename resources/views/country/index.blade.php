@extends('master')
@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#" style="text-decoration:none;">Home</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/country" style="text-decoration:none;">Country</a></li>
  </ol>
</nav>
@endsection
@section('main')
<div class="container">
<div>
    <a href="/dashboard/country/create" class="btn btn-info mt-2 mb-2 text-white"><i class="fas fa-plus me-2"></i>Thêm</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($countries as $num=>$row)
    <tr>
      <th scope="row">{{$num+1}}</th>
      <td>{{$row->code}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->description}}</td>
      <td>
        <a href="/dashboard/country/edit/{{$row->id}}" class="btn btn-info text-white"><i class="fas fa-edit"></i></a>
        <a href="/dashboard/country/delete/{{$row->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection