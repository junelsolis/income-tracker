<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function showLogin() {
      if ($this->checkUserExists() == false) {
        return redirect('/create-user');
      }

      return view('login');
    }

    public function login() {



    }

    public function showCreateUser() {
      return view('createUser');
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
