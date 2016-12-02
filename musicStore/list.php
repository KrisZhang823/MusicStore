
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
	<title>Kris's Music Store</title>
</head>


<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand"><i aria-hidden="true" class="fa fa-music"> Kris's Music Store</i></a>
			</div>
		</div>
	</nav>


	<div class="container">
		<div class="row">
			<div class="column col-xs-10" id="main">
				<div class="col-sm-8 col-md-4">
					<div class="thumbnail">
						<div class="caption">
							<p class="description"></p>
							<div class="clearfix">
								<div class="price pull-left"></div><a class="btn btn-success pull-right" href="#" role="button">Add to cart</a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- sidebar -->
			<div class="col-sm-2 sidenav">
				
				<div class="well well-sm">
					<h4>Hi, <?php session_start(); echo $_SESSION['username'];?></h4>
				</div>
				<div class="help-block"></div>
				<h4><a href= 'history.php'><p>Purchase history</p></a></h4>
				

			<div class="input-group">
			  <input type="text" class="form-control" placeholder="Album Title" id="searchval">
			  <span class="input-group-btn">
				<button class="btn btn-default" type="button" id = "search">Search</button>
			  </span>
			</div><!-- /input-group -->
			
			<div class="help-block"></div>
					
				
				<div class="dropdown">
					<button aria-expanded="true" aria-haspopup="true" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="dropdownMenu1" type="button">Filter Albums by Artisit <span class="caret"></span></button>
					<ul aria-labelledby="dropdownMenu1" class="dropdown-menu">
						<li>
							<a href="?page=1&artist=jaychou">Jay Chou's Albums</a>
						</li>
						<li>
							<a href="?page=1&artist=desertschang">Deserts Chang's Albums</a>
						</li>
						<li>
							<a href="?page=1">All Albums</a>
						</li>
					</ul>
					

				</div>




			</div>
		</div>
		<div class="pagination pagination-lg">
			<ul class="pagination" id="paging_link"></ul>
		</div>
	</div>

</body>
</html>