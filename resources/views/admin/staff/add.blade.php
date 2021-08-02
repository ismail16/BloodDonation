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
                    <a href="{{route('admin.staff.index')}}" class="btn btn-sm btn-primary"> <i class="fa fa-list"></i> All Slider</a>
                    <form action="{{route('admin.staff.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" required/>
                                </div>
                                <div class="col-md-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control form-control-sm" required/>
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control form-control-sm" required/>
                                </div>
                                <div class="col-md-6">
                                    <label>Designation</label>
                                    <input type="text" name="designation" class="form-control form-control-sm" required/>
                                </div>
                                <div class="col-md-12">
                                    <label>Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control form-control-sm" required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>Experience</label>
                                    <input type="text" name="experience" class="form-control form-control-sm" required/>
                                </div>
                                <div class="col-md-6">
                                    <label>Join Date</label>
                                    <input type="date" name="join_date" class="form-control form-control-sm" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control form-control-sm" required/>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-top: 28px;">
                                    <div class="form-group">
                                        <label for="1">Active</label>
                                        <input type="radio" name="status" value="1" id="1"/>
                                        <label for="2">Deactive</label>
                                        <input type="radio" name="status" value="0" id="2"/>
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
@endpush
