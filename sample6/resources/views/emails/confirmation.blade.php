<!DOCTYPE html>
<html>
<head>
  <title>Confirmation</title>
</head>
<body>
    <h1> Thank you for signing!!!</h1>
    <p>
      You need to <a href='{{ url("register/confirm/{$user->token}") }}'> confirm your email address.</a> 
    </p>
</body>
</html>
