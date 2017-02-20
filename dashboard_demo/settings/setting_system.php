<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-wrench fa-fw"></i> <?php echo @LA_LB_SYSTEM_SETTING;?></h1>
     </div>        
</div>
<ol class="breadcrumb">
 <li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
   <li><a href="?p=setting"><?php echo @LA_LB_SETTING;?></a></li>
  <li class="active"><?php echo  @LA_LB_SYSTEM_SETTING;?></li>
</ol>
<?php
if(isset($_POST['save_info'])){
	if (!defined('UPLOADDIR')) define('UPLOADDIR','../media/logo/');
				if (is_uploaded_file($_FILES["site_logo"]["tmp_name"])) {	
				$File_name = $_FILES["site_logo"]["name"];
				$File_tmpname = $_FILES["site_logo"]["tmp_name"];
				if (move_uploaded_file($File_tmpname, (UPLOADDIR.$File_name)));
						
	}
	if (!defined('UPLOADDIR2')) define('UPLOADDIR2','../media/favicon/');
				if (is_uploaded_file($_FILES["site_favicon"]["tmp_name"])) {	
				$File_name2 = $_FILES["site_favicon"]["name"];
				$File_tmpname2 = $_FILES["site_favicon"]["tmp_name"];
				if (move_uploaded_file($File_tmpname2, (UPLOADDIR2.$File_name2)));
						
	}
	if($File_name != NULL && $File_name2 != NULL){
		$getdata->my_sql_update("system_info","site_logo='".$File_name."',site_favicon='".$File_name2."'",NULL);
	}else if($File_name != NULL && $File_name2 == NULL){
		$getdata->my_sql_update("system_info","site_logo='".$File_name."'",NULL);
	}else if($File_name == NULL && $File_name2 != NULL){
		$getdata->my_sql_update("system_info","site_favicon='".$File_name2."'",NULL);
	}else{
		$getdata->my_sql_update("system_info","site_title='".addslashes($_POST['site_title'])."',site_footer='".addslashes($_POST['site_footer'])."'",NULL);
	}
	$alert = '  <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_UPDATE_DATA_DONE.'</div>';
}
if(isset($_POST['save_categories'])){
	if(addslashes($_POST['categories_name']) != NULL){
		$categories_key=md5(addslashes($_POST['categories_name']).time("now"));
		$getdata->my_sql_insert("categories","categories_key='".$categories_key."',categories_name='".addslashes($_POST['categories_name'])."',categories_status='1'");
		$alert = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								บันทึกข้อมูล สำเร็จ !
                             </div>';
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								ข้อมูลไม่ถูกต้อง กรณาระบุอีกครั้ง !
                             </div>';
	}
}
if(isset($_POST['save_edit_categories'])){
	if( addslashes($_POST['edit_categories_name']) != NULL){
		$getdata->my_sql_update("categories","categories_name='".addslashes($_POST['edit_categories_name'])."'","categories_key='".addslashes($_POST['categories_key'])."'");
		$alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>แก้ไขข้อมูล สำเร็จ !</div>';
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่ถูกต้อง กรณาระบุอีกครั้ง !</div>';
	}
}
if(isset($_POST['save_prefix'])){
	if(addslashes($_POST['prefix_title']) != NULL && addslashes($_POST['prefix_code']) != NULL){
		$getdata->my_sql_insert("members_prefix","prefix_key='".md5(rand().time("now"))."',prefix_code='".addslashes($_POST['prefix_code'])."',prefix_title='".addslashes($_POST['prefix_title'])."',prefix_status='1'");
		$alert = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>บันทึกข้อมูล สำเร็จ !</div>';
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่ถูกต้อง กรณาระบุอีกครั้ง !</div>';
	}
}
if(isset($_POST['save_edit_prefix'])){
	if( addslashes($_POST['edit_prefix_code']) != NULL && addslashes($_POST['edit_prefix_title']) != NULL){
		$getdata->my_sql_update("members_prefix","prefix_code='".addslashes($_POST['edit_prefix_code'])."',prefix_title='".addslashes($_POST['edit_prefix_title'])."'","prefix_key='".addslashes($_POST['prefix_key'])."'");
		$alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>แก้ไขข้อมูล สำเร็จ !</div>';
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่ถูกต้อง กรณาระบุอีกครั้ง !</div>';
	}
}
if(isset($_POST['save_field'])){
	if(addslashes($_POST['fh_name']) != NULL && addslashes($_POST['fh_length']) != NULL ){
		$getdata->my_sql_insert("field_header","fh_key='".md5(rand().time("now"))."',fh_name='".addslashes($_POST['fh_name'])."',fh_title='".addslashes($_POST['fh_title'])."',fh_type='".addslashes($_REQUEST['fh_type'])."',fh_length='".addslashes($_POST['fh_length'])."',fh_status='1'");
		switch(@addslashes($_REQUEST['fh_type'])){
			case "1" : $ftype = 'VARCHAR('.addslashes($_POST['fh_length']).')';
				break;
			case "2" : $ftype = 'VARCHAR('.addslashes($_POST['fh_length']).')';
				break;
			case "3" : $ftype = 'VARCHAR('.addslashes($_POST['fh_length']).')';
				break;
			
		}
		$getdata->my_sql_string("ALTER TABLE `members` ADD `".addslashes($_POST['fh_name'])."` ".$ftype." NOT NULL COMMENT '".addslashes($_POST['fh_title'])."' AFTER `member_status`;");
		$alert = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>บันทึกข้อมูล สำเร็จ !</div>';
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่ถูกต้อง กรณาระบุอีกครั้ง !</div>';
	}
}
if(isset($_POST['save_edit_field_header'])){
	if(addslashes($_POST['edit_fh_name']) != NULL && addslashes($_POST['edit_fh_length']) != NULL){
		$getold_name = $getdata->my_sql_query("fh_name","field_header","fh_key='".addslashes($_POST['fh_key'])."'");
		$getdata->my_sql_update("field_header","fh_name='".addslashes($_POST['edit_fh_name'])."',fh_title='".addslashes($_POST['edit_fh_title'])."',fh_type='".addslashes($_REQUEST['edit_fh_type'])."',fh_length='".addslashes($_POST['edit_fh_length'])."'","fh_key='".addslashes($_POST['fh_key'])."'");
		switch(@addslashes($_REQUEST['edit_fh_type'])){
			case "1" : $ftype = 'VARCHAR('.addslashes($_POST['edit_fh_length']).')';
				break;
			case "2" : $ftype = 'VARCHAR('.addslashes($_POST['edit_fh_length']).')';
				break;
			case "3" : $ftype = 'VARCHAR('.addslashes($_POST['edit_fh_length']).')';
				break;
			
		}
		$getdata->my_sql_string("ALTER TABLE `members` CHANGE `".$getold_name->fh_name."` `".addslashes($_POST['edit_fh_name'])."` ".$ftype." CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '".addslashes($_POST['edit_fh_title'])."';");
		$alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>แก้ไขข้อมูล สำเร็จ !</div>';
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่ถูกต้อง กรณาระบุอีกครั้ง !</div>';
	}

}
if(isset($_POST['save_new_field_detail'])){
	if(addslashes($_POST['fd_title']) != NULL && addslashes($_POST['fd_value']) != NULL){
		$getdata->my_sql_insert("field_detail","fd_key='".md5(rand().time("now"))."',fh_key='".addslashes($_POST['fh_key'])."',fd_title='".addslashes($_POST['fd_title'])."',fd_value='".addslashes($_POST['fd_value'])."'");
		$alert = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>บันทึกข้อมูล สำเร็จ !</div>';
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่ถูกต้อง กรณาระบุอีกครั้ง !</div>';
	}
}
if(isset($_POST['save_edit_field_detail'])){
	if(addslashes($_POST['edit_fd_title']) != NULL && addslashes($_POST['edit_fd_value']) != NULL){
		$getdata->my_sql_update("field_detail","fd_title='".addslashes($_POST['edit_fd_title'])."',fd_value='".addslashes($_POST['edit_fd_value'])."'","fd_key='".addslashes($_POST['fd_key'])."'");
		$alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>แก้ไขข้อมูล สำเร็จ !</div>';
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่ถูกต้อง กรณาระบุอีกครั้ง !</div>';
	}
}
$getsystem_info = $getdata->my_sql_query(NULL,"system_info",NULL);
?>

