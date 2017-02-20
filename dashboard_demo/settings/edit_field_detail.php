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
$getfield_detail = $getdata->my_sql_query(NULL,"field_detail","fd_key='".addslashes($_GET['key'])."'");
?>
 <div class="modal-body"><div class="form-group">
                                              <input type="hidden" name="fd_key" id="fd_key" value="<?php echo @addslashes($_GET['key']);?>">

	 
	   <label for="edit_fd_title">ชื่อตัวเลือก</label>
       <input type="text" name="edit_fd_title" id="edit_fd_title" class="form-control" value="<?php echo @$getfield_detail->fd_title;?>">
	 </div>
	 <div class="form-group">
	   <label for="edit_fd_value">ค่าของตัวเลือก</label>
       <input type="text" name="edit_fd_value" id="edit_fd_value" class="form-control" value="<?php echo @$getfield_detail->fd_value;?>">
	 </div></div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i><?php echo @LA_BTN_CLOSE;?></button>
                                          <button type="submit" name="save_edit_field_detail" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    
