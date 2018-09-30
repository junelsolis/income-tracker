<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function showDashboard() {
      if ($this->checkLoggedIn()) {} else { return redirect('/'); }

      $monthIncome = $this->getIncomeMonth();
      $monthIncome = number_format($monthIncome,2);

      $yearIncome = $this->getIncomeYear();
      $yearIncome = number_format($yearIncome,2);

      $recentEntries = $this->getEntries(15);

      return view('dashboard')
        ->with('monthIncome', $monthIncome)
        ->with('yearIncome', $yearIncome)
        ->with('recentEntries', $recentEntries);
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





    private function getIncomeMonth() {
      $now = strtotime('now');
      $month = strtotime('-30 days');
      $month = date('Y-m-d', $month);

      $entries = DB::table('income')->where('date', '>=', $month)->get();

      $total = $entries->sum('amount');

      return $total;
    }

    private function getIncomeYear() {
      $now = strtotime('now');
      $year = strtotime('-365 days');
      $year = date('Y', $year);

      $entries = DB::table('income')->where('date', '>=', $year)->get();

      $total = $entries->sum('amount');

      return $total;
    }

    private function getEntries($limit = NULL) {

      if (isset($limit)) {
        $entries = DB::table('income')->orderBy('created_at', 'desc')->limit($limit)->get();

      }

      else {
        $entries = DB::table('income')->orderBy('created_at', 'dec')->get();
      }

      return $entries;
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
