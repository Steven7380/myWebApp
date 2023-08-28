<?php
	$sess_name = session_name();
	//High security
	// $arr_cookie_options = array (
  //               'expires' => time() + 60*60*24*30,
  //               'path' => '/',
  //               'domain' => '',
  //               'secure' => true
  //               'httponly' => true,
  //               'samesite' => 'Lax' // None || Lax  || Strict
  //               );
	//Low security
  $arr_cookie_options = array (
								'expires' => time() + 60*60*24*30,
								'path' => '/',
                'domain' => '',
                'secure' => false,
                'httponly' => false,
                'samesite' => 'None' // None || Lax  || Strict
                );
	if (session_start()) {
		  setcookie($sess_name, session_id(), $arr_cookie_options);
	    // setcookie($sess_name, session_id(), null, '/', null, null, true);
	}

	session_start();
	include("connect.php");
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_MD5 = md5($_POST['password']);
	$hash = $_POST['hash'];
	// $username = mysqli_real_escape_string($con ,$_POST['username']);
	// $password = mysqli_real_escape_string($con, $_POST['password']);
	if($hash == 'yes'){
	  $query_string = "SELECT * FROM users WHERE username='$username' AND password=md5('$password')";
	} else {
		$query_string = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	}
	$result = mysqli_query($con, $query_string);
	$rows = mysqli_num_rows($result);
	if($rows)	{
		while($row = mysqli_fetch_assoc($result)) 	{
			$_SESSION['user'] = $username;
			if (empty($_SESSION['token'])) {
			    $_SESSION['token'] = bin2hex(random_bytes(32));
			}
			header("location: home.php");
		}
	}
	else	{
		Print '<script>alert("Incorrect user name or password");</script>';
		Print '<script>window.location.assign("login.php");</script>';
	}
?>
