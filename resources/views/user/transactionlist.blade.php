@extends('user.dashboard')
@section('board')
  <div class="row col-md-12">
    <div class="card mb-1 mx-5 ">
        <div class="card-header">
          <i class="fa fa-table"></i> Transaction List</div>
        <div class="card-body">
          @if (count($transactions)==0)
            <div class="text-center">
              <div class="alert alert-primary">
                <h6><strong>Empty!!!</strong>  No Transation yet</h6>
              </div>
              <hr>
              <a href="{{ URL::to('/newtran') }}" class="btn btn-danger btn-xs"> Start a new Transactions</a>

            </div>

        @else
            <div class="row">
               @foreach ($transactions as $transaction)
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><strong> Name </strong>{{ $transaction->name }} <strong> | </strong> {{$transaction->tran_id  }}</h5>
                    <p class="card-text"><strong> Description </strong>{{ $transaction->description }} </p>
                    <p class="card-text"><strong> Amount </strong>{{ $transaction->amount }} </p>
                    <p class="text-muted"> Date created: {{ $transaction->created_at }} </p>
                    {!! Form::open(['method' => 'DELETE','route' => ['transaction.destroy', $transaction->id]]) !!}
                      <a href="{{ route('transaction.show', $transaction->id) }}" title="View this Transaction" class="btn btn-primary"><span class="fa fa-folder-open-o"></span></a>
                    <button type="submit" title="Delete this Transaction" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                      {{ Form::close() }}
                  </div>
                </div>
              </div>
            @endforeach
            </div>

        @endif
        </div>
    </div>
  </div>
@endsection
