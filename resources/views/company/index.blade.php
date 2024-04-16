@extends('master')
@section('main')
<div class="container">
<div>
    <a href="/dashboard/company/create" class="btn btn-info mt-2 mb-2 text-white"><i class="fas fa-plus me-2"></i>Thêm</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($companies as $num=>$row)
    <tr>
      <th scope="row">{{$num+1}}</th>
      <td>{{$row->code}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->address}}</td>
      <td>
        <a href="/dashboard/company/edit/{{$row->id}}" class="btn btn-info text-white"><i class="bi bi-pencil-fill"></i></a>
        <a href="/dashboard/company/delete/{{$row->id}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection