@extends('layouts.admin.app')

@section('title', 'Add New')

@push('css')
<link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@endpush

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <a href="{{route('admin.event.index')}}" class="btn btn-sm btn-primary pull-right"> <i class="fa fa-list"></i> All Event</a>
    </div>
    <!-- /.box-header -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('admin.event.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control form-control-sm" required/>
                </div>
                <div class="col-md-12">
                    <label>Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control form-control-sm" required></textarea>
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
