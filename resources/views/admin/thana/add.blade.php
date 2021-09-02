@extends('admin.layouts.master')

@section('title', 'Add New')

@push('css')
<link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@endpush

@section('content')
<section class="content">
    <div class="row">
        @if(session()->has('message'))
            <div class="col-lg-12 col-xl-12 d-flex justify-content-center">
                <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                    {{session('message')}}
                    <button type="button" class="close ml-4 text-danger" data-dismiss="alert">&times;</button>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('admin.division.index')}}" class="btn btn-sm btn-primary"> <i class="fa fa-list"></i> All Division</a>
                    <form action="{{route('admin.division.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Division</label>
                                    <select name="division_id" class="form-control form-control-sm" id="division_selector">
                                        @foreach($divisions as $division)
                                        <option value="{{ $division->slug }}">
                                            {{ $division->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">District</label>
                                    <select name="district_id" class="form-control form-control-sm" id="district_id">
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" required/>
                                </div>
                                <div class="col-md-6">
                                    <label>Name Bangla</label>
                                    <input type="text" name="phone" class="form-control form-control-sm" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="margin-top: 28px;">
                                    <div class="form-group">
                                        <input type="radio" name="status" value="1" id="1"/>
                                        <label class="mr-3">Active</label>
                                        <input type="radio" name="status" value="0" id="2"/>
                                        <label for="2">Deactive</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-check-circle"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $(function(){
        $('.select2').select2();
        // $('.select2').change(function(){
        //     alert($(this).val());
        // });
    });
</script>
<script type="text/javascript">
    $('#division_selector').change(function () {
        var div_id = this.value;
        let sel = document.getElementById('district_id');
        $("#district_id").html("");

        $.ajax({
            url: "{{route('division_selector')}}",
            method: "POST",
            dataType: "JSON",
            data: {div_id:div_id, _token: '{{csrf_token()}}'},
            success: function (data) {

                console.log(data);
                
                for (i = 0; i < data.length; i++) {
                  sel.innerHTML += `<option> ${data[i].name} </option>`
                }

            },
            error: function() {
                console.log(data);
            }
        });
    })
</script>
@endpush
