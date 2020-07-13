<?php  
//  require('db_connect.php');
 
// get database connection
include_once '../../config/db.php';
 
// instantiate user object
include_once '../../models/user.php';
 
$database = new Database();
$db = $database->connect();
// die($db);

$user = new User($db);

if (isset($_GET['username']) and isset($_GET['password'])){
	$user->username = $_GET['username'];
	$user->password = md5($_GET['password']);

	if ($user->login()->rowCount()>0){
	//echo "Login Credentials verified";
	echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

	}else{
		header('location:/');
		// echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
	// echo "Invalid Login Credentials";
	}
}
?>