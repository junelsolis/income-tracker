<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='{{ asset('css/foundation.min.css') }}' />
    <link rel='stylesheet' type='text/css' href='{{ asset('css/login.css') }}' />
    <title>Income Tracker</title>
  </head>

<body>
  <div class='grid-container grid-x align-middle text-center'>
    <div class='cell small-12'>
      <h1>Income Tracker</h1>
      <form method='post' action='/login'>
        {{ csrf_field() }}
        <div class='grid-x'>
          <div class='cell large-offset-4 large-4 medium-offset-4 medium-4 small-12'>
            <label>Username
              <input type="text" name='username' required>
            </label>
          </div>
          <div class='cell large-offset-4 large-4 medium-offset-4 medium-4 small-12'>
            <label>Password
              <input type="password" name='password' required>
            </label>
          </div>
          <div class='cell large-offset-4 large-4 medium-offset-4 medium-4 small-12'>
            <button class='button expanded' type='submit'>Login</button>
          </div>
        </div>

      </form>
    </div>

  </div>
</body>
</html>
