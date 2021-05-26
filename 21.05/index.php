<?
$host = 'localhost';
$username='maria';
$password='2212';
$dbname='authorization';

/*Создание БД authorization*/
$sql=mysqli_connect($host, $username, $password) or die('Неть');
/*mysqli_set_charset($conn,'utf8');
mysqli_query($conn,"CREATE DATABASE $dbname");*/

/*Работа с текущей БД*/
mysqli_select_db($sql,$dbname);

/*Создание таблицы users, user_id-первичный ключ*/
/*$sql='CREATE TABLE `users` (
    `user_id` int(11) unsigned NOT NULL auto_increment,
    `user_login` varchar(30) NOT NULL,
    `user_password` varchar(32) NOT NULL,
    PRIMARY KEY (`user_id`)
)';*/


/*mysqli_query($conn,$sql);*/



/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!СМОТРЕТЬ ЗДЕСЬ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
include 'res.php';/*подключение файла с классом*/

try {
    $user=new AUTO($_POST['login'],$_POST['pass']);
    $user->He();
}
catch (Exception $e){
    echo "Неа";
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

    <form action="res.php" method="post">
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
