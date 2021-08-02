@extends('admin.layouts.master')

@section('title', 'Certified Student')

@push('css')
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
<div class="box">
    <div class="box-header">
            @php($total= 0)
            @foreach($students as $student)
              @php($total += $student->given_amount)
            @endforeach
        <form action="{{route('admin.certificate')}}" method="post">
          @csrf
          <div class="col-md-2">
              <div class="form-group">
                  <input type="number" name="batch_id" class="form-control form-control-sm" placeholder="Batch ID" required/>
              </div>
          </div>
          <button type="submit" class="pull-left btn btn-sm bg-green"> <i class="fa fa-refresh" aria-hidden="false"></i> Certify</button>
        </form>
        <form action="{{route('admin.payment')}}" method="post">
          @csrf
          <div class="col-md-1">
              <div class="form-group">
                  <input type="number" name="id" class="form-control form-control-sm" placeholder="ID" required/>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <input type="number" name="given_amount" class="form-control form-control-sm" placeholder="Due Amount" required/>
              </div>
          </div>
          <button type="submit" class="pull-left btn btn-sm bg-green"> <i class="fa fa-refresh" aria-hidden="false"></i> Pay</button>
        </form>

        <form action="{{route('admin.result')}}" method="post">
          @csrf
          <div class="col-md-1">
              <div class="form-group">
                  <input type="number" name="id" class="form-control form-control-sm" placeholder="ID" required/>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-group">
                  <input type="text" name="result" class="form-control form-control-sm" placeholder="Result" required/>
              </div>
          </div>
          <button type="submit" class="pull-left btn btn-sm bg-green"> <i class="fa fa-refresh" aria-hidden="false"></i> Result</button>
        </form>

        <span class="badge bg-green" style="margin-left:15px">{{$total}}</span>
        <a href="{{route('admin.student.create')}}" class="pull-right btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Add New</a>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Batch</th>
            <th>Course Name</th>
            <th>Duration</th>
            <th>Total Amount</th>
            <th>Given Amount</th>
            <th>Payment Status</th>
            <th>Certificate Date</th>
            <th>Certification</th>
            <th>Result</th>
        </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->user->name}}</td>
                <td>{{$student->batch_id}} Batch</td>
                <td>
                  @if($student->c_name == 1)
                    Microsoft Office Application
                  @elseif($student->c_name == 2)
                    Graphics Design (Photoshop)
                  @elseif($student->c_name == 3)
                    Graphics Design (Illustrator)
                  @else
                    Web Design & Development
                  @endif
                </td>
                <td>{{$student->duration}}
                  @if($student->duration > 1 )
                    Month
                  @else
                    Year
                  @endif
                </td>
                <td>{{$student->fees}}</td>
                <td>{{$student->given_amount}}</td>
                <td class="text-center">
                @php($amount = $student->fees - $student->given_amount)
                  @if($amount > $student->p_status)
                  <span class="badge bg-red">{{$amount}}</span>
                  @else
                  <span class="badge bg-green">Paid</span>
                  @endif
                </td>
                <td>
                    @if($student->is_certified == 1)
                        {{date('d M Y', strtotime($student->updated_at))}}
                    @endif
                </td>
                <td class="text-center">
                @if($student->is_certified == 0)
                  <span class="badge bg-red">No</span>
                  @else
                  <span class="badge bg-green">Yes</span>
                  @endif
                </td>
                <td class="text-center">
                  @if($student->result == null)
                  <span class="badge bg-red">No</span>
                  @else
                  <span class="badge {{$student->result == 'A+' || $student->result == 'A' || $student->result == 'A-' || $student->result == 'B'?'bg-green':'bg-yellow'}}">{{$student->result}}</span>
                  @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
@endsection

@push('scripts')
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endpush
