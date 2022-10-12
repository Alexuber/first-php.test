<?php

// $id = $_POST['id'];
// $twit = $_POST['twit'];
// $user_id = $_POST['user_id'];
// $created = $_POST['created'];

// mysqli_query($conn, query: "INSERT INTO `posts` (`id`, `twit`, `user_id`, `created`) 
// VALUES ('$id', '$twit', '$user_id', current_timestamp())");

$is_session = (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null); // true or false (проверяем используем ли сессии)
$is_cookie = (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null); // true or false (проверяем используем ли куки)

if ($is_session || $is_cookie) { // если у нас есть сессия или куку
    $userID = $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"]; // то подставляем сессию или куки соответств.
}

if (!empty($_POST)) {

    $sql = "INSERT INTO `posts` (`twit`,`user_id`) VALUES ('" . $_POST['twit'] . "','" . $userID . "');";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>Twit added <a href='/admin/posts.php'>Back</a></h2>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Enter new twit</h6>
    </div>
    <div class="card-body">

        <form action="?page=add_posts" method="POST">
            <div class="mb-3">
                <label for="twit" class="form-label">twit</label>
                <textarea name="twit" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <button type="text" class="btn btn-success">SAVE</button>
            </div>
        </form>
    </div>
</div>