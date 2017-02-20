<?php
session_start();
error_reporting(0);
//Remove
function EmptyDir($dir) {
$handle=opendir($dir);

while (($file = readdir($handle))!==false) {
@unlink($dir.'/'.$file);
}

closedir($handle);
}
//set_time_default
date_default_timezone_set('Asia/Bangkok'); 
require("../core/connect.core.php");
require("../core/config.core.php");
$getdata=new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();
	switch(addslashes($_GET['type'])){

		case "chg_ordering" : $getdata->my_sql_update("slideshow","slide_sorting='".addslashes($_GET['sort'])."'","slide_key='".addslashes($_GET['key'])."'");
								 echo '<script>window.location="index.php?p=news";</script>';
		break;
		case "change_slide_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("slideshow","slide_status='0'","slide_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("slideshow","slide_status='1'","slide_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_news_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("news","news_status='0'","news_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("news","news_status='1'","news_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_categories_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("categories","categories_status='0'","categories_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("categories","categories_status='1'","categories_key='".addslashes($_GET['key'])."'");
										}
										
		break;
			case "change_prefix_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("members_prefix","prefix_status='0'","prefix_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("members_prefix","prefix_status='1'","prefix_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_field_header_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("field_header","fh_status='0'","fh_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("field_header","fh_status='1'","fh_key='".addslashes($_GET['key'])."'");
										}
										
		break;
			
		case "change_grp_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("member_group","grp_status='0'","grp_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("member_group","grp_status='1'","grp_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_level_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("level","level_status='0'","level_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("level","level_status='1'","level_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		
		case "change_user_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("user","user_status='0'","user_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("user","user_status='1'","user_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_member_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("member","member_status='0'","member_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("member","member_status='1'","member_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_menu_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("menus","menu_status='0'","menu_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("menus","menu_status='1'","menu_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_unit_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("product_unit","unit_status='0'","unit_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("product_unit","unit_status='1'","unit_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_products_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("products","ProductStatus='0'","ProductId='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("products","ProductStatus='1'","ProductId='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_barcode_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("products_barcode","barcode_status='0'","barcode_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("products_barcode","barcode_status='1'","barcode_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_cardtype_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("card_type","ctype_status='0'","ctype_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("card_type","ctype_status='1'","ctype_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_jobtype_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("jobtype","JobTypeStatus='0'","JobTypeId='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("jobtype","JobTypeStatus='1'","JobTypeId='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_brands_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("brands","BrandStatus='0'","BrandId='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("brands","BrandStatus='1'","BrandId='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_models_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("models","ModelStatus='0'","ModelId='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("models","ModelStatus='1'","ModelId='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_producttype_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("producttype","PrdTypeStatus='0'","PrdTypeId='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("producttype","PrdTypeStatus='1'","PrdTypeId='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_employees_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("employees","EmpStatus='0'","EmpId='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("employees","EmpStatus='1'","EmpId='".addslashes($_GET['key'])."'");
										}
										
		break;
		
		case "change_discount_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("member_discount","disc_status='0'","disc_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("member_discount","disc_status='1'","disc_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		
		case "change_access_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("access_list","access_status='0'","access_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("access_list","access_status='1'","access_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_export_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("products_export","export_status='0'","export_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("products_export","export_status='1'","export_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_slide_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("link_slideshow","slide_status='0'","slide_key='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("link_slideshow","slide_status='1'","slide_key='".addslashes($_GET['key'])."'");
										}
										
		break;
		case "change_case_status" : if(addslashes($_GET['sts']) == "1"){
											$getdata->my_sql_update("list","case_status='0'","cases='".addslashes($_GET['key'])."'");
										}else{
											$getdata->my_sql_update("list","case_status='1'","cases='".addslashes($_GET['key'])."'");
										}
										
		break;
		
		case "hide_card" : $getdata->my_sql_update("card_info","card_status='hidden'","card_key='".addslashes($_GET['key'])."'");
		break;
		
	
		case "delete_cat" : $getdata->my_sql_delete("categories","cat_key='".addslashes($_GET['key'])."'");
		break;
			
		case "delete_period" : $getdata->my_sql_delete("commission_period","period_key='".addslashes($_GET['key'])."'");
		break;
		
		case "delete_grp" : $getdata->my_sql_delete("member_group","grp_key='".addslashes($_GET['key'])."'");
		break;
		
		case "delete_user" : $getdata->my_sql_delete("user","user_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_level" : $getdata->my_sql_delete("level","level_key='".addslashes($_GET['key'])."'");
		break;
		
		case "delete_case" : $getdata->my_sql_delete("list","cases='".addslashes($_GET['key'])."'");
		break;
		case "delete_member" : $getdata->my_sql_update("members","member_status='2'","member_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_slide" : $slide = $getdata->my_sql_query("slide_file","slideshow","slide_key='".addslashes($_GET['key'])."'");
								unlink("../resource/slideshow/images/".$slide->slide_file);
								unlink("../resource/slideshow/thumbs/".$slide->slide_file);
								$getdata->my_sql_delete("slideshow","slide_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_news" : $getdata->my_sql_delete("news","news_key='".addslashes($_GET['key'])."'");
			break;
			
		case "delete_categories" : $getdata->my_sql_update("categories","categories_status='2'","categories_key='".addslashes($_GET['key'])."'");
		break;
			case "delete_prefix" : $getdata->my_sql_update("members_prefix","prefix_status='2'","prefix_key='".addslashes($_GET['key'])."'");
		break;
			case "delete_field_header" : $fh_name = $getdata->my_sql_query("fh_name","field_header","fh_key='".addslashes($_GET['key'])."'");
			$getdata->my_sql_string("ALTER TABLE `members` DROP `".$fh_name->fh_name."`;");
			$getdata->my_sql_delete("field_header","fh_key='".addslashes($_GET['key'])."'");
			$getdata->my_sql_delete("field_detail","fh_key='".addslashes($_GET['key'])."'");
			
		break;
			
		case "delete_field_detail" : $getdata->my_sql_delete("field_detail","fd_key='".addslashes($_GET['key'])."'");
		break;
		
		case "delete_card" : $getdata->my_sql_delete("card_info","card_key='".addslashes($_GET['key'])."'");
		$getdata->my_sql_delete("card_item","card_key='".addslashes($_GET['key'])."'");
		$getdata->my_sql_delete("card_status","card_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_menu" : $getdata->my_sql_delete("menus","menu_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_barcode" : $getdata->my_sql_delete("products_barcode","barcode_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_discount" : $getdata->my_sql_delete("member_discount","disc_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_item" : $getdata->my_sql_delete("card_item","item_key='".addslashes($_GET['key'])."'");
		break;
		
		
		case "delete_unit" : $getdata->my_sql_update("product_unit","unit_status='2'","unit_key='".addslashes($_GET['key'])."'");
		break;
		
		case "delete_products" : $getdata->my_sql_update("products","ProductStatus='2'","ProductId='".addslashes($_GET['key'])."'");
									//$getdata->my_sql_update("products_barcode","barcode_status='0'","product_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_product_member" : $getdata->my_sql_update("productcust","ProductCustStatus='2'","ProductCustId='".addslashes($_GET['key'])."'");
		break;
		
		case "delete_pro_import_temp_item" : $getdata->my_sql_delete("import_temp","import_temp_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_pro_export_temp_item" : $getdata->my_sql_delete("export_temp","export_temp_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_other_temp_item" : $getdata->my_sql_delete("products_export_other_temp","other_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_free_temp_item" : $getdata->my_sql_delete("products_export_free_temp","free_key='".addslashes($_GET['key'])."'");
		break;
		
		
		
	case "delete_backup" : 
									
									$getremove = $getdata->my_sql_query(NULL,"backup_logs","backup_key='".addslashes($_GET['key'])."'");
									unlink("../backup/".$getremove->backup_file);
									$getdata->my_sql_delete("backup_logs","backup_key='".addslashes($_GET['key'])."'");
		break;
		case "download_backup" : 
							$getlink = $getdata->my_sql_query("backup_file","backup_logs","backup_key='".addslashes($_GET['key'])."'");
							$file = "../backup/".$getlink->backup_file; 
							$filename = $getlink->backup_file;
							header("Content-Description: Clear Download"); 
							header("Content-Type: application/octet-stream"); 
							header("Content-Disposition: attachment; filename=\"$filename\""); 
							readfile ($file);
							
	break;
	
	case "show_card_count" : $card_count = $getdata->my_sql_show_rows("card_info","card_status <> '' AND card_status <> 'hidden'");
		if($card_count != 0){
			echo @number_format($card_count);
		}
		break;
		case "customer_detail" : $gc = $getdata->my_sql_query("Contact","customers","CustId='".addslashes($_GET['key'])."'");
								echo @$gc->Contact;
		break;
		case "customer_product_list" : 
				$print .='<table width="100%" border="0" class="table table-bordered">
  <thead>
    <tr>
      <td width="3%" align="center" bgcolor="#EEEEEE">#</td>
      <td width="25%" align="center" bgcolor="#EEEEEE"><strong>Product</strong></td>
      <td width="17%" align="center" bgcolor="#EEEEEE"><strong>Brand/Model</strong></td>
      <td width="14%" align="center" bgcolor="#EEEEEE"><strong>S/N</strong></td>
      <td width="10%" align="center" bgcolor="#EEEEEE"><strong>TIJ No.</strong></td>
      <td width="10%" align="center" bgcolor="#EEEEEE"><strong>Ink No.</strong></td>
      <td width="9%" align="center" bgcolor="#EEEEEE"><strong>Makeup No.</strong></td>
      <td width="12%" align="center" bgcolor="#EEEEEE"><strong>Print Head Code</strong></td>
    </tr>
    </thead>
    <tbody>';
	$getprolist = $getdata->my_sql_select(NULL,"productcust,products,brands,models","productcust.CustId='".addslashes($_GET['key'])."' AND productcust.ProductId = products.ProductId AND products.BrandId=brands.BrandId AND products.ModelId = models.ModelId");
	while($showprolist = mysql_fetch_object($getprolist)){
			$print .='<tr>
			  <td align="center"><input type="radio" name="prolist" id="radio" onClick="javascript:lastItem(\''.addslashes($_GET['key']).'\',\''.$showprolist->ProductCustId.'\');" value="'.$showprolist->ProductCustId.'"></td>
			  <td>'.$showprolist->ProductName.'</td>
			  <td>'.$showprolist->BrandName.'/'.$showprolist->ModelName.'</td>
			  <td>'.$showprolist->SerialNo.'</td>
			  <td>'.$showprolist->TIJNo.'</td>
			  <td>'.$showprolist->InkNo.'</td>
			  <td>'.$showprolist->MakeUpNo.'</td>
			  <td>'.$showprolist->PrintHeadCode.'</td>
			</tr>';
	}
  $print .='</tbody>
</table>';
			echo $print;							
		break;
		case "get_last_items" : $getlast = $getdata->my_sql_query(NULL,"jobs,jobdetails","jobs.CustId='".addslashes($_GET['cust'])."' AND jobs.ProductCustId='".addslashes($_GET['procustid'])."' AND jobs.JobStatus='1'   AND jobs.JobId=jobdetails.JobId ORDER BY JobInsert DESC");
		//AND jobdetails.JobId < '31'
		function dateConvertor($date){
		$epd = explode("-",$date);
		$Y=$epd[0]+543;
		if($date != NULL){
			return $epd[2]."/".$epd[1]."/".$Y;
		}else{
			return '&nbsp;';
		}
		
	
}
		$printx .='<table width="100%" border="0" class="table " style="margin:-5px; ">
  <tbody>
    <tr>
      <td width="10%" align="center"><input type="hidden" id="lastsvh" value="'.@$getlast->P_ServiceHour.'"><span id="lastddx">'.dateConvertor(@$getlast->JobDetailDate).'<input type="hidden" name="h_suggetion" id="h_suggetion" value="'.$getlast->Suggustion.'"></span></td>
      <td width="9.1%" style="border-left:#cecece solid 1px; text-align:center;color:#11a60e;">'.@$getlast->P_VODVMS_Set.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_VODVMS_Cur.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_Modulation_Set.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_Modulation_Cur.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_Pressure_Set.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_Pressure_Cur.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">';
	  $printx .=@($getlast->P_Vacuum_Set != 0)?'(V) '.$getlast->P_Vacuum_Set:'(P) '.$getlast->P_Phase_Set;
	  $printx .='</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">';
	  $printx .=@($getlast->P_Vacuum_Cur != 0)?'(V) '.$getlast->P_Vacuum_Cur:'(P) '.$getlast->P_Phase_Cur;
	  $printx .='</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_MakeupAdd.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_GroundWire.'</td>
    </tr>
  </tbody>
</table>';
echo $printx;
		break;
		case "get_last_items2" : $getlast = $getdata->my_sql_query(NULL,"jobs,jobdetails","jobs.CustId='".addslashes($_GET['cust'])."' AND jobs.ProductCustId='".addslashes($_GET['procustid'])."' AND jobs.JobStatus='1' AND jobdetails.JobId < '".addslashes($_GET['jid'])."'  AND jobs.JobId=jobdetails.JobId ORDER BY JobInsert DESC");
		//
		function dateConvertor($date){
		$epd = explode("-",$date);
		$Y=$epd[0]+543;
		if($date != NULL){
			return $epd[2]."/".$epd[1]."/".$Y;
		}else{
			return '&nbsp;';
		}
		
	
}
		$printx .='<table width="100%" border="0" class="table " style="margin:-5px; ">
  <tbody>
    <tr>
      <td width="10%" align="center"><input type="hidden" id="lastsvh" value="'.@$getlast->P_ServiceHour.'"><span id="lastddx">'.dateConvertor(@$getlast->JobDetailDate).'<input type="hidden" name="h_suggetion" id="h_suggetion" value="'.$getlast->Suggustion.'"></span></td>
      <td width="9.1%" style="border-left:#cecece solid 1px; text-align:center;color:#11a60e;">'.@$getlast->P_VODVMS_Set.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_VODVMS_Cur.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_Modulation_Set.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_Modulation_Cur.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_Pressure_Set.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_Pressure_Cur.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">';
	  $printx .=@($getlast->P_Vacuum_Set != 0)?'(V) '.$getlast->P_Vacuum_Set:'(P) '.$getlast->P_Phase_Set;
	  $printx .='</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">';
	  $printx .=@($getlast->P_Vacuum_Cur != 0)?'(V) '.$getlast->P_Vacuum_Cur:'(P) '.$getlast->P_Phase_Cur;
	  $printx .='</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_MakeupAdd.'</td>
      <td width="9.1%" style="border-left:#cecece solid 1px;text-align:center;color:#11a60e;">'.@$getlast->P_GroundWire.'</td>
    </tr>
  </tbody>
</table>';
echo $printx;
		break;
		
		
		case "insert_jobtranparts_temp" : if(addslashes($_GET['ptn']) != NULL){
			$getdata->my_sql_insert("jobtranparts_temp","temp_key='".md5(rand().time("now"))."',user_key='".addslashes($_GET['user'])."',Sequence='".addslashes($_GET['seq'])."',PartName='".addslashes($_GET['ptn'])."',Total='".addslashes($_GET['tol'])."',RetCustomer='".addslashes($_GET['rct'])."',RetTIJ='".addslashes($_GET['rtj'])."',Remark='".addslashes($_GET['nte'])."'");
		}
		break;
		case "insert_jobtranparts" : if(addslashes($_GET['ptn']) != NULL){
			$getdata->my_sql_insert("jobtranparts","JobId='".addslashes($_GET['key'])."',Sequence='".addslashes($_GET['seq'])."',PartName='".addslashes($_GET['ptn'])."',Total='".addslashes($_GET['tol'])."',RetCustomer='".addslashes($_GET['rct'])."',RetTIJ='".addslashes($_GET['rtj'])."',Remark='".addslashes($_GET['nte'])."'");
		}
		break;
		case "show_part_all" : $ret .= '<table width="100%" border="0" class="table" style="margin:-5px; ">
  <tbody>';
  $gettemp = $getdata->my_sql_select(NULL,"jobtranparts_temp","user_key='".addslashes($_GET['key'])."' ORDER BY Sequence");
  while($showtemp = mysql_fetch_object($gettemp)){
      $ret .='<tr id="'.$showtemp->temp_key.'"><td width="6%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->Sequence.'</td>
      <td width="40%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->PartName.'</td>
      <td width="6%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->Total.'</td>
      <td width="9.5%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->RetCustomer.'</td>
      <td width="8.5%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->RetTIJ.'</td>
      <td width="25%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->Remark.'</td>
	  <td width="5%" style="border-left:#cecece solid 1px; text-align:center;"><a class="btn btn-xs btn-danger" onClick="javascript:deleteItemPart(\''.$showtemp->temp_key.'\')"><i class="fa fa-times"></i></a></td>
    </tr>';
  }
  $ret .='</tbody>
</table>';
echo $ret;
		break;
		case "show_part_all2" : $ret .= '<table width="100%" border="0" class="table" style="margin:-5px; ">
  <tbody>';
  $gettemp = $getdata->my_sql_select(NULL,"jobtranparts","JobId = '".addslashes($_GET['key'])."' ORDER BY Sequence");
  while($showtemp = mysql_fetch_object($gettemp)){
      $ret .='<tr id="tr-'.$showtemp->JobTranpartId.'"><td width="6%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->Sequence.'</td>
      <td width="40%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->PartName.'</td>
      <td width="6%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->Total.'</td>
      <td width="9.5%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->RetCustomer.'</td>
      <td width="8.5%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->RetTIJ.'</td>
      <td width="20%" style="border-left:#cecece solid 1px; text-align:center;">'.$showtemp->Remark.'</td>
	  <td width="10%" style="border-left:#cecece solid 1px; text-align:right;"><a class="btn btn-xs btn-info" style="color:#FFF;" data-toggle="modal" data-target="#edit_item_job" data-whatever="'.$showtemp->JobTranpartId.'"><i class="fa fa-edit"></i></a><a class="btn btn-xs btn-danger" onClick="javascript:deleteItemPart2(\''.$showtemp->JobTranpartId.'\')" style="color:#FFF;"><i class="fa fa-times"></i></a></td>
    </tr>';
  }
  $ret .='</tbody>
</table>';
echo $ret;
		break;
		case "delete_item_part_temp" : $getdata->my_sql_delete("jobtranparts_temp","temp_key='".addslashes($_GET['key'])."'");
		break;
		case "delete_item_part" : $getdata->my_sql_delete("jobtranparts","JobTranpartId='".addslashes($_GET['key'])."'");
		break;
		

	}