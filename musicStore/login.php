
 <?php
/* AJAX check  */
	session_start();
    // define variables and set to empty values
	$username = $password;
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];
		#$password = password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
	}


	$db = new PDO('mysql:dbname=musicstore;host=localhost','root','root');

	// Query
	$query = "Select user_id,username from user_table where username = '{$username}' and password = '{$password}'";


	$id = $db->prepare($query);

	$id->execute();
	$id = $id->fetchAll(PDO::FETCH_ASSOC);
	if (count($id) == 1){
		if ($id[0]['username'] == "admin"){
			$_SESSION['username'] = $id[0]['username'];
			header("Location:/admin.php");
			exit();
		}else{
			$_SESSION['username'] = $id[0]['username'];
			$_SESSION['user_id'] = $id[0]['user_id'];
			header("Location:/list.php");
			exit();
		}
		
	}else{
		
	}
	
  
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	<script src="https://use.fontawesome.com/c7a1f85735.js">
	</script>
	<script src="js/login.js"></script>

	<title>Kris's Music Store</title>
</head>


<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand">
			<i class="fa fa-music" aria-hidden="true"> Kris's Music Store</i>
		  </a>
		</div>
	  </div>
	</nav>

	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username1" tabindex="1" class="form-control" placeholder="Username" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password1" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="register_username" tabindex="1" class="form-control" placeholder="Username" value="" required>
										<!-- Invalid username -->           
					                    <span id="invalid_username"class="label label-danger" style="display:none">Username already exist</span>
					               

					                    <!-- Valid username -->
					                    <span id = "valid_username"class="label label-success" style="display:none">Username is ok!</span>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="register_password" tabindex="2" class="form-control" placeholder="Password" required>
										<!-- Invalid password -->           
					                    <span id = "invalid_password" class="label label-danger" style="display:none">Password is not Strong enough</span>
					               
					                    <!-- Valid password -->
					                    <span id = "valid_password" class="label label-success" style="display:none">Password is ok!</span>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>





	</div>
</body>
</html>
