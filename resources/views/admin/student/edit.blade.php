@extends('admin.layouts.master')
@section('title', 'Edit Student')
@push('css')
@endpush

@section('content')
<section class="content">
    <div class="container">
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
            @if(session()->has('success'))
                <div class="col-lg-12 col-xl-12 d-flex justify-content-center">
                    <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                        {{session('success')}}
                        <button type="button" class="close ml-4 text-danger" data-dismiss="alert">&times;</button>
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <form action="{{ route('student_apply_post') }}" method="post" enctype="multipart/form-data">
                @csrf                
                    <div class="row"  style="background-color: #4a950547;">
                        <div class="col-lg-12 card-header">
                            <h3>Edit Basic Information</h3>
                        </div>
                        <div class="col-md-12 mb-1">
                            <label class="mb-0">Student Name*</label>
                            <input type="text"  name="name" value="{{ $student->name }}" placeholder="Student Name*" class="form-control ">
                        </div>

                        <div class="col-md-6 mb-1">
                            <label class="mb-0">Student Name*</label>
                            <input type="text" name="phone" value="{{ $student->phone }}" placeholder="Phone*" class="form-control ">
                        </div>

                        <div class="col-md-6 mb-1">
                            <label class="mb-0">Student Name*</label>
                            <input type="text" name="email" value="{{ $student->email }}" placeholder="Email*" class="form-control ">
                        </div>

                        @if($studentinfo)
                        <div class="col-lg-12 card-body" style="background-color: #4a950547;">
                            <div class="row form">  
                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Father’s Name*</label>
                                    <input type="text" name="father_name"  value="{{ $studentinfo->father_name }}" placeholder="Father’s Name*" class="form-control ">
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Mother’s Name*</label>
                                    <input type="text" name="mother_name"  value="{{ $studentinfo->mother_name }}" placeholder="Mother’s Name*" class="form-control ">
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Present Address*</label>
                                    <input type="text" name="present_address"  value="{{ $studentinfo->present_address }}" placeholder="Present Address*" class="form-control ">
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Permanent Address*</label>
                                    <input type="text" name="permanent_address"  value="{{ $studentinfo->permanent_address }}" placeholder="Permanent Address*" class="form-control ">
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Office Address (If Applicable)</label>
                                    <input type="text" name="office_address"  value="{{ $studentinfo->office_address }}" placeholder="Office Address (If Applicable)" class="form-control ">
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">National ID</label>
                                    <input type="text" name="nid"  value="{{ $studentinfo->nid }}" placeholder="National ID" class="form-control ">
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Occupation*</label>
                                    <input type="text" name="occupation"  value="{{ $studentinfo->occupation }}" placeholder="Occupation*" class="form-control ">
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Date of Birth*</label>
                                    <input type="text" name="birthday"  value="{{ $studentinfo->birthday }}" placeholder="Date of Birth*" class="form-control ">
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Nationality*</label>
                                    <select class="form-control " name="country">
                                        <option value="Bangladeshi" {{ $studentinfo->country== 'Bangladeshi'?'selected':'' }}>Bangladeshi</option>
                                        <option value="Other" {{ $studentinfo->country== 'Other'?'selected':'' }}>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Religion*</label>
                                    <select class="form-control " name="religion">
                                        <option value="Islam" {{ $studentinfo->religion== 'Islam'?'selected':'' }}>Islam</option>
                                        <option value="Hindu" {{ $studentinfo->religion== 'Hindu'?'selected':'' }}>Hindu</option>
                                        <option value="Christian" {{ $studentinfo->religion== 'Christian'?'selected':'' }}>Christian</option>
                                        <option value="Buddhist" {{ $studentinfo->religion== 'Buddhist'?'selected':'' }}>Buddhist</option>
                                        <option value="Sikh" {{ $studentinfo->religion== 'Sikh'?'selected':'' }}>Sikh</option>
                                        <option value="Parsi" {{ $studentinfo->religion== 'Parsi'?'selected':'' }}>Parsi</option>
                                        <option value="Jain" {{ $studentinfo->religion== 'Jain'?'selected':'' }}>Jain</option>
                                        <option value="Jewish" {{ $studentinfo->religion== 'Jewish'?'selected':'' }}>Jewish</option>
                                        <option value="Spiritual" {{ $studentinfo->religion== 'Spiritual'?'selected':'' }}>Spiritual</option>
                                        <option value="No_Religion" {{ $studentinfo->religion== 'No_Religion'?'selected':'' }}>No Religion</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <label class="mb-0">Student Name*</label>
                                            <select class="form-control " name="blood_group">
                                                <option value="">Blood Group*</option>
                                                <option value="A+" {{ $studentinfo->blood_group== 'A+'?'selected':'' }}>A+</option>
                                                <option value="A-" {{ $studentinfo->blood_group== 'A-'?'selected':'' }}>A-</option>
                                                <option value="B+" {{ $studentinfo->blood_group== 'B+'?'selected':'' }}>B+</option>
                                                <option value="B-" {{ $studentinfo->blood_group== 'B-'?'selected':'' }}>B-</option>
                                                <option value="AB+" {{ $studentinfo->blood_group== 'AB+'?'selected':'' }}>AB+</option>
                                                <option value="AB-" {{ $studentinfo->blood_group== 'AB-'?'selected':'' }}>AB-</option>
                                                <option value="O+" {{ $studentinfo->blood_group== 'O+'?'selected':'' }}>O+</option>
                                                <option value="O-" {{ $studentinfo->blood_group== 'O-'?'selected':'' }}>O-</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="mb-0">Student Name*</label>
                                            <select class="form-control " name="gender">
                                                <option value="">Gender*</option>
                                                <option value="Male" {{ $studentinfo->gender== 'Male'?'selected':'' }}>Male</option>
                                                <option value="Female" {{ $studentinfo->gender== 'Female'?'selected':'' }}>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Meretial status*</label>
                                    <select class="form-control " name="marital_status">
                                        <option value="Never_Married"  {{ $studentinfo->marital_status== 'Never_Married'?'selected':'' }}>Never Married</option>
                                        <option value="Legally_Separated"  {{ $studentinfo->marital_status== 'Legally_Separated'?'selected':'' }}>Legally Separated</option>
                                        <option value="Divorced"  {{ $studentinfo->marital_status== 'Divorced'?'selected':'' }}>Divorced</option>
                                        <option value="Widowed"  {{ $studentinfo->marital_status== 'Widowed'?'selected':'' }}>Widowed</option>
                                        <option value="Anulled"  {{ $studentinfo->marital_status== 'Anulled'?'selected':'' }}>Anulled</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-1">
                                    <label class="mb-0">District*</label>
                                    <input type="text" name="district" value="{{ $studentinfo->district }}" placeholder="District*" class="form-control ">
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Thana*</label>
                                    <input type="text" name="thana" value="{{ $studentinfo->thana }}" placeholder="Thana*" class="form-control ">
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Zip Code*</label>
                                    <input type="number" name="zip_code" value="{{ $studentinfo->zip_code }}" placeholder="Zip Code*" class="form-control ">
                                </div>
                                
                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Guardian’s Phone*</label>
                                    <input type="text" name="guardian_number" value="{{ $studentinfo->guardian_number }}" placeholder="Guardian’s Phone*" class="form-control ">
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="mb-0">Relationship with the Guardian*</label>
                                    <input type="text" name="relationship" value="{{ $studentinfo->relationship }}" placeholder="Relationship with the Guardian*" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-12 card-header">
                                <h3>Educational Background</h3>
                            </div>

                            <div class="col-md-12" id="getintouch-part"  style="background-color: #4a950547;">
                                <table width="100%" height="50" class="text-center tbl1">
                                    <tbody>
                                        <tr>
                                            <th>Degree</th>
                                            <th>Institution</th>
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

                            <div class="col-md-12 card-header">
                                <h3>Reference Details</h3>
                            </div>
                            <div class="col-md-12" style="background-color: #4a950547;">
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
                        </div>
                        @else
                            <div class="col-md-12 text-center">
                                <div class="p-2">
                                    <a class="btn btn-primary pl-5 pr-5" href="#">Add Information</a>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12 text-center">
                            <div class="p-2">
                                <button type="submit" class="btn btn-success pl-5 pr-5">Update</button>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
    <style>
        @media (max-width: 576px){
        .tbl1 th {
            font-size: 12px !important;
        }
        
#getintouch-part .tbl2 td {
    font-size: 10px;
    padding: 0 5px;
}

        }

    #getintouch-part {
    padding-top: 20px;
    padding-bottom: 30px;
}
.tbl1 {
    background: #4e5e73;
}
#getintouch-part table td {
    border: 1px solid #eeeeee;
    font-size: 16px;
    padding: 0 15px;
    font-family: 'Arimo', sans-serif;
    font-weight: 400;
    color: #4e5e73;
    width: 20%;
}
.tbl1 th {
    font-family: 'Arimo', sans-serif;
    font-weight: 400;
    font-size: 18px;
    color: #fff;
    width: 20%;
    border-right: 1px solid #3c4a5d;
} 
#getintouch-part input {
    margin: 10px 0;
}

</style>
</section>
@endsection

@push('scripts')
@endpush