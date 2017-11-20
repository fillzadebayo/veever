<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use Session;


class UserController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function updateAccount(Request $request, $id )
    {
      $this->validate($request, array(
        'bankname'=>'required',
        'accountname'=>'required',
        'accountnumber'=>'required',
        'phonenumber'=>'required'
      ));

        $user = User::find($id);
        $user->accountname = $request->accountname;
        $user->accountbank = $request->bankname;
        $user->accountnumber = $request->accountnumber;
        $user->phonenumber = $request->phonenumber;

        $user->save();
        Session::flash('success', 'The Transaction has been Edited!');
        return redirect()->route('user.account');

    }
    public function updateView()
    { $id = Auth::User()->id;
      $user = User::find($id);
      return view('user.accounts')->with('user', $user);
    }



}
