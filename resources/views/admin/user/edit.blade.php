@extends('admin.layouts.master')
@section('title','Edit User')

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
                <form method="POST" action="{{route('admin.user.update', $user->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-12 card-body">
                                <div class="row form">                    
                                    <div class="col-md-3">
                                        <label class="mb-0">Full Name<span class="text-danger">*</span> </label>
                                        <input type="text" name="name" value="{{ $user->name }}" placeholder="Full Name" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Date of Birth<span class="text-danger">*</span> </label>
                                        <input type="text" value="{{ $user->date_of_birth }}" name="date_of_birth" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Phone<span class="text-danger">*</span> </label>
                                        <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Phone" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Email<span class="text-danger">*</span> </label>
                                        <input type="text" name="email" value="{{ $user->email }}" placeholder="Email" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Blood Group<span class="text-danger">*</span> </label>
                                        <select class="form-control mb-2 " name="blood_group">
                                            <option value="A+"{{ $user->blood_group == 0 ? 'selected':'' }}>A+</option>
                                            <option value="A-"{{ $user->blood_group == 0 ? 'selected':'' }}>A-</option>
                                            <option value="B+"{{ $user->blood_group == 0 ? 'selected':'' }}>B+</option>
                                            <option value="B-"{{ $user->blood_group == 0 ? 'selected':'' }}>B-</option>
                                            <option value="AB+"{{ $user->blood_group == 0 ? 'selected':'' }}>AB+</option>
                                            <option value="AB-"{{ $user->blood_group == 0 ? 'selected':'' }}>AB-</option>
                                            <option value="O+"{{ $user->blood_group == 0 ? 'selected':'' }}>O+</option>
                                            <option value="O-"{{ $user->blood_group == 0 ? 'selected':'' }}>O-</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="mb-0">Gender<span class="text-danger">*</span> </label>
                                        <select class="form-control mb-2 " name="gender">
                                            <option value="Male" {{ $user->gender == 0 ? 'selected':'' }}>Male</option>
                                            <option value="Female" {{ $user->gender == 0 ? 'selected':'' }}>Female</option>
                                            <option value="Other" {{ $user->gender == 0 ? 'selected':'' }}>Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="mb-0">Password</label>
                                        <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">re-type password</label>
                                        <input id="password-confirm" type="password" class="form-control mb-2" name="password_confirmation" autocomplete="new-password" placeholder="re-type password">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="mb-0">Division<span class="text-danger">*</span> </label>
                                        <input type="text" name="division" value="{{ $user->division }}" placeholder="Division" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">District<span class="text-danger">*</span> </label>
                                        <input type="text" name="district" value="{{ $user->district }}" placeholder="District" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Thana<span class="text-danger">*</span> </label>
                                        <input type="text" name="thana" value="{{ $user->thana }}" placeholder="Thana" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Donate Date<span class="text-danger">*</span> </label>
                                        <input type="text" name="donate_date" value="{{ $user->donate_date }}" class="form-control mb-2 ">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mb-0">Profile Image</label>
                                        <input type="file" name="photo" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-3">
                                        @if($user->photo)
                                        <img src="{{ asset('images/profile_image/'.$user->photo) }}" class="img-fluid table_image border" alt="">
                                        @else
                                        <img src="{{ asset('images/profile_image/default.jpg') }}" class="img-fluid table_image border" alt="">
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Status</label>
                                        <select class="form-control mb-2 " name="status">
                                            <option value="1" {{ $user->status == 1 ? 'selected':'' }}>Active</option>
                                            <option value="0" {{ $user->status == 0 ? 'selected':'' }}>Deactive</option>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.user.index')}}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> Users</a>

                        <div class="float-right">
                            <a href="{{route('admin.user.index')}}" class="btn btn-sm btn-secondary mr-2"> Cancel</a>
                            <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-sync"></i> Update</button>
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

