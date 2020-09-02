<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function postSignUp(Request $request) {
            $this->validate($request, [
                'email' => 'required|email|unique:users',
                'name' => 'required|max:40',
                'password' => 'required|min:6'
            ]);
            $email = $request['email'];
            $name = $request['name'];
            $password = bcrypt($request['password']);

            $user = new User();
            $user->email = $email;
            $user->name = $name;
            $user->password = $password;

            $user->save();

            Auth::login($user);
    }
 




    public function postSingIn(Request $request) {
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ]);


           if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
               return redirect()->route('dashboard');
           }
           return redirect()->back();
    }
    public function getLogout() {
        Auth::logout();
        return redirect()->route('homepage');
    }
    public function getAccount() {
        return view('account', [
            'user' => Auth::user()
        ]);
    }
} 