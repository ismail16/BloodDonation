@extends('admin.layouts.master')

@section('title', 'Add Student')

@push('css')
<link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@endpush

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <a href="{{route('admin.student.index')}}" class="btn btn-sm btn-primary pull-right"> <i class="fa fa-list"></i> All Student</a>
    </div>
    <!-- /.box-header -->
    
    <form action="{{route('admin.student.store')}}" method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                    <label>Student</label>
                    <select class="form-control select2" name="user_id" required>
                        <option selected="disabled">Select Student</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->id }}- {{$user->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                    <label>Batch</label>
                    <select class="form-control select2" name="batch" required>
                        <option selected="disabled">Select Batch</option>
                        @php($i = 1)
                        @for($i; $i<=20; $i++)
                        <option value="{{$i}}">{{$i }} Batch</option>
                        @endfor
                    </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                    <label>Course Fee</label>
                        <input type="number" name="fees" class="form-control form-control-sm" required/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                    <label>Given Amount</label>
                    <input type="number" name="given_amount" class="form-control form-control-sm" required/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                    <label>Payment Status</label>
                    <select class="form-control" name="p_status" required>
                        <option selected="disabled">Select Payment</option>
                        <option value="1">Paid</option>
                        <option value="0">Due</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label class="control-label"><h3>Please Select a Trade / Course:</h3></label>

                    <table class="table table-bordered table-primary">
                        <thead>
                            <tr style="text-aling:center !important">
                                <th>
                                    #SL
                                </th>
                                <th>
                                    Trade/Course Name
                                </th>
                                <th>
                                    3 Month
                                </th>
                                <th>
                                    6 Month
                                </th>

                                <th>
                                    1 Year
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1.
                                </td>
                                <td>
                                    <input type="radio" name="c_name" value="1">
                                    Microsoft Office Application
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="3">
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="6">
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2.
                                </td>
                                <td>
                                    <input type="radio" name="c_name" value="2"/>
                                    Graphics Design (Photoshop)
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="3">
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="6">
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                3.
                                </td>
                                <td>
                                    <input type="radio" name="c_name" value="3"/>
                                    Graphics Design (Illustrator)
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="3">
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="6">
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4.
                                </td>
                                <td>
                                    <input type="radio" name="c_name" value="4"/>
                                    Web Design & Development
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="3">
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="6">
                                </td>
                                <td>
                                    <input type="radio" name="duration" value="1">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <div class="box-footer">
          <input type="submit" class="btn btn-sm btn-primary pull-right" value="Save">
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $(function(){
        $('.select2').select2();
        // $('.select2').change(function(){
        //     alert($(this).val());
        // });
    });
</script>
@endpush