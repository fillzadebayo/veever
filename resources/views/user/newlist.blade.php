@extends('user.dashboard')
@section('board')
      <div class="row col-md-12">
        <div class="card   mx-5">
          <div class="card-header">Create a Transaction</div>
          <div class="card-body">
          {!! Form::open(array('route'=>'transaction.store','data-parsely-validate'=>''))!!}
              <div class="row">
                <div class="form-group col-md-8">
                   <label for="sel1">Name of Goods</label>
                   <input class="form-control" type="text" name="goods_name" value="">

                </div>
              </div>
              <div class="row">
              <div class="form-group col-md-4">
               <label for="sel1">Role</label>
               <select class="form-control " id="sel1" name='role'>
                 <option> Buyer</option>
                 <option>Seller</option>
               </select>
            </div>
            <div class="form-group col-md-4">
               <label for="sel1">Nature of Goods</label>
               <select class="form-control " id="sel1" name='nature'>
                 <option> Domain</option>
                 <option> Material</option>
                 <option> Service</option>
               </select>
            </div>
            <div class="form-group col-md-1">
               <label for="sel1">Quantity</label>
               <select class="form-control " id="sel1" name='quantity'>
                 <option>1</option>
                 <option>2</option>
                 <option>3</option>
                 <option>4</option>
               </select>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-2">
               <label for="sel1"> Currency Rate</label>
               <select class="form-control " id="sel1" name='currency'>
                 <option> $ Dollar</option>
                 <option> NGN Naira</option>
               </select>
            </div>
            <div class="form-group col-md-4">
               <label for="sel1">Amount</label>
               <input class="form-control" type="text" name="amount" value="">

            </div>

            </div>
            <div class="row">
              <div class="form-group col-md-8">
                 <label for="sel1">Description</label>
                <textarea name="description" class="form-control" rows="2" cols="80" placeholder="Enter a brief description of your product"></textarea>
            </div>
          </div>


      <div class="row">
        <div class="form-group col-md-8">
        <div class="checkbox">
          <label><input type="checkbox"> I agree to the terms and conditions</label>
          <input class="btn btn-danger" type="reset" name="some_name" value="Clear">
           <input class="btn btn-success" type="submit" name="some_name" value="Submit">
        </div>
        </div>
      </div>
      {!! Form::close()!!}

    </div>
  </div>

        </div>
      <!--- end of listing panel---->
@endsection
