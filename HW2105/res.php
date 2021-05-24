<?php
$host = 'localhost';
$username='maria';
$password='2212';
$dbname='authorization';

try {
    $conn=mysqli_connect($host, $username, $password,$dbname);

    $login=$_POST['login'];
    $pass=$_POST['pass'];

    /*РЕГИСТРАЦИЯ*/
    if ($_POST['submit']=='Зарегистрироваться'){

        if (empty($_POST['login']) || empty($_POST['pass'])){
            exit("пустые поля!");
        }

    /*Проверка длины логина*/
    if(mb_strlen($login) < 5 || mb_strlen($login) > 90){
        echo "Недопустимая длина логина";
        exit();
    }

    /*хешируем пароль*/
    $pass=md5($pass);

    /*проверяем логин на совпадение*/
     $result1 = $conn->query("SELECT * FROM users WHERE user_login = '$login'");
     $user1 = $result1->fetch_assoc(); // Конвертируем в массив
     if(!empty($user1)){
         echo "Данный логин уже используется";
         exit();
     }
     $conn->query("INSERT INTO users (user_login,user_password) VALUES('$login', '$pass')");
     header('Location: REG.html');





    /*ВХОД*/
    }
    if ($_POST['submit']=='Войти'){
        $login=$_POST['login'];

        $pass=$_POST['pass'];
    $pass = md5($pass);
    $result = $conn->query("SELECT * FROM users WHERE user_login = '$login' AND user_password = '$pass'");
    $user = $result->fetch_assoc(); // Конвертируем в массив
     if(count($user) == 0){
            echo "Такой пользователь не найден.";
            exit();
     }
      else if(count($user) == 1){
            echo "Логин или праоль введены неверно";
            exit();
      }
      setcookie('user', $user['name'], time() + 3600, "/");

header('Location: AUTO.php');
    }






}
catch (Exception $e){
    echo "Упс...";
}
