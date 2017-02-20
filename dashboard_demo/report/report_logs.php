<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-unlock-alt fa-fw"></i> <?php echo @LA_LB_LOGS;?></h1>
     </div>        
</div>
<ol class="breadcrumb">
  <li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
  <li><a href="?p=report"><?php echo @LA_LB_REPORT;?></a></li>
  <li class="active"><?php echo @LA_LB_LOGS;?></li>
</ol>
  <form class="navbar-form"  method="post">
  <div class="panel panel-default row">
                        <div class="panel-heading">
                             <div class="form-group">
   									<div class="input-group">
                                    <span class="input-group-addon"><?php echo @LA_LB_VIEW_REPORT;?> <?php echo @LA_LB_FROM;?></span>
                                        <input type="text" class="form-control" name="date_start" id="dpd1"  value="<?php echo @addslashes($_POST['date_start']);?>" />
                                        <span class="input-group-addon"><?php echo @LA_LB_TO;?></span>
                                        <input type="text" class="form-control" name="date_end"  id="dpd2" value="<?php echo @addslashes($_POST['date_end']);?>" />
                                       
                                    </div>
                          </div>
                                   
  							<button type="submit" name="show_data" class="btn btn-default "><i class="fa fa-search"></i> <?php echo @LA_BTN_SHOW_DATA;?></button>
                        </div>
                        <div class="table-responsive tooltipx">
                        <?php
						if(isset($_POST['show_data'])){
						?>
                       <table width="100%" border="0" class="table table-bordered  table-hover">
                       <thead>
    <tr style="color:#FFF;">
      <th width="4%" bgcolor="#5fb760">#</th>
      <th width="19%" bgcolor="#5fb760"><?php echo @LA_LB_DATE;?></th>
      <th width="18%" bgcolor="#5fb760"><?php echo @LA_LB_IP_ADDR;?></th>
      <th width="41%" bgcolor="#5fb760"><?php echo @LA_LB_DETAIL;?></th>
      <th width="18%" bgcolor="#5fb760"><?php echo @LA_LB_USER;?></th>
      </tr>
    </thead><tbody>
    <?php
	$i=0;
	$gethistory = $getdata->my_sql_select(NULL,"logs,user","user.user_key=logs.log_user AND (logs.log_date BETWEEN '".changeDateFormat(addslashes($_POST['date_start']))." 00:00:00' AND '".changeDateFormat(addslashes($_POST['date_end']))." 23:59:59') ORDER BY logs.log_date");
	while($showhistory = mysql_fetch_object($gethistory)){
		$i++;
	?>
    
    <tr id="<?php echo $showhistory->log_key;?>">
      <td align="center"><?php echo @$i;?></td>
      <td align="center">&nbsp;<?php echo @dateTimeConvertor($showhistory->log_date,$system_info->year_type,$system_info->year_format);?></td>
      <td align="center">&nbsp;<?php echo @$showhistory->log_ipaddress;?></td>
      <td>&nbsp;<?php echo @$showhistory->log_text;?></td>
      <td align="center"><?php echo @$showhistory->name."&nbsp;&nbsp;&nbsp;".$showhistory->lastname;?></td>
      </tr>
    
    <?php
	}
	?></tbody>
  </table>
  <?php
						}
  ?>
  </div>
</div>
</form>