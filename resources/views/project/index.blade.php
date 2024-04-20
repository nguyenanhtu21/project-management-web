@extends('master')
@section('main')
<div>
    <a href="/dashboard/project/create" class="btn btn-info mt-2 mb-2 text-white"><i
            class="fas fa-plus me-2"></i>Thêm</a>
</div>
<table class="table">
    <div class="title mb-0">
        <p class="ms-3 text-white mb-0">Danh sách dự án</p>
    </div>
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Mã dự án</th>
            <th scope="col">Tên dự án</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Công ty</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $num=>$row)
        <tr>
            <th scope="row">{{$num+1}}</th>
            <td>{{$row->code}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->description}}</td>
            <td>{{$row->company->name}}</td>
            <td>
                <a href="/dashboard/project/edit/{{$row->id}}" class="text-decoration-none me-2"><i
                        class="bi bi-pencil-fill text-info fs-5"></i></a>
                <a href="/dashboard/project/delete/{{$row->id}}" class="text-decoration-none"><i
                        class="bi bi-trash-fill text-warning fs-4"></i></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection