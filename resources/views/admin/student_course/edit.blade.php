@extends('admin.layouts.master')
@section('title','Edit Student Course')

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
                <form method="POST" action="{{route('admin.student-course.update', $studentcourse->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" class="d-none" value="{{ $studentcourse->user_id }}" name="user_id">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Course ID</label>
                                <div class="">
                                    <select name="course_id" class="form-control form-control-sm">
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $studentcourse->course_id == $course->id ? 'selected':'' }}>{{ $course->title }}-{{ $course->price }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Batch ID </label>
                                <div class="">
                                    <select name="batch_id" class="form-control form-control-sm">
                                        @foreach($batchs as $batch)
                                            <option value="{{ $batch->id }}" {{ $studentcourse->batch_id == $batch->id ? 'selected':'' }}>{{ $batch->name }}{{ $batch->batch_no }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Fees</label>
                                <div class="">
                                    <input type="number" name="fees" value="{{ $studentcourse->fees }}" class="form-control form-control-sm w-100" placeholder="Fees">
                                </div>
                            </div>
                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Given Amount</label>
                                <div class="">
                                    <input type="number" name="given_amount" value="{{ $studentcourse->given_amount }}" class="form-control form-control-sm w-100" placeholder="Given Amount">
                                </div>
                            </div>

                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Payment Status</label>
                                <div class="">
                                    <select name="p_status" class="form-control form-control-sm">
                                        <option value="0" {{ $studentcourse->p_status==0? 'selected':'' }}>Unpaid</option>
                                        <option value="1"  {{ $studentcourse->p_status==1? 'selected':'' }}>Paid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Duration</label>
                                <div class="">
                                    <input type="number" name="duration" value="{{ $studentcourse->duration }}" class="form-control form-control-sm w-100" placeholder="Duration">
                                </div>
                            </div>
                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Is certified</label>
                                <div class="">
                                    <select name="is_certified" class="form-control form-control-sm">
                                        <option value="0" {{ $studentcourse->is_certified==0? 'selected':'' }}>NO</option>
                                        <option value="1"  {{ $studentcourse->is_certified==1? 'selected':'' }}>YES</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Result</label>
                                <div class="">
                                    <input type="text" name="result" value="{{ $studentcourse->result }}" class="form-control form-control-sm w-100" placeholder="Result">
                                </div>
                            </div>
                            <div class="col-md-4 pb-1">
                                <label class="control-label mb-0">Status</label>
                                <div class="">
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="0" {{ $studentcourse->status==0? 'selected':'' }}>Hide From Frontend</option>
                                        <option value="1"  {{ $studentcourse->status==1? 'selected':'' }}>Show On Frontend</option>
                                    </select>
                                </div>    
                            </div>    
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.student-course.index')}}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> student-course</a>
                        <div class="float-right">
                            <a href="{{route('admin.student-course.index')}}" class="btn btn-sm btn-secondary mr-2"> Cancel</a>
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

