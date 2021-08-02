@extends('admin.layouts.master')

@section('title', 'Users')

@push('css')

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
                        <a href="" class="pull-right btn btn-sm btn-primary float-right ml-2"> <i
                            class="fa fa-plus"></i> Add New</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
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
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{date('d M Y', strtotime($user->created_at))}}</td>
                                    <td>{{date('d M Y', strtotime($user->updated_at))}}</td>
                                    <td class="text-center">
                                        <a href="" class=""> <i class="fa fa-edit"></i> </a>
                                        <a href="" class=""> <i class="fa fa-trash"></i> </a>
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


