@extends('user.dashboard')
@section('board')
@section('breadcrum') Account @endsection
      <div class="row col-md-12">
        <div class="card   mx-5">
          <div class="card-header">Update Account</div>
          <div class="card-body">
            {{ $id =Auth::user()->id }}
          {!! Form::model($user,['method' => 'POST','route' => ['user.accountupdate',$id ]]) !!}
              <div class="row">
              <div class="form-group col-md-6">
                 <label for="sel1">Bank Name </label>
                 <select class="form-control" id="role" name='bankname' value="{{ $user->accountbank }}" >
                   <option>Buyer</option>
                   <option>Seller</option>
                 </select>
                </div>
                <div class="form-group col-md-6">
                   <label for="sel1" id="role2">Account Name</label>
                   <input class="form-control" type="text" name="accountname" value="{{ $user->accountname }}">

                </div>
              </div>
            <div class="row">
              <div class="form-group col-md-6">
                 <label for="sel1" id="role2">Account Number</label>
                 <input class="form-control" type="text" name="accountnumber" value="{{ $user->accountnumber }}">
              </div>

            <div class="form-group col-md-6">
               <label for="sel1"> Phone number</label>
               <input class="form-control" type="text" name="phonenumber" value="{{ $user->phonenumber }}">
            </div>
            </div>
      <div class="row">
        <div class="form-group col-md-8">
        <input class="btn btn-success" type="submit" name="some_name" value=" Save Account">
      </div>
      </div>
      {!! Form::close()!!}

    </div>
  </div>
  </div>
      <!--- end of listing panel---->

@endsection
