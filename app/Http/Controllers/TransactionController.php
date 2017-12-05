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
   public function __construct()
   {
       $this->middleware('auth');
   }
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
        'delivery'=>'required',
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
        $transaction->payment = "false";
        $transaction->status = "uncompleted";


        if ($request->role=="Buyer") {
          $transaction->buyer = Auth::user()->email;
          $transaction->buyer_id = "";
          $transaction->seller = $request->selleremail;
          $transaction->seller_id = $request->sellerphone;
          $transaction->confirm = "BuyerISactive";
        }
        else {
          $transaction->buyer = $request->selleremail;
          $transaction->buyer_id = $request->sellerphone;
          $transaction->seller = Auth::user()->email;
          $transaction->seller_id = "";
          $transaction->confirm = "SellerISactive";
        }

      $transaction->save();
      Session::flash('success ', 'The Transaction has been started!');
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
        if ($transaction->buyer == Auth::user()->email) {
            if ($transaction->payment == 'false') {
              if ($transaction->confirm == "BuyerISactive") {
                return view('user.singles.buyeractive')->with('transaction', $transaction);
              }elseif ($transaction->confirm == "SellerISactive"){
                return view('user.singles.buyeraccept')->with('transaction', $transaction);
              }else{
                return view('user.singles.buyerpay')->with('transaction', $transaction);
              }
            }elseif ($transaction->status != 'completed') {
            return view('user.singles.buyerconfirm')->with('transaction', $transaction);
            }else{
            return view('user.singles')->with('transaction', $transaction);
          }
        }

        if ($transaction->seller == Auth::user()->email) {
            if ($transaction->payment == 'false') {
              if ($transaction->confirm == "SellerISactive") {
                return view('user.singles.selleractive')->with('transaction', $transaction);
              }elseif ($transaction->confirm == "BuyerISactive"){
              return view('user.singles.selleraccept')->with('transaction', $transaction);
              }else{
                return view('user.singles.sellerpay')->with('transaction', $transaction);
              }
            }elseif ($transaction->status != 'completed') {
            return view('user.singles.sellerconfirm')->with('transaction', $transaction);
            }else{
            return view('user.singles')->with('transaction', $transaction);
          }
        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        return view('user.singles.edit')->with('transaction',$transaction);
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
      $this->validate($request, array(
        'trantype'=>'required',
        'amount'=>'required',
        'quantity'=>'required',
        'tranname'=>'required',
        'delivery'=>'required',
        'description'=>'required'
      ));

        $transaction = Transaction::find($id);
        $transaction->name = $request->tranname;
        $transaction->nature = $request->trantype;
        $transaction->amount = $request->amount;
        $transaction->quantity = $request->quantity;
        $transaction->description = $request->description;
        $transaction->delivery = $request->delivery;

        $transaction->save();
        Session::flash('success', 'The Transaction has been Edited!');
        if (Auth::user()->email == $transaction->buyer){
        return redirect()->route('transaction.show',$transaction->id);
      }else{
        return redirect()->route('transaction.show',$transaction->id);
      }


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

      $transactions = Transaction::orderBy('id','desc')->Paginate(3);
      return view('user.transactionlist')->with('transactions',$transactions);
    }
    public function confirmTransaction($id, $role)
    {

      if($role == "buyer")
      {
        $transaction = Transaction::find($id);
        $transaction->confirm = 'Active';
        $transaction->save();
        Session::flash('success', 'You have confirmed, Active!');
        return redirect()->action('TransactionController@allTransaction');
      }else
      {
        $transaction = Transaction::find($id);
        $transaction->confirm = 'Active';
        $transaction->save();
        Session::flash('success', 'You have confirmed, Active!');
        return redirect()->route('transaction.show',$transaction->id);
      }
    }

}
