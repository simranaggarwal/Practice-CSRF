<?php
	session_start();
	require_once('connection.php');
	$errmsg_arr = array();
	$errflag = false;
	$email = $_GET['email'];
	$password = $_GET['password'];
	if($email == '') {
		$errmsg_arr[] = 'E-mail missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}

	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ind.php");
		exit();
	}
 

	$qry="SELECT * FROM profile WHERE email='$email' AND password='$password'";
	$result=mysql_query($qry);
 
	if($result) {
		if(mysql_num_rows($result) > 0) {
			session_regenerate_id();
			$simple_login = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $simple_login['mem_id'];
			$_SESSION['SESS_FIRST_NAME'] = $simple_login['username'];
			$_SESSION['SESS_LAST_NAME'] = $simple_login['password'];
			session_write_close();
			header("location: Userprofile.php");
			exit();
		}else {
			$errmsg_arr[] = 'E-mail and password not found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: ind.php");
				exit();
			}
		}
	}else {
		die("Query failed");
	}
?>