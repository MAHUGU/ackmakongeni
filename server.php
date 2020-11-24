<?php
session_start();

// initializing variables
$name = "";
//$id   = "";
$gender = "";
  $phone_no = "";
  $residence = "";
  $kin = "";
  $kin_no = "";
$errors = array(); 
$_SESSION['success'] = "";
// connect to the local database
//$db = mysqli_connect('localhost', 'root', '', 'ack_st_lukes');
// connect to the remote database
$db = mysqli_connect('remotemysql.com', 'yovFvby7PA', 'yYB0XGBXBX', 'yovFvby7PA');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
 // $id = mysqli_real_escape_string($db, $_POST['id']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $phone_no = mysqli_real_escape_string($db, $_POST['phone_no']);
  $residence = mysqli_real_escape_string($db, $_POST['residence']);
  $kin = mysqli_real_escape_string($db, $_POST['kin']);
  $kin_no = mysqli_real_escape_string($db, $_POST['kin_no']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
//  if (empty($id)) { array_push($errors, "ID is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($phone_no)) { array_push($errors, "Phone No is required"); }
  if (empty($residence)) { array_push($errors, "Residence is required"); }
  if (empty($kin)) { array_push($errors, "Next of Kin is required"); }
  if (empty($kin_no)) { array_push($errors, "Next of Kin No is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  //check the last entry in the database and pich the ID
  $user_check = "SELECT * FROM user order by id DESC LIMIT 1";
  $result = mysqli_query($db, $user_check);
  $usr = mysqli_fetch_assoc($result);
  if ($usr) { // if user exists
    $usr_id = sprintf( '%06d', $usr["id"] + 1);
  }
  else{
    $usr_id = sprintf( '%06d', 1);
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE id='$usr_id' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    
      array_push($errors, "ID already exists");

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (name, id, password, gender, phone_no, residence, kin, kin_no) 
  			  VALUES('$name', '$usr_id', '$password', '$gender', '$phone_no', '$residence', '$kin', '$kin_no')";
  	mysqli_query($db, $query);
    $mesg = "You are now registered";
  	$_SESSION['usr_id'] = $usr_id;
  	$_SESSION['success'] = $mesg;
  	header('location: index.php');
  }
}

//Admin register
if (isset($_POST['reg_user2'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
 // $id = mysqli_real_escape_string($db, $_POST['id']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $phone_no = mysqli_real_escape_string($db, $_POST['phone_no']);
  $residence = mysqli_real_escape_string($db, $_POST['residence']);
  $kin = mysqli_real_escape_string($db, $_POST['kin']);
  $kin_no = mysqli_real_escape_string($db, $_POST['kin_no']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
//  if (empty($id)) { array_push($errors, "ID is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($phone_no)) { array_push($errors, "Phone No is required"); }
  if (empty($residence)) { array_push($errors, "Residence is required"); }
  if (empty($kin)) { array_push($errors, "Next of Kin is required"); }
  if (empty($kin_no)) { array_push($errors, "Next of Kin No is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }
  //check the last entry in the database and pich the ID
  $user_check = "SELECT * FROM user order by id DESC LIMIT 1";
  $result = mysqli_query($db, $user_check);
  $usr = mysqli_fetch_assoc($result);
  if ($usr) { // if user exists
    $usr_id = sprintf( '%06d', $usr["id"] + 1);
  }
  else{
    $usr_id = sprintf( '%06d', 1);
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE id='$usr_id' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    
      array_push($errors, "ID already exists");

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO user (name, id, password, gender, phone_no, residence, kin, kin_no) 
          VALUES('$name', '$usr_id', '$password', '$gender', '$phone_no', '$residence', '$kin', '$kin_no')";
    mysqli_query($db, $query);
    $_SESSION['usr_id'] = $usr_id;
    $_SESSION['success'] = "Successifully registered";
    header('location: profile.php');
  }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($id)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $pass = md5($password);
    $query = "SELECT * FROM user WHERE id='$id' AND password='$pass'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1) {
    	if($row['role'] == 'admin'){
        
    		$_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
		    $_SESSION['msg'] = "You are now logged in";
		    header('location: search.php');
    	}
    	else {
		    $_SESSION['name'] = $row['name'];
		    $_SESSION['id'] = $id;
		    $_SESSION['success'] = "You are now logged in";
		    header('location: attendance.php');
		}
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

//APDATE ATTENDANCE
if (isset($_POST['attendance'])) {
  $temperature = mysqli_real_escape_string($db, $_POST['temperature']);
  $service = mysqli_real_escape_string($db, $_POST['service']);
  date_default_timezone_set('Africa/Nairobi');
  $cr_date = date('Y/m/d');
  $user_id = $_SESSION['id'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($temperature)) { array_push($errors, "Temperature is required"); }
  if ($temperature < 33 or $temperature > 39) { array_push($errors, "Temperature Not Moderate!!"); }
  if (empty($service)) { array_push($errors, "Service is required"); }
  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $query = "INSERT INTO attendance (user_id, temperature, service, cr_date) 
          VALUES('$user_id', '$temperature', '$service', '$cr_date')";
    mysqli_query($db, $query);
    $_SESSION['service'] = $service;
    $_SESSION['success'] = "Welcome to the service";
    header('location: home.php');
  }
}

//admin entering member's details
  if (isset($_POST['attendance2'])) {
      $temperature = mysqli_real_escape_string($db, $_POST['temperature']);
      $service = mysqli_real_escape_string($db, $_POST['service']);
      $p_id = mysqli_real_escape_string($db, $_POST['id']);
      date_default_timezone_set('Africa/Nairobi');
      $cr_date = date('Y/m/d');
      

      // form validation: ensure that the form is correctly filled ...
      // by adding (array_push()) corresponding error unto $errors array
      if (empty($temperature)) { array_push($errors, "Temperature is required"); }
      if (empty($service)) { array_push($errors, "Service is required"); }
      

      // Finally, register user if there are no errors in the form
      if (count($errors) == 0) {
        $query = "INSERT INTO attendance (user_id, temperature, service, cr_date) 
              VALUES('$p_id', '$temperature', '$service', '$cr_date')";
        mysqli_query($db, $query);
        $_SESSION['success'] = "Successifully saved";
        header('location: search.php');
      }
}

?>
