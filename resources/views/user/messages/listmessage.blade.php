@extends('user.dashboard')
@section('board')
@section('breadcrum') Message List @endsection
      <div class="row col-md-12">
        <div class="card   mx-5">
          <div class="card-header"> Messages | <a href="{{ route('message.create') }}" title="send a new message or complaint" class="btn btn-primary btn-sm"><span class="fa fa-folder-open-o"></span> New message </a> </div>
            <div class="card-body">

                <div class="row">
                  @foreach ($messages as $message)
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body">
                        <h6 class="card-title"><strong> Title </strong>{{ $message->title }} </h6>
                        <p class="card-text"><strong> Message body </strong>{{ $message->description }} </p>
                        <p class="text-muted"> Date created: {{ $message->created_at }} </p>

                      </div>
                    </div>
                  </div>
                  @endforeach
                  </div>
                  <div class="text-center">
                    {!! $messages->links();!!}
                  </div>
            </div>
        </div>
      </div>
      <!--- end of listing panel---->

@endsection
