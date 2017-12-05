@extends('user.dashboard')
@section('board')
@section('breadcrum') Send message @endsection
      <div class="row col-md-12">
        <div class="card   mx-5">
          <div class="card-header">Make a complaint</div>
          <div class="card-body">

          {!! Form::open(['method' => 'POST','route' => 'message.store']) !!}
              <div class="row">
                <div class="form-group col-md-12">
                   <label for="sel1" id="role2"> <strong>Message Title:  </strong></label>
                   <input class="form-control" type="text" name="title" value="">

                </div>
              </div>
            <div class="row">
              <div class="form-group col-md-12">
                 <label for="sel1" id="role2"><strong>Message Body:  </strong></label>
                 <input class="form-control" type="text" name="message" value="">
              </div>
            </div>
      <div class="row">
        <div class="form-group col-md-8">
        <input class="btn btn-success btn-sm" type="submit" name="some_name" value=" Send Message">
      </div>
      </div>
      {!! Form::close()!!}

    </div>
  </div>
  </div>
      <!--- end of listing panel---->

@endsection
