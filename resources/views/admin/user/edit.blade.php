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
                    <?php 
                        $divisions =  \App\Models\Division::orderBy('id', 'desc')->get();
                        $district =  \App\Models\District::where('id', $user->district_id)->first();
                        $thana =  \App\Models\Thana::where('id', $user->thana_id)->first();
                    ?>
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
                                        <input type="date" value="{{ $user->date_of_birth }}" name="date_of_birth" class="form-control mb-2 ">
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
                                            <option value="A+"{{ $user->blood_group == 'A+' ? 'selected':'' }}>A+</option>
                                            <option value="A-"{{ $user->blood_group == 'A-' ? 'selected':'' }}>A-</option>
                                            <option value="B+"{{ $user->blood_group == 'B+' ? 'selected':'' }}>B+</option>
                                            <option value="B-"{{ $user->blood_group == 'B-' ? 'selected':'' }}>B-</option>
                                            <option value="AB+"{{ $user->blood_group == 'AB+' ? 'selected':'' }}>AB+</option>
                                            <option value="AB-"{{ $user->blood_group == 'AB-' ? 'selected':'' }}>AB-</option>
                                            <option value="O+"{{ $user->blood_group == 'O+' ? 'selected':'' }}>O+</option>
                                            <option value="O-"{{ $user->blood_group == 'O-' ? 'selected':'' }}>O-</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="mb-0">Gender<span class="text-danger">*</span> </label>
                                        <select class="form-control mb-2 " name="gender">
                                            <option value="Male" {{ $user->gender == 'Male' ? 'selected':'' }}>Male</option>
                                            <option value="Female" {{ $user->gender == 'Female' ? 'selected':'' }}>Female</option>
                                            <option value="Other" {{ $user->gender == 'Other' ? 'selected':'' }}>Other</option>
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
                                        <select class="form-control-sm w-100" name="division_id" id="division_selector" onchange="divisionChange(this);">
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected':'' }}>
                                                    {{ $division->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">District<span class="text-danger">*</span> </label>
                                        <select class="form-control-sm w-100" name="district_id"  onchange="districtChange(this);" id="district_id">
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Thana<span class="text-danger">*</span> </label>
                                        <select class="form-control-sm w-100" name="thana_id" id="thana_id">
                                            <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Donate Date<span class="text-danger">*</span> </label>
                                        <input type="date" name="donate_date" value="{{ $user->donate_date }}" class="form-control mb-2 ">
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
<script type="text/javascript">
    function divisionChange(div)
    {
        var div_id = div.value;
        let sel = document.getElementById('district_id');
        $("#district_id").html("");
        $.ajax({
            url: "{{route('division_selector')}}",
            method: "POST",
            dataType: "JSON",
            data: {div_id:div_id, _token: '{{csrf_token()}}'},
            success: function (data) {
                  sel.innerHTML += `<option value=""> Select District </option>`
                for (i = 0; i < data.length; i++) {
                  sel.innerHTML += `<option value="${data[i].id}"> ${data[i].name} </option>`
                }
            },
            error: function() {
                console.log(data);
            }
        });
    }

    function districtChange(dis)
    {
        var dis_id = dis.value;
        let sels = document.getElementById('thana_id');
        $("#thana_id").html("");
        $.ajax({
            url: "{{route('district_selector')}}",
            method: "POST",
            dataType: "JSON",
            data: {dis_id:dis_id, _token: '{{csrf_token()}}'},
            success: function (data) {
                sels.innerHTML += `<option value=""> Select Thana </option>`
                for (i = 0; i < data.length; i++) {
                  sels.innerHTML += `<option value="${data[i].id}"> ${data[i].name} </option>`
                }
            },
            error: function() {
                console.log(data);
            }
        });
    }
</script>
@endpush

