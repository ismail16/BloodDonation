@extends('frontend.layouts.master')
@section('title','Registration')

@push('css')

@endpush

@section('content')
<div class="container">
<div class="row d-flex justify-content-center pb-5 mb-5">
<div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-5">
    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf                
        <div class="row card">
            @if(session()->has('success'))
            <div class="col-lg-12 col-xl-12 d-flex justify-content-center">
                <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                    {{session('success')}}
                    <button type="button" class="close ml-4 text-danger" data-dismiss="alert">&times;</button>
                </div>
            </div>
            @endif
            <div class="col-lg-12 card-header">
                <h4 class="m-0">Be A Proud Donor</h4>
            </div>
            <div class="col-lg-12 card-body" style="background-color: #4a950547;">
                <div class="row form">                    
                    <div class="col-md-6">
                        <input type="text" name="name" value="" placeholder="Full Name*" class="form-control mb-2 ">
                    </div>
                    <div class="col-md-6">
                        <input type="date" name="date_of_birth" class="form-control mb-2 ">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="phone" value="" placeholder="Phone*" class="form-control mb-2 ">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="email" value="" placeholder="Email*" class="form-control mb-2 ">
                    </div>
      
                    <div class="col-lg-6">
                        <select class="form-control mb-2 " name="blood_group">
                            <option value="">Blood Group*</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <select class="form-control mb-2 " name="gender">
                            <option value="">Gender*</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="division" value="" placeholder="Division*" class="form-control mb-2 ">
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="district" value="" placeholder="District*" class="form-control mb-2 ">
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="thana" value="" placeholder="Thana*" class="form-control mb-2 ">
                    </div>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control mb-2" name="password_confirmation" required autocomplete="new-password" placeholder="re-type password">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center">
                <div class="p-2">
                    <button type="submit" class="btn btn-primary pl-5 pr-5">Sign UP</button>
                </div>
            </div>
        </div>
    </form> 
</div>
</div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script>
   
</script>
@endpush
