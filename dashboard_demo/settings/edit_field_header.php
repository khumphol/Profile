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
$getfh_detail =$getdata->my_sql_query(NULL,"field_header","fh_key='".addslashes($_GET['key'])."'");
?>
 <div class="modal-body"><div class="form-group">
                                              <input type="hidden" name="fh_key" id="fh_key" value="<?php echo @$getfh_detail->fh_key;?>">

                                             <label for="edit_fh_name">ชื่อฟิวส์</label>
                                             <input type="text" name="edit_fh_name" id="edit_fh_name" class="form-control" placeholder="English Only" value="<?php echo @$getfh_detail->fh_name;?>">
                                          </div>
                                          <div class="form-group"><label for="edit_fh_title">ชื่อเรียก</label>
                                             <input type="text" name="edit_fh_title" id="edit_fh_title" class="form-control" value="<?php echo @$getfh_detail->fh_title;?>">
                                          </div>
											<div class="form-group">
										  <?php
												if($getfh_detail->fh_type == 1){
													$a='selected="selected"';$b='';$c='';
												}else if($getfh_detail->fh_type == 2){
													$a='';$b='selected="selected"';$c='';
												}else{
													$a='';$b='';$c='selected="selected"';
												}
												?>
											  <label for="edit_fh_type">ประเภทของข้อมูล</label>
                                              <select name="edit_fh_type" id="edit_fh_type" class="form-control">
                                                <option value="1" <?php echo @$a;?>>Text Field</option>
                                                <option value="2" <?php echo @$b;?>>Combobox</option>
                                                <option value="3" <?php echo @$c;?>>Text Area</option>
                                              </select>
											</div>
                                         	<div class="form-group">
                                         	  <label for="edit_fh_length">ขนาดของข้อมูล</label>
                                              <input type="text" name="edit_fh_length" id="edit_fh_length" class="form-control" value="<?php echo @$getfh_detail->fh_length;?>">
                                         	</div>
</div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i><?php echo @LA_BTN_CLOSE;?></button>
                                          <button type="submit" name="save_edit_field_header" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    
