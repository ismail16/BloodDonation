@extends('frontend.layouts.master')
@section('title','Student Dashboard')
@section('content')
<section class="content">
    <div class="row d-flex justify-content-center">
        @if(session()->has('message'))
        <div class="col-lg-12 col-xl-12 d-flex justify-content-center">
            <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                {{session('message')}}
                <button type="button" class="close ml-4 text-danger" data-dismiss="alert">&times;</button>
            </div>
        </div>
        @endif
        <div class="col-sm-12 col-md-12 col-lg-8 mt-4 mb-5">
            <div class="card">
                <div class="card-header">
                    <a href="/" class="btn btn-sm btn-primary">Home</a>
                    <div class="float-right">
                        <a href="{{ route('doner.profile.edit', $user->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row form">  
                                <div class="col-9">
                                    <div class="row mb-2">
                                        <label class="mb-0 col-sm-5 col-md-5 col-lg-3">
                                            Full Name 
                                        </label>
                                        <label class="mb-0 col-sm-7 col-md-7 col-lg-9 font-weight-bold text-danger">
                                            : {{ $user->name }}
                                        </label>
                                    </div>

                                    <div class="row mb-2">
                                        <label class="mb-0 col-md-3">
                                            Date of Birth 
                                        </label>
                                        <label class="mb-0 col-md-8 font-weight-bold text-danger">
                                            : {{ $user->date_of_birth }}
                                        </label>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="mb-0 col-md-3">
                                            Phone 
                                        </label>
                                        <label class="mb-0 col-md-8 font-weight-bold text-danger">
                                            : {{ $user->phone }}
                                        </label>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="mb-0 col-md-3">
                                            Email 
                                        </label>
                                        <label class="mb-0 col-md-8 font-weight-bold text-danger">
                                            : {{ $user->email }}
                                        </label>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="mb-0 col-md-3">
                                            Blood Group 
                                        </label>
                                        <label class="mb-0 col-md-8 font-weight-bold text-danger">
                                            : {{ $user->blood_group }}
                                        </label>
                                    </div>

                                    <div class="row mb-2">
                                        <label class="mb-0 col-md-3">
                                            Gender
                                        </label>
                                        <label class="mb-0 col-md-8 font-weight-bold text-danger">
                                            : {{ $user->gender }}
                                        </label>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="mb-0 col-md-3">
                                            Division
                                        </label>
                                        <label class="mb-0 col-md-8 font-weight-bold text-danger">
                                            : {{ $user->division->name }}
                                        </label>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="mb-0 col-md-3">
                                            District
                                        </label>
                                        <label class="mb-0 col-md-8 font-weight-bold text-danger">
                                            : {{ $user->District->name }}
                                        </label>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="mb-0 col-md-3">
                                            Thana
                                        </label>
                                        <label class="mb-0 col-md-8 font-weight-bold text-danger">
                                            : {{ $user->thana->name }}
                                        </label>
                                    </div>

                                    <div class="row mb-2">
                                        <label class="mb-0 col-md-3">
                                            Last Donate
                                        </label>
                                        <label class="mb-0 col-md-8 font-weight-bold text-danger">
                                            : {{ $user->donate_date }}
                                        </label>
                                    </div>

                                    <div class="row mb-2">
                                        <label class="mb-0 col-md-3">
                                            Status
                                        </label>
                                        <label class="mb-0 col-md-8 font-weight-bold text-danger">
                                            :
                                            @if($user->status == 1)
                                            Active
                                            @else
                                            Deactive
                                            @endif
                                        </label>
                                    </div>

                                </div> 
                                <div class="col-3">
                                    <div class="row">
                                        <label class="col-md-12">
                                            @if($user->photo)
                                            <img src="{{ asset('images/profile_image/'.$user->photo) }}" class="img-fluid table_image border" alt="">
                                            @else
                                            <img src="{{ asset('images/profile_default.png') }}" class="img-fluid table_image border" alt="dd">
                                            @endif
                                        </label>
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
