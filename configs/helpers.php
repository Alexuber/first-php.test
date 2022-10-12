<?php

// check user authorization
function isLogin()
{
    $is_session = (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null); // true or false (проверяем используем ли сессии)
    $is_cookie = (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null); // true or false (проверяем используем ли куки)

    if ($is_session || $is_cookie) { // если у нас есть сессия или куку
        return true;
    } else {
        return false;
    }
}

// отримати поточного користувача
function getCurrentUser()
{
    global $conn; // підключаємо глобальний коннект - глобальна змінна

    $is_session = (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null); // true or false (проверяем используем ли сессии)
    $is_cookie = (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null); // true or false (проверяем используем ли куки)

    if ($is_session || $is_cookie) { // если у нас есть сессия или куку
        $userID = $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"]; // то подставляем сессию или куки соответств.

        $sql = "SELECT * FROM users WHERE id =" . $userID; // обращаемся в базе и выводим из базы наш айди который обнаружили
        $result = mysqli_query($conn, $sql);
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function getUserID()
{
    $is_session = (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null); // true or false (проверяем используем ли сессии)
    $is_cookie = (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null); // true or false (проверяем используем ли куки)

    if ($is_session || $is_cookie) { // если у нас есть сессия или куку
        return
            $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"];;
    } else {
        return 0;
    }
}

function getAllTwitsByUser($userID)
{
    global $conn; // підключаємо глобальний коннект - глобальна змінна

    $sql = "SELECT * FROM posts WHERE user_id =" . $userID . " ORDER BY id DESC "; // обращаемся в базе и выводим из базы наш айди который обнаружили
    $result = mysqli_query($conn, $sql);
    return $result;
}
