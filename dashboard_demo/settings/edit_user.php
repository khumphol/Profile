<?php
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();

if(@addslashes($_GET['lang'])){
	$_SESSION['lang'] = addslashes($_GET['lang']);
}else{
	$_SESSION['lang'] = $_SESSION['lang'];
}
if(@$_SESSION['lang']!=NULL){
	require("../../language/".@$_SESSION['lang']."/site.lang");
	require("../../language/".@$_SESSION['lang']."/menu.lang");
}else{
	require("../../language/th/site.lang");
	require("../../language/th/menu.lang");
	$_SESSION['lang'] = 'th';

}
 $getuser_detail = $getdata->my_sql_query(NULL,"user","user_key='".addslashes($_GET['key'])."'");
?>
 <div class="modal-body"> 
 <input type="hidden" name="user_key" id="user_key" value="<?php echo @$getuser_detail->user_key;?>">
<div class="form-group"><label for="edit_username"><?php echo @LA_LB_USERNAME;?></label><input name="edit_username" type="text" disabled="disabled" id="edit_username" value="<?php echo @$getuser_detail->username;?>" class="form-control"></div>
 <div class="form-group"><label for="edit_name"><?php echo @LA_LB_NAME;?></label><input type="text" name="edit_name" id="edit_name" class="form-control" value="<?php echo @$getuser_detail->name;?>"></div>
 <div class="form-group"><label for="edit_lastname"><?php echo @LA_LB_LASTNAME;?></label><input type="text" name="edit_lastname" id="edit_lastname" class="form-control" value="<?php echo @$getuser_detail->lastname;?>"></div>
 <div class="form-group"><label for="edit_email"><?php echo @LA_LB_EMAIL;?></label><input type="email" name="edit_email" id="edit_email" class="form-control" value="<?php echo @$getuser_detail->email;?>"></div>
 <hr/>
 <div class="form-group"><label for="edit_password"><?php echo @LA_LB_NEW_PASSWORD;?></label><input type="password" name="edit_password" id="edit_password" class="form-control"></div>
 <div class="form-group"><label for="edit_repassword"><?php echo @LA_LB_NEW_PASSWORD_AGAIN;?></label><input type="password" name="edit_repassword" id="edit_repassword" class="form-control"></div>

 
</div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i><?php echo @LA_BTN_CLOSE;?></button>
                                          <button type="submit" name="edit_user_info" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    
