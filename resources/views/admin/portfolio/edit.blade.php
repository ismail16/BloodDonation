@extends('admin.layouts.master')
@section('title','Create New Certificates')

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
                <form method="POST" action="{{route('admin.portfolio.update', $portfolio->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Title <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="text" name="title" value="{{ $portfolio->title }}" required class="form-control form-control-sm w-100" placeholder="Portfolio Title">
                                </div>
                            </div>
                            <div class="col-md-6 pb-1">
                                <label class="control-label mb-0">Category <span class="text-danger">*</span></label>
                                <div class="">
                                    <select name="category_id" class="form-control form-control-sm">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $portfolio->category_id ? 'selected':'' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label mb-0">Portfolio Image(1200*600 px)</label>
                                <div class="row border m-0">
                                    <div class="col-5">
                                        @if ($portfolio->portfolio_image)
                                            <img id="imageBrowsLive" src="{{ asset('images/portfolio_image/'.$portfolio->portfolio_image) }}"  class="img-fluid portfolio_image_edit border">
                                        @else
                                            <img src="{{ asset('images/create-default.jpg')}}" class="img-fluid" alt="">
                                        @endif
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
                                            <input type="text" name="link" value="{{ $portfolio->link}}" class="form-control form-control-sm w-100" placeholder="Link Your Work if available">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="control-label mb-0">Status <span class="text-danger">*</span></label>
                                        <div class="">
                                            <select name="status" class="form-control form-control-sm">
                                                <option value="0" {{ $category->id == 0 ? 'selected':'' }}>Hide From Frontend</option>
                                                <option value="1" {{ $category->status == 1 ? 'selected':'' }}>Show On Frontend</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                
                            </div>

                            <div class="col-md-12 pb-1">
                                <label class="control-label mb-0">Description</label>
                                <div class="">
                                    <textarea name="description" class="textarea form-control form-control-sm w-100">{{ $portfolio->description}}</textarea> 
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.portfolio.index')}}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> portfolios</a>

                        <div class="float-right">
                            <a href="{{route('admin.portfolio.index')}}" class="btn btn-sm btn-secondary mr-2"> Cancel</a>
                            <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-sync-alt"></i> Update</button>
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

