<?php
$host = 'localhost';
$username='maria';
$password='2212';
$dbname='hobby1';

$conn=mysqli_connect($host, $username, $password,$dbname) or die('Неть');
mysqli_select_db($conn,$dbname);

/*Создание таблиц*/
/*$sql1="CREATE TABLE People(
ID_person int(60) UNIQUE AUTO_INCREMENT PRIMARY KEY,
Name varchar(120),
Surname varchar(120),
Age int(120)
)";

$sql2="CREATE TABLE Hobbies(
ID_hobbies int(60) UNIQUE AUTO_INCREMENT PRIMARY KEY,
Name varchar(120),
Description varchar(120)
)";

$sql3="CREATE TABLE People_hobbies(
ID_record int(60) UNIQUE AUTO_INCREMENT PRIMARY KEY,
ID_people int(60),
ID_hobbies int(60),
FOREIGN KEY (ID_people) References People(ID_person) ON DELETE CASCADE,
FOREIGN KEY (ID_hobbies) References Hobbies(ID_hobbies) ON DELETE CASCADE
) ENGINE=INNODB";*/


$result = mysqli_query($conn,"SELECT `Name` FROM `hobbies`");
$arr = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<!--ID_record ID-people ID_hobbies-->

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
    <h1>Расскажите <br> о вашем хобби</h1>

    <form action="res.php" method="post">
        <div class="input-form">
            <input type="text" name="name" placeholder="Имя">
        </div>
        <div class="input-form">
            <input type="text" name="surname" placeholder="Фамилия">
        </div>
        <div class="input-form">
            <input type="text" name="age" placeholder="Возраст">
        </div>
        <div class="input-form">
            <?echo "<select class='select-css' name='hobby'>";

            foreach($arr as $arr) {
                echo "<option value='{$arr['Name']}'>{$arr['Name']}</option>";
            }

            echo "</select>";?>
        </div>
        <div class="input-form">
            <input type="submit" name="submit" value="Отправить" style="margin: 0">
        </div>
    </form>
</div>
</body>
</html>
