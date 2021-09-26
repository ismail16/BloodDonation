@extends('frontend.layouts.master')
@section('title','Registration')

@push('css')

@endpush

@section('content')
<style type="text/css">
    .invalid-feedback {
        margin-top: -.25rem !important;
    }
</style>
<div class="container pl-4 pr-4">
    <div class="row d-flex justify-content-center pb-5 mb-5">
        <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-5">
            <div>
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
                                <label class="mb-0">Full Name
                                    <span class="text-danger">* </span>
                                </label>
                                <input type="text" name="name" id="name" placeholder="Full Name" class="form-control-sm w-100 border-0 mb-1">
                                <span class="invalid-feedback d-block" id="name_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Date of Birth
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" name="date_of_birth" id="date_of_birth" onchange="date_of_birth_change(event);" class="form-control-sm w-100 border-0 mb-1">
                                <span class="invalid-feedback d-block" id="date_of_birth_err"></span>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label class="mb-0">Mobile Number
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="phone" id="phone" placeholder="Mobile Number" class="form-control-sm w-100 border-0 mb-1">
                                <span class="invalid-feedback d-block" id="phone_err"></span>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label class="mb-0">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="email" id="email" placeholder="Email" class="form-control-sm w-100 border-0 mb-1">
                                <span class="invalid-feedback d-block" id="email_err"></span>
                            </div>
              
                            <div class="col-lg-6">
                                <label class="mb-0">Blood Group
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control-sm w-100 border-0 mb-1" name="blood_group" id="blood_group">
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
                                <span class="invalid-feedback d-block" id="blood_group_err"></span>
                            </div>

                            <div class="col-lg-6">
                                <label class="mb-0">Gender
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control-sm w-100 border-0 mb-1 " name="gender" id="gender">
                                    <option value="">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <span class="invalid-feedback d-block" id="gender_err"></span>
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Division
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control-sm w-100 border-0 mb-1" name="division_id" id="division_selector" onchange="divisionChange(this);">
                                    <option value="">Select Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}">
                                            {{ $division->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback d-block" id="division_id_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">District
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control-sm w-100 border-0 mb-1" name="district_id" id="district_id" onchange="districtChange(this);">
                                    <option value="">Select District</option>
                                </select>
                                <span class="invalid-feedback d-block" id="district_id_err"></span>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Thana
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control-sm w-100 border-0 mb-1 " name="thana_id" id="thana_id">
                                    <option value="">Select Thana</option>
                                </select>
                                <span class="invalid-feedback d-block" id="thana_id_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control-sm w-100 border-0 mb-1" name="password" id="password" autocomplete="new-password" placeholder="password">
                                <span class="invalid-feedback d-block" id="password_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">re-type password
                                    <span class="text-danger">*</span>
                                </label>
                                <input id="password-confirm" type="password" class="form-control-sm w-100 border-0 mb-1" name="password_confirmation" autocomplete="new-password" placeholder="re-type password">
                                <span class="invalid-feedback d-block" id="password_confirmation_err"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 text-center">
                        <div class="p-1">
                            <button onclick="submit_form()" class="btn btn-success pl-5 pr-5">Sign UP</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>

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

    function submit_form(){
        var name = $("#name").val();
        var date_of_birth = $("#date_of_birth").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var blood_group = $("#blood_group").val();
        var gender = $("#gender").val();
        var division_id = $("#division_selector").val();
        var district_id = $("#district_id").val();
        var thana_id = $("#thana_id").val();
        var password = $("#password").val();
        var password_confirmation = $("input[name=password_confirmation]").val();

        $.ajax({
            url: "{{route('register')}}",
            method: "POST",
            dataType: "JSON",
            data: {name:name, date_of_birth:date_of_birth, phone:phone, email:email, blood_group:blood_group, gender:gender, division_id:division_id, district_id:district_id, thana_id:thana_id, password:password, password_confirmation:password_confirmation, _token: '{{csrf_token()}}'},
            success: function (data) {
               window.location.href = "{{ route('doner.profile.index') }}"
            },
            error: function(response) {
                console.log(response.responseJSON.errors)
                $('#name_err').text(response.responseJSON.errors.name);
                $('#date_of_birth_err').text(response.responseJSON.errors.date_of_birth);
                $('#phone_err').text(response.responseJSON.errors.phone);
                $('#email_err').text(response.responseJSON.errors.email);
                $('#blood_group_err').text(response.responseJSON.errors.email);
                $('#gender_err').text(response.responseJSON.errors.email);
                $('#division_id_err').text(response.responseJSON.errors.division_id);
                $('#district_id_err').text(response.responseJSON.errors.district_id);
                $('#thana_id_err').text(response.responseJSON.errors.thana_id);
                $('#password_err').text(response.responseJSON.errors.password);
                $('#password_confirmation_err').text(response.responseJSON.errors.password_confirmation);
            }
        });
    }


    // *****************Validation******************
    function date_of_birth_change(e){
        if (e.target.value) {
            $('#date_of_birth_err').text('');
        }else{
            $('#date_of_birth_err').text("The date of birth field is required.");
        }
    }
    $("#name").keyup(function () {
        if ($(this).val()) {
            $('#name_err').text('');
        }else{
            $('#name_err').text("The Name is required.");
        }
    });
    $("#phone").keyup(function () {
        if ($(this).val()) {
            $('#phone_err').text('');
        }else{
            $('#phone_err').text("The Phone is required.");
        }
    });
    $("#email").keyup(function () {
        if ($(this).val()) {
            $('#email_err').text('');
        }else{
            $('#email_err').text("The Email is required.");
        }
    });
    $("#blood_group").change(function () {
        if ($(this).val()) {
            $('#blood_group_err').text('');
        }else{
            $('#blood_group_err').text("The Blood Group is required.");
        }
    });
    $("#gender").change(function () {
        if ($(this).val()) {
            $('#gender_err').text('');
        }else{
            $('#gender_err').text("The Gender is required.");
        }
    });
    $("#division_selector").change(function () {
        if ($(this).val()) {
            $('#division_id_err').text('');
        }else{
            $('#division_id_err').text("The Division is required.");
        }
    });
    $("#district_id").change(function () {
        if ($(this).val()) {
            $('#district_id_err').text('');
        }else{
            $('#district_id_err').text("The District is required.");
        }
    });
    $("#thana_id").change(function () {
        if ($(this).val()) {
            $('#thana_id_err').text('');
        }else{
            $('#thana_id_err').text("The Thana is required.");
        }
    });
    $("#password").keyup(function () {
        if ($(this).val()) {
            $('#password_err').text('');
        }else{
            $('#password_err').text("The Password is required.");
        }
    });

</script>
@endpush
