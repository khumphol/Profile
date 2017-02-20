 <link href="../css/plugins/dataTables.bootstrap.css" rel="stylesheet">
 <script src="../js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../js/plugins/dataTables/dataTables.bootstrap.js"></script>

                            <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-address-book-o fa-fw"></i> ข้อมูลนักเรียน</h1>
     </div>        
</div>
<ol class="breadcrumb">
  <li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
  <li class="active">ข้อมูลนักเรียน</li>
</ol>
<?php
if(isset($_POST['save_member'])){
	if(addslashes($_POST['member_code']) != NULL && addslashes($_POST['member_name']) != NULL && addslashes($_POST['member_lastname']) != NULL){
		
		$getfh = $getdata->my_sql_select(NULL,"field_header","fh_status='1' ORDER BY fh_insert");
											while($showfh = mysql_fetch_object($getfh)){
												$more_field .=",".$showfh->fh_name."='".addslashes($_POST[$showfh->fh_name])."'";
											}
		
		$getdata->my_sql_insert("members","member_key='".md5(rand().time("now"))."',member_group='".addslashes($_REQUEST['member_group'])."',member_code='".addslashes($_POST['member_code'])."',member_prefix='".addslashes($_POST['member_prefix'])."',member_name='".addslashes($_POST['member_name'])."',member_lastname='".addslashes($_POST['member_lastname'])."',member_address='".addslashes($_POST['member_address'])."',member_phone='".addslashes($_POST['member_phone'])."',member_email='".addslashes($_POST['member_email'])."',member_note='".addslashes($_POST['member_note'])."',member_status='1'".$more_field."");
		$alert = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>เพิ่มข้อมูลสมาชิก สำเร็จ</div>'; 
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_DATA_MISMATCH.'</div>'; 
	}
}
// Save Edit
if(isset($_POST['save_edit_member'])){
	if(addslashes($_POST['edit_member_code']) != NULL && addslashes($_POST['edit_member_name']) != NULL && addslashes($_POST['edit_member_lastname']) != NULL){
		$getfh = $getdata->my_sql_select(NULL,"field_header","fh_status='1' ORDER BY fh_insert");
											while($showfh = mysql_fetch_object($getfh)){
												$more_field2 .=",".$showfh->fh_name."='".addslashes($_POST[$showfh->fh_name])."'";
											}
		
		$getdata->my_sql_update("members","member_group='".addslashes($_REQUEST['edit_member_group'])."',member_code='".addslashes($_POST['edit_member_code'])."',member_prefix='".addslashes($_POST['edit_member_prefix'])."',member_name='".addslashes($_POST['edit_member_name'])."',member_lastname='".addslashes($_POST['edit_member_lastname'])."',member_address='".addslashes($_POST['edit_member_address'])."',member_phone='".addslashes($_POST['edit_member_phone'])."',member_email='".addslashes($_POST['edit_member_email'])."',member_note='".addslashes($_POST['edit_member_note'])."'".$more_field2."","member_key='".addslashes($_POST['member_key'])."'");
		$alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>แก้ไขข้อมูลนักเรียน สำเร็จ</div>'; 
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.LA_ALERT_DATA_MISMATCH.'</div>'; 
	}
}
echo @$alert;
?>
<!-- Modal -->
<div class="modal fade" id="edit_member" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <form id="form2" name="form2" method="post" enctype="multipart/form-data">
     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo @LA_BTN_CLOSE;?></span></button>
                    <h4 class="modal-title" id="memberModalLabel">แก้ไขข้อมูลนักเรียน</h4>
                </div>
                <div class="ct">
              
                </div>
            </div>
        </div>
  </form>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><form method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูลนักเรียนใหม่</h4>
                                        </div>
                                        <div class="modal-body">
                                         
                                            <div class="form-group row">
												<div class="col-md-6"> <label for="member_code">รหัสนักเรียน</label>
                                              <input type="text" name="member_code" id="member_code" class="form-control"></div>
                                             <div class="col-md-6">
                                               <label for="member_group">กลุ่ม</label>
                                               <select name="member_group" id="member_group" class="form-control combobox">
                                               <?php
												   $getgroup = $getdata->my_sql_select(NULL,"categories","categories_status='1' ORDER BY categories_name");
												   while($showgroup = mysql_fetch_object($getgroup)){
													   echo '<option value="'.$showgroup->categories_key.'">'.$showgroup->categories_name.'</option>';
												   }
												   ?>
                                               </select>
                                             </div>
                                             
                                          </div>
                                           
                                          <div class="form-group row ">
												<div class="col-md-2 "><label for="member_prefix">คำนำหน้า</label>
                                               <select name="member_prefix" id="member_prefix" class="form-control">
                                               <?php
												   $getprefix = $getdata->my_sql_select(NULL,"members_prefix","prefix_status='1' ORDER BY prefix_code");
												   while($showprefix = mysql_fetch_object($getprefix)){
													   echo '<option value="'.$showprefix->prefix_code.'">'.$showprefix->prefix_title.'</option>';
												   }
												   ?>
                                               </select></div>
                                             <div class="col-md-5 "><label for="member_name">ชื่อนักเรียน</label>
                                              <input type="text" name="member_name" id="member_name" class="form-control"></div>
                                             <div class="col-md-5 ">
                                               <label for="member_lastname">นามสกุล</label>
                                              <input type="text" name="member_lastname" id="member_lastname" class="form-control"></div>
                                              
                                          </div>
                                            <div class="form-group">
                                              <label for="member_address">ที่อยู่</label>
                                              <textarea name="member_address" id="member_address" class="form-control"></textarea>
                                            </div>
                                            
                                          <div class="form-group row">
                                            <div class="col-md-6"><label for="member_phone">หมายเลขโทรศัพท์</label>
                                              <input type="text" name="member_phone" id="member_phone" class="form-control"></div>
                                            <div class="col-md-6"><label for="member_email">อีเมล</label>
                                              <input type="text" name="member_email" id="member_email" class="form-control"></div>
                                              
                                          </div>
                                            <div class="form-group">
                                              <label for="member_note">หมายเหตุ</label>
                                              <textarea name="member_note" id="member_note" class="form-control"></textarea>
                                            </div>
                                            <hr/>
                                            <?php
											$getfh = $getdata->my_sql_select(NULL,"field_header","fh_status='1' ORDER BY fh_insert");
											while($showfh = mysql_fetch_object($getfh)){
												echo @showStudentField($showfh->fh_key);
											}
											?>
                                           
                                            
                                          
                                      </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i><?php echo @LA_BTN_CLOSE;?></button>
                                          <button type="submit" name="save_member" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i><?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                </form>
                                <!-- /.modal-dialog -->
