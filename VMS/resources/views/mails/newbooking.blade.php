


<!DOCTYPE html>
<html>
<head>
  <title>Booking Response</title>
</head>
<body>
    <h1><center>Visitor Management System</center></h1>
    <p>

      Hello {{ $empname }},<br/>
      We are here to inform that you have received a book request for {{ $visittype }}
      on {{ $date }} for {{ $noofhours }} at {{ $fromtime }} .
       For Other info Provided by Visitor Log in to <a href="http://localhost:8000/">Visitor Management System</a>.
       This is a System Generated mail,so please dont respond.
      Thanking You,<br/>
      Visitor Management System
    </p>
</body>
</html>
