<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-newspaper-o fa-fw"></i> ข่าวสาร</h1>
     </div>        
</div>
<ol class="breadcrumb">
 <li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
  <li class="active">ข่าวสาร</li>
</ol>
  <?php
$countslide = $getdata->my_sql_show_rows("slideshow","slide_status = '1'");
if(isset($_POST['save_slide'])){
	if (!defined('UPLOADDIR')) define('UPLOADDIR','../resource/slideshow/images/');
				if (is_uploaded_file($_FILES["slide_file"]["tmp_name"])) {	
				$File_name = $_FILES["slide_file"]["name"];
				$File_tmpname = $_FILES["slide_file"]["tmp_name"];
				if (move_uploaded_file($File_tmpname, (UPLOADDIR.$File_name)));
						
	}
	if($File_name != NULL){
		$slide_key = md5($File_name.time("now"));
		resizeSlideThumb($File_name);
		$getdata->my_sql_insert("slideshow","slide_key='".$slide_key."',slide_file='".$File_name."',slide_link='".addslashes($_POST['slide_link'])."',slide_sorting='".addslashes($_REQUEST['slide_sorting'])."',slide_status='".addslashes($_REQUEST['slide_status'])."'");
		$alert = '  <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>เพิ่มข้อมูลสไลด์ สำเร็จ</div>';
	}else{
		$alert = ' <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่ถูกต้อง กรุณาระบุอีกครั้ง</div>'; 
	}

}
if(isset($_POST['save_edit_slide'])){
	$getdata->my_sql_update("slideshow","slide_link='".addslashes($_POST['edit_slide_link'])."',slide_sorting='".addslashes($_REQUEST['edit_slide_sorting'])."'","slide_key='".addslashes($_POST['slide_key'])."'");
		$alert = '  <div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>แก้ไขข้อมูลสไลด์ สำเร็จ</div>';
}
if(isset($_POST['save_news'])){
	if(addslashes($_POST['news_title']) != NULL && addslashes($_POST['news_detail'])){
		$getdata->my_sql_insert("news","news_key='".md5(rand().time("now"))."',news_title='".addslashes($_POST['news_title'])."',news_detail='".addslashes($_POST['news_detail'])."',news_status='".addslashes($_REQUEST['news_status'])."',user_key='".$userdata->user_key."'");
		$alert = '  <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>เพิ่มข้อมูลข่าวประชาสัมพันธ์ สำเร็จ</div>';
	}else{
		$alert = ' <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่ถูกต้อง กรุณาระบุอีกครั้ง</div>'; 
	}
}
if(isset($_POST['save_edit_news'])){
	$getdata->my_sql_update("news","news_title='".addslashes($_POST['edit_news_title'])."',news_detail='".addslashes($_POST['edit_news_detail'])."'","news_key='".addslashes($_POST['news_key'])."'");
		$alert = '  <div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>แก้ไขข้อมูลข่าวประชาสัมพันธ์ สำเร็จ</div>';
}
  echo @$alert;
 
