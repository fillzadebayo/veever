@extends('user.dashboard')
@section('board')
@section('breadcrum') Edit Transaction / {{ $transaction->tran_id }}@endsection
      <div class="row col-md-12">
        <div class="card   mx-5">
          <div class="card-header">Edit  Transaction</div>
          <div class="card-body">
          {!! Form::model($transaction,['method' => 'PATCH','route' => ['transaction.update', $transaction->id]]) !!}
              <div class="row">
                <div class="form-group col-md-8">
                   <label for="sel1">Name of Transaction</label>
                   <input class="form-control" type="text" name="tranname" value="{{ $transaction->name }}">
                </div>
                <div class="form-group col-md-4">
                 <label for="sel1">Role</label>
                 <select class="form-control" id="role" name='role' disabled>
                   <option>Buyer</option>
                   <option>Seller</option>
                 </select>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-8">
                   <label for="sel1">Types of Transaction</label>
                   <select class="form-control " id="sel1" name='trantype' value="{{ $transaction->nature }}">
                     <option> Domain</option>
                     <option> Material</option>
                     <option> Service</option>
                   </select>
                </div>
                <div class="form-group col-md-4">
                   <label for="sel1">Quantity </label>
                   <select class="form-control " id="sel1" name='quantity' value="{{ $transaction->qauntity }}">
                     <option>1</option>
                     <option>2</option>
                     <option>3</option>
                     <option>4</option>
                   </select>
                </div>
            </div>
            <div class="row">
              <div class="form-group col-md-8">
                 <label for="sel1" id="role2"> Seller Email</label>
                 <input class="form-control" type="text" name="selleremail" value="{{ $transaction->seller }}" disabled>

              </div>

            <div class="form-group col-md-4">
               <label for="sel1"> Phone</label>
               <input class="form-control" type="text" name="sellerphone" value="{{ $transaction->seller_id }}">

            </div>

            </div>
            <div class="row">
              <div class="form-group col-md-6">
                 <label for="sel1">Amount</label>
                 <input class="form-control" type="text" name="amount" value="{{ $transaction->amount }}">

              </div>
              <div class="form-group col-md-6">
                 <label for="sel1">Delivery</label>
                 <input class="form-control" type="text" name="delivery" value="{{ $transaction->delivery }}">

              </div>


            </div>
            <div class="row">
              <div class="form-group col-md-8">
                 <label for="sel1">Description of Product</label>
                <textarea name="description" class="form-control" rows="2" cols="80" placeholder="Enter a brief description of your product">{{ $transaction->name }}</textarea>
            </div>
          </div>


      <div class="row">
        <div class="form-group col-md-8">
        <div class="checkbox">
          <label><input type="checkbox"> I agree to the terms and conditions</label>
         <button class="btn btn-success btn-sm" type="submit" name="some_name" > Edit Transaction</button>
        </div>
        </div>
      </div>
      {!! Form::close()!!}

    </div>
  </div>

        </div>

@endsection
