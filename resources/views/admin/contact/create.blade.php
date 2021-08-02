@extends('admin.layouts.master')
@section('title','Create New Category')

@push('css')

@endpush

@section('content')
<section class="content">
    <div class="row">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endforeach
        @endif
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Category Name <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="text" name="name" required class="form-control form-control-sm w-100" placeholder="Category Name">
                                </div>
                            </div>

                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Status <span class="text-danger">*</span></label>
                                <div class="">
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="0">Deactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.category.index')}}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> Categories</a>

                        <div class="float-right">
                            <a href="{{route('admin.category.index')}}" class="btn btn-sm btn-secondary mr-2"> Cancel</a>
                            <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Create New</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection


@push('scripts')

@endpush
