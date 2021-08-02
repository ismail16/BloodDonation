@extends('admin.layouts.master')
@section('title','Show Batch')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="timeline">
                <div class="time-label">
                    <span class="">Show Batch</span>
                </div>
                <div>
                    <i class="fas fa-user bg-green"></i>
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label p-2"> Title : {{ $batch->name }}</label>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label p-2"> Slug : {{ $batch->batch_no }}</label>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label p-2"> Slug : {{ $batch->course_id }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-user bg-green"></i>
                    <div class="timeline-item">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label p-2"> Slug : {{ $batch->slug }}</label>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label p-2"> Status : {{ $batch->status }}</label>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label p-2"> Date : {{ date('d m Y', strtotime($batch->created_at)) }}</label>
                            </div>
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

