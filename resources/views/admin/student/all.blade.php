@extends('admin.layouts.master')

@section('title', 'All Student')

@push('css')
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<style>
  .pad{
    padding-right: 0px;
  }
</style>
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
          <div class="table-responsive">
            <!-- <div class="row">
                @php($total= 0)
                @foreach($students as $student)
                  @php($total += $student->given_amount)
                @endforeach
                <div class="col-md-4">
                  <form action="{{route('admin.certificate')}}" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="number" name="batch_id" class="form-control form-control-sm" placeholder="Batch ID" required/>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <button type="submit" class="btn btn-sm bg-green"> <i class="fa fa-refresh" aria-hidden="false"></i> Certify</button>
                          </div>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="col-md-4">
                <form action="{{route('admin.payment')}}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" name="id" class="form-control form-control-sm" placeholder="ID" required/>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="number" name="given_amount" class="form-control form-control-sm" placeholder="Due Amount" required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm bg-green"> <i class="fa fa-refresh" aria-hidden="false"></i> Pay</button>
                        </div>
                    </div>
                  </div>
                </form>
                </div>

                <div class="col-md-4">
                <form action="{{route('admin.result')}}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" name="id" class="form-control form-control-sm" placeholder="ID" required/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="result" class="form-control form-control-sm" placeholder="Result" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="pull-left btn btn-sm bg-green"> <i class="fa fa-refresh" aria-hidden="false"></i> Result</button>
                            <span class="badge bg-green" style="margin-left:15px">1000000{{$total}}</span>
                        </div>
                    </div>                    
                  </div>
                </form>
                </div>
            </div> -->
            <a href="{{route('admin.student.create')}}" class="pull-right btn btn-sm btn-primary float-right ml-2"> <i
              class="fa fa-plus"></i> Add New</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>St. ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Course Name</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($students as $student)
                 <tr>
                  <td>{{$loop->index + 1}}</td>
                  <td class="text-center">{{$student->id}}</td>
                  <td>{{$student->name}}</td>
                  <td>{{$student->phone}}</td>
                  <td>{{$student->email}}</td>
                  <td>
                    <a href="{{ route('admin.student_courses', $student->id) }}">Student Course</a>
                  </td>
                  <td>{{ date('d-m-Y', strtotime($student->created_at)) }}</td>
                  <td>
                      <a href="{{route('admin.student.edit', $student->id)}}"
                        class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>

                      <a href="#" class="btn btn-xs btn-danger table-action-btn on_delete"
                        data-content="{{$loop->index+1}}"><i
                        class="fa fa-trash"></i></a>

                      <form id="on_delete{{$loop->index+1}}"
                          action="{{route('admin.student.destroy', $student->id)}}"
                          method="post" class="delete hidden"
                          data-content="{{$student->id}}">
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