<!-- Modal Edit -->
<div class="modal fade" id="edit_categories" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <form id="form2" name="form2" enctype="multipart/form-data" method="post" action="?p=setting_system&tab=4">
     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">ปิด</span></button>
                    <h4 class="modal-title" id="memberModalLabel">แก้ไขข้อมูล</h4>
                </div>
                <div class="ct">
              
                </div>
            </div>
        </div>
  </form>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="edit_prefix" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <form id="form2x" name="form2x" enctype="multipart/form-data" method="post" action="?p=setting_system&tab=3">
     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">ปิด</span></button>
                    <h4 class="modal-title" id="memberModalLabel">แก้ไขข้อมูล</h4>
                </div>
                <div class="ct">
              
                </div>
            </div>
        </div>
  </form>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="edit_field_header" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <form id="form2z" name="form2z" enctype="multipart/form-data" method="post" action="?p=setting_system&tab=2">
     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">ปิด</span></button>
                    <h4 class="modal-title" id="memberModalLabel">แก้ไขข้อมูล</h4>
                </div>
                <div class="ct">
              
                </div>
            </div>
        </div>
  </form>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="new_field_detail" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <form id="form3c" name="form3c" enctype="multipart/form-data" method="post" action="?p=setting_system&tab=2">
     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">ปิด</span></button>
                    <h4 class="modal-title" id="memberModalLabel">เพิ่มตัวเลือก</h4>
                </div>
                <div class="ct">
              
                </div>
            </div>
        </div>
  </form>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="edit_field_detail" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <form id="form3d" name="form3d" enctype="multipart/form-data" method="post" action="?p=setting_system&tab=2">
     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">ปิด</span></button>
                    <h4 class="modal-title" id="memberModalLabel">แก้ไขข้อมูล</h4>
                </div>
                <div class="ct">
              
                </div>
            </div>
        </div>
  </form>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_new_categories" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><form method="post" enctype="multipart/form-data" name="form1" id="form1" action="?p=setting_system&tab=4" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">เพิ่มกลุ่ม</h4>
                                        </div>
                                        <div class="modal-body">
                                          
                                          <div class="form-group">
                                               <label for="categories_name">ชื่อกลุ่ม</label>
                                                 <input type="text" name="categories_name" id="categories_name" class="form-control">
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>ปิด</button>
                                          <button type="submit" name="save_categories" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                </form>
                                <!-- /.modal-dialog -->
