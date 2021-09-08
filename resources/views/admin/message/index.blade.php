@extends('admin.layouts.master')
@section('title','Messages')

@push('css')
<link rel="stylesheet" href="{{asset('backend_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@section('content')
<section class="content session_contect">
    <div class="container-fluid">
        <div class="row">
            @if(session()->has('message'))
                <div class="col-lg-12 col-xl-12 d-flex justify-content-center session_message">
                    <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
                        {{session('message')}}
                        <button type="button" class="close ml-4" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->subject}}</td>
                                    <td>{{$message->message}}</td>

                                    <td class="text-center">
                                        @if($message->status == 0 )
                                        <button class="btn btn-xs bg-danger"><i class="fa fa-times-circle"></i> Not Seen</button>
                                        @else
                                        <button class="btn btn-xs bg-success"><i class="fa fa-check-circle"></i> Seen</button>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('admin.message.show', $message->id)}}"
                                            class="btn btn-xs btn-success"><i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{route('admin.message.destroy', $message->id)}}" method="post"
                                            style="display: inline;"
                                            onsubmit="return confirm('Are you Sure? Want to delete')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{asset('backend_assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function () {
        $('#data_table').DataTable();
    })
</script>

@endpush