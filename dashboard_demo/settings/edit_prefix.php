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
$getprefix_detail =$getdata->my_sql_query(NULL,"members_prefix","prefix_key='".addslashes($_GET['key'])."'");
?>
 <div class="modal-body"><div class="form-group">
                                              <input type="hidden" name="prefix_key" id="prefix_key" value="<?php echo @$getprefix_detail->prefix_key;?>">
    <label for="edit_prefix_code">รหัสคำนำหน้านาม</label>
                                                 <input type="text" name="edit_prefix_code" id="edit_prefix_code" class="form-control" value="<?php echo @$getprefix_detail->prefix_code;?>">
                                            </div>
                                          <div class="form-group">
                                            <label for="edit_prefix_title">ชื่อคำนำหน้านาม</label>
                                            <input type="text" name="edit_prefix_title" id="edit_prefix_title" class="form-control" value="<?php echo @$getprefix_detail->prefix_title;?>">
</div></div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i><?php echo @LA_BTN_CLOSE;?></button>
                                          <button type="submit" name="save_edit_prefix" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    
