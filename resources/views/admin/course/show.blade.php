@extends('admin.layouts.master')
@section('title','Show Course')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="timeline">
                <div class="time-label">
                    <span class="">Show Course</span>
                </div>
                <div>
                    <i class="fas fa-user bg-green"></i>
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label p-2"> Title : {{ $course->title }}</label>
                            </div>
                            <div class="col-md-5">
                                <label class="control-label p-2"> Slug : {{ $course->slug }}</label>
                            </div>
                            <div class="col-md-3">
                                <img src="{{ asset('images/course/'.$course->image) }}" class="img-fluid portfolio_image_edit border" alt="">
                            </div>

                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-user bg-green"></i>
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label p-2"> Total Class : {{ $course->class }}</label>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label p-2"> Duration : {{ $course->duration }}</label>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label p-2"> Total Hours : {{ $course->total_hours }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header text-bold">Prerequisites</h3>
                        <div class="timeline-body">
                            {{ $course->prerequisites }}
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header text-bold">Description</h3>
                        <div class="timeline-body">
                            {{ $course->description }}
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header text-bold">Course Module</h3>
                        <div class="timeline-body">
                            {{ $course->course_module }}
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header text-bold">Software Taught</h3>
                        <div class="timeline-body">
                            {{ $course->software_taught }}
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header text-bold">Career Opportunity</h3>
                        <div class="timeline-body">
                            {{ $course->career_opportunity }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('scripts')
@endpush

