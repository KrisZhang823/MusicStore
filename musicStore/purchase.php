
 <?php
/* AJAX check  */
	session_start();
    // define variables and set to empty values
	$selfUrl = $_SERVER['PHP_SELF'];
	$purchasedItems = $_SESSION['purchasedItems'];

	if(isset($_POST['submit'])){
		$user_id = $_SESSION['user_id'];
	
		$db = new PDO('mysql:dbname=musicstore;host=localhost','root','root');
		
		foreach ($purchasedItems as $album):
			$album_id = $album['album_id'];
			// Query
			$query = "UPDATE albums_table set Inventory = Inventory-1 where album_id = {$album_id} ";
			$purchased = $db->prepare($query);
			$purchased->execute();
			
			$query = "INSERT INTO purchase_table values ({$user_id},{$album_id},NOW())";
			$purchased = $db->prepare($query);
			$purchased->execute();
		endforeach;
		$_SESSION['purchasedItems'] = array();
		$_SESSION['cart'] = array();
		header("Location:/history.php");
		exit();
	}else{
		$price = 0;
		foreach ($purchasedItems as $album):
			$price += $album['price'];
		endforeach;
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
			<div class="col-xs-12 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>

                </div>
                <div class="panel-body">
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form">
						<div class="form-group">
							<label for="Address">
								Billing Address</label>
							<div class="input-group">
								<input type="text" class="form-control" id="cardNumber" placeholder="Enter Billing Address"
									required autofocus/>
								<span class="input-group-addon"><span class="glyphicon glyphicon-address"></span></span>
							</div>
						</div>
						<div class="form-group">
							<label for="cardNumber">
								CARD NUMBER</label>
							<div class="input-group">
								<input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
									required autofocus />
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							</div>
						</div>
					  <!-- Name -->
					  <div class="control-group">
						<label class="control-label"  for="username">CARD HOLDER'S NAME</label>
						<div class="controls">
							 <input type="text" class="form-control" id="cardNumber" placeholder=""
											required  />
						</div>
					  </div>
					  
						<div class="row">
							<div class="col-xs-7 col-md-7">
							<label for="expityMonth">EXPIRY DATE</label>
								<div class="form-group">
									
									<div class="col-xs-6 col-md-6 col-lg-6 pl-ziro">
										<input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
									</div>
									
									<div class="col-xs-6 col-lg-6 pl-ziro">
										<input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
									</div>
							</div>
							<div class="col-xs-5 col-md-5 pull-right">
								<div class="form-group">
									<label for="cvCode">CVV2 CODE</label>
									<input type="password" class="form-control" id="cvCode" placeholder="CVV2" required />
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<ul class="nav nav-pills nav-stacked">
								<li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span><?php echo $price;?></span> Invoice Total</a>
								</li>
							</ul>
						</div>
						
						<div class="form-group">
							<ul class="nav nav-pills nav-stacked">
								<li class="active">
									<input type="submit" name="submit" id="Pay-submit" class="form-control btn btn-success btn-lg-4 btn-block" value="Pay">
								</li>
								
							</ul>
						</div>
                    </form>
                </div>
            </div>
            
            <br/>
            
        </div>
		</div>
	</div>





	</div>
</body>
</html>
