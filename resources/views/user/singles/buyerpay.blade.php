@extends('user.dashboard')
@section('board')
@section('breadcrum') View Transaction / {{ $transaction->tran_id }}@endsection
      <div class="col-md-12 ">
        <div class="card mx-5">
          <div class="block">
          <div class="card-body">
            <h6 class="card-title"> Name: <strong> {{ $transaction->name }} </strong> </h6>
            <div class="">
              <span class="btn btn-primary btn-sm"> Transaction is Active</span>
            </div>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted"> Transaction ID <strong> {{ $transaction->tran_id }} </strong></h6>
            <p class="card-text"> Description <strong> {{ $transaction->description }} </strong>
            <hr>
                Role <strong> Buyer </strong>
            </p>
            <table class="table table-sm ">
              <thead class="thead-default">
                <tr>
                  <th>#</th>
                  <th> Nature </th>
                  <td> {{ $transaction->nature }}</td>
                  <th>Quantity</th>
                  <td>{{ $transaction->quantity }}</td>

                </tr>
                <tr>
                  <th>#</th>
                  <th> Delivery </th>
                  <td> {{ $transaction->delivery }}</td>
                  <th>amount</th>
                  <td>{{ $transaction->amount }} </td>

                </tr>
              </thead>

            </table>
            <hr>
            <form >
            <script src="https://js.paystack.co/v1/inline.js"></script>
            <button type="button" class="btn btn-success btn-sm" onclick="payWithPaystack()"> Make Payment </button>
            </form>
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Transaction Token</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <input id="token" class="form-control"  type="button" name="some_name" value="{{ $transaction->token }}">
                    <button type="button" title="Copy info to Clipboard" class="btn btn-block btn-success" onclick="copyToClipboard('token')" name="button"><span class="fa fa-clone"></span></button>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div> <!-- card block end-->
        </div>
      </div>
@endsection

<script type="text/javascript">
function copyToClipboard(elementId) {

// Create a "hidden" input
var aux = document.createElement("input");

// Assign it the value of the specified element
aux.setAttribute("value", document.getElementById(elementId).value);

// Append it to the body
document.body.appendChild(aux);

// Highlight its content
aux.select();

// Copy the highlighted text
document.execCommand("copy");

// Remove it from the body
document.body.removeChild(aux);

}
</script>

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
