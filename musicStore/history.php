
 <?php
/* AJAX check  */
	session_start();
    // define variables and set to empty values
	$user_id = $_SESSION['user_id'];
	
	$db = new PDO('mysql:dbname=musicstore;host=localhost','root','root');
	$query = "SELECT A.Album_id,A.Artist,A.Title,A.PRICE,P.PURCHASE_DATE FROM PURCHASE_TABLE P 
			JOIN ALBUMS_TABLE A
			ON A.Album_id = P.Album_id
			WHERE P.USER_ID = {$user_id} ;";
	$history = $db->prepare($query);
	$history->execute();
	// $history = $history->fetchAll(POO:FETCH_ASSOC);

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
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">
				Purchase History
			</div><!-- Table -->
			<table class="table">
				<tr>
					<th>Product id</th>
					<th>Artist</th>
					<th>Title</th>
					<th>Price</th>
					<th>PURCHASE_DATE</th>

				</tr>
				<tr>
				<?php foreach ($history as $album): ?>
					<td><?php echo $album['Album_id']; ?></td>
					<td><?php echo $album['Artist']; ?></td>
					<td><?php echo $album['Title']; ?></td>
					<td><?php echo $album['PRICE']; ?></td>
					<td><?php echo $album['PURCHASE_DATE']; ?></td>
				</tr>
				<?php endforeach; ?>

			</table>
		</div>
		<div class="pull-right">
			<button onclick="window.location.href='list.php'" class="btn btn-secondary btn-lg" type="button">Continue Shopping</button> 
		</div>
	</div>


</body>
</html>