</div>
                            <!-- /.modal -->
                            <!-- Modal -->
<div class="modal fade" id="modal_new_prefix" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><form method="post" enctype="multipart/form-data" name="form1x" id="form1x" action="?p=setting_system&tab=3" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">เพิ่มคำนำหน้านาม</h4>
                                        </div>
                                        <div class="modal-body">
                                           <div class="form-group">
                                               <label for="prefix_code">รหัสคำนำหน้านาม</label>
                                                 <input type="text" name="prefix_code" id="prefix_code" class="form-control">
                                            </div>
                                          <div class="form-group">
                                               <label for="prefix_title">ชื่อคำนำหน้านาม</label>
                                                 <input type="text" name="prefix_title" id="prefix_title" class="form-control">
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>ปิด</button>
                                          <button type="submit" name="save_prefix" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                </form>
                                <!-- /.modal-dialog -->
</div>
                            <!-- /.modal -->
<div class="modal fade" id="modal_new_field" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><form method="post" enctype="multipart/form-data" name="form1z" id="form1z" action="?p=setting_system&tab=2" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">เพิ่มฟิวส์ข้อมูลนักเรียน</h4>
                                        </div>
                                        <div class="modal-body">
                                           <div class="form-group">
                                             <label for="fh_name">ชื่อฟิวส์</label>
                                             <input type="text" name="fh_name" id="fh_name" class="form-control" placeholder="English Only">
                                          </div>
                                          <div class="form-group">
                                             <label for="fh_title">ชื่อเรียก</label>
                                             <input type="text" name="fh_title" id="fh_title" class="form-control" >
                                          </div>
											<div class="form-group">
											  <label for="fh_type">ประเภทของข้อมูล</label>
                                              <select name="fh_type" id="fh_type" class="form-control">
                                                <option value="1" selected="selected">Text Field</option>
                                                <option value="2">Combobox</option>
                                                <option value="3">Text Area</option>
                                              </select>
											</div>
                                         	<div class="form-group">
                                         	  <label for="fh_length">ขนาดของข้อมูล</label>
                                              <input type="text" name="fh_length" id="fh_length" class="form-control">
                                         	</div>
                                          
                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>ปิด</button>
                                          <button type="submit" name="save_field" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                </form>
                                <!-- /.modal-dialog -->
