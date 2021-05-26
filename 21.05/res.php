<?php

class Auto
{
    public $host = 'localhost';
    public $username = 'maria';
    public $password = '2212';
    public $dbname = 'authorization';

    public $login1;
    public $pass;

    /*    function __construct($login, $pass)
        {
            $this->login;
            $this->pass;
        }*/

    function Print1(){
        echo "Логин {$this->login1}";
    }

    /*Соединение с БД*/
    function Connect()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname) or die ("Неть");
        return $conn;
    }

    /*Хеширование пароля*/
    function Hash()
    {
        return md5($this->pass);
    }

    /*РЕГИСТРАЦИЯ*/

    /*Проверка пустых полей*/
    function Fields()
    {
        if (empty($this->pass) || empty($this->login)) {
            exit("пустые поля!");
        }
    }

    /*Проверка длины логина*/
    function LengthLogin(){
        if (mb_strlen($this->login) < 5 || mb_strlen($this->login) > 90) {
            echo "Недопустимая длина логина";
            exit();
        }
    }

    /*Проверка на совпадение логина в БД и запись в БД*/
    function Verification_Recording(){
        $result=mysqli_query($this->Connect(),"SELECT * FROM users WHERE user_login = '$this->login'");
        $user=$result->fetch_assoc();
        if(!empty($user1)){
            echo "Данный логин уже используется";
            exit();
        }
        else{
            /*            mysqli_query($this->Connect(),"INSERT INTO users (user_login,user_password) VALUES("$this->login", "$this->Hash()")");*/
            header('Location: REG.html');
        }
    }


    /*ВХОД*/

    /*Проверка введенных данных и вход*/
    function Verification(){


        $result=mysqli_query($this->Connect(),"SELECT * FROM users WHERE user_login =".$this->login." AND user_password = ".$this->Hash());
        var_dump($result);
        echo "Логин  {$this->login}";

        /*
                $user=$result->fetch_assoc();
                if(count($user) == 0){
                    echo "Такой пользователь не найден.";
                    exit();
                }
                else if(count($user) == 1){
                    echo "Логин или пароль введены неверно";
                    exit();
                }
                else{
                    setcookie('user', $user['name'], time() + 3600, "/");
                    header('Location: AUTO.php');
                }*/
    }

}



/*$host = 'localhost';
$username='maria';
$password='2212';
$dbname='authorization';

try {
    $conn=mysqli_connect($host, $username, $password,$dbname);

    $login=$_POST['login'];
    $pass=$_POST['pass'];


    if ($_POST['submit']=='Зарегистрироваться'){

        if (empty($_POST['login']) || empty($_POST['pass'])){
            exit("пустые поля!");
        }


    if(mb_strlen($login) < 5 || mb_strlen($login) > 90){
        echo "Недопустимая длина логина";
        exit();
    }


    $pass=md5($pass);


     $result1 = $conn->query("SELECT * FROM users WHERE user_login = '$login'");
     $user1 = $result1->fetch_assoc(); // Конвертируем в массив
     if(!empty($user1)){
         echo "Данный логин уже используется";
         exit();
     }
     $conn->query("INSERT INTO users (user_login,user_password) VALUES('$login', '$pass')");
     header('Location: REG.html');






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
            echo "Логин или пароль введены неверно";
            exit();
      }
      setcookie('user', $user['name'], time() + 3600, "/");

header('Location: AUTO.php');
    }






}
catch (Exception $e){
    echo "Упс...";
}*/
