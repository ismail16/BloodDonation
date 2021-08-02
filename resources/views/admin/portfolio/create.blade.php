@extends('admin.layouts.master')
@section('title','Create New Porftfolio')

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
                <form method="POST" action="{{route('admin.portfolio.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Title <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="text" name="title" required class="form-control form-control-sm w-100" placeholder="Portfolio Title">
                                </div>
                            </div>
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Category <span class="text-danger">*</span></label>
                                <div class="">
                                    <select name="category_id" class="form-control form-control-sm">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Portfolio Image(1200*600px)</label>
                                <div class="row border">
                                    <div class="col-5">
                                        <img id="imageBrowsLive" src="{{ asset('images/create-default.jpg')}}" class="img-fluid portfolio_image_edit border" alt="">
                                    </div>
                                    <div class="col-7 align-self-center">
                                        <input type="file"  id="image" name="portfolio_image" onchange="readliveImagebrows(this);"  class="form-control form-control-sm w-100">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 pb-1">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="control-label mb-0">Link </label>
                                        <div class="">
                                            <input type="text" name="link" class="form-control form-control-sm w-100" placeholder="Link Your Work if available">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label class="control-label mb-0">Status</label>
                                        <div class="">
                                            <select name="status" class="form-control form-control-sm">
                                                <option value="0">Hide From Frontend</option>
                                                <option value="1">Show On Frontend</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                
                            </div>

                            <div class="col-md-12">
                                <label class="control-label mb-0">Description</label>
                                <div class="">
                                    <textarea name="description" class="textarea form-control form-control-sm w-100"></textarea> 
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.portfolio.index')}}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> portfolio</a>

                        <div class="float-right">
                            <a href="{{route('admin.portfolio.index')}}" class="btn btn-sm btn-secondary mr-2"> Cancel</a>
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