?>
<!-- Modal Edit -->
<div class="modal fade" id="edit_slide" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <form id="form3c" name="form3c" enctype="multipart/form-data" method="post" >
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
<div class="modal fade" id="edit_news" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <form id="form3c" name="form3c" enctype="multipart/form-data" method="post" >
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
<div class="modal fade" id="insert_news" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><form method="post" enctype="multipart/form-data" name="form1z" id="form1z">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">เพิ่มข่าวใหม่</h4>
                                        </div>
                                        <div class="modal-body">
                                          
                                            <div class="form-group">
                                            <label for="news_title">หัวข้อข่าว</label>
                                            <input type="text" name="news_title" id="news_title" class="form-control">
                                          </div>
											<div class="form-group">
											  <label for="news_detail">รายละเอียด</label>
                                                <textarea name="news_detail" id="news_detail" class="form-control"></textarea>
                                            </div>
                                        
                                           <div class="form-group">
                                             <label for="news_status">สถานะ</label>
                                             <select name="news_status" id="news_status" class="form-control">
                                               <option value="1" selected="selected">แสดง</option>
                                               <option value="0">ซ่อน</option>
                                             </select>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i> <?php echo @LA_BTN_CLOSE;?></button>
                                            <button type="submit" name="save_news" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i> <?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                </form>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
 
  <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#slide" data-toggle="tab">สไลด์โชว์</a>
                                </li>
                                <li><a href="#news" data-toggle="tab">ข่าวประชาสัมพันธ์</a>
                                </li>
                             
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="slide"><br/>
                                  
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><form method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">เพิ่มสไลด์ใหม่</h4>
                                        </div>
                                        <div class="modal-body">
                                           <div class="form-group">
                                             <label for="slide_file">รูปสไลด์ </label>
                                             <input type="file" name="slide_file" id="slide_file" class="form-control">
                                          </div>
                                            <div class="form-group">
                                            <label for="slide_link">ลิงค์</label>
                                            <input type="text" name="slide_link" id="slide_link" class="form-control">
                                          </div>
                                           <div class="form-group">
                                             <label for="slide_sorting">ลำดับที่</label>
                                             <select name="slide_sorting" id="slide_sorting" class="form-control">
                                             <?php
													for($j=1;$j<=($countslide+1);$j++){
														if($j > $countslide){
															echo '<option value="'.$j.'" selected="selected">'.$j.'</option>';
														}else{
															echo '<option value="'.$j.'">'.$j.'</option>';
														}
													}
													   ?>
                                             </select>
                                          </div>
                                        
                                           <div class="form-group">
                                             <label for="slide_status">สถานะ</label>
                                             <select name="slide_status" id="slide_status" class="form-control">
                                               <option value="1" selected="selected">แสดง</option>
                                               <option value="0">ซ่อน</option>
                                             </select>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i> <?php echo @LA_BTN_CLOSE;?></button>
                                            <button type="submit" name="save_slide" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i> <?php echo @LA_BTN_SAVE;?></button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                </form>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->


 
<div class="panel panel-yellow">
  <!-- Default panel contents -->
	<div class="panel-heading">สไลด์ทั้งหมด<span class="pull-right btn_top_right"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-fw"></i> เพิ่มสไลด์ใหม่</button></span></div>
   <div class="table-responsive">
  <!-- Table -->
  <table width="100%" class="table">
  <thead>
  <tr class="table_header">
    <td width="3%" จัดการ>#</td>
    <td width="13%" จัดการ>รูปสไลด์</td>
    <td width="54%" จัดการ>ลิงค์</td>
    <td width="8%" จัดการ>ลำดับที่</td>
    <td width="22%" จัดการ>จัดการ</td>
  </tr>
  </thead>
  <tbody>
  <?php
  $x=0;
  $getslide = $getdata->my_sql_select(NULL,"slideshow","1 ORDER BY slide_sorting");
  while($showslide = mysql_fetch_object($getslide)){
	  $x++;
  ?>
  <tr id="<?php echo @$showslide->slide_key;?>">
    <td align="center" bgcolor="#eeeeee"><?php echo @$x;?></td>
    <td align="center"><img src="../resource/slideshow/thumbs/<?php echo @$showslide->slide_file;?>" width="120" id="img_border" alt=""/></td>
    <td>&nbsp;<?php echo @$showslide->slide_link;?></td>
    <td align="center" valign="middle" bgcolor="#eeeeee"><select name="cng_sort" id="cng_sort" onchange="MM_jumpMenu('parent',this,0)">
       <?php
		$sorting = $getdata->my_sql_show_rows("slideshow","slide_status='1'");
		for($i=1;$i<=($sorting);$i++){
			if($i== $showslide->slide_sorting){
				echo '<option value="function.php?type=chg_ordering&sort='.$i.'&key='.$showslide->slide_key.'" selected>'.$i.'</option>';
			}else{
				echo '<option value="function.php?type=chg_ordering&sort='.$i.'&key='.$showslide->slide_key.'">'.$i.'</option>';
			}
		}
		?>
    </select></td>
    <td align="right" valign="middle">
      <?php
	  if($showslide->slide_status == '1'){
		  echo '<button type="button" class="btn btn-success btn-xs" id="btn-'.@$showslide->slide_key.'" onClick="javascript:changeSlideStatus(\''.@$showslide->slide_key.'\',\'th\');"><i class="fa fa-unlock-alt" id="icon-'.@$showslide->slide_key.'"></i> <span id="text-'.@$showslide->slide_key.'">'.LA_BTN_SHOW.'</span></button>';
	  }else{
		  echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.@$showslide->slide_key.'" onClick="javascript:changeSlideStatus(\''.@$showslide->slide_key.'\',\'th\');"><i class="fa fa-lock" id="icon-'.@$showslide->slide_key.'"></i> <span id="text-'.@$showslide->slide_key.'">'.LA_BTN_HIDE.'</span></button>';
	  }
	  ?><a class="btn btn-info btn-xs" style="color:#FFF;" data-toggle="modal" data-target="#edit_slide" data-whatever="<?php echo @$showslide->slide_key;?>"><i class="fa fa-edit"></i> <?php echo @LA_BTN_EDIT;?></a><button type="button" class="btn btn-danger btn-xs" onClick="javascript:deleteSlide('<?php echo @$showslide->slide_key;?>');"><i class="glyphicon glyphicon-remove"></i> <?php echo @LA_BTN_DELETE;?></button></td>
  </tr>
  <?php
  }
  ?>
  </tbody>
