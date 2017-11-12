<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaction;
use Session;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function random($length = 16)
     {
        if ( ! function_exists('openssl_random_pseudo_bytes'))
        {
            throw new RuntimeException('OpenSSL extension is required.');
        }
        $bytes = openssl_random_pseudo_bytes($length * 2);
        if ($bytes === false)
        {
            throw new RuntimeException('Unable to generate random string.');
        }
        return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
      }
    public function store(Request $request)
    {
      $this->validate($request, array(
        'trantype'=>'required',
        'role'=>'required',
        'amount'=>'required',
        'quantity'=>'required',
        'tranname'=>'required',
        'selleremail'=>'required',
        'sellerphone'=>'required',
        'description'=>'required'
      ));
      do {
        $token_key = $this->random(7);
        } while (Transaction::where("token", "=", $token_key)->first() instanceof Transaction);

        $transaction = new Transaction;
        $transaction->tran_id = $this->random();
        $transaction->token = $token_key;
        $transaction->name = $request->tranname;
        $transaction->nature = $request->trantype;
        $transaction->amount = $request->amount;
        $transaction->quantity = $request->quantity;
        $transaction->description = $request->description;
        $transaction->delivery = $request->delivery;

        if ($request->role=="Buyer") {
          $transaction->buyer = Auth::user()->name;
          $transaction->buyer_id = "";
          $transaction->seller = $request->selleremail;
          $transaction->seller_id = $request->sellerphone;
        }
        if ($request->role=="Seller") {
          $transaction->buyer = $request->selleremail;
          $transaction->buyer_id = $request->sellerphone;
          $transaction->seller = Auth::user()->name;
          $transaction->seller_id = "";
        }

      $transaction->save();
      Session::flash('SUCCESS ', 'The Transaction has been started!');
;
      return redirect()->route('transaction.show', $transaction->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);
        return view('user.single')->with('transaction', $transaction);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $transaction = Transaction::find($id);
      $transaction->delete();
      Session::flash('success', 'The Post was succesfully deleted!');
      return redirect()->action('TransactionController@allTransaction');
    }
    public function newTransaction()
    {
      return view('user.newlist');
    }
    public function allTransaction()
    {
      $transactions = Transaction::orderBy('id','desc')->get();
      return view('user.transactionlist')->with('transactions',$transactions);
    }
}
