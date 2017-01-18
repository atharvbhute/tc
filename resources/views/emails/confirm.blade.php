<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Welcome to the compete</h2>
<h3>Thank you for signing up</h3>
<h4>Plese confirm your E-mail By Click the link below</h4>
<a href='{{url("register/confirm/{$user->token}") }}'><button class="btn btn-primary">Click Here To Confirm Your Mail</button></a>

</body>
</html>