@extends('admin.layouts.master')
@section('title','Message')
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="card col-md-12">
          <div class="card-boday pt-4">
            <div class="timeline mb-0">
              <div class="time-label">
                <span class="bg-info">{{ date('d-M-Y', strtotime($message->created_at)) }}</span>
              </div>

              <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header no-border">
                      Name : {{ $message->name }}
                  </h3>
                </div>
              </div>

              <div>
                <i class="fas fa-phone bg-green"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header no-border">
                      Phone : {{ $message->phone }}
                  </h3>
                </div>
              </div>
              <div>
                <i class="fas fa-envelope bg-green"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header no-border">
                      E-mail : {{ $message->email }}
                  </h3>
                </div>
              </div>
              <div>
                <i class="fas fa-comments bg-green"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header">Message</h3>
                  <div class="timeline-body">
                    {{ $message->message }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
                <a href="{{route('admin.message.index')}}" class="btn btn-default">Back</a>
                <form action="{{route('admin.message.destroy', $message->id)}}" method="post"
                    style="display: inline;"
                    onsubmit="return confirm('Are you Sure? Want to delete')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-default text-danger" type="submit">
                        Delete
                    </button>
                </form>
            </div>
          </div>

        </div>
      </div>
    </section>

@endsection