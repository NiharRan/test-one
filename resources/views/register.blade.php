<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Now</title>
</head>
<body>
    <form action="{{ route('register') }}" method="post">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="code" value="{{ $code }}">
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Your username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Your password">
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>