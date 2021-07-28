<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Now</title>
</head>
<body>
    <form action="{{ route('verify') }}" method="post">
        <input type="hidden" name="email" value="{{ $email }}">
        <div>
            <label for="code">Verification code</label>
            <input type="text" id="code" name="code" placeholder="Your code">
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>