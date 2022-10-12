<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Users list
            <a href="?page=add" class="btn btn-info"><i class="fas fa-user-plus"></i></a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $is_session = (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null); // true or false (проверяем используем ли сессии)
                    $is_cookie = (isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null); // true or false (проверяем используем ли куки)

                    if ($is_session || $is_cookie) { // если у нас есть сессия или куку
                        $userID = $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"]; // то подставляем сессию или куки соответств.

                        $sql = "SELECT * FROM users WHERE id =" . $userID; // обращаемся в базе и выводим из базы наш айди который обнаружили
                    }
                    $sql = "SELECT * FROM users WHERE id!=" . $userID;
                    $result = mysqli_query($conn, $sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td>
                                <a href="?page=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning">
                                    <i class="fa-solid fa-pencil-alt"></i>Edit
                                </a>
                                <a href="/admin/modules/users/delete.php?id=<?php echo $row['id']; ?>" class=" btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>Delete
                                </a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>