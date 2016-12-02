<?php

session_start();
// Create connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$db     = 'musicstore';
// Create connection
$conn   =  mysqli_connect($dbhost, $dbuser, $dbpass,$db);

//Check connection
if (!$conn) {
	die("Connection Failed: " . $conn->connect_error);
}

$type 	  = $_POST["type"];
$username = $_POST["username"];
$password = $_POST["password"];

if ($type == "check") {
	# code...
	$sql = "SELECT * from user_table 
	where username = '{$username}'";
	$results = mysqli_query($conn,$sql);
	$rows = array();
	while ($row = mysqli_fetch_assoc($results)) {
		$rows[] = $row;
	}
	if (count($rows) == 0){
		echo "valid";
	}else{
		echo "invalid";
	}

}else if ($type == "register") {
	# code...
	$sql = "SELECT * from user_table 
	where username = ". $username ." ";
	$results = mysqli_query($conn,$sql);
	$rows = array();
	if (mysqli_num_rows(results) == 0){
		$sql = "INSERT into user_table (username,password) VALUES ('{$username}','{$password}')";
		if (mysqli_query($conn, $sql)) {
   			echo "New User created successfully!";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else{
		echo "invalid";
	}
}else{
	$sql = "SELECT * from user_table 
	where username = '{$username}' and password = '{$password}'";

	$results = mysqli_query($conn,$sql);

	$id = mysqli_fetch_assoc($results);

	if (count($id) != 0){
		$_SESSION['username'] = $id['USERNAME'];
		$_SESSION['user_id'] = $id['USER_ID'];

		if ($id['USERNAME'] == "admin"){
			echo "admin";
		}else{
			echo "user";
		}
	}else{
		echo "invalid";
	}

}

$conn->close();

?>