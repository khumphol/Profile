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
$countslide = $getdata->my_sql_show_rows("slideshow","slide_status = '1'");
$getslide =$getdata->my_sql_query(NULL,"slideshow","slide_key='".addslashes($_GET['key'])."'");
?>
 <div class="modal-body">   <div class="form-group">
   <input type="hidden" name="slide_key" id="slide_key" value="<?php echo @$getslide->slide_key;?>">
                                            <label for="edit_slide_link">ลิงค์</label>
    <input type="text" name="edit_slide_link" id="edit_slide_link" value="<?php echo @$getslide->slide_link;?>" class="form-control">
                                          </div>
   <div class="form-group">
     <label for="edit_slide_sorting">ลำดับที่</label>
     <select name="edit_slide_sorting" id="edit_slide_sorting" class="form-control">
                                             <?php
													for($j=1;$j<=($countslide);$j++){
														if($j == $getslide->slide_sorting){
															echo '<option value="'.$j.'" selected="selected">'.$j.'</option>';
														}else{
															echo '<option value="'.$j.'">'.$j.'</option>';
														}
													}
													   ?>
                                             </select>
</div></div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i><?php echo @LA_BTN_CLOSE;?></button>
                                          <button type="submit" name="save_edit_slide" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    