</div>
                            <!-- /.modal -->
<?php echo @$alert;?>
 <ul class="nav nav-tabs">
                                <li <?php echo @(addslashes($_GET['tab']) == '1' || addslashes($_GET['tab']) == '')?'class="active"':'';?>><a href="#basic_setting" data-toggle="tab"><?php echo @LA_LB_STD_DATA;?></a>
                                </li>
                                
                                <li <?php echo @(addslashes($_GET['tab']) == '2')?'class="active"':'';?>><a href="#field" data-toggle="tab">ฟิวส์ข้อมูล</a>
                                </li>
                                <li <?php echo @(addslashes($_GET['tab']) == '3')?'class="active"':'';?>><a href="#member_prefix" data-toggle="tab">คำนำหน้านาม</a>
                                </li>
                              <li <?php echo @(addslashes($_GET['tab']) == '4')?'class="active"':'';?>><a href="#member_group" data-toggle="tab">กลุ่ม</a>
                                </li>
                               
                               
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in <?php echo @(addslashes($_GET['tab']) == '1' || addslashes($_GET['tab']) == '')?'in active':'';?>" id="basic_setting"><br/>
                                   
<form action="" method="post" enctype="multipart/form-data" name="form1">
 <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <?php echo @LA_LB_STD_DATA;?>
                        </div>
                        <div class="panel-body">
                          <table width="100%" border="0">
                              <tr>
                                <td width="31%"><?php echo @LA_LB_LOGO;?></td>
                                <td width="69%">
                                <img src="../media/logo/<?php echo @$getsystem_info->site_logo;?>" width="256"  alt=""/><br/><br/>
                                <div class="form-group">
                                
                                <input name="site_logo" type="file" disabled="disabled" class="form-control" id="site_logo">
                                </div></td>
                              </tr>
                              <tr>
                                <td>Favicon</td>
                                <td>
                                <img src="../media/favicon/<?php echo @$getsystem_info->site_favicon;?>" width="32" height="32"  alt=""/><br/><br/>
                                <div class="form-group">
                                
                                <input name="site_favicon" type="file" disabled="disabled" class="form-control" id="site_favicon" >
                                </div></td>
                              </tr>
                            
                              
                          </table>
                        </div>
                        <div class="panel-footer">
                               <button type="submit" name="save_info" class="btn btn-warning btn-sm" disabled><i class="fa fa-save fa-fw"></i> <?php echo @LA_BTN_SAVE;?></button> Demo only
                        </div>
  </div>
