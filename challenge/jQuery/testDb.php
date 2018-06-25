<?php 
//Get tha data form the inpur form
$firstName = (isset($_POST['firstName'])) ? $_POST['firstName'] : 'no first name';
$lastName = (isset($_POST['lastName'])) ? $_POST['lastName'] : 'no last name';

/*$firstName = 'Ivan';
$lastName = 'Zykov';*/

//Establish DB connection and do the query to add data to DB
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'test');

$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($mysqli->connect_error) {
	die('Connectin failed: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
} else {
	echo 'Connection live';
}

$sql = "INSERT INTO author (firstname, lastname)
				VALUES('$firstName', '$lastName')";

$result = $mysqli->real_query($sql);

if ($result) {
	echo 'Data from input fiels inserted into DB';
} else {
	echo 'Something went wrong';
	var_dump($result);
}

if(isset($result)) {
	unset($result);
}
$mysqli->close();
?>