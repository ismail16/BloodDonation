@extends('admin.layouts.master')
@section('title','All course')

@push('css')
   
@endpush

@section('content')
    <section class="content">
        <div class="row">
            @if(session()->has('success'))
                <div class="col-lg-12 col-xl-12 d-flex justify-content-center">
                    <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                        {{session('success')}}
                        <button type="button" class="close ml-4 text-danger" data-dismiss="alert">&times;</button>
                    </div>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="col-lg-12 col-xl-12 d-flex justify-content-center">
                    <div class="alert alert-danger text-center pr-3 pl-3 p-1 mb-1">
                        {{session('error')}}
                        <button type="button" class="close ml-4 text-danger" data-dismiss="alert">&times;</button>
                    </div>
                </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="{{ route('admin.student_course_create', $student->id) }}" class="pull-right btn btn-sm btn-primary float-right ml-2"> <i
                                class="fa fa-plus"></i> Add New</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Course</th>
                                    <th>Batch ID</th>
                                    <th>Fees</th>
                                    <th>Given Amount</th>
                                    <th>Duration</th>
                                    <th>Is Certified</th>
                                    <th>Result</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($studentcourses as $studentcourse)
                                <tr>
                                    @php 
                                        $batch = \App\Models\Batch::where('id', $studentcourse->batch_id)->first(); 
                                        $course = \App\Models\Course::where('id', $batch->course_id)->first(); 
                                    @endphp
                                    
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        <a href="{{ route('admin.course.show', $course->id) }}">{{ $course->title }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.batch.show', $batch->id) }}"> {{ $batch->name }}{{ $batch->batch_no }}</a>
                                    </td>
                                    <td>{{ $studentcourse->fees }}</td>
                                    <td>{{ $studentcourse->fees }}</td>
                                    <td>{{ $studentcourse->given_amount }}</td>
                                    <td>
                                        @if($studentcourse->is_certified == 1)
                                            <span class="badge bg-green">
                                                <a href="{{ route('student_certified', $studentcourse->user_id) }}">Certified</a>
                                            </span>
                                        @else
                                            <span class="badge bg-yellow">Not Certified</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($studentcourse->result)
                                            <span class="badge bg-success">{{ $studentcourse->result }}</span>
                                        @else
                                            <span class="badge bg-warnig">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($studentcourse->status == 0)
                                            <span class="badge bg-yellow">Inactive</span>
                                        @else
                                            <span class="badge bg-green">Actived</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('admin.student-course.edit', $studentcourse->id)}}"
                                           class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>

                                        <a href="#" class="btn btn-xs btn-danger table-action-btn on_delete"
                                           data-content="{{$loop->index+1}}"><i
                                                    class="fa fa-trash"></i></a>

                                        <form id="on_delete{{$loop->index+1}}"
                                              action="{{route('admin.student-course.destroy', $studentcourse->id)}}"
                                              method="post" class="delete hidden"
                                              data-content="{{$studentcourse->id}}" >
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    
@endpush