</table>
</div>
</div>
                                </div>
                                <div class="tab-pane fade" id="news"><br/>
                                     <div class="panel panel-green">
                        <div class="panel-heading">
                            ข่าวประชาสัมพันธ์ทั้งหมด<span class="pull-right btn_top_right"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#insert_news"><i class="fa fa-plus fa-fw"></i> เพิ่มข่าวใหม่</button></span>
                        </div>
                        <div class="table-responsive">
                           <table width="100%" border="0" class="table table-bordered">
  <thead>
    <tr class="table_header">
      <td width="11%">วันที่</td>
      <td width="20%">หัวข้อข่าว</td>
      <td width="39%">รายละเอียด</td>
      <td width="22%">จัดการ</td>
    </tr>
							   </thead>
    <tbody>
   <?php
		$getnews  = $getdata->my_sql_select(NULL,"news","1 ORDER BY news_insert DESC");
		while($shownews = mysql_fetch_object($getnews)){
		?>
    <tr id="<?php echo @$shownews->news_key;?>">
      <td align="center"><?php echo @dateTimeConvertor($shownews->news_insert);?></td>
      <td>&nbsp;<?php echo @$shownews->news_title;?></td>
      <td>&nbsp;<?php echo @$shownews->news_detail;?></td>
      <td align="right"><?php
	  if($shownews->news_status == '1'){
		  echo '<button type="button" class="btn btn-success btn-xs" id="btn-'.@$shownews->news_key.'" onClick="javascript:changeNewsStatus(\''.@$shownews->news_key.'\',\'th\');"><i class="fa fa-unlock-alt" id="icon-'.@$shownews->news_key.'"></i> <span id="text-'.@$shownews->news_key.'">'.LA_BTN_SHOW.'</span></button>';
	  }else{
		  echo '<button type="button" class="btn btn-danger btn-xs" id="btn-'.@$shownews->news_key.'" onClick="javascript:changeNewsStatus(\''.@$shownews->news_key.'\',\'th\');"><i class="fa fa-lock" id="icon-'.@$shownews->news_key.'"></i> <span id="text-'.@$shownews->news_key.'">'.LA_BTN_HIDE.'</span></button>';
	  }
	  ?><a class="btn btn-info btn-xs" style="color:#FFF;" data-toggle="modal" data-target="#edit_news" data-whatever="<?php echo @$shownews->news_key;?>"><i class="fa fa-edit"></i> <?php echo @LA_BTN_EDIT;?></a><button type="button" class="btn btn-danger btn-xs" onClick="javascript:deleteNews('<?php echo @$shownews->news_key;?>');"><i class="glyphicon glyphicon-remove"></i> <?php echo @LA_BTN_DELETE;?></button></td>
    </tr>
    <?php
		}
			?>
  </tbody>
