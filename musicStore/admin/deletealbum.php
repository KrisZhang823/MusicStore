<?php
// define variables and set to empty values
$title = $artist = $description = $price = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['album_id'];
}

$db = new PDO('mysql:dbname=musicstore;host=localhost','root','root');

// Query
$query = "UPDATE ALBUMS_TABLE
          SET Is_delete = 'T' 
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

   <label for="name">Please input Album_id to delete it.</label>
    <div class="help-block"></div>
    <input type="text" class="form-control" name="album_id" placeholder="Album_id">
  </div>
  

  <button type="submit" class="btn btn-default">Submit</button>
  </form>



  </div>
</body>
</html>