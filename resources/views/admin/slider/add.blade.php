@extends('admin.layouts.master')

@section('title', 'Add Slider')

@push('css')

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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('admin.slider.index')}}" class="btn btn-sm btn-primary"> <i class="fa fa-list"></i> All Slider</a>
                    <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control form-control-sm" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                          <input type="submit" class="btn btn-sm btn-primary pull-right" value="Save">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')

@endpush