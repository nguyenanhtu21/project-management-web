@extends('master')
@section('main')
<div class="container">
    <div>
        <a href="/dashboard/company/create" class="btn btn-info mt-2 mb-2 text-white"><i
                class="fas fa-plus me-2"></i>Thêm</a>
    </div>
    <table class="table">
        <div class="title mb-0">
            <p class="ms-3 text-white mb-0">Danh sách công ty</p>
        </div>
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
                    <a href="/dashboard/company/edit/{{$row->id}}" class="text-decoration-none me-2"><i
                            class="bi bi-pencil-fill text-info fs-5"></i></a>
                    <a href="/dashboard/company/delete/{{$row->id}}" class="text-decoration-none"><i
                            class="bi bi-trash-fill text-warning fs-4"></i></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection