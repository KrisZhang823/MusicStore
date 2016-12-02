<?php

$album_title = $_GET['album_title'];

$db = new PDO('mysql:dbname=musicstore;host=localhost','root','root');

$page = isset($_GET['page'])? (int)$_GET['page'] : 1;

$perPage = 6; #6 per page

// Positioning
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0 ;


$query = "
	SELECT SQL_CALC_FOUND_ROWS album_id, title, artist, description, price, imagepath, inventory
	FROM albums_table 
	WHERE Is_Delete = 'F' and title like '%{$album_title}%'
	LIMIT {$start}, {$perPage}
	";

$albums = $db->prepare($query);

$albums->execute();

$albumsRes = $albums->fetchAll(PDO::FETCH_ASSOC);

// Pages
$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total/$perPage);

$result = array("pages"=>$pages,"page" =>$page, "albums"=>$albumsRes);


$jsonData = json_encode($result);
echo $jsonData; 

?>


