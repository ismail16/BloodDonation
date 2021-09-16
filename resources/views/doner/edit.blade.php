@extends('frontend.layouts.master')
@section('title','Student Dashboard')
@section('content')
<section class="content">
    <div class="row d-flex justify-content-center">
        @if(session()->has('message'))
        <div class="col-lg-12 col-xl-12 d-flex justify-content-center" style="position: absolute; z-index: 99;">
            <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                {{session('message')}}
                <button type="button" class="close ml-4 text-danger" data-dismiss="alert">&times;</button>
            </div>
        </div>
        @endif
        <div class="col-sm-12 col-md-12 col-lg-8 ml-2 mr-2 mt-4 mb-5">
            <form method="POST" action="{{route('doner.profile.update', $user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mb-5">
                    <div class="card-body pb-0">
                        <?php 
                        $divisions = \App\Models\Division::orderBy('id', 'desc')->get();
                        $district = \App\Models\District::where('id', $user->district_id)->first();
                        $thana = \App\Models\Thana::where('id', $user->thana_id)->first();
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row form"> 

                                    <div class="col-4">
                                    <div class="row">
                                        <label class="col-md-12">
                                            @if($user->photo)
                                            <img src="{{ asset('images/profile_image/'.$user->photo) }}" class="img-fluid border" alt="">
                                            @else
                                            <img src="{{ asset('images/profile_default.png') }}" class="img-fluid border" alt="">
                                            @endif
                                            <input type="file" name="photo" class="">
                                        </label>
                                    </div>
                                </div>   
                                           
                                    <div class="col-8">
                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                Full Name 
                                            </label>
                                            <input type="text" name="name" class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8" value="{{ $user->name }}">
                                        </div>

                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                Date of Birth 
                                            </label>
                                            <input type="date" name="date_of_birth" class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8" value="{{ $user->date_of_birth }}">
                                        </div>
                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                Phone 
                                            </label>
                                            <input type="text" name="phone" class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8" value="{{ $user->phone }}">
                                        </div>
                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                Email 
                                            </label>
                                            <input type="text" name="email" class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8" value="{{ $user->email }}">

                                        </div>
                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                Blood Group 
                                            </label>
                                            <select class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8 " name="blood_group">
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

                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                Gender
                                            </label>
                                            <select class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8" name="gender">
                                                <option value="Male" {{ $user->gender == 'Male' ? 'selected':'' }}>Male</option>
                                                <option value="Female" {{ $user->gender == 'Female' ? 'selected':'' }}>Female</option>
                                                <option value="Other" {{ $user->gender == 'Other' ? 'selected':'' }}>Other</option>
                                            </select>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                Password 
                                            </label>
                                            <input id="password" type="password" class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8 @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                re-type password 
                                            </label>
                                            <input id="password-confirm" type="password" class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8" name="password_confirmation" autocomplete="new-password" placeholder="re-type password">
                                        </div>

                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                Division
                                            </label>
                                            <select class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8" name="division_id" id="division_selector" onchange="divisionChange(this);">
                                                @foreach($divisions as $division)
                                                <option value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected':'' }}>
                                                    {{ $division->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                District
                                            </label>
                                            <select class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8" name="district_id"  onchange="districtChange(this);" id="district_id">
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            </select>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                Thana
                                            </label>
                                            <select class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8" name="thana_id" id="thana_id">
                                                <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                                            </select>
                                        </div>

                                        <div class="row mb-1">
                                            <label class="mb-0 col-md-4">
                                                Last Donate
                                            </label>
                                            <input type="date" name="donate_date" class="form-control form-control-sm ml-3 mr-3 mb-0 col-md-8" value="{{ $user->donate_date }}">
                                        </div>
                                    </div> 
                   

                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <a href="{{route('doner.profile.index')}}" class="btn btn-sm btn-secondary mr-2"> Cancel</a>
                            <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-sync"></i> Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('scripts')
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