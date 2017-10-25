<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        'nature'=>'required',
        'role'=>'required',
        'amount'=>'required',
        'currency'=>'required',
        'quantity'=>'required',
        'goods_name'=>'required',
        'description'=>'required'
      ));
      do {
        $token_key = $this->random(7);
        } while (Transaction::where("token", "=", $token_key)->first() instanceof Transaction);

      $transaction = new Transaction;
      $transaction->tran_id = $this->random();
      $transaction->token = $token_key;
      $transaction->name = $request->goods_name;
      $transaction->nature = $request->nature;
      $transaction->amount = $request->amount;
      $transaction->currency = $request->currency;
      $transaction->quantity = $request->quantity;
      $transaction->description = $request->description;
      if ($request->role="Buyer") {
        $transaction->buyer = "";
        $transaction->buyer_id = "";
        $transaction->seller = "";
        $transaction->seller_id = "";
      }else {
        $transaction->buyer = "";
        $transaction->buyer_id = "";
        $transaction->seller = "";
        $transaction->seller_id = "";
      }


      $transaction->save();
      Session::flash('success', 'The Post was succesfully Edited!');
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
