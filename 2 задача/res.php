<?php

$host = 'localhost';
$username='maria';
$password='2212';
$dbname='hobby1';
$conn=mysqli_connect($host, $username, $password,$dbname);
try{
    echo "111";
    $conn=mysqli_connect($host, $username, $password,$dbname);
    if(!empty($_POST['submit'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $age = $_POST['age'];
        $hobby = $_POST['hobby'];

        /*Добавление значений в таблицу People*/
        $conn->query("INSERT INTO people (Name,Surname,Age) VALUES('$name', '$surname','$age')");





        $val1=$conn->query("SELECT MAX(ID_person) FROM people");/*поиск айди */
        $arr1 = mysqli_fetch_all($val1,MYSQLI_ASSOC);
        $name_people=$arr1[0]["MAX(ID_person)"];/*айди человека*/



        $val2 = $conn->query("SELECT ID_hobbies FROM hobbies WHERE Name = '$hobby'");/*поиск айди хобби*/
        $user1 = $val2->fetch_assoc();
        $name_hobby=$user1["ID_hobbies"];/*айди хобби*/

        $conn->query("INSERT INTO people_hobbies (ID_people,ID_hobbies) VALUES('$name_people', '$name_hobby')");
    }

}
catch (Exception $e){
    echo "Упс..";
}
