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
        <div class='grid-x grid-padding-x'>
          <div id='income' class='cell medium-8 text-center'>
            <h1>${{ $monthIncome }}</h1>
            <h5>Last 30 Days</h5>
          </div>
          <div id='other-income' class='cell medium-4'>
            <div>
              <h5>${{ $yearIncome }}</h5>
              <p>
                Total income this year
              </p>
            </div>
          </div>
        </div>
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
          @if ($recentEntries)
            @foreach ($recentEntries as $entry)
            <tr>
              <td>{{ $entry->date }}</td>
              <td>{{ $entry->source }}</td>
              <td>{{ $entry->description }}</td>
              <td style='text-align:right;'>${{ $entry->amount }}</td>
            </tr>
            @endforeach
          @endif
        </tbody>
      </table>
      <a href=''>More...</a>
    </div>
  </div>
</body>
</html>
