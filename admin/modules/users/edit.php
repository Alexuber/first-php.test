<?php

if (!empty($_POST)) {

    $sql = "UPDATE `users` SET `username` = '" . $_POST['name'] . "',
       `email` = '" . $_POST['email'] . "' WHERE `id` = " . $_GET['id'] . ";";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>Data refreshed <a href='/admin/users.php'>Back</a></h2>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM users WHERE id = " . $_GET['id'];
$result = mysqli_query($conn, $sql);

$row = $result->fetch_assoc()
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Change personal data</h6>
    </div>
    <div class="card-body">

        <form action="?page=edit&id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="<?php echo $row['username']; ?>" class="form-control" id="inputName" placeholder="Enter new name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control" id="inputEmail" placeholder="Enter new email">
                </div>
                <button type="submit" class="btn btn-success">SAVE</button>
            </div>
        </form>
    </div>
</div>