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
$getmember_detail = $getdata->my_sql_query(NULL,"members","member_key='".addslashes($_GET['key'])."'");
?>
 <div class="modal-body">
 <input type="hidden" name="member_key" id="member_key" value="<?php echo @$getmember_detail->member_key;?>">
<div class="form-group row">
	  <div class="col-md-6"> <label for="edit_member_code">รหัสนักเรียน</label>
    <input type="text" name="edit_member_code" id="edit_member_code" class="form-control" value="<?php echo @$getmember_detail->member_code;?>"></div>
                                             <div class="col-md-6">
                                               <label for="edit_member_group">กลุ่ม</label>
                                               <select name="edit_member_group" id="edit_member_group" class="form-control combobox">
                                               <?php
												   $getgroup = $getdata->my_sql_select(NULL,"categories","categories_status='1' ORDER BY categories_name");
												   while($showgroup = mysql_fetch_object($getgroup)){
													   if($showgroup->categories_key == $getmember_detail->member_group){
														   echo '<option value="'.$showgroup->categories_key.'" selected>'.$showgroup->categories_name.'</option>';
													   }else{
														   echo '<option value="'.$showgroup->categories_key.'">'.$showgroup->categories_name.'</option>';
													   }
													   
												   }
												   ?>
                                               </select>
                                             </div>
                                             
   </div>
                                           
                                          <div class="form-group row ">
												<div class="col-md-2 "><label for="edit_member_prefix">คำนำหน้า</label>
                                               <select name="edit_member_prefix" id="edit_member_prefix" class="form-control">
                                               <?php
												   $getprefix = $getdata->my_sql_select(NULL,"members_prefix","prefix_status='1' ORDER BY prefix_code");
												   while($showprefix = mysql_fetch_object($getprefix)){
													   if($showprefix->prefix_code == $getmember_detail->member_prefix){
														   echo '<option value="'.$showprefix->prefix_code.'" selected>'.$showprefix->prefix_title.'</option>';
													   }else{
														   echo '<option value="'.$showprefix->prefix_code.'">'.$showprefix->prefix_title.'</option>';
													   }
													   
												   }
												   ?>
                                               </select></div>
                                             <div class="col-md-5 "><label for="edit_member_name">ชื่อนักเรียน</label>
                                              <input type="text" name="edit_member_name" id="edit_member_name" class="form-control" value="<?php echo @$getmember_detail->member_name;?>"></div>
                                             <div class="col-md-5 ">
                                               <label for="edit_member_lastname">นามสกุล</label>
                                              <input type="text" name="edit_member_lastname" id="edit_member_lastname" class="form-control" value="<?php echo @$getmember_detail->member_lastname;?>"></div>
                                              
                                          </div>
                                            <div class="form-group">
                                              <label for="edit_member_address">ที่อยู่</label>
                                              <textarea name="edit_member_address" id="edit_member_address" class="form-control"><?php echo @$getmember_detail->member_address;?></textarea>
                                            </div>
                                            
                                          <div class="form-group row">
                                            <div class="col-md-6"><label for="edit_member_phone">หมายเลขโทรศัพท์</label>
                                              <input type="text" name="edit_member_phone" id="edit_member_phone" class="form-control" value="<?php echo @$getmember_detail->member_phone;?>"></div>
                                            <div class="col-md-6"><label for="edit_member_email">อีเมล</label>
                                              <input type="text" name="edit_member_email" id="edit_member_email" class="form-control" value="<?php echo @$getmember_detail->member_email;?>"></div>
                                              
                                          </div>
                                            <div class="form-group">
                                              <label for="edit_member_note">หมายเหตุ</label>
                                              <textarea name="edit_member_note" id="edit_member_note" class="form-control"><?php echo @$getmember_detail->member_note;?></textarea>
                                            </div>
                                            <hr/>
                                            <?php
											$getfh = $getdata->my_sql_select(NULL,"field_header","fh_status='1' ORDER BY fh_insert");
											while($showfh = mysql_fetch_object($getfh)){
												echo @editStudentField($showfh->fh_key,$getmember_detail->member_key);
											}
											?>
                                           
</div>
                                          
                                      
                               
</div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i><?php echo @LA_BTN_CLOSE;?></button>
                                          <button type="submit" name="save_edit_member" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                          
<script type="text/javascript">
  $(document).ready(function(){
    $('.combobox').combobox();
	
  });
 
</script>