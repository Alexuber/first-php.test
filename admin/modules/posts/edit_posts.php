<?php

$is_session = (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null); // true or false (проверяем используем ли сессии)
$is_cookie = (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null); // true or false (проверяем используем ли куки)

if ($is_session || $is_cookie) { // если у нас есть сессия или куку
    $userID = $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"]; // то подставляем сессию или куки соответств.
}
if (!empty($_POST)) {

    $sql = "UPDATE `posts` SET `twit` = '" . $_POST['twit'] . '", "' . $userID .
        "' WHERE `posts`.`id` = " . $_GET['id'] . ";";


    if (mysqli_query($conn, $sql)) {
        echo "<h2>Post refreshed <a href='/admin/posts.php'>Back</a></h2>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


$sql = "SELECT * FROM posts WHERE id = " . $_GET['id'];
$result = mysqli_query($conn, $sql);

$row = $result->fetch_assoc()

?>


<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>twit</th>
            <th>user_id</th>
            <th>created</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['twit']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['created']; ?></td>
        </tr>
    </tbody>
</table>

<!-- <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Enter new twit</h6>
    </div>
    <div class="card-body">

        <form action="?page=edit_posts&id=<?php echo $_GET['twit']; ?>" method="POST">
            <div class="mb-3">
                <label for="twit" class="form-label">twit</label>
                <textarea type="text" value="<?php echo $row['twit']; ?>" name="twit" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <button type="text" class="btn btn-success">SAVE</button>
            </div>
        </form>
    </div>
</div> -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Change your twit</h6>
    </div>
    <div class="card-body">

        <form action="?page=edit_posts&id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="mb-3 row">
                <label for="twit" class="col-sm-2 col-form-label"></label>
                <textarea type="text" name="twit" value="<?php echo $row['twit']; ?>" class="form-control">
                    <?php echo $row['twit']; ?>
                </textarea>
                <button type="text" class="btn btn-success">SAVE</button>
            </div>
        </form>
    </div>
</div>