<?php

class AUTO{
    public $host = 'localhost'; /*host, username, password, dbname не имеет смысла прописывать в конструторе, так как они меняться не будут*/
    public $username='maria';
    public $password='2212';
    public $dbname='authorization';
    public $sql;/*&&&&&&&&&&&&&&&&&&&&&&&&&&*/


    public $login;/*Логин и пароль наоборот будут в конструторе, тк они постоянно меняются*/
    public $pass;


    public function Connect_DB() {
        $this->sql=mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
    }

    function __construct($login,$password)/*конструктор для определения логина и пароля*/
    {
        $this->login;
        $this->pass;
    }



    function He(){ /*хеширование пароля*/
        echo $this->pass;
    }

/*!!!!!!!!!!!!!!!!!!!!!!РЕГИСТРАЦИЯ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
   function Check($pass,$login){ /*Проверка на пустые поля*/
        if (empty($pass) || empty($login)){
            exit("пустые поля!");
        }
    }



    function Coincidence_login($login){  /*проверяем логин на совпадение*/
       $res=$this->sql=mysqli_query("SELECT * FROM users WHERE user_login = '$login'");
       $user=$this->$res->fetch_assoc();
        if(!empty($user)){
            echo "Данный логин уже используется";
            exit();
        }
    }

    function Recording($login,$pass){
        $this->sql=mysqli_query("INSERT INTO users (user_login,user_password) VALUES('$login', He($pass))");
        header('Location: REG.html');
    }


    /*!!!!!!!!!!!!!!!!!!!!!!!!!!!!Вход!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
function Coincidence_users($login,$pass){
    $result =$this->sql=mysqli_query("SELECT * FROM users WHERE user_login = '$login' AND user_password = '$pass'");
    $user=$this->$result->fetch_assoc();
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
    }
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
