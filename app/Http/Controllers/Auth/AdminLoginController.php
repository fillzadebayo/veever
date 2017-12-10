<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin');
    }
    public function showLoginForm()
    {
      return view('admin.admin-login');
    }
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('admin.admin'));
      }
      // if unsuccessful, then redirect back to the login with the form data
            Session::flash('errors ', 'invalid credentials');
      return redirect('admin/login')->withInput($request->only('email', 'remember'))->with('error','Invalid Credentials');
    }
}
