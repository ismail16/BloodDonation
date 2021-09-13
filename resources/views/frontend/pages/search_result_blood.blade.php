@extends('frontend.layouts.master')
@section('title','Welcome to Blood Donation')

@section('content')
@include('frontend.partials.search_bar')


<section id="about" class="contianer-fluid about-us">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Blood Doners</h2>
            </div>
        </div>
        <div class="row">
            @if(count($search_results)>0)
            @foreach($search_results as $user)
            <div class="col-md-4 pl-1 pr-1">
                <div class="row border m-1 p-2">
                    <div class="col-8 pl-2">
                        <div class="">
                            <p class="res_font_size">Name-<a href="" class="as3_name">{{ $user->name }}</a>
                            <p class="res_font_size">Age- <span>{{ date_diff(date_create($user->date_of_birth), date_create('now'))->y }} yrs</span></p>
                            <p class="res_font_size">Gender- <span>{{ $user->gender }}</span></p>
                            <p class="res_font_size">Blood Group- 
                                <span class="text-danger border p-1 rounded-circle">{{ $user->blood_group }}</span>
                            </p>
                            <p class="res_font_size">Division-{{ $user->division->name }}</p>
                            <p class="res_font_size">District-{{ $user->district->name }}</p>
                            <p class="res_font_size">Thana-{{ $user->thana->name }}</p>
                        </div>
                    </div>
                    <div class="col-4 pr-0 ">
                        @if($user->photo)
                            <img src="{{ asset('images/profile_image/'. $user->photo) }}" alt="Image" class="img-fluid image-size">
                        @else
                            <img src="{{ asset('images/profile_default.png') }}" class="img-fluid image-size">
                        @endif
                        @if($user->donate_date)
                        <div class="text-center border mt-1">
                            <span class="text-danger res_font_size">Last Donate</span> <br>
                            <span class="res_font_size">{{ date('d-m-Y', strtotime($user->donate_date)) }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-12 mt-2 pt-2 mb-2 pl-0 pr-0 border-top">
                        <span class="text-danger res_font_size">Mobile : </span> 
                        <span class="res_font_size text-dark">{{ $user->phone }}</span> <br>

                        <span class="text-danger res_font_size">E-mail : </span> 
                        <span class="res_font_size text-dark">{{ $user->email }}</span> <br>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-md-12">
                <div class="border text-center p-5">
                   <h1>Opps !!</h1>
                   <h3 class="text-danger"> Doners not Found</h3><br>
                    <div class="abstract-div">
                        <div class="">
                            Go to <a href="/">Home</a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            @endif
            @if($search_results->links())
            <div class="col-md-12  d-flex justify-content-center">
                {{ $search_results->links() }}
            </div>
            @endif
        </div>
    </div>
</section>

@endsection