</div>
                            <!-- /.modal -->
<!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-fw"></i><?php // echo @LA_LB_NEW_MEMBER;?></button><br/><br/>-->
 <div class="panel panel-yellow">
                        <div class="panel-heading">
                            ข้อมูลนักเรียนทั้งหมด<span class="pull-right btn_top_right"><a class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-fw"></i> เพิ่มข้อมูลนักเรียนใหม่</a></span>
                        </div>
                       
                        
<div class="panel-body">
   <div class="table-responsive tooltipx">
  <!-- Table -->
  <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
  <thead>
  <tr style=" font-weight:bold;">
    <th width="14%" >รหัสนักเรียน</th>
    <th width="48%" ><?php echo @LA_LB_NAME;?></th>
    
    <th width="20%" >โทรศัพท์</th>
    <th width="18%" >เพิ่มเติม</th>
  </tr>
  </thead>
  <tbody>
  <?php
  $x=0;
  
	    @$getmember = $getdata->my_sql_select(NULL,"members","member_status <> '2' ORDER BY member_code ASC");
   
	 while(@$showmember = mysql_fetch_object($getmember)){
	  $x++;
	 
  ?>
  <tr id="<?php echo @$showmember->member_key;?>">
    <td align="center"><?php echo @$showmember->member_code;?></td>
    <td><?php echo @prefixConvertor($showmember->member_prefix).'&nbsp;'.$showmember->member_name.'&nbsp;&nbsp;&nbsp;'.$showmember->member_lastname;?></td>
    
    <td align="center" valign="middle"><?php echo @$showmember->member_phone;?></td>
    <td align="center" valign="middle"><a href="?p=member_detail&id=<?php echo @$showmember->member_key;?>" class="btn btn-xs btn-success" style="color:#FFF;"><i class="fa fa-bars"></i> ข้อมูล</a><a data-toggle="modal" data-target="#edit_member" data-whatever="<?php echo @$showmember->member_key;?>" class="btn btn-xs btn-info" style="color:#FFF;"><i class="fa fa-edit fa-fw"></i> <?php echo @LA_BTN_EDIT;?></a></td>
  </tr>
  <?php
  }
  ?>
  </tbody>
</table>

</div>
</div>
</div>

<!--<div style="text-align:right">
<nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>-->

<script>
    $('#edit_member').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "members/edit_member.php",
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
    
                             <!-- DataTables JavaScript -->
    