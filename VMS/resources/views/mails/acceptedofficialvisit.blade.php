


<!DOCTYPE html>
<html>
<head>
  <title>Booking Response</title>
</head>
<body>
    <h1><center>Visitor Management System</center></h1>
    <p>

      Hello {{ $visitorname }},<br/>
      We are here to inform that your book request to officially visit {{ $empname }} of {{ $empdept }}
       on {{ $date }} for {{ $noofhours }} at {{ $from}} has been accepted by {{ $empname }}.
       For Other info Provided by employee Log in to <a href="http://localhost:8000/">Visitor Management System</a>.
       This is a System Generated mail,so please dont respond.<br/>
        <strong>YOUR BOOKING ID IS {{ $id }} KINDLY MAKE A NOTE OF IT,YOU ARE STRICTLY INFORMED TO BRING A PRINTOUT OF THIS BOOKING CONFIRMATION.</strong><br/>
      Thanking You,<br/>
      Visitor Management System
    </p>
</body>
</html>