</form>
 
                                </div>
								<div class="tab-pane fade in <?php echo @(addslashes($_GET['tab']) == '2')?'in active':'';?>" id="field"><br/>
                                  
                                  <div class="panel panel-yellow">
                        <div class="panel-heading">
							ฟิวส์ข้อมูลทั้งหมด<span class="pull-right btn_top_right"><a class="btn btn-xs btn-default " data-toggle="modal" data-target="#modal_new_field"><i class="fa fa-plus"></i> เพิ่มฟิวส์ข้อมูลนักเรียน</a></span>
                        </div>
                        <div class="table-responsive">
                          <table width="100%" border="0" class="table table-bordered">
							  <thead>
								<tr class="table_header">
								  <td width="3%">#</td>
								  <td width="18%">ชื่อฟิวส์</td>
								  <td width="26%">ชื่อเรียก</td>
								  <td width="14%">ชนิดของข้อมูลหรือค่า</td>
								  <td width="12%">ขนาดของข้อมูล</td>
								  <td width="27%">จัดการ</td>
								</tr>
							  </thead>
							<tbody>
							<?php
								$l=0;
								$getfield_header = $getdata->my_sql_select(NULL,"field_header","fh_status <> '2' ORDER BY fh_insert");
								while($showfield_header = mysql_fetch_object($getfield_header)){
									$l++;
								?>
							<tr id="<?php echo @$showfield_header->fh_key;?>">
							  <td align="center"><?php echo @$l;?></td>
							  <td><?php echo @$showfield_header->fh_name;?></td>
							  <td><?php echo @$showfield_header->fh_title;?></td>
							  <td align="center"><?php 
									switch($showfield_header->fh_type){
			case "1" : echo 'Text Field';
				break;
			case "2" : echo 'Combobox';
				break;
			case "3" : echo 'Text Area';
				break;
			
		}
								  ?></td>
							  <td align="center"><?php echo @$showfield_header->fh_length;?></td>
							  <td align="right"><?php
	  if($showfield_header->fh_type == '2'){
		  echo '<a data-toggle="modal" data-target="#new_field_detail" data-whatever="'.@$showfield_header->fh_key.'" class="btn btn-xs btn-warning" style="color:#FFF;"><i class="fa fa-edit"></i> เพิ่มตัวเลือก</a>';
	  }
	  if($showfield_header->fh_status == '1'){
		  echo '<button type="button" class="btn btn-success btn-xs" id="btn-'.@$showfield_header->fh_key.'" onClick="javascript:changeFieldHStatus(\''.@$showfield_header->fh_key.'\');"><i class="fa fa-unlock-alt" id="icon-'.@$showfield_header->fh_key.'"></i> <span id="text-'.@$showfield_header->fh_key.'">แสดง</span></button>';
	  }else{
		  echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.@$showfield_header->fh_key.'" onClick="javascript:changeFieldHStatus(\''.@$showfield_header->fh_key.'\');"><i class="fa fa-lock" id="icon-'.@$showfield_header->fh_key.'"></i> <span id="text-'.@$showfield_header->fh_key.'">ซ่อน</span></button>';
	  }
	  
	  ?><a data-toggle="modal" data-target="#edit_field_header" data-whatever="<?php echo @$showfield_header->fh_key;?>" class="btn btn-xs btn-info" style="color:#FFF;"><i class="fa fa-edit"></i> แก้ไข</a><a onClick="javascript:deleteFieldH('<?php echo @$showfield_header->fh_key;?>');" class="btn btn-xs btn-danger" style="color:#FFF;"><i class="fa fa-times"></i> ลบ</a></td>
							</tr>
							<?php
									$getfield_detail = $getdata->my_sql_select(NULL,"field_detail","fh_key='".$showfield_header->fh_key."' ORDER BY fd_title");
									while($showfield_detail = mysql_fetch_object($getfield_detail)){
									?>
							<tr style="background: #aaa; color:#FFF;" id="<?php echo @$showfield_detail->fd_key;?>">
							  <td colspan="2" align="center" >&nbsp;</td>
							  <td ><?php echo @$showfield_detail->fd_title;?></td>
							  <td align="center"><?php echo @$showfield_detail->fd_value;?></td>
							  <td align="center" >&nbsp;</td>
							  <td align="right" style="background: #FFF; color:#000;"><a data-toggle="modal" data-target="#edit_field_detail" data-whatever="<?php echo @$showfield_detail->fd_key;?>" class="btn btn-xs btn-info" style="color:#FFF;"><i class="fa fa-edit"></i> แก้ไข</a><a onClick="javascript:deleteFieldD('<?php echo @$showfield_detail->fd_key;?>');" class="btn btn-xs btn-danger" style="color:#FFF;"><i class="fa fa-times"></i> ลบ</a></td>
							  </tr>
							<?php
									}
								}
									?>
						  </tbody>
						</table>
                        </div>
                        
                    </div>
                                
                                </div>
								<div class="tab-pane fade in <?php echo @(addslashes($_GET['tab']) == '3')?'in active':'';?>" id="member_prefix"><br/><div class="panel panel-yellow">
                        <div class="panel-heading">
                            คำนำหน้านามทั้งหมด<span class="pull-right btn_top_right"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_new_prefix"><i class="fa fa-plus fa-fw"></i> เพิ่มคำนำหน้านาม</button></span>
                        </div>
                        <div class="table-responsive">
                    <table width="100%" border="0" class="table table-bordered">
                         <thead>
                          <tr class="table_header">
                            <td width="14%" align="center">รหัสคำนำหน้านาม</td>
                            <td width="62%" align="center">ชื่อคำนำหน้านาม</td>
                            <td width="24%" align="center">จัดการ</td>
                          </tr>
						</thead>
                         <tbody>
                          <?php
						$i=0;
						  $getprefix = $getdata->my_sql_select(NULL,"members_prefix","prefix_status <> '2' ORDER BY prefix_code");
						  while($showprefix = mysql_fetch_object($getprefix)){
							  $i++;
						  ?>
                          <tr id="<?php echo @$showprefix->prefix_key;?>">
                            <td align="center"><?php echo @$showprefix->prefix_code;?></td>
                            <td>&nbsp;<?php echo @$showprefix->prefix_title;?></td>
                            <td align="right"><?php
	  if($showprefix->prefix_status == '1'){
		  echo '<button type="button" class="btn btn-success btn-xs" id="btn-'.@$showprefix->prefix_key.'" onClick="javascript:changePrefixStatus(\''.@$showprefix->prefix_key.'\');"><i class="fa fa-unlock-alt" id="icon-'.@$showprefix->prefix_key.'"></i> <span id="text-'.@$showprefix->prefix_key.'">แสดง</span></button>';
	  }else{
		  echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.@$showprefix->prefix_key.'" onClick="javascript:changePrefixStatus(\''.@$showprefix->prefix_key.'\');"><i class="fa fa-lock" id="icon-'.@$showprefix->prefix_key.'"></i> <span id="text-'.@$showprefix->prefix_key.'">ซ่อน</span></button>';
	  }
	  ?><a data-toggle="modal" data-target="#edit_prefix" data-whatever="<?php echo @$showprefix->prefix_key;?>" class="btn btn-xs btn-info" style="color:#FFF;"><i class="fa fa-edit"></i> แก้ไข</a><a onClick="javascript:deletePrefix('<?php echo @$showprefix->prefix_key;?>');" class="btn btn-xs btn-danger" style="color:#FFF;"><i class="fa fa-times"></i> ลบ</a></td>
                          </tr>
                          <?php
						  }
						  ?>
						</tbody>
  </table>
  </div>
