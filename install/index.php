<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
error_reporting(0);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Profile Installation</title>
</head>
<style type="text/css">
html{
    background: url('bg/bg.jpg') no-repeat center center fixed;
     webkit-background-size: cover;
        moz-background-size: cover;
        o-background-size: cover;
        background-size: cover ;
    filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='bg/bg.jpg',     sizingMethod='scale');
    -ms-filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='bg/bg.jpg', sizingMethod='scale');
}
.box_install{
	margin-top:100px;
}
.step_unactive{
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;
	border:2px solid #666;
	color:#666;
	background:#ccc;
	width:40px;
	height:40px;
	text-align:center;
	display:inline-block;
	line-height:35px;
	vertical-align:middle;
	font-size:16px;
	font-weight:bold;
	margin-bottom:10px;
	margin-top:10px;
}
.step_detail_unactive{
	display:inline-block;
	line-height:30px;
	vertical-align:middle;
	font-size:16px;
	font-weight:bold;
	color:#666;
	border-bottom:2px solid #666;
	padding-left:50px;
	padding-right:50px;
	padding-top:10px;
	margin-top:-40px;
}
.step_detail_active{
	display:inline-block;
	line-height:30px;
	vertical-align:middle;
	font-size:16px;
	font-weight:bold;
	color:#6EC038;
	border-bottom:2px solid #6EC038;
	padding-left:50px;
	padding-right:50px;
	padding-top:10px;
	margin-top:-40px;
}
.step_active{
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;
	border:2px solid #6EC038;
	background:#CFE4B6;
	color:#6EC038;
	width:40px;
	height:40px;
	text-align:center;
	display:inline-block;
	line-height:35px;
	vertical-align:middle;
	font-size:16px;
	font-weight:bold;
	margin-bottom:10px;
	margin-top:10px;
	
	
}
.txt_copyright{
	padding-top:5px;
	font-size:14px;
	color:#999;
}
</style>
 <?php
if(@addslashes($_GET['lang'])){
    @$_SESSION['lang'] = addslashes($_GET['lang']);
}else{
    @$_SESSION['lang'] = $_SESSION['lang'];
}
if(@$_SESSION['lang']!=NULL){
    require("../language/".@$_SESSION['lang']."/install.lang");
    
   
}else{
    require("../language/th/install.lang");
    $_SESSION['lang'] = 'th';
   

}
?>
<!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<body>
<?php
require("../core/config.core.php");
@$connect = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD,true);
if(@mysql_select_db(DB_NAME,$connect)){
	if(addslashes($_GET['s']) == NULL || addslashes($_GET['s']) == '1' || addslashes($_GET['s']) == '2'){
		echo '<script>window.location="../index.php";</script>';
	}
}

