<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel='stylesheet' type='text/css' href='{{ asset('css/foundation.min.css') }}' />
  <link rel='stylesheet' type='text/css' href='{{ asset('css/add-income.css') }}' />
  <title>Income Tracker | Add Income</title>
</head>
<body>
  <div class='grid-container'>
    <div id='navbar'>
      navbar goes here
    </div>
    <div id='main'>
      @if (session('error'))
        <span class='label warning'>{{ session('error') }}</span>
      @endif
      <form method='post' action='/add-income'>
        {{ csrf_field() }}
        <div class='grid-x'>
          <div class='cell small-12'>
            <h1 style="text-align: center;">Add Income</h1>
          </div>
          <div class='cell medium-offset-2 medium-8 small-12'>
            <div class='grid-x grid-padding-x'>
              <div class='cell medium-6 small-12'>
                <label>Source</label>
                <input type='text' name='source' required />
              </div>
              <div class='cell medium-6 small-12'>
                <label>Date</label>
                <input type='date' name='date' required />
              </div>
              <div class='cell small-12'>
                <label>Description</label>
                <textarea name='description'></textarea>
              </div>
              <div class='cell medium-6 small-12'>
                <label>Amount</label>
                <input type='number' name='amount' placeholder='$' required />

                <button class='button expanded' type='submit'>Submit</button>
              </div>

            </div>

          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
