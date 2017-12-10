@extends('layouts.uilayout')

@section('content')
<body class="bg-dark">
<div class="container">
<div class="card card-login mx-auto mt-5">
<div class="card-header"> Admin Login</div>
<div class="card-body">
  <div class="text-center">
    <h1 class="text-primary"> {{ $myname }}</h1>
    <button class="btn btn-pimary" name="button"> Test for working mail</button>
  </div>

</div>
</div>
</div>

@endsection