if(isset($_POST['save_database'])){
	@$connect = mysql_connect(addslashes($_POST['host_name']), addslashes($_POST['user_name']), addslashes($_POST['password']),true);
	if(!@$connect){
		$alert='<div class="alert alert-danger alert-dismissable">'.@LA_IS_ALERT_CANT_CONNECT_DB.'</div>';
	}else{
$myfile = fopen("../core/config.core.php", "w") or die(@LA_LB_CANT_OPEN_FILE);
$txt = "<?php 
// MySQL hostname
define('DB_HOST', '".addslashes($_POST['host_name'])."');

// MySQL database username
define('DB_USERNAME', '".addslashes($_POST['user_name'])."');

// MySQL database password
define('DB_PASSWORD', '".addslashes($_POST['password'])."');

// MySQL database name
define('DB_NAME', '".addslashes($_POST['db_name'])."'); 
?>";
fwrite($myfile, $txt);
fclose($myfile);

if(!mysql_select_db(addslashes($_POST['db_name']),$connect) ){
	mysql_query("CREATE DATABASE ".addslashes($_POST['db_name']));
	//$alert='<div class="alert alert-danger alert-dismissable">ไม่สามารถเชื่อมต่อฐานข้อมูลได้ กรุณาระบุข้อมูลอีกครั้ง !</div>';
	require("../core/mysql_restore.core.php");
	require("../core/config.core.php");
	$restore_obj = new MySQL_Restore();
	$restore_obj->server = DB_HOST;
	$restore_obj->username = DB_USERNAME;
	$restore_obj->password = DB_PASSWORD;
	$restore_obj->database = DB_NAME;
	if (!$restore_obj->Execute('dump/profile.dump',MSR_FILE, false, false))
	{
		die($restore_obj->error);
		
	}
		
}else{
	require("../core/mysql_restore.core.php");
	require("../core/config.core.php");
	$restore_obj = new MySQL_Restore();
	$restore_obj->server = DB_HOST;
	$restore_obj->username = DB_USERNAME;
	$restore_obj->password = DB_PASSWORD;
	$restore_obj->database = DB_NAME;
	if (!$restore_obj->Execute('dump/profile.dump',MSR_FILE, false, false))
	{
		die($restore_obj->error);
	}
		
}
echo '<script>window.location="?s=3";</script>';
	}
}
if(isset($_POST['save_username'])){
	if(addslashes($_POST['name']) != NULL && addslashes($_POST['lastname']) != NULL && addslashes($_POST['username']) != NULL && addslashes($_POST['password']) != NULL){
		require("../core/config.core.php");
		require("../core/connect.core.php");
		
		$getdata = new clear_db();
		$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
		$getdata->my_sql_set_utf8();
		$uk = md5(addslashes($_POST['username']).time("now"));
		$cost = 8;
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
		$salt = sprintf("$2a$%02d$", $cost) . $salt;
		$hash = crypt(addslashes($_POST['password']), $salt);
		$getdata->my_sql_insert("user","user_key='".$uk."',name='".addslashes($_POST['name'])."',lastname='".addslashes($_POST['lastname'])."',username='".addslashes($_POST['username'])."',password='".$hash."',user_class='2',email='".addslashes($_POST['email'])."',user_status='1'");
		$getdata->my_sql_insert("access_user","access_key='0a3c8aabc6cdbce67a157ba1701b3fa9',user_key='".$uk."',access_status='1'");
		$getdata->my_sql_insert("access_user","access_key='295744c466c17b46170f88b5c1b9104d',user_key='".$uk."',access_status='1'");
		$getdata->my_sql_insert("access_user","access_key='7fea6fea61143d1fcb188f3080ecc446',user_key='".$uk."',access_status='1'");
		$getdata->my_sql_insert("access_user","access_key='f1344bc0fb9c5594fa0e3d3f37a56957',user_key='".$uk."',access_status='1'");
		echo '<script>window.location="?s=4";</script>';
	}else{
		$alert='<div class="alert alert-danger alert-dismissable">'.@LA_IS_ALERT_DATA_IS_WRONG_TRY_AGAIN.'</div>';
	}
}

?>
<div class="col-lg-10 col-md-offset-1 box_install" >
  <form id="form1" name="form1" method="post">
  <div class="panel panel-default ">
                        <div class="panel-heading">
                        <img src="../media/logo/logo.png" width="150" alt=""/> </div>
                        <div class="panel-body">
                          
                          <?php
						  switch(@addslashes($_GET['s'])){
							case "1" :  require("step/step1.php");
							  $btn = '<a class="btn btn-success" href="?s=2" ><i class="fa fa-check-square-o fa-fw"></i> '.@LA_IS_NEXT.'</a>';
							  break;
							   case "2" :require("step/step2.php");
							    $btn = '<button type="submit" class="btn btn-success" name="save_database"><i class="fa fa-arrow-circle-o-right fa-fw"></i> '.@LA_IS_NEXT.'</button>';
							  break;
							   case "3" :require("step/step3.php");
							    $btn = '<button type="submit" class="btn btn-success" name="save_username" ><i class="fa fa-arrow-circle-o-right fa-fw"></i> '.@LA_IS_NEXT.'</button>';
							  break;
							   case "4" : require("step/step4.php");
							     $btn = '<a class="btn btn-success" href="../index.php" ><i class="fa fa-check-square-o fa-fw"></i> '.@LA_IS_FINISH.'</a>';
							  break;
							 
							  default :  require("step/step1.php");
							   $btn = '<a class="btn btn-success" href="?s=2" ><i class="fa fa-check-square-o fa-fw"></i> '.@LA_IS_NEXT.'</a>';
						  }
						  ?>
                        </div>
                        <div class="panel-footer text-right">
                        
                         <span class="pull-left text-left txt_copyright">&copy;&nbsp;<?php echo @(date("Y") == "2017")? date("Y") : '2017 - '.date("Y");?>&nbsp;Profile&nbsp;By&nbsp;Nattarin</span> <?php echo @$btn;?>
                        </div>
    </div>
  </form>
</div>  
</body>
</html>