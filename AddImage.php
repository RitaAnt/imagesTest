<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgTitle = $_POST['title'];
        $imgDescription = $_POST['description'];
        $imgContent = addslashes(file_get_contents($image));

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

        $dateTime = date("Y-m-d H:i:s");

//Добавление картинки
        $insert = $db->query("INSERT into images (title, description, filename, date) VALUES ('$imgTitle','$imgDescription', '$imgContent', '$dateTime')");
        if($insert){
            echo "Файл загружен.";
        }else{
            echo "Файл не загружен, попробуйте ещё раз.";
        }
    }else{
        echo "Файл не выбран.";
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
    <title>Загрузка изображений</title>
</head>
<body>
    
<form action="" method="post" enctype="multipart/form-data">
    Название:<input type="text" name="title"><br>
    Описание:<input type="text" name="description"><br>
    <input type="file" name="image" required /><br>
    <input type="submit" name="submit" value="Загрузить"/>
</form>


</body>
</html>
