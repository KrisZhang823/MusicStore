<?php


$db = new PDO('mysql:dbname=musicstore;host=localhost','root','root');

// Query
$albums = $db->prepare("
  SELECT *
  FROM albums_table 
");

$albums->execute();

$albums = $albums->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($albums);

?>