</div></div>
								<div class="tab-pane fade in <?php echo @(addslashes($_GET['tab']) == '4')?'in active':'';?>" id="member_group"><br/><div class="panel panel-yellow">
                        <div class="panel-heading">
                            กลุ่มทั้งหมด<span class="pull-right btn_top_right"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_new_categories"><i class="fa fa-plus fa-fw"></i> เพิ่มกลุ่ม</button></span>
                        </div>
                        <div class="table-responsive">
                    <table width="100%" border="0" class="table table-bordered">
                         <thead>
                          <tr class="table_header">
                            <td width="5%" align="center">#</td>
                            <td width="71%" align="center">ชื่อกลุ่ม</td>
                            <td width="24%" align="center">จัดการ</td>
                          </tr>
						</thead>
                         <tbody>
                          <?php
						$i=0;
						  $getcategories = $getdata->my_sql_select(NULL,"categories","categories_status <> '2' ORDER BY categories_name");
						  while($showcategories = mysql_fetch_object($getcategories)){
							  $i++;
						  ?>
                          <tr id="<?php echo @$showcategories->categories_key;?>">
                            <td align="center"><?php echo @$i;?></td>
                            <td>&nbsp;<?php echo @$showcategories->categories_name;?></td>
                            <td align="right"><?php
	  if($showcategories->categories_status == '1'){
		  echo '<button type="button" class="btn btn-success btn-xs" id="btn-'.@$showcategories->categories_key.'" onClick="javascript:changeCategoriesStatus(\''.@$showcategories->categories_key.'\');"><i class="fa fa-unlock-alt" id="icon-'.@$showcategories->categories_key.'"></i> <span id="text-'.@$showcategories->categories_key.'">แสดง</span></button>';
	  }else{
		  echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.@$showcategories->categories_key.'" onClick="javascript:changeCategoriesStatus(\''.@$showcategories->categories_key.'\');"><i class="fa fa-lock" id="icon-'.@$showcategories->categories_key.'"></i> <span id="text-'.@$showcategories->categories_key.'">ซ่อน</span></button>';
	  }
	  ?><a data-toggle="modal" data-target="#edit_categories" data-whatever="<?php echo @$showcategories->categories_key;?>" class="btn btn-xs btn-info" style="color:#FFF;"><i class="fa fa-edit"></i> แก้ไข</a><a onClick="javascript:deleteCategories('<?php echo @$showcategories->categories_key;?>');" class="btn btn-xs btn-danger" style="color:#FFF;"><i class="fa fa-times"></i> ลบ</a></td>
                          </tr>
                          <?php
						  }
						  ?>
						</tbody>
  </table>
  </div>
