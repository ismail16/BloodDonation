@extends('admin.layouts.master')
@section('title','Edit Team Member')

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
                <form method="POST" action="{{route('admin.team-member.update', $team_member->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Full Name <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="text" name="name" value="{{ $team_member->name }}" required class="form-control form-control-sm w-100" placeholder="Full Name">
                                </div>

                                <label class="control-label mb-0">Department <span class="text-danger">*</span></label>
                                <div class="">
                                    <select name="department" class="form-control form-control-sm">
                                        <option value="Software" {{  $team_member->department=='Software'? 'selected':'' }}>Software</option>
                                        <option value="Grafrics" {{  $team_member->department=='Grafrics'? 'selected':'' }}>Grafrics</option>
                                    </select>
                                </div>
                                <label class="control-label mb-0">Designation  <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="text" name="designation" value="{{ $team_member->designation }}" required class="form-control form-control-sm w-100" placeholder="Designation ">
                                </div>

                                <label class="control-label mb-0">Portfolio Image</label>
                                <div class="row border m-0">
                                    <div class="col-5">
                                        @if($team_member->profile_image)
                                            <img id="imageBrowsLive" src="{{ asset('images/profile_image/'.$team_member->profile_image) }}" class="img-fluid portfolio_image_edit border" alt="">
                                        @else
                                            <img id="imageBrowsLive" src="{{ asset('images/create-default.jpg')}}" class="img-fluid portfolio_image_edit border" alt="">
                                        @endif
                                    </div>
                                    <div class="col-7 align-self-center">
                                        <input type="file"  id="image" name="profile_image" onchange="readliveImagebrows(this);"  class="form-control form-control-sm w-100">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 pb-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label mb-0">Facebook Link </label>
                                        <div class="">
                                            <input type="text" name="facebook" value="{{ $team_member->facebook }}" class="form-control form-control-sm w-100" placeholder="Link Your Work if available">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label mb-0">Twitter Link </label>
                                        <div class="">
                                            <input type="text" name="twitter" value="{{ $team_member->twitter }}" class="form-control form-control-sm w-100" placeholder="Link Your Work if available">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label mb-0">Instagram Link </label>
                                        <div class="">
                                            <input type="text" name="instagram" value="{{ $team_member->instagram }}" class="form-control form-control-sm w-100" placeholder="Link Your Work if available">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label mb-0">linkedin Link </label>
                                        <div class="">
                                            <input type="text" name="linkedin" value="{{ $team_member->linkedin }}" class="form-control form-control-sm w-100" placeholder="Link Your Work if available">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label mb-0">Status</label>
                                        <div class="">
                                            <select name="status" class="form-control form-control-sm">
                                                <option value="0" {{  $team_member->status==0? 'selected':'' }}>Hide From Frontend</option>
                                                <option value="1" {{  $team_member->status==1? 'selected':'' }}>Show On Frontend</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label mb-0">Serial Number</label>
                                        <div class="">
                                            <input type="text" name="serial_no" value="{{$team_member->serial_no}}" class="form-control form-control-sm w-100" placeholder="Serial no. in team">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.team-member.index')}}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> Team Members</a>

                        <div class="float-right">
                            <a href="{{route('admin.team-member.index')}}" class="btn btn-sm btn-secondary mr-2"> Cancel</a>
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

