<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-bars fa-fw"></i> รายละเอียดนักเรียน</h1>
     </div>        
</div>
<ol class="breadcrumb">
  <li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
  <li><a href="?p=member">ข้อมูลนักเรียน</a></li>
  <li class="active">รายละเอียดนักเรียน</li>
</ol>
<?php
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

<?php
$member_detail = $getdata->my_sql_query(NULL,"members","member_key='".addslashes($_GET['id'])."'");
?>
<ul class="nav nav-tabs">
                                <li class="active"><a href="#info" data-toggle="tab">รายละเอียดนักเรียน</a>
                                </li>
                                
                               
                                
                               
                               
                            </ul>
                             <div class="tab-content">
                                <div class="tab-pane fade in active" id="info"><br/><div class="panel panel-primary">
                        <div class="panel-heading">
                            รายละเอียดข้อมูลนักเรียน<span class="pull-right" style="margin-top:-5px; margin-right:-8px;"><a href="?p=member" class="btn btn-xs btn-default"><i class="fa fa-arrow-left"></i> กลับ</a><a data-toggle="modal" data-target="#edit_member" data-whatever="<?php echo @$member_detail->member_key;?>" class="btn btn-xs btn-info" style="color:#FFF;"><i class="fa fa-edit fa-fw"></i> <?php echo @LA_BTN_EDIT;?></a><a class="btn btn-danger btn-xs" onClick="javascript:deleteMember('<?php echo @$member_detail->member_key;?>');"><i class="glyphicon glyphicon-remove"></i> ลบข้อมูล</a></span>
                        </div>
                        <div class="table-responsive">
                          <table width="100%" border="0" class="table">
  <tbody>
    <tr>
      <td width="17%"><strong>รหัสนักเรียน</strong></td>
      <td width="83%"><?php echo @$member_detail->member_code;?></td>
      </tr>
    <tr>
      <td><strong>ชื่อ-สกุล</strong></td>
      <td><?php echo @prefixConvertor($member_detail->member_prefix).'&nbsp;'.$member_detail->member_name.'&nbsp;&nbsp;&nbsp;'.$member_detail->member_lastname;?></td>
      </tr>
    <tr>
      <td><strong>กลุ่ม</strong></td>
      <td><?php echo @groupConvertor($member_detail->member_group);?></td>
      </tr>
    <tr>
      <td><strong>ที่อยู่</strong></td>
      <td><?php echo @$member_detail->member_address;?></td>
      </tr>
    <tr>
      <td><strong>หมายเลขโทรศัพท์</strong></td>
      <td><?php echo @$member_detail->member_phone;?></td>
      </tr>
    <tr>
      <td><strong>อีเมล</strong></td>
      <td><?php echo @$member_detail->member_email;?></td>
    </tr>
    <tr>
      <td><strong>หมายเหตุ</strong></td>
      <td><?php echo @$member_detail->member_note;?></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#efefef"></td>
      </tr>
      <?php
											$getfh = $getdata->my_sql_select(NULL,"field_header","fh_status='1' ORDER BY fh_insert");
											while($showfh = mysql_fetch_object($getfh)){
												
											?>
    <tr>
      <td><strong><?php echo @showStudentDataTitle($showfh->fh_key);?></strong></td>
      <td><?php echo @showStudentDataValue($showfh->fh_key,$member_detail->member_key);?></td>
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

	function deleteMember(memberkey){
		if(confirm("คุณต้องการลบข้อมูลนักเรียนคนนี้ ใช่หรือไม่ ?")){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			//document.getElementById(memberkey).innerHTML = '';
			window.location="?p=member";
			
  		}
	}
	xmlhttp.open("GET","function.php?type=delete_member&key="+memberkey,true);
	xmlhttp.send();
		}
}

</script>  
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
    