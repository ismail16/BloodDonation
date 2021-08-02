@extends('admin.layouts.master')
@section('title','Create New Team Member')

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
                <form method="POST" action="{{route('admin.team-member.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Full Name <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="text" name="name" required class="form-control form-control-sm w-100" placeholder="Full Name">
                                </div>

                                <label class="control-label mb-0">Department <span class="text-danger">*</span></label>
                                <div class="">
                                    <select name="department" class="form-control form-control-sm">
                                        <option value="Software">Software</option>
                                        <option value="Software">Grafrics</option>
                                    </select>
                                </div>
                                <label class="control-label mb-0">Designation  <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="text" name="designation" required class="form-control form-control-sm w-100" placeholder="Designation ">
                                </div>

                                <label class="control-label mb-0">Portfolio Image (NG. Make it 600*600 px) </label>
                                <div class="row border m-0">
                                    <div class="col-5">
                                        <img id="imageBrowsLive" src="{{ asset('images/create-default.jpg')}}" class="img-fluid portfolio_image_edit border" alt="">
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
                                            <input type="text" name="facebook" class="form-control form-control-sm w-100" placeholder="Link Your Work if available">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label mb-0">Twitter Link </label>
                                        <div class="">
                                            <input type="text" name="twitter" class="form-control form-control-sm w-100" placeholder="Link Your Work if available">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label mb-0">Instagram Link </label>
                                        <div class="">
                                            <input type="text" name="instagram" class="form-control form-control-sm w-100" placeholder="Link Your Work if available">
                                        </div>                               
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label mb-0">linkedin Link </label>
                                        <div class="">
                                            <input type="text" name="linkedin" class="form-control form-control-sm w-100" placeholder="Link Your Work if available">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label mb-0">Status</label>
                                        <div class="">
                                            <select name="status" class="form-control form-control-sm">
                                                <option value="0">Hide From Frontend</option>
                                                <option value="1">Show On Frontend</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label mb-0">Serial Number</label>
                                        <div class="">
                                            <input type="text" name="serial_no" class="form-control form-control-sm w-100" placeholder="Serial no. in team">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.team-member.index')}}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> portfolio</a>

                        <div class="float-right">
                            <a href="{{route('admin.team-member.index')}}" class="btn btn-sm btn-secondary mr-2"> Cancel</a>
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

