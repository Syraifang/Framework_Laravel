<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - RSHP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
        nav { background-color: #2E86C1; padding: 10px; text-align: center; }
        nav a { color: white; text-decoration: underline; margin: 0 15px; font-weight: bold; }
        .login-container { width: 300px; margin: 100px auto; padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<nav>
    <a href="/home">Home</a>
    <a href="/layanan">Layanan</a>
    <a href="/struktur-organisasi">Struktur Organisasi</a>
    <a href="/visi-misi">Visi Misi</a>
    <a href="/login">Login</a>
</nav> 

<div class="login-container">
    <h2>Login</h2>
    <form action="#" method="POST"> <div style="margin-bottom: 15px;">
            <label for="email">Email</label><br>
            <input type="email" name="email" style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password">Password</label><br>
            <input type="password" name="password" style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>
        <button type="submit" style="width: 100%; padding: 10px; background-color: #2E86C1; color: white; border: none; border-radius: 4px;">Login</button>
    </form>
</div>

</body>
</html>