</table>
                        </div>
                      
                    </div>
                                </div>
                              
                            </div>
                            
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
function changeSlideStatus(prokey,lang){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var es = document.getElementById('btn-'+prokey);
	if(es.className == 'btn btn-success btn-xs'){
		var sts= 1;
	}else{
		var sts= 0;
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			
			if(es.className == 'btn btn-success btn-xs'){
				document.getElementById('btn-'+prokey).className = 'btn btn-danger btn-xs';
				document.getElementById('icon-'+prokey).className = 'fa fa-lock';
				if(lang == 'en'){
					document.getElementById('text-'+prokey).innerHTML = 'Hide';
				}else{
					document.getElementById('text-'+prokey).innerHTML = 'ซ่อน';
				}
				
			}else{
				document.getElementById('btn-'+prokey).className = 'btn btn-success btn-xs';
				document.getElementById('icon-'+prokey).className = 'fa fa-unlock-alt';
				if(lang == 'en'){
					document.getElementById('text-'+prokey).innerHTML = 'Show';
				}else{
					document.getElementById('text-'+prokey).innerHTML = 'แสดง';
				}
				
			}
  		}
	}
	
	xmlhttp.open("GET","function.php?type=change_slide_status&key="+prokey+"&sts="+sts,true);
	xmlhttp.send();
}
	function changeNewsStatus(prokey,lang){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var es = document.getElementById('btn-'+prokey);
	if(es.className == 'btn btn-success btn-xs'){
		var sts= 1;
	}else{
		var sts= 0;
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			
			if(es.className == 'btn btn-success btn-xs'){
				document.getElementById('btn-'+prokey).className = 'btn btn-danger btn-xs';
				document.getElementById('icon-'+prokey).className = 'fa fa-lock';
				if(lang == 'en'){
					document.getElementById('text-'+prokey).innerHTML = 'Hide';
				}else{
					document.getElementById('text-'+prokey).innerHTML = 'ซ่อน';
				}
				
			}else{
				document.getElementById('btn-'+prokey).className = 'btn btn-success btn-xs';
				document.getElementById('icon-'+prokey).className = 'fa fa-unlock-alt';
				if(lang == 'en'){
					document.getElementById('text-'+prokey).innerHTML = 'Show';
				}else{
					document.getElementById('text-'+prokey).innerHTML = 'แสดง';
				}
				
			}
  		}
	}
	
	xmlhttp.open("GET","function.php?type=change_news_status&key="+prokey+"&sts="+sts,true);
	xmlhttp.send();
}
	
	function deleteSlide(slidekey){
		if(confirm("ต้องการจะลบสไลด์นี้ใช่หรือไม่ ?")){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById(slidekey).innerHTML = '';
  		}
	}
	xmlhttp.open("GET","function.php?type=delete_slide&key="+slidekey,true);
	xmlhttp.send();
		}
}
	function deleteNews(slidekey){
		if(confirm("ต้องการจะลบข่าวประชาสัมพันธ์นี้ใช่หรือไม่ ?")){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById(slidekey).innerHTML = '';
  		}
	}
	xmlhttp.open("GET","function.php?type=delete_news&key="+slidekey,true);
	xmlhttp.send();
		}
}
	$('#edit_slide').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "news/edit_slide.php",
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
	$('#edit_news').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "news/edit_news.php",
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