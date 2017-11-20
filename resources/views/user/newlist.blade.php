@extends('user.dashboard')
@section('board')
@section('breadcrum') New Transaction @endsection
      <div class="row col-md-12">
        <div class="card   mx-5">
          <div class="card-header">Create a Transaction</div>
          <div class="card-body">
          {!! Form::open(array('route'=>'transaction.store','data-parsely-validate'=>''))!!}
              <div class="row">
                <div class="form-group col-md-8">
                   <label for="sel1">Name of Transaction</label>
                   <input class="form-control" type="text" name="tranname" value="">
                </div>
                <div class="form-group col-md-4">
                 <label for="sel1">Role</label>
                 <select class="form-control" id="role" name='role' onchange="check()">
                   <option>Buyer</option>
                   <option>Seller</option>
                 </select>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-8">
                   <label for="sel1">Types of Transaction</label>
                   <select class="form-control " id="sel1" name='trantype'>
                     <option> Domain</option>
                     <option> Material</option>
                     <option> Service</option>
                   </select>
                </div>
                <div class="form-group col-md-4">
                   <label for="sel1">Quantity pro</label>
                   <select class="form-control " id="sel1" name='quantity'>
                     <option>1</option>
                     <option>2</option>
                     <option>3</option>
                     <option>4</option>
                   </select>
                </div>
            </div>
            <div class="row">
              <div class="form-group col-md-8">
                 <label for="sel1" id="role2">Add Seller Email</label>
                 <input class="form-control" type="text" name="selleremail" value="">

              </div>

            <div class="form-group col-md-4">
               <label for="sel1"> Add phone</label>
               <input class="form-control" type="text" name="sellerphone" value="">

            </div>

            </div>
            <div class="row">
              <div class="form-group col-md-6">
                 <label for="sel1">Amount</label>
                 <input class="form-control" type="text" name="amount" value="">

              </div>
              <div class="form-group col-md-6">
                 <label for="sel1">Delivery</label>
                 <input class="form-control" type="text" name="delivery" value="">
                 <div class="input-group">
  <span class="input-group-addon">
    <span class="icon icon-calendar"></span>
  </span>
  <input type="text" value="01/01/2015" class="form-control" data-provide="datepicker" style="width: 200px;">
</div>

              </div>


            </div>
            <div class="row">
              <div class="form-group col-md-8">
                 <label for="sel1">Description of Product</label>
                <textarea name="description" class="form-control" rows="2" cols="80" placeholder="Enter a brief description of your product"></textarea>
            </div>
          </div>


      <div class="row">
        <div class="form-group col-md-8">
        <div class="checkbox">
          <label><input type="checkbox"> I agree to the terms and conditions</label>
          <input class="btn btn-danger" type="reset" name="some_name" value="Clear">
           <input class="btn btn-success" type="submit" name="some_name" value="Start Transaction">
        </div>
        </div>
      </div>
      {!! Form::close()!!}

    </div>
  </div>

        </div>
      <!--- end of listing panel---->
      <script type="text/javascript">
      function check(){
        var e = document.getElementById("role");
        var value = e.options[e.selectedIndex].value;
        var text = e.options[e.selectedIndex].text;
        if (text="Buyer") {
          document.getElementById("role2").innerHTML = "Add Seller Email"
        }
        if (text="Seller") {
          document.getElementById("role2").innerHTML = "Add Buyer Email"
        }
      }
      </script>
@endsection
