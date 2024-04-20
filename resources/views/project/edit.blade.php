@extends('master')
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" style="text-decoration:none;">Home</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/user" style="text-decoration:none;">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">create</li>
    </ol>
</nav>
@endsection
@section('main')
<div style="border: 1px solid rgba(0,0,0,0.1);">
    <div class="title">
        <p class="ms-3 text-white">Thêm mới</p>
    </div>
    <div class="container">
        <form class="row mb-3" method="POST" action="/dashboard/project/update/{{$project->id}}">
            @csrf
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="ml-1">Mã dự án</label>
                    <input type="code" class="form-control" name="code" value="{{$project->code}}" placeholder="Nhập mã dự án">
                </div>
                <div class="form-group mb-3">
                    <label class="ml-1">Tên dự án</label>
                    <input type="name" class="form-control" name="name" value="{{$project->name}}" placeholder="Nhập tên dự án">
                </div>
                <div class="form-group mb-3">
                <label class="ml-1">Mô tả</label>
                <textarea type="text" name="description" class="form-control" id="" cols="30" rows="10">
                {{$project->description}}
                </textarea>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label>Công ty</label>
                    <select id="company-drop-down" class="form-select mb-3" name="company_id">
                        <option disabled>Chọn công ty</option>
                        @foreach($companies as $company)
                        <option value="{{$company->id}}"
                            {{$company->name == $project->company->name ? 'selected' : '' }}>{{$company->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Người tham gia</label>
                    <select class="form-control" multiple name="person_id[]" id="person-drop-down">
                        @foreach($project->persons as $person)
                        @php
                            $selected = '';
                            foreach($project->persons as $personProject){
                            if($person->full_name == $personProject->full_name){
                                $selected = 'selected';
                                break;
                            }
                        }
                        @endphp
                        <option value="{{$person->id}}" {{$selected}}>{{$person->full_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <input type="submit" class="btn text-white col-1 mt-2" style="background-color: #08c4c4;" value="Lưu">
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#company-drop-down').change(function(event) {
        var companyId = this.value;
        $('#person-drop-down').html('');
        $.ajax({
            url: "{{url('/dashboard/company/getAllPersons')}}",
            type: 'POST',
            dataType: 'json',
            data: {
                company_id: companyId,
                _token: "{{csrf_token()}}"
            },
            success: function(response) {
                console.log(response);
                $.each(response.persons, function(index, val) {
                    $('#person-drop-down').append('<option selected value="' + val
                        .id + '">' + val.full_name + '</option>');
                });
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $('#person-drop-down').select2();
});
</script>
@endsection