@extends('admin.layouts.master')

@section('title', 'Users')

@push('css')
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
<div class="box">

    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <!-- <th>#SL</th> -->
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Registration Date</th>
            <th>Last Update</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($batchs as $batch)
        <tr>
            <td>{{$batch->id}}</td>
            <td>{{$batch->name}}</td>
            <td>{{$batch->phone}}</td>
            <td>{{$batch->email}}</td>
            <td>{{$batch->created_at}}</td>
            <td>{{$batch->updated_at}}</td>
            <td class="text-center">
                <a href="{{route('admin.student.edit',$batch->id)}}" class=""> <i class="fa fa-edit"></i> </a>
                <a href="" class=""> <i class="fa fa-trash"></i> </a>
            </td>
        </tr>
        @endforeach
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