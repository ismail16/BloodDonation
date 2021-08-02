@extends('admin.layouts.master')
@section('title','Create New Course')

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
                <form method="POST" action="{{route('admin.course.update', $course->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Title <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="text" name="title" value="{{ $course->title }}" required class="form-control form-control-sm w-100" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Slug</label>
                                <div class="">
                                    <input type="text" name="slug" value="{{ $course->slug }}" class="form-control form-control-sm w-100" placeholder="Slug Title">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Total Class</label>
                                <div class="">
                                    <input type="number" name="class" value="{{ $course->class }}" class="form-control form-control-sm w-100" placeholder="Total Class">
                                </div>
                            </div>
                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Duration</label>
                                <div class="">
                                    <input type="number" name="duration" value="{{ $course->duration }}" class="form-control form-control-sm w-100" placeholder="Duration">
                                </div>
                            </div>
                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Total Hours </label>
                                <div class="">
                                    <input type="number" name="total_hours" value="{{ $course->total_hours }}" class="form-control form-control-sm w-100" placeholder="Total Hours">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Portfolio Image(1200*600px)</label>
                                <div class="row border">
                                    <div class="col-5">
                                        <img id="imageBrowsLive" src="{{ asset('images/course/'.$course->image) }}" class="img-fluid portfolio_image_edit border" alt="">
                                    </div>
                                    <div class="col-7 align-self-center">
                                        <input type="file"  id="image" name="image" onchange="readliveImagebrows(this);"  class="form-control form-control-sm w-100">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 pb-1">
                                <div class="row">
                                    <div class="col-md-12 pb-1">
                                        <label class="control-label mb-0">Prerequisites</label>
                                        <div class="">
                                            <input type="text" name="prerequisites" value="{{ $course->prerequisites }}" required class="form-control form-control-sm w-100" placeholder="prerequisites">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="control-label mb-0">Status</label>
                                        <div class="">
                                            <select name="status" class="form-control form-control-sm">
                                                <option value="0" {{ $course->status==0? 'selected':'' }}>Hide From Frontend</option>
                                                <option value="1"  {{ $course->status==1? 'selected':'' }}>Show On Frontend</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                
                            </div>

                            <div class="col-md-12">
                                <label class="control-label mb-0">Description</label>
                                <div class="">
                                    <textarea name="description" class="textarea form-control form-control-sm w-100">{!! $course->description !!}</textarea> 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="control-label mb-0">Course Module</label>
                                <div class="">
                                    <textarea name="course_module" class="textarea form-control form-control-sm w-100">{{ $course->course_module }}</textarea> 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="control-label mb-0">Software Taught</label>
                                <div class="">
                                    <textarea name="software_taught" class="textarea form-control form-control-sm w-100">{{ $course->software_taught }}</textarea> 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="control-label mb-0">Career Opportunity</label>
                                <div class="">
                                    <textarea name="career_opportunity" class="textarea form-control form-control-sm w-100">{{ $course->career_opportunity }}</textarea> 
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.course.index')}}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> course</a>
                        <div class="float-right">
                            <a href="{{route('admin.course.index')}}" class="btn btn-sm btn-secondary mr-2"> Cancel</a>
                            <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-sync"></i> Update</button>
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

