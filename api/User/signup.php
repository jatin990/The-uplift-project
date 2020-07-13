<?php
 
// get database connection
include_once '../../config/db.php';
 
// instantiate user object
include_once '../../models/user.php';
 
$database = new Database();
$db = $database->connect();
// die($db);

$user = new User($db);
 
// set user property values
$user->username = $_POST['username'];
$user->password = md5($_POST['password']);
$user->created = date('Y-m-d H:i:s');
 
// create the user
if($user->signup()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $user->id,
        "username" => $user->username
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}
print_r(json_encode($user_arr));
?>