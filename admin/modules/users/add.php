<?php

if (!empty($_POST)) {

    $sql = "INSERT INTO `users` (`username`, `email`) VALUES ('" . $_POST['name'] .
        "', '" . $_POST['email'] . "');";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>Data refreshed <a href='/admin/users.php'>Back</a></h2>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Enter personal data</h6>
    </div>
    <div class="card-body">

        <form action="?page=add" method="POST">
            <div class="mb-3 row">
                <label for="username" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter new name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Enter new email">
                </div>
                <button type="email" class="btn btn-success">SAVE</button>
            </div>
        </form>
    </div>
</div>