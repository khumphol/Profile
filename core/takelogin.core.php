<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Bangkok');
require("config.core.php");
require("connect.core.php");
require("logs.core.php");
$loginclass = new clear_db();
$connect = $loginclass->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$check=$loginclass->my_sql_show_rows('user','email="'.htmlentities(addslashes($_POST['username'])).'" OR username="'.htmlentities(addslashes($_POST['username'])).'" AND user_status="1"');
	if($check == 0){
		echo "<script>window.location=\"../index.php?c=nouser\"</script>";
	}else{
		$info=$loginclass->my_sql_select(NULL,'user','email="'.htmlentities(addslashes($_POST['username'])).'" OR username="'.htmlentities(addslashes($_POST['username'])).'"');
		while($getinfo=mysql_fetch_object($info)){			//$getpassword = md5(addslashes($_POST['password']));
			$getpassword = crypt(addslashes($_POST['password']),$getinfo->password);
			if($getinfo->password != $getpassword){
				echo "<script>window.location=\"../index.php?c=nouser\"</script>";
			}else{
				
				
				$_SESSION['uname'] = $getinfo->username;
				$_SESSION['uclass'] = $getinfo->user_class;
				$_SESSION['lang'] = $getinfo->user_language;
				$_SESSION['ukey'] = $getinfo->user_key;
				$_SESSION['rr'] = rand();
				insertLogs($getinfo->username." เข้าสู่ระบบ.",$_SERVER['REMOTE_ADDR'],$getinfo->user_key);
				if($getinfo->user_class != 1){
					echo "<script>window.location=\"../dashboard/\"</script>";
				}else{
					echo "<script>window.location=\"../dashboard/\"</script>";
				}
				
			}
		}
	}
$loginclass->my_sql_close();
?>
