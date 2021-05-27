<?php

class Auto{

    public $host = 'localhost';
    public $username = 'maria';
    public $password = '2212';
    public $dbname = 'authorization';

    static public $conn = 'mysqli_connect($host, $username, $password,$dbname);';

    public $login;
    public $pass;

    function __construct($login,$pass)
    {
        $this->login=$login;
        $this->pass=$pass;
    }

    function print1(){
        echo "Логин {$this->login}";
        echo "Пароль {$this->pass}";
    }

    function Connect(){
        $conn1=mysqli_connect($this->host, $this->username, $this->password, $this->dbname) or die ("Неть");
        return $conn1;
    }

    function Hash()
    {
        /*echo "ХЭШ".md5($this->pass);*/
        return md5($this->pass);
    }

    function Fields()
    {
        if (empty($this->login) || empty($this->pass)) {
            exit("пустые поля!");
        }
    }

    function LengthLogin(){
        /*echo "длина";*/
        if (mb_strlen($this->login) < 5 || mb_strlen($this->login) > 90) {
            echo "Недопустимая длина логина";
            exit();
        }
    }

    /*Проверка на совпадение логина в БД и запись в БД*/
    function Verification_Recording(){

        $result=mysqli_query($this->Connect(),"SELECT user_login FROM users");
        while ($row =$result->fetch_all(MYSQLI_ASSOC)) {
            foreach ($row as $row1) {
                if ($row1["user_login"]==$this->login){
                    $a=1;
                }
            }
        }


        if(!empty($a)){
            echo "Данный логин уже используется!";
            exit();
        }
        else{
            mysqli_query($this->Connect(),"INSERT INTO users (user_login,user_password) VALUES({$this->login},  md5({$this->pass}))");
            header('Location: REG.html');
        }
    }


    /*ВХОД*/

    /*Проверка введенных данных и вход*/
    function Verification(){

        $result=mysqli_query($this->Connect(),"SELECT * FROM users");

        while ($row =$result->fetch_all(MYSQLI_ASSOC)) {
            foreach ($row as $row1) {
                if ($row1["user_login"]==$this->login){
                    $a=1;
                }
            }
        }

        $result1=mysqli_query($this->Connect(),"SELECT * FROM users");
        while ($row =$result1->fetch_all(MYSQLI_ASSOC)) {
            foreach ($row as $row2) {
                if ($row2["user_password"]==md5($this->pass)){
                    $b=1;
                }
            }
        }



        if (empty($a) && empty($b)){
            echo "Неправильный логин!";
        }
        elseif(empty($b)){
            echo "Неправильный пароль!";
        }
        elseif(empty($a)){
            echo "Неправильный логин!";
        }
        else{
            header("Location: AUTO.php");
        }


    }

}
