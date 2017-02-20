
<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-user fa-fw"></i> <?php echo @LA_LB_SYSTEM_USER;?></h1>
     </div>        
</div>
<ol class="breadcrumb">
<li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
   <li><a href="?p=setting">ตั้งค่า</a></li>
  <li class="active"><?php echo @LA_LB_SYSTEM_USER;?></li>
</ol>
<?php
$cost = 8;
$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
$salt = sprintf("$2a$%02d$", $cost) . $salt;
if(isset($_POST['save_user'])){
	if(addslashes($_POST['username']) != NULL && addslashes($_POST['password']) != NULL && addslashes($_POST['repassword']) != NULL){
		$getuser =$getdata->my_sql_show_rows("user","username='".addslashes($_POST['username'])."' OR email='".addslashes($_POST['email'])."'");
		if($getuser == 0){
			if(addslashes($_POST['password']) == addslashes($_POST['repassword'])){
				$user_key=md5(addslashes($_POST['username']).time("now"));
				$hash = crypt(addslashes($_POST['password']), $salt);
				$getdata->my_sql_insert("user","user_key='".$user_key."',name='".addslashes($_POST['name'])."',lastname='".addslashes($_POST['lastname'])."',username='".addslashes($_POST['username'])."',password='".$hash."',email='".addslashes($_POST['email'])."',user_class='3',user_status='".addslashes($_REQUEST['user_status'])."'");
				$alert = '  <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_INSERT_USER_DONE.'</div>';
			}else{
				$alert = ' <div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_PASSWORD_MISMATCH.'</div>';
			}
		}else{
			$alert = ' <div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_USERNAME_UNAVAILABLE.'</div>';
		}
	}else{
		$alert = ' <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_DATA_MISMATCH.'</div>'; 
	}
}
if(isset($_POST['edit_user_info'])){
		 if(addslashes($_POST['edit_password']) != NULL && addslashes($_POST['edit_repassword']) != NULL){
			 if(addslashes($_POST['edit_password']) == addslashes($_POST['edit_repassword'])){
				 $newpassx = crypt(addslashes($_POST['edit_password']), $salt);
				 $getdata->my_sql_update("user","name='".addslashes($_POST['edit_name'])."',lastname='".addslashes($_POST['edit_lastname'])."',password='".$newpassx."',email='".addslashes($_POST['edit_email'])."'","user_key='".addslashes($_POST['user_key'])."'");
				   $alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>แก้ไขข้อมูลผู้ใช้งาน สำเร็จ</div>';
			 }else{
				  $alert = '  <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_PASSWORD_MISMATCH.'</div>';
			 }
			
		 }else{
			 $getdata->my_sql_update("user","name='".addslashes($_POST['edit_name'])."',lastname='".addslashes($_POST['edit_lastname'])."',email='".addslashes($_POST['edit_email'])."'","user_key='".addslashes($_POST['user_key'])."'");
			  $alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>แก้ไขข้อมูลผู้ใช้งาน สำเร็จ</div>';
		 }
	 }
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><form method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo @LA_LB_INSERT_USER_DATA;?></h4>
                                        </div>
                                        <div class="modal-body">
                                           <div class="form-group">
                                             <label for="name"><?php echo @LA_LB_NAME;?></label>
                                             <input type="text" name="name" id="name" class="form-control">
                                          </div>
                                           <div class="form-group">
                                            <label for="lastname"><?php echo @LA_LB_LASTNAME;?></label>
                                             <input type="text" name="lastname" id="lastname" class="form-control">
                                          </div>
                                           <div class="form-group">
                                            <label for="username"><?php echo @LA_LB_USERNAME;?></label>
                                             <input type="text" name="username" id="username" class="form-control">
                                          </div>
                                           <div class="form-group">
                                            <label for="password"><?php echo @LA_LB_PASSWORD;?></label>
                                             <input type="password" name="password" id="password" class="form-control">
                                          </div>
                                           <div class="form-group">
                                            <label for="repassword"><?php echo @LA_LB_PASSWORD_AGAIN;?></label>
                                             <input type="password" name="repassword" id="repassword" class="form-control">
                                          </div>
                                            <div class="form-group">
                                            <label for="email"><?php echo @LA_LB_EMAIL;?></label>
                                             <input type="email" name="email" id="email" class="form-control">
                                          </div>
                                           <div class="form-group">
                                             <label for="user_status"><?php echo @LA_LB_STATUS;?></label>
                                             <select name="user_status" id="user_status" class="form-control">
                                               <option value="1" selected="selected"><?php echo @LA_BTN_SHOW;?></option>
                                               <option value="0"><?php echo @LA_BTN_HIDE;?></option>
                                             </select>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i><?php echo @LA_BTN_CLOSE;?></button>
                                          <button type="submit" name="save_user" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                </form>
                                <!-- /.modal-dialog -->
