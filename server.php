<?php
session_start();

$firstName = "";
$lastName = "";
$email    = "";
$errors = array();
$errors2 = array();

$HOST = 'localhost';
$USER = 'root';
$PASSWORD = '';
$DATABASE = 'blog';

$db = mysqli_connect($HOST, $USER, $PASSWORD, $DATABASE);

// if(!$db){
//     die("Connection failed: " . mysqli_connect_error());
// }

// echo "Connected successfully";

if(isset($_POST['reg_user'])) {
    $firstName = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    if (empty($firstName)) { array_push($errors, "firstName is required"); }
    if (empty($lastName)) { array_push($errors, "lastName is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }

    // $query=mysql_query("SELECT * FROM register WHERE email);

    // $row=mysql_fetch_assoc($query);
    // $num=mysql_num_rows();

    // if($num==1)
    // {
    //     session_start(); 
    //     $_SESSION['user_id']= $row['id'];
    // }



$user_check_query = "SELECT * FROM register WHERE firstName	='$firstName' AND lastName ='$lastName' OR email='$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
  if ($user['firstName'] === $firstName) {
    array_push($errors, "this name already exists");
  }

  if ($user['lastName'] === $lastName) {
    array_push($errors, "this name already exists");
  }

  if ($user['email'] === $email) {
    array_push($errors, "email already exists");
  }
}

if (count($errors) == 0) {
    $password = sha1($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO register (firstName, lastName, email, password) 
              VALUES('$firstName', '$lastName', '$email', '$password')";
    mysqli_query($db, $query);

    $_SESSION['email'] = $email;
    $_SESSION['success'] = "You are now logged in";

    // header('location: index.php');
    }
}

//  LOGIN

if(isset($_POST['login_user'])){
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors2, "email is required");
  }
  if (empty($password)) {
  	array_push($errors2, "Password is required");
  }

  if (count($errors2) == 0) {
  	$password = sha1($password);
  	$query = "SELECT * FROM register WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
      $_SESSION['success'] = "You are now logged in";

  	  header('location: index.php');
  	}else {
  		array_push($errors2, "Wrong email/password");
  	}
  }
}
