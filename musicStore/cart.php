<?php

session_start();

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
} 

array_push($_SESSION['cart'], $_GET['id']);


$db = new PDO('mysql:dbname=musicstore;host=localhost','root','root');

$whereIn = implode(',',$_SESSION['cart']);

$query = "	
	SELECT album_id, title, price
	FROM albums_table 
	WHERE album_id in ({$whereIn})
	AND Is_Delete = 0;
";


$purchased = $db->prepare($query);

$purchased->execute();

$purchasedItems = $purchased->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['purchasedItems'] = $purchasedItems;

// know what's inside cart
// var_dump($_SESSION['cart']);
// echo(count($purchasedItems));
// echo($query);
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
	<script src="js/list.js">
	</script>
	<script src="js/jquery.bootpag.min.js">
	</script>
	<title>Shopping Cart</title>
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
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">
				Shopping Cart
			</div><!-- Table -->
			<table class="table">
				<tr>
					<th>Product id</th>
					<th>Product name</th>
					<th>Price</th>
				</tr>
				<tr>
				<?php foreach ($purchasedItems as $album): ?>
					<td><?php echo $album['album_id']; ?></td>
					<td><?php echo $album['title']; ?></td>
					<td><?php echo $album['price']; ?></td>
				</tr>
				<?php endforeach; ?>

			</table>
		</div>
		<div class="pull-right">
			<button onclick="window.location.href='list.php'" class="btn btn-secondary btn-lg" type="button">Continue Shopping</button> 


			<button onclick="window.location.href='purchase.php'" class="btn btn-primary btn-lg" type="button">Check Out</button>
		</div>
	</div>
</body>
</html>