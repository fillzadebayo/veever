@extends('layouts.uilayout')

@section('content')
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Veever</a>
    </div>

  </div>
</nav>
  <div class="container">
    <div class="row">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header"> Verify Email</div>
        <div class="card-body">
          <h6 class=""> <strong>Hi!</strong> {{ $name }}, you need to Verify to begin using your mail </h6>
          <div class="text-center">
            <a class="btn btn-primary" href="{{  url('/user/activation',$link)}}"> Click me!</a>
          </div>

        </div>
        <div class="card-footer">
          <p> if you are having issues just copy this to your browser <a href="">{{ url('/user/activation', $link) }}</a> Thanks !!</p>
        </div>
        </div>
    </div>
  </div>
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Copyright © Veever 2017</small>
      </div>
    </div>
  </footer>
@endsection
