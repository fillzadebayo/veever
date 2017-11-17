@extends('user.dashboard')
@section('board')
@section('breadcrum') View Transaction @endsection
      <div class="col-md-12 ">
        <div class="card mx-5">
          <div class="block">
          <div class="card-body">
            <h4 class="card-title"> Name: <strong> {{ $transaction->name }} </strong> </h4>
            <div class="">

            </div>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted"> Transaction ID <strong> {{ $transaction->tran_id }} </strong></h6>
            <p class="card-text"> Description <strong> {{ $transaction->description }} </strong> |
              @if (Auth::user()->email==$transaction->buyer)
                Role <strong> Buyer </strong>
              @else
                Role <strong> Seller </strong>
              @endif

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
                  <th> Currency </th>
                  <td> {{ $transaction->delivery }}</td>
                  <th>amount</th>
                  <td>{{ $transaction->amount }} </td>

                </tr>
              </thead>

            </table>
            <hr>
            <button type="button" class="btn btn-primary btn-sm" onclick="payWithPaystack()">Confirmation </button>
                <!---
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
              modal
            </button>

            <form >
            <script src="https://js.paystack.co/v1/inline.js"></script>
            <button type="button" class="btn btn-danger btn-sm" onclick="payWithPaystack()"> Pay </button>
            </form>
-->

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
</div>
</div>
