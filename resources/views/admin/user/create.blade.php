@extends('admin.layouts.master')
@section('title','Create New User')

@section('content')
<section class="content">
    <div class="row">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endforeach
        @endif
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{route('admin.user.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-12 card-body">
                                <div class="row form">                    
                                    <div class="col-md-3">
                                        <label class="mb-0">Full Name<span class="text-danger">*</span> </label>
                                        <input type="text" name="name" placeholder="Full Name" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Date of Birth<span class="text-danger">*</span> </label>
                                        <input type="date" name="date_of_birth" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Phone<span class="text-danger">*</span> </label>
                                        <input type="text" name="phone" placeholder="Phone" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Email<span class="text-danger">*</span> </label>
                                        <input type="email" name="email" placeholder="Email" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Blood Group<span class="text-danger">*</span> </label>
                                        <select class="form-control mb-2 " name="blood_group">
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

                                    <div class="col-md-3">
                                        <label class="mb-0">Gender<span class="text-danger">*</span> </label>
                                        <select class="form-control mb-2 " name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="mb-0">Password</label>
                                        <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">re-type password</label>
                                        <input id="password-confirm" type="password" class="form-control mb-2" name="password_confirmation" required autocomplete="new-password" placeholder="re-type password">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="mb-0">Division<span class="text-danger">*</span> </label>
                                        <input type="text" name="division" placeholder="Division" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">District<span class="text-danger">*</span> </label>
                                        <input type="text" name="district" placeholder="District" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Thana<span class="text-danger">*</span> </label>
                                        <input type="text" name="thana" placeholder="Thana" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Donate Date<span class="text-danger">*</span> </label>
                                        <input type="text" name="donate_date" class="form-control mb-2 ">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mb-0">Profile Image</label>
                                        <input type="file" name="photo" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-6">
                                     
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.user.index')}}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> portfolio</a>

                        <div class="float-right">
                            <a href="{{route('admin.user.index')}}" class="btn btn-sm btn-secondary mr-2"> Cancel</a>
                            <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Create New</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection


@push('scripts')
    <script src="{{asset('backend_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
@endpush

