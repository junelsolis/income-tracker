<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='{{ asset('css/foundation.min.css') }}' />
    <link rel='stylesheet' type='text/css' href='{{ asset('css/create-user.css') }}' />
    <title>Income Tracker | Register</title>
  </head>
<body>
  <div class='grid-container grid-x align-middle text-center'>
    <div class='cell small-12'>
      <h1>Welcome to Income Tracker</h1>
      <form method='post' action='/create-user'>
          <div id='form-wrapper'>
            <span class='label warning'>This is a warning label</span>

            <div class="grid-x grid-padding-x">
              <div class='cell medium-6'>
                <label>First Name</label>
                <input type='text' name='firstname' required  />
              </div>

              <div class='cell medium-6'>
                <label>Last Name</label>
                <input type='text' name='lastname' required  />
              </div>

              <div class='cell small-12'>
                <label>Email</label>
                <input type='email' name='email' required />
              </div>

              <div class='cell medium-6'>
                <label>Password</label>
                <input type='password' name='password' required />
              </div>

              <div class='cell medium-6'>
                <label>Confirm Password</label>
                <input type='password' name='confirmPassword' required />
              </div>

              <div class='cell small-12'>
                <button type='submit' class='button expanded'>Register</button>

              </div>
            </div>





          </div>

      </form>
    </div>
  </div>
</body>
</html>
