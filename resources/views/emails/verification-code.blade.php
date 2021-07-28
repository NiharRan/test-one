<!DOCTYPE html>
<html>
<head>
    <title>Testing</title>
</head>
<body>
    <h2>Hi, This is your verification code. <strong>{{ $code }}</strong>. Please visit the link</h2>
    <a class="btn btn-success" href="{{ $url }}" target="_blank">Verify Now</a>
    <p>Thank you</p>
</body>
</html>