<?php

include "res.php";

if ($_POST['submit']=='Войти'){

    $user=new Auto($_POST['login'],$_POST['pass']);

    $user->Connect();

    $user->Verification();
}
elseif ($_POST['submit']=='Зарегистрироваться'){
    $user=new Auto($_POST['login'],$_POST['pass']);

    $user->Connect();

    $user->Fields();

    $user->LengthLogin();

    $user->Verification_Recording();
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
    <h1>Вход</h1>

    <form action="#" method="post">
        <div class="input-form">
            <input type="text" name="login" placeholder="Логин">
        </div>
        <div class="input-form">
            <input type="password" name="pass" placeholder="Пароль">
        </div>
        <div class="input-form">
            <input type="submit" name="submit" value="Войти">
            <p>ИЛИ</p>
            <input type="submit" name="submit" value="Зарегистрироваться" style="margin: 0">
        </div>
    </form>
    <a href="#" class="forget">Забыли пароль?</a>
</div>
</body>
</html>
