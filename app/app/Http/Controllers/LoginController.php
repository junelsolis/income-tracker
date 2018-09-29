<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function showLogin() {
      if ($this->checkUserExists() == false) {
        return redirect('create-user');
      }

      return view('login');
    }

    public function login(Request $request) {

      $request->validate([
        'username' => 'required|email',
        'password' => 'required|string',
      ]);

      $email = $request['username'];
      $password = $request['password'];

      // attempt to retrieve user from db
      $user = DB::table('users')->where('email', $email)->first();

      if (empty($user)) {
        return back()->with('error', 'Invalid credentials.');
      }

      // check password
      if (Hash::check($password, $user->password)) {
        // if check passes, store session data
        session([
          'id' => $user->id
        ]);

        return redirect('/dashboard');

      }
      else {
        return back()->with('error', 'Invalid credentials.');
      }


    }

    public function showCreateUser() {
      return view('createUser');
    }

    public function createUser(Request $request) {
      $request->validate([
        'email' => 'required|email',
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'password' => 'required|string',
        'confirmPassword' => 'required|string'
      ]);

      $firstname = $request['firstname'];
      $lastname = $request['lastname'];
      $email = $request['email'];
      $password = $request['password'];
      $confirmPassword = $request['confirmPassword'];

      // sanitize names
      $firstname = ucwords(strtolower($firstname));
      $lastname = ucwords(strtolower($lastname));

      //check passwords match
      if ($password !== $confirmPassword) {
        return back()->with('error', 'Passwords do not match. Please try again.');
      }

      // check password length
      if (strlen($password) < 8) {
        return back()->with('error', 'Password must have minimum 8 characters.');
      }

      // hash the password
      $password = Hash::make($password);

      // store user in database
      DB::table('users')->insert([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password
      ]);

      // redirect to login screen
      return redirect('/');

    }



    private function checkUserExists() {

      $count = DB::table('users')->count();

      if ($count != 0) {
        return true;
      } else {
        return false;
      }
    }

}
