@extends('frontend.layouts.master')

@section('title','Registration')

@push('css')

@endpush

@section('content')
<div class="container mt-2">
    <form action="{{ route('student_apply_post') }}" method="post" enctype="multipart/form-data">
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
                <h3>PERSONAL &amp; CONTACT INFORMATION</h3>
            </div>
            <div class="col-lg-12 card-body" style="background-color: #4a950547;">
                <div class="row form">                    
                    <div class="col-lg-12 col-sm-12">
                        <input type="text" name="name" value="" placeholder="Student Name*" class="form-control ">
                    </div>

                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="phone" value="" placeholder="Phone*" class="form-control ">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="email" value="" placeholder="Email*" class="form-control ">
                    </div>


                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="father_name" value="" placeholder="Father’s Name*" class="form-control ">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="mother_name" value="" placeholder="Mother’s Name*" class="form-control ">
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <input type="text" name="present_address" value="" placeholder="Present Address*" class="form-control ">
                    </div>
                    <div class="col-lg-12">
                        <input type="text" name="permanent_address" value="" placeholder="Permanent Address*" class="form-control ">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" name="office_address" value="" placeholder="Office Address (If Applicable)" class="form-control ">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="nid" value="" placeholder="National ID*" class="form-control ">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="occupation" value="" placeholder="Occupation*" class="form-control ">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <input type="date" name="birthday" value="" placeholder="Date of Birth*" class="form-control ">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <select class="form-control " name="country">
                            <option value="">Nationality*</option>
                            <option value="Bangladeshi">Bangladeshi</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <select class="form-control " name="religion">
                            <option value="">Religion*</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Christian">Christian</option>
                            <option value="Buddhist">Buddhist</option>
                            <option value="Sikh">Sikh</option>
                            <option value="Parsi">Parsi</option>
                            <option value="Jain">Jain</option>
                            <option value="Jewish">Jewish</option>
                            <option value="Spiritual">Spiritual</option>
                            <option value="No_Religion">No Religion</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-5 col-sm-4">
                                <select class="form-control " name="blood_group">
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
                            <div class="col-lg-7 col-sm-8 ru-main text-right">
                                <span class="ru">Gender*</span>
                                <label class="customcheck">Male
                                    <input type="radio" name="gender" value="Male">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="customcheck">Female
                                    <input type="radio" name="gender" value="Female">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <select class="form-control " name="marital_status">
                            <option value="">Meretial status*</option>
                            <option value="">Select Marital Status *</option>
                            <option value="Never_Married">Never Married</option>
                            <option value="Legally_Separated">Legally Separated</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Anulled">Anulled</option>
                        </select>
                    </div>

                    <div class="col-lg-4 col-sm-4">
                        <input type="text" name="district" value="" placeholder="District*" class="form-control ">
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <input type="text" name="thana" value="" placeholder="Thana*" class="form-control ">
                    </div>

                    <div class="col-lg-4 col-sm-4">
                        <input type="number" name="zip_code" value="" placeholder="Zip Code*" class="form-control ">
                    </div>
                    
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="guardian_number" value="" placeholder="Guardian’s Phone*" class="form-control ">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="relationship" value="" placeholder="Relationship with the Guardian*" class="form-control ">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 card-header">
                <h3>Educational Background</h3>
            </div>

            <div class="col-lg-12" id="getintouch-part"  style="background-color: #4a950547;">
                <table width="100%" height="50" class="text-center tbl1">
                    <tbody>
                        <tr>
                            <th>Degree</th>
                            <th>School/College/University</th>
                            <th>Board</th>
                            <th>Year of Passing</th>
                            <th>Division / GPA</th>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" class="text-center tbl2">
                    <tbody>
                        <tr>
                            <td>S.S.C / O Level</td>
                            <td><input type="text" class="form-control" name="institute1"></td>
                            <td><input type="text" class="form-control" name="board1"></td>
                            <td><input type="text" class="form-control" name="passing_year1"></td>
                            <td><input type="text" class="form-control" name="result1"></td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" class="text-center tbl2">
                    <tbody>
                        <tr>
                            <td>H.S.C / Diploma</td>
                            <td><input type="text" class="form-control" name="institute2"></td>
                            <td><input type="text" class="form-control" name="board2"></td>
                            <td><input type="text" class="form-control" name="passing_year2"></td>
                            <td><input type="text" class="form-control" name="result2"></td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" class="text-center tbl2">
                    <tbody>
                        <tr>
                            <td>Graduation</td>
                            <td><input type="text" class="form-control" name="institute3"></td>
                            <td><input type="text" class="form-control" name="board3"></td>
                            <td><input type="text" class="form-control" name="passing_year3"></td>
                            <td><input type="text" class="form-control" name="result3"></td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" class="text-center tbl2">
                    <tbody>
                        <tr>
                            <td>Post Graduation</td>
                            <td><input type="text" class="form-control" name="institute4"></td>
                            <td><input type="text" class="form-control" name="board4"></td>
                            <td><input type="text" class="form-control" name="passing_year4"></td>
                            <td><input type="text" class="form-control" name="result4"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-12 card-header">
                <h3>Reference Details</h3>
            </div>
            <div class="col-lg-12" style="background-color: #4a950547;">
                <div class="row form mt-2">
                    <div class="col-lg-12 col-sm-12">
                        <input type="text" name="reference_name" value="" placeholder="Name*" class="form-control ">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="reference_mobile" value="" placeholder="Mobile Number*" class="form-control ">
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="reference_id" value="" placeholder="Reference ID" class="form-control ">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <div class="p-2">
                    <button type="submit" class="btn btn-warning pl-5 pr-5">Apply</button>
                </div>
            </div>
        </div>
    </form> 
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script>
    function myFunction(){
        var pre_address = $("#pre_address").val();
        var pre_upz = $("#pre_upz").val();
        var pre_dist = $("#pre_dist").val();
        var pre_post = $("#pre_post").val();
        if(chk.checked == true){
            document.getElementById("per_address").value  = pre_address;
            document.getElementById("per_upz").value = pre_upz;
            document.getElementById("per_dist").value = pre_dist;
            document.getElementById("per_post").value = pre_post;
        }else{
            document.getElementById("per_address").value = '';
            document.getElementById("per_upz").value = '';
            document.getElementById("per_dist").value = '';
            document.getElementById("per_post").value = '';
        }
    }
    $(function(){
       
        $("#signupform").validate({
            rules:{
                name: "required",
                username: "required",
                father: "required",
                mother: "required",
                dob: "required",
                phone: "required",
                last_education: "required",
                subject: "required",
                result: "required",
                pre_address: "required",
                pre_upz: "required",
                pre_dist: "required",
                pre_post: "required",
                per_address: "required",
                per_upz: "required",
                per_dist: "required",
                per_post: "required",
                email: {
                    required: true,
                    email: true

                },
                password: {
                    required: true,
                    minlength: 8

                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"

                }
            },
            messages: {
                firstname: "Please enter your First Name",
                lastname: "Please enter your Last Name",
                emailr: {
                    required: "Please enter an email",
                    email: "Please enter a valid E-mail",
                },
                confirm_email: {
                    required: "Please enter an email",
                    email: "Please enter a valid E-mail",
                    equalTo: "Please enter same email as privious"
                },
                address: "Please enter your address",
                password: {
                    required: "Please enter your password",
                    minlength: "Please enter minimum 8 character"
                },
                password_confirmation: {
                    required: "Please enter your password",
                    minlength: "Please enter minimum 8 character",
                    equalTo: "Please enter same password as privious"
                }

            }
        });
    });
</script>
@endpush
