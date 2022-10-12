<?php
include($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');

$user_id = $_POST['user_id'];
$text = $_POST['twit'];
$imageName = ''; // default variable $image - empty


if (!empty($_FILES)) {  // checking have we file or no? 
    // додавання - завантаження зображення без аяксу
    $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'; // директория для загрузки изображения
    $ext = pathinfo($_FILES['image']['name']); // получаем информацию о расширении и типе файлов
    $ext = $ext['extension']; // выводим отдельно расширение файла
    $imageName = generateRandomString(5) . time() . '.' . $ext; // додаємо до рандомого ім'я + розширенння файлу
    $uploadfile = $uploaddir . $imageName;

    echo '<pre>';
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) { // якщо файл не завантажений - видає помилку
        echo "Файл не загружен.\n";
        die();   // прериваємо подальше виконання коду
    }
}

$sql = "INSERT INTO posts (twit, user_id, image)  
VALUES ('" . $text . "' , '" . $user_id . "', '" . $imageName . "')";

if (mysqli_query($conn, $sql)) {

    $html = "<li>";
    $html .= $text;
    if ($imageName != '') {
        $html .= "<img src='/uploads/$imageName'>";
    }
    $html .= "</li>";

    echo $html;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// generate random name for files (uploaded images)
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// echo 'Некоторая отладочная информация:';
// print_r($_FILES);

// print "</pre>";
