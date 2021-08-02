@extends('admin.layouts.master')
@section('title','Dashboard')

@push('css')

@endpush
@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row d-flex justify-content-center">
				<div class="col-md-4">
					<div class="small-box bg-success">
						<h4 class="small-box text-center p-1">Categories</h4>
						<div class="inner">
							<span class="border rounded-circle p-2 h2">4</span>
						</div>
						<div class="icon">
							<i class="fas fa-align-left pt-3"></i>
						</div>
						<a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="small-box bg-info">
						<h4 class="small-box text-center p-1">Portfolios</h4>
						<div class="inner">
							<span class="border rounded-circle p-2 h2">4</span>
						</div>
						<div class="icon">
							<i class="fa fa-puzzle-piece pt-3"></i>
						</div>
						<a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="small-box bg-success">
						<h4 class="small-box text-center p-1">Team Members</h4>
						<div class="inner">
							<span class="border rounded-circle p-2 h2">3</span>
						</div>
						<div class="icon">
							<i class="fas fa-users pt-3"></i>
						</div>
						<a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="small-box bg-warning">
						<h4 class="small-box text-center p-1">Message</h4>
						<div class="inner">
							<span class="border rounded-circle p-2 h2">3</span>
						</div>
						<div class="icon">
							<i class="far fa-comments pt-3"></i>
						</div>
						<a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
