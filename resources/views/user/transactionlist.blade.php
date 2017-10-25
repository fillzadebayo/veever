@extends('user.dashboard')
@section('board')
  <div class="row">
    <div class="card mb-1 mx-5">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Trandaction ID</th>
                  <th>Amount</th>
                  <th>Qauntity</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Trandaction ID</th>
                  <th>Amount</th>
                  <th>Qauntity</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($transactions as $transaction)

                <tr>
                  <td>{{ $transaction->name }}</td>
                  <td>{{ $transaction->tran_id }}</td>
                  <td>{{ $transaction->amount }}</td>
                  <td>{{ $transaction->quantity }}</td>
                  <td>   {!! Form::open(['method' => 'DELETE','route' => ['transaction.destroy', $transaction->id]]) !!}
                    <a href="{{ route('transaction.edit', $transaction->id) }}" class="btn btn-primary"><span class="fa fa-pencil"></span></a>
                  </td>
                  <td>
                      <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                    {{ Form::close() }}
                  </td>


                </tr>

              @endforeach
              </tbody>

            </table>
          </div>
        </div>
    </div>
  </div>
@endsection
