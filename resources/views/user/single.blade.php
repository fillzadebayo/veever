@extends('user.dashboard')
@section('board')
  <div class="row">

<div class="row">
  <div class="col-md-12">
  <h3> {{ $transaction->name }}</h3>
  <hr>
  </div>
  <div class="col-md-4">
    <p><strong> Transaction ID</strong> {{ $transaction->tran_id }}<p>
  </div>
  <div class="col-md-4">
    <p><strong> Nature of goods</strong> {{ $transaction->nature }} <p>
  </div>
  <div class="col-md-4">
    <p><strong> Category</strong> Buyer <p>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <p><strong> Currency</strong> {{ $transaction->currency }} <p>
  </div>
  <div class="col-md-4">
    <p><strong> Amount</strong> {{ $transaction->amount }} <p>
  </div>
  <div class="col-md-4">
    <p><strong> Quantity</strong> {{ $transaction->quantity }} <p>
  </div>
</div>
<div class="row">
  <div class="form-group col-md-5">
     <label for="sel1">Description</label>
    <textarea name="description" class="form-control" rows="2" cols="80" placeholder="Enter a brief description of your product"> {{ $transaction->description }}</textarea>
</div>
<div class="form-group col-md-7">
<div class="checkbox">
  <input class="btn btn-danger" type="reset" name="some_name" value="View Token">
   <input class="btn btn-success" type="submit" name="some_name" value="Make Payments">
</div>
</div>
</div>
<div class="row">
<form >
<script src="https://js.paystack.co/v1/inline.js"></script>
<button type="button" onclick="payWithPaystack()"> Pay </button>
</form>

<script>
function payWithPaystack(){
var handler = PaystackPop.setup({
key: 'sk_test_aeece9d20080b470b60f6bc225a5added2eb4836',
email: 'temitopeadebayo751@yahoo.com',
amount: 10000,
ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
metadata: {
custom_fields: [
{
    display_name: "Mobile Number",
    variable_name: "mobile_number",
    value: "+2348012345678"
}
]
},
callback: function(response){
alert('success. transaction ref is ' + response.reference);
},
onClose: function(){
alert('window closed');
}
});
handler.openIframe();
}
</script>

</div>
</div>
@endsection
