<?php
    require('partials/header.php');

    if(!empty($_POST)) {
      $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('" . $_POST['name'] . 
      "', '" . $_POST['email'] . "', '" . $_POST['password'] . "');";
      
       if (mysqli_query($conn, $sql)) {
           echo "New record created successfully";
           header("Location:/");
       } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn); 
   }


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
		      	<h3 class="mb-4 text-center">Please register</h3>
		      	<form action="#" method="POST" class="signin-form">
		      		<div class="form-group">
		      			<input type="text" name="name" class="form-control" placeholder="Username" required="">
		      		</div>
              <div class="form-group">
		      			<input type="email" name="email" class="form-control" placeholder="Email" required="">
		      		</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required="">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked="">
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