@extends('master')
@section('main')
<div class="container">
<div>
    <a href="/dashboard/user/create" class="btn btn-info mt-2 mb-2 text-white"><i class="fas fa-plus me-2"></i>Thêm</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Email</th>
      <th scope="col">Roles</th>
      <th scope="col">Active</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $num=>$row)
    <tr>
      <th scope="row">{{$num+1}}</th>
      <td>{{$row->email}}</td>
      <td>
      @php
        foreach($row->roles as $userRole){
            echo $userRole->role_name.'; ';
        }
      @endphp
      </td>
      @if($row->is_active===1)
      <td class="text-success">Kích hoạt</td>
      @else
      <td class="text-danger">Chưa kích hoạt</td>
      @endif
      <td>
        <a href="/dashboard/user/edit/{{$row->id}}" class="btn btn-info text-white"><i class="bi bi-pencil-fill"></i></a>
        <a href="/dashboard/user/delete/{{$row->id}}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection