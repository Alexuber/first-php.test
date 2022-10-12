<?php
require('partials/header.php');
if (!empty($_POST)) {
	$sql = "SELECT * FROM `users` WHERE `email` = '" . $_POST['email'] . "' AND `password` =
     '" . $_POST['password'] . "'";

	$result = mysqli_query($conn, $sql);
	$user = $result->fetch_assoc();

	if ($user) {
		var_dump($_POST);

		if (isset($_POST['remember'])) {
			setcookie('user_id', $user['id'], time() + 60 * 60 * 24 * 30, '/');

			echo "<h2>" . $_COOKIE["user_id"] . "</h2>";
		} else {
			$_SESSION["user_id"] = $user['id'];
		}

		header("Location:/");
	} else {
		$_SESSION["user_id"] = null;
		setcookie('user_id', '', 0, '/');
	}
}

echo "<h2>" . $_COOKIE["user_id"] . "</h2>";

?>

<body class="img js-fullheight" style="background-image: url(img/bg.jpg);">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section">Registration</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4">
				<div class="login-wrap p-0">
					<h3 class="mb-4 text-center">Have an account?</h3>
					<form action="#" method="POST" class="signin-form">
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Email" required="">
						</div>
						<div class="form-group">
							<input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required="">
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						</div>
						<div class="form-group">
							<button type="submit" class="form-control btn btn-primary submit px-3">Login</button>
						</div>
						<div class="form-group d-md-flex">
							<div class="w-50">
								<label class="checkbox-wrap checkbox-primary">Remember Me
									<input name="remember" value="1" type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="w-50 text-md-right">
								<a href="#" style="color: #fff">Forgot Password</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>

	<?php
	require('partials/footer.php')
	?>