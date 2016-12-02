<?php
// define variables and set to empty values
$title = $artist = $description = $price = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['album_id'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $description = $_POST['description'];
    $price = number_format($_POST['price'], 2, ".", "");
    $inventory = (int)$_POST['inventory'];

}

$db = new PDO('mysql:dbname=musicstore;host=localhost','root','root');

// Query
$query = "UPDATE ALBUMS_TABLE
          SET Title = '{$title}', Artist = '{$artist}', Description = '{$description}', Price = {$price}, Inventory = {$inventory}
          WHERE Album_id = {$id}";


$albums = $db->prepare($query);

$albums->execute();

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
  <script src="js/admin.js">
  </script>
  <title>Admin Page</title>
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
  <a href="../admin.php" class="btn btn-default">Back to Admin Page</a>
  <div class="help-block"></div>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">  
  
  <div class="form-group">

   <label for="name">Please input all fields to update Album.</label>
    <div class="help-block"></div>
    <input type="text" class="form-control" name="album_id" placeholder="Album_id">
 
    <div class="help-block"></div>
    <input type="text" class="form-control" name="title" placeholder="Title">

    <div class="help-block"></div>
    <input type="text" class="form-control" name="artist" placeholder="Artist">

    <div class="help-block"></div>
    <input type="text" class="form-control" name="description" placeholder="Description">

    <div class="help-block"></div>
    <input type="text" class="form-control" name="price" placeholder="8.99">

        <div class="help-block"></div>
    <input type="text" class="form-control" name="inventory" placeholder="Inventory: 3">

  

    </div>
  

  <button type="submit" class="btn btn-default">Submit</button>
  </form>



  </div>
</body>
</html>