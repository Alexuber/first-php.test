<?php

include($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');

if (!isset($_SESSION)) {
  session_start();
}

require($_SERVER['DOCUMENT_ROOT'] . '/configs/helpers.php');

$is_session = (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null); // true or false (проверяем используем ли сессии)
$is_cookie = (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null); // true or false (проверяем используем ли куки)

if ($is_session || $is_cookie) { // если у нас есть сессия или куку
  $userID = $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"]; // то подставляем сессию или куки соответств.

  $sql = "SELECT * FROM users WHERE id =" . $userID; // обращаемся в базе и выводим из базы наш айди который обнаружили
  $result = mysqli_query($conn, $sql);
  $user = $result->fetch_assoc();
}

//   if ($user['role'] != "admin") { // если роль юзера - НЕадмин
//     header("Location:/login.php"); // перенаправляем его на страницу логина
//   }
// } else {
//   header("Location:/register.php"); // иначе перенаправляем его на страницу логина
// }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>WorkWise Html Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link rel="stylesheet" type="text/css" href="template/css/animate.css">
  <link rel="stylesheet" type="text/css" href="template/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="template/css/line-awesome.css">
  <link rel="stylesheet" type="text/css" href="template/css/line-awesome-font-awesome.min.css">
  <link href="template/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="template/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="template/css/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" type="text/css" href="template/lib/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="template/lib/slick/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="template/css/style.css">
  <link rel="stylesheet" type="text/css" href="template/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="template/css/font-awesome.min.css">
</head>

<body>



  <?php
  if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null) {
    echo '<a href="logout.php">Logout</a>';
  } else if (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null) {
    echo '<a href="logout.php">Logout</a>';
  } else {
  ?>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
  <?php
  }
  ?>