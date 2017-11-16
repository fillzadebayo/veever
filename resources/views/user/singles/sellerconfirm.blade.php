@extends('user.dashboard')
@section('board')
      <div class="col-md-12 ">
        <div class="card mx-5">
          <div class="block">
          <div class="card-body">
            <h4 class="card-title"> Name: <strong> {{ $transaction->name }} </strong> </h4>
            <div class="">
      <span class="btn btn-primary btn-sm"> Transaction is Active</span>
            </div>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted"> Transaction ID <strong> {{ $transaction->tran_id }} </strong></h6>
            <p class="card-text"> Description <strong> {{ $transaction->description }} </strong>
            <hr>
                Role <strong> Seller </strong>
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
            <button type="submit" title="Edit this Transaction" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span> Confirm Delivery</button>
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
