<!DOCTYPE html>
<html>
<head><title>User Page</title></head>
<body>
    <h2>Selamat datang, Petugas {{ Auth::user()->name }}</h2>
    <a href="/logout">Logout</a>
</body>
</html>
