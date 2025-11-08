<!DOCTYPE html>
<html>
<head><title>Admin Page</title></head>
<body>
    <h2>Selamat datang, Admin {{ Auth::user()->name }}</h2>
    <a href="/logout">Logout</a>
</body>
</html>