</div>
                            <!-- /.modal -->
                            <!-- Modal Edit -->
<div class="modal fade" id="edit_user_x" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <form id="form2" name="form2" method="post">
     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">ปิด</span></button>
                    <h4 class="modal-title" id="memberModalLabel">แก้ไขข้อมูลผู้ใช้งาน</h4>
                </div>
                <div class="ct">
              
                </div>
            </div>
        </div>
  </form>
</div>

  <?php
  echo @$alert;
  ?>


                            <div class="panel panel-yellow">
  <!-- Default panel contents -->
  <div class="panel-heading">ชื่อผู้ใช้งานทั้งหมด<span class="pull-right" style="margin-top:-5px; margin-right:-8px;"><a class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-fw"></i> <?php echo @LA_LB_NEW_USER;?></a></span></div>
                                   <div class="table-responsive">
  <table width="100%" border="0" class="table table-bordered table-hover">
  <thead>
  <tr style="color:#FFF">
    <th width="3%" align="center" bgcolor="#888888">#</th>
    <th width="8%" align="center" bgcolor="#888888"><?php echo @LA_LB_PHOTO;?></th>
    <th width="30%" align="center" bgcolor="#888888"><?php echo @LA_LB_NAME;?></th>
    <th width="27%" align="center" bgcolor="#888888"><?php echo @LA_LB_USERNAME;?></th>
    <th width="32%" align="center" bgcolor="#888888"><?php echo @LA_LB_MANAGE;?></th>
  </tr>
  </thead>
  <tbody>
   <?php
   $l=0;
	   $getalluser  = $getdata->my_sql_select(NULL,"user","user_key <> 'c37d695c6f1144abdefa8890a921b8fb' ORDER BY username");
	   while($showalluser = mysql_fetch_object($getalluser)){
		   $l++;
		   $getonline = $getdata->my_sql_show_rows("user_online","user_key='".$showalluser->user_key."'");
		   if($getonline != 0){
			   $color = 'color:#0C0;';
		   }else{
			   $color = 'color:#CCC;';
		   }
	   ?>
  <tr id="<?php echo @$showalluser->user_key;?>">
    <td align="center"><?php echo @$l;?></td>
    <td align="center"><div class="box_img_cycle3"><img src="../resource/users/thumbs/<?php echo @$showalluser->user_photo;?>" <?php echo getPhotoSize('../resource/users/thumbs/'.@$showalluser->user_photo.'');?> id="img_cycle3" alt=""/></div></td>
    <td>&nbsp;<span style="font-size:12px; <?php echo $color;?>"><i class="fa fa-circle fa-fw"></i></span>&nbsp;<?php echo @$showalluser->name."&nbsp;&nbsp;&nbsp;".$showalluser->lastname;?></td>
    <td align="center"><?php echo @$showalluser->username;?></td>
    <td align="center"><a href="?p=setting_user_access&key=<?php echo @$showalluser->user_key;?>" class="btn btn-default btn-xs " ><i class="fa fa-gear fa-fw"></i><?php echo @LA_BTN_ACCESS;?></a> Demo Only</td>
  </tr>
   <?php
	   }
   ?>
   </tbody>
</table>
		</div>
        </div>
                         

<script language="javascript">

function changeUserStatus(userkey){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var es = document.getElementById('btn-'+userkey);
	if(es.className == 'btn btn-success btn-xs'){
		var sts= 1;
	}else{
		var sts= 0;
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			
			if(es.className == 'btn btn-success btn-xs'){
				document.getElementById('btn-'+userkey).className = 'btn btn-danger btn-xs';
				document.getElementById('icon-'+userkey).className = 'fa fa-lock';
				document.getElementById('text-'+userkey).innerHTML = 'ซ่อน';
			}else{
				document.getElementById('btn-'+userkey).className = 'btn btn-success btn-xs';
				document.getElementById('icon-'+userkey).className = 'fa fa-unlock-alt';
				document.getElementById('text-'+userkey).innerHTML = 'แสดง';
			}
  		}
	}
	
	xmlhttp.open("GET","function.php?type=change_user_status&key="+userkey+"&sts="+sts,true);
	xmlhttp.send();
}
	function deleteUser(userkey){
		if(confirm("คุณต้องการลบข้อมูลผู้ใช้งานท่านนนี้ ใช่หรือไม่ ?")){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById(userkey).innerHTML = '';
  		}
	}
	xmlhttp.open("GET","function.php?type=delete_user&key="+userkey,true);
	xmlhttp.send();
		}
}

    $('#edit_user_x').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "settings/edit_user.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
   
</script>