</div></div>
                                            
</div>
<script language="javascript">
function changeModuleStatus(modulekey){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var es = document.getElementById('btn-'+modulekey);
	if(es.className == 'btn btn-primary btn-xs'){
		var sts= 1;
	}else{
		var sts= 0;
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			
			if(es.className == 'btn btn-primary btn-xs'){
				document.getElementById('btn-'+modulekey).className = 'btn btn-warning btn-xs';
				document.getElementById('icon-'+modulekey).className = 'fa fa-times-circle';
				document.getElementById('text-'+modulekey).innerHTML = 'ปิดใช้งาน';
			}else{
				document.getElementById('btn-'+modulekey).className = 'btn btn-primary btn-xs';
				document.getElementById('icon-'+modulekey).className = 'fa fa-check-circle';
				document.getElementById('text-'+modulekey).innerHTML = 'เปิดใช้งาน';
			}
  		}
	}
	
	xmlhttp.open("GET","../core/modules.core.php?module="+modulekey+"&sts="+sts,true);
	xmlhttp.send();
}

function changeCategoriesStatus(userkey){
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
	
	xmlhttp.open("GET","function.php?type=change_categories_status&key="+userkey+"&sts="+sts,true);
	xmlhttp.send();
}
	function changePrefixStatus(userkey){
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
	
	xmlhttp.open("GET","function.php?type=change_prefix_status&key="+userkey+"&sts="+sts,true);
	xmlhttp.send();
}
		function changeFieldHStatus(userkey){
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
	
	xmlhttp.open("GET","function.php?type=change_field_header_status&key="+userkey+"&sts="+sts,true);
	xmlhttp.send();
}
	
	function deleteCategories(userkey){
		if(confirm("คุณต้องการลบข้อมูลกลุ่มนี้ใช่หรือไม่ ?")){
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
	xmlhttp.open("GET","function.php?type=delete_categories&key="+userkey,true);
	xmlhttp.send()
	}
	
}
	function deletePrefix(userkey){
		if(confirm("คุณต้องการลบข้อมูลคำนำหน้านามนี้ใช่หรือไม่ ?")){
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
	xmlhttp.open("GET","function.php?type=delete_prefix&key="+userkey,true);
	xmlhttp.send()
	}
	
}
	function deleteFieldH(userkey){
		if(confirm("คุณต้องการลบข้อมูลฟิวส์นี้ใช่หรือไม่ ? เมื่อลบแล้วข้อมูลในฟิวส์นี้ทั้งหมดจะถูกลบด้วย !")){
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
	xmlhttp.open("GET","function.php?type=delete_field_header&key="+userkey,true);
	xmlhttp.send()
	}
	}
function deleteFieldD(userkey){
		if(confirm("คุณต้องการลบข้อมูลตัวเลือกนี้ใช่หรือไม่ ?")){
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
	xmlhttp.open("GET","function.php?type=delete_field_detail&key="+userkey,true);
	xmlhttp.send()
	}
	
}
 $('#edit_categories').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "settings/edit_categories.php",
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
 $('#edit_prefix').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "settings/edit_prefix.php",
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
 $('#edit_field_header').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "settings/edit_field_header.php",
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
 $('#new_field_detail').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "settings/new_field_detail.php",
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
 $('#edit_field_detail').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "settings/edit_field_detail.php",
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
