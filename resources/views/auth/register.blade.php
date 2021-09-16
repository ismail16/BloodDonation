@extends('frontend.layouts.master')
@section('title','Registration')

@push('css')

@endpush

@section('content')
<div class="container pl-4 pr-4">
    <div class="row d-flex justify-content-center pb-5 mb-5">
        <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-5">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <?php 
                    $divisions =  \App\Models\Division::orderBy('id', 'desc')->get();
                    // $district =  \App\Models\District::where('id', $user->district_id)->first();
                    // $thana =  \App\Models\Thana::where('id', $user->district_id)->first();
                ?>                
                <div class="row card">
                    @if(session()->has('success'))
                    <div class="col-lg-12 col-xl-12 d-flex justify-content-center">
                        <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                            {{session('success')}}
                            <button type="button" class="close ml-4 text-danger" data-dismiss="alert">&times;</button>
                        </div>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="">
                        <div class="">
                            <ul class="">
                                @foreach ($errors->all() as $error)
                                    <li class="alert p-0 alert-danger p-1 m-1">
                                        {{ $error }}
                                        <button type="button" class="close ml-4 text-danger" data-dismiss="alert">&times;</button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="col-lg-12 card-header p-2">
                        <h4 class="m-0">Be A Proud Donor</h4>
                    </div>
                    <div class="col-lg-12 card-body p-2" style="background-color: #4a950547;">
                        <div class="row">                    
                            <div class="col-md-6">
                                <label class="mb-0">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Full Name" class="form-control-sm w-100 border-0 mb-1" required>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Date of Birth<span class="text-danger">*</span></label>
                                <input type="date" name="date_of_birth" class="form-control-sm w-100 border-0 mb-1" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label class="mb-0">Mobile Number<span class="text-danger">*</span></label>
                                <input type="number" name="phone" placeholder="Mobile Number" class="form-control-sm w-100 border-0 mb-1" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label class="mb-0">Email<span class="text-danger">*</span></label>
                                <input type="text" name="email" placeholder="Email" class="form-control-sm w-100 border-0 mb-1" required>
                            </div>
              
                            <div class="col-lg-6">
                                <label class="mb-0">Blood Group<span class="text-danger">*</span></label>
                                <select class="form-control-sm w-100 border-0 mb-1" name="blood_group" required>
                                    <option value="">Blood Group</option>
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
                                <label class="mb-0">Gender<span class="text-danger">*</span></label>
                                <select class="form-control-sm w-100 border-0 mb-1 " name="gender" required>
                                    <option value="">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Division<span class="text-danger">*</span> </label>
                                <select class="form-control-sm w-100 border-0 mb-1" name="division_id" id="division_selector" onchange="divisionChange(this);" required>
                                    <option value="">Select Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}">
                                            {{ $division->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">District<span class="text-danger">*</span> </label>
                                <select class="form-control-sm w-100 border-0 mb-1" name="district_id"  onchange="districtChange(this);" id="district_id" required>
                                    <option value="">Select District</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Thana<span class="text-danger">*</span> </label>
                                <select class="form-control-sm w-100 border-0 mb-1 " name="thana_id" id="thana_id" required>
                                    <option value="">Select Thana</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Password<span class="text-danger">*</span> </label>
                                <input id="password" type="password" class="form-control-sm w-100 border-0 mb-1 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">re-type password<span class="text-danger">*</span> </label>
                                <input id="password-confirm" type="password" class="form-control-sm w-100 border-0 mb-1" name="password_confirmation" required autocomplete="new-password" placeholder="re-type password" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 text-center">
                        <div class="p-1">
                            <button type="submit" class="btn btn-success pl-5 pr-5">Sign UP</button>
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
