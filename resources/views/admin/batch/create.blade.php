@extends('admin.layouts.master')
@section('title','Create New Batch')

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
                <form method="POST" action="{{route('admin.batch.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body pb-0">
                        <div class="row">
                           <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Cource</label>
                                <div class="">
                                    <select name="course_id" class="form-control form-control-sm">
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Batch Number</label>
                                <div class="">
                                    <input type="text" name="batch_no" class="form-control form-control-sm w-100" placeholder="Batch Number">
                                </div>
                            </div>
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Batch Name</label>
                                <div class="">
                                    <input type="text" name="name" class="form-control form-control-sm w-100" placeholder="Batch Name">
                                </div>
                            </div>
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Status</label>
                                <div class="">
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>                       
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.batch.index')}}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> Batch</a>
                        <div class="float-right">
                            <a href="{{route('admin.batch.index')}}" class="btn btn-sm btn-secondary mr-2"> Cancel</a>
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
    <script src="{{asset('backend_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
@endpush

