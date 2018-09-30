<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function showDashboard() {
      if ($this->checkLoggedIn()) {} else { return redirect('/'); }


      return view('dashboard');
    }

    public function showAddIncome() {
      if ($this->checkLoggedIn()) {} else { return redirect('/'); }

      return view('addIncome');
    }

    public function addIncome(Request $request) {
      $request->validate([
        'source' => 'required|string',
        'date' => 'required|date',
        'description' => 'nullable|string',
        'amount' => 'required|numeric',
      ]);

      $id = session('id');
      $source = $request['source'];
      $date = $request['date'];
      $description = $request['description'];
      //if (empty($description)) { $description = ''; }
      $amount = $request['amount'];

      // insert into db
      DB::table('income')->insert([
        'user_id' => $id,
        'source' => $source,
        'date' => $date,
        'description' => $description,
        'amount' => $amount,
      ]);

      return redirect('/dashboard');
    }






    private function checkLoggedIn() {
      if (session('id')) {
        return true;
      }

      else {
        return false;
      }
    }

}
