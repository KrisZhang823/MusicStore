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
      <div class="btn-group btn-group-justified">

    <a href="admin/addnew.php" class="btn btn-default">Add New item</a>
    <a href="admin/deletealbum.php" class="btn btn-default" id="delete">Delete item</a>
    <a href="admin/updatealbum.php" class="btn btn-default">Update item</a>
    </div>
   
    <div class="help-block"></div>

    <div id='addnew'>
    </div>

    <div class="help-block"></div>


    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
        Albums List
      </div>
      <table class="table" id="lists">
      </table>
    </div>


  </div>
</body>
</html>