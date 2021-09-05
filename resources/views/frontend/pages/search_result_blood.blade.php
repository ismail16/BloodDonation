@extends('frontend.layouts.master')
@section('title','Welcome to Blood Donation')

@section('content')
@include('frontend.partials.search_bar')


<section id="about" class="contianer-fluid about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Blood Doners</h2>
            </div>
        </div>
        <div class="row">
            @foreach($search_results as $user)
            <div class="col-md-4 border">
                @if($user->donate_date)
                <div class="text-center">
                    <span class="text-danger">Last Donate : </span> 
                    <span>{{ $user->donate_date }}</span>
                </div>
                @endif
                <div class="row p-1">
                    <div class="col-md-8 pl-2">
                        <div class="border-bottom">
                            <p>Name-<a href="" class="as3_name">{{ $user->name }}</a>
                            <p>Age- <span>{{ date_diff(date_create($user->date_of_birth), date_create('now'))->y }} yrs</span></p>
                            <p>Gender- <span>{{ $user->gender }}</span></p>
                            <p>Blood Group- 
                                <span class="text-danger border p-1 rounded-circle">{{ $user->blood_group }}</span>
                            </p>
                            <p>Division-{{ $user->division_id }}</p>
                            <p>District-{{ $user->district_id }}</p>
                            <p>Thana-{{ $user->thana_id }}</p>
                            
                        </div>
                        <div class="mt-1">
                            <span class="text-danger">Mobile : </span> 
                            <span>{{ $user->phone }}</span> <br>

                            <span class="text-danger">E-mail : </span> 
                            <span>{{ $user->email }}</span> <br>
                        </div>
                    </div>
                    <div class="col-md-4 pr-0 ">
                        @if($user->photo)
                            <img src="{{ asset('images/profile_image/'. $user->photo) }}" alt="Image" class="img-fluid image-size">
                        @else
                            <img src="{{ asset('images/profile_image/default.png') }}" class="img-fluid image-size">
                        @endif
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
