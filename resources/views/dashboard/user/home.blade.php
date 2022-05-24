<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User</h1>
    <h3>home</h3>
    <h3>{{ Auth::guard('web')->user()->name}}</h3>
    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a href="{{ route('user.logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><span>Logout</span> </a>

</body>
</html>