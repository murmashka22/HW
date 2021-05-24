<?php
if (!empty($_POST['submit'])){
    setcookie('user', $user['name'], time() - 3600, "/");
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Авторизация</title>
</head>
<body style="">
<div class="form">
    <h1>Привет!</h1>
    <p style="text-align: center">Чтобы выйти нажми на кнопку</p>
    <form action="" method="post">
        <div class="input-form">
            <input type="submit" name="submit" value="Выйти" style="margin: 0">
        </div>
    </form>
</div>
</body>
</html>
