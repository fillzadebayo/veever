<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function register (Request $request){
      $input = $request->all();
      $validator = $this->validator($input);

      if ($validator->passes()){
        $user = $this->create($input)->toArray();
        $user['link'] =str_random(30);
        DB::table('useractivation')->insert(['user_id'=>$user['id'], 'token'=>$user['link']]);
        Mail::send('email.activation', $user, function($message) use ($user){
          $message->to($user['email']);
          $message->subject('Veever - Activate Email Account');
        });
        return redirect()->to('login')->with('success', 'we sent activation code. Please check your mail');

      }
      return back()->with('errors', $validator->errors());
    }
    public function userActivation($token){
      $check = DB::table('useractivation')->where('token',$token)->first();
      if($check){
        $user = User::find($check->user_id);
        if($user->active==1){
          return redirect()->to('login')->with('success', 'user already activated');
        }else{
        $user->active =1;
        $user->save();
        DB::table('useractivation')->where('token',$token)->delete();
        return redirect()->to('login')->with('success', 'Token is successfull');
      }

    }return redirect()->to('login')->with('warning', 'Token is ivalid');

}
}
