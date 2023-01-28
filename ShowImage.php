<?php
if(isset($_POST["submit"])){

    $dbHost = 'localhost';
    $dbUsername = 'root'; 
    $dbPassword = ''; 
    $dbName = 'images_test';

//Подключение к бд
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//Проверка подключения
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }

//Вывод
    if($result = $db->query("SELECT * FROM images")){
        foreach($result as $row){
         
            echo $row["id"];
            echo $row["title"];
            echo  $row["description"];
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Просмотр данных</title>
</head>
<body>
    
<form action="" method="get" enctype="multipart/form-data">

    <input type="submit" name="submit" value="Display"/>

</form>

</body>
</html>
