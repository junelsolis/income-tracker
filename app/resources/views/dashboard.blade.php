<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel='stylesheet' type='text/css' href='{{ asset('css/foundation.min.css') }}' />
  <link rel='stylesheet' type='text/css' href='{{ asset('css/dashboard.css') }}' />
  <title>Income Tracker | Dashboard</title>
</head>
<body>
  <div class='grid-container'>
    <div id='main' class="grid-x align-middle">
      <div class='cell small-12'>
        <h1>$1,290</h1>
      </div>
    </div>
    <div id='button-wrapper'>
      <a href='/add-income' class='button'>Add Income</a>
    </div>
    <div id='income'>
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Source</th>
            <th>Comments</th>
            <th style='text-align:right;'>Amount</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
