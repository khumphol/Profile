<?php
date_default_timezone_set('Asia/Bangkok');
//------------ in use -------------

function updateDateNow(){
	$getdata = new clear_db();
	$getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$gety = $getdata->my_sql_query("month","autonumber",NULL);
	if(date("m") != $gety->month){
		$getdata->my_sql_update("autonumber","item_number='1',finance_number='1',quotation_number='1',invoice_number='1',year='".date("Y")."',month='".date("m")."',day='".date("d")."'",NULL);
	}else{
		$getdata->my_sql_update("autonumber","year='".date("Y")."',month='".date("m")."',day='".date("d")."'",NULL);
	}
	
}

function dateConvertor($date){
	$epd = explode("-",$date);
		$Y=$epd[0]+543;
		return $epd[2]."/".$epd[1]."/".$Y;
	
}
function changeDateFormat($tdate){
	$cutd = explode("/",$tdate);
	return $cutd[2].'-'.$cutd[1].'-'.$cutd[0];
}
function changeDateFormatReVerst($date){
	$cutd = explode("-",$date);
	$y = $cutd[0];
	if($date != '0000-00-00'){
	return $cutd[2].'/'.$cutd[1].'/'.$y;
	}
}
function dateConvertorAD($date){
	return date("F d, Y", strtotime($date));
	
}
function resizeSlideThumb($imgname){
	$images = "../resource/slideshow/images/".$imgname;
	$new_images = "../resource/slideshow/thumbs/".$imgname;

		$width=240; //*** Fix Width & Heigh (Auto caculate) ***//
		$size=GetimageSize($images);
		$height=round($width*$size[1]/$size[0]);
		$images_orig = ImageCreateFromJPEG($images);
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
  		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		ImageJPEG($images_fin,$new_images);
		ImageDestroy($images_fin);
}
function resizeImageThumb($imgext,$imgname,$imgfolder){
	switch($imgext){
		case "jpg" :
		case "jpeg" : 		$images = "../resource/".$imgfolder."/images/".$imgname;
							$new_images = "../resource/".$imgfolder."/thumbs/".$imgname;
						
					
							$width=400; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromJPEG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageJPEG($images_fin,$new_images);
							ImageDestroy($images_fin);
			break;
			case "png" : 	$images = "../resource/".$imgfolder."/images/".$imgname;
							$new_images = "../resource/".$imgfolder."/thumbs/".$imgname;
						
					
							$width=400; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromPNG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImagePNG($images_fin,$new_images);
			break;
			case "gif"	:	$images = "../resource/".$imgfolder."/images/".$imgname;
							$new_images = "../resource/".$imgfolder."/thumbs/".$imgname;
					
					
							$width=400; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromGIF($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageGIF($images_fin,$new_images);
			break;
			default : $images = "../resource/".$imgfolder."/images/".$imgname;
							$new_images = "../resource/".$imgfolder."/thumbs/".$imgname;
						
					
							$width=400; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromJPEG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageJPEG($images_fin,$new_images);
							ImageDestroy($images_fin);
							
	}
	
}
function dateTimeConvertor($datetime){
	$epd = explode(" ",$datetime);
	$date = new DateTime($epd[0]);
	$exptime = explode(":",$epd[1]);
	$date->setTime($exptime[0],$exptime[1],$exptime[2]);
	$Y=$epd[0]+543;
	return $date->format("d/m/$Y H:i:s");
}
function dateOnlyConvertor($datetime){
	$epd = explode(" ",$datetime);
	$epx = explode("-",$epd[0]);
	return $epx[2].'/'.$epx[1].'/'.$epx[0];
}
function substr_word($body,$maxlength){
    if (strlen($body)<$maxlength) return $body;
    $body = substr($body, 0, $maxlength);
    $rpos = strrpos($body,' ');
    if ($rpos>0) $body = substr($body, 0, $rpos);
    return $body;
}

function resizeProductThumb($imgext,$imgname){
	switch($imgext){
		case "jpg" :
		case "jpeg" : 		$images = "../resource/products/images/".$imgname;
							$new_images = "../resource/products/thumbs/".$imgname;
						
					
							$width=400; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromJPEG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageJPEG($images_fin,$new_images);
							ImageDestroy($images_fin);
			break;
			case "png" : 	$images = "../resource/products/images/".$imgname;
							$new_images = "../resource/products/thumbs/".$imgname;
						
					
							$width=400; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromPNG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImagePNG($images_fin,$new_images);
			break;
			case "gif"	:	$images = "../resource/products/images/".$imgname;
							$new_images = "../resource/products/thumbs/".$imgname;
					
					
							$width=400; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromGIF($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageGIF($images_fin,$new_images);
			break;
			default : $images = "../resource/products/images/".$imgname;
							$new_images = "../resource/products/thumbs/".$imgname;
						
					
							$width=400; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromJPEG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageJPEG($images_fin,$new_images);
							ImageDestroy($images_fin);
							
	}
	
}
function resizeMemberThumb($imgext,$imgname){
	switch($imgext){
		case "jpg" :
		case "jpeg" : 		$images = "../resource/members/images/".$imgname;
							$new_images = "../resource/members/thumbs/".$imgname;
						
					
							$width=250; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromJPEG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageJPEG($images_fin,$new_images);
							ImageDestroy($images_fin);
			break;
			case "png" : 	$images = "../resource/members/images/".$imgname;
							$new_images = "../resource/members/thumbs/".$imgname;
						
					
							$width=250; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromPNG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImagePNG($images_fin,$new_images);
			break;
			case "gif"	:	$images = "../resource/members/images/".$imgname;
							$new_images = "../resource/members/thumbs/".$imgname;
					
					
							$width=250; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromGIF($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageGIF($images_fin,$new_images);
			break;
			default : $images = "../resource/members/images/".$imgname;
							$new_images = "../resource/members/thumbs/".$imgname;
						
					
							$width=250; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromJPEG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageJPEG($images_fin,$new_images);
							ImageDestroy($images_fin);
							
	}
	
}
function resizeUserThumb($imgext,$imgname){
	switch($imgext){
		case "jpg" :
		case "jpeg" : 		$images = "../resource/users/images/".$imgname;
							$new_images = "../resource/users/thumbs/".$imgname;
						
					
							$width=250; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromJPEG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageJPEG($images_fin,$new_images);
							ImageDestroy($images_fin);
			break;
			case "png" : 	$images = "../resource/users/images/".$imgname;
							$new_images = "../resource/users/thumbs/".$imgname;
						
					
							$width=250; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromPNG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImagePNG($images_fin,$new_images);
			break;
			case "gif"	:	$images = "../resource/users/images/".$imgname;
							$new_images = "../resource/users/thumbs/".$imgname;
					
					
							$width=250; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromGIF($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageGIF($images_fin,$new_images);
			break;
			default : $images = "../resource/users/images/".$imgname;
							$new_images = "../resource/users/thumbs/".$imgname;
						
					
							$width=250; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromJPEG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageJPEG($images_fin,$new_images);
							ImageDestroy($images_fin);
							
	}
	
}function accessMenus($access_key,$user_key,$return_value){
	$getdata = new clear_db();
	$getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getmenu_list = $getdata->my_sql_show_rows("access_list","access_key='".$access_key."' AND access_status='1'");
	$getmenu_status = $getdata->my_sql_show_rows("access_user","access_key='".$access_key."' AND user_key='".$user_key."' AND access_status='1'");
	if($getmenu_status == 0 && $getmenu_list != 0){
		return '';
	}else if($getmenu_status == 0 && $getmenu_list == 0){
		return $return_value;
	}else{
		return $return_value;
	}
}
function accessPage($access_key,$user_key,$return_value){
	$getdata = new clear_db();
	$getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getmenu_status = $getdata->my_sql_show_rows("access_user","access_key='".$access_key."' AND user_key='".$user_key."' AND access_status='1'");
	if($getmenu_status != 0){
		return '';
	}else{
		return $return_value;
	}
}
function accessInPage($access_key,$user_key,$return_value){
	$getdata = new clear_db();
	$getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getmenu_status = $getdata->my_sql_show_rows("access_user","access_key='".$access_key."' AND user_key='".$user_key."' AND access_status='1'");
	if($getmenu_status == 0){
		return '';
	}else{
		return $return_value;
	}
}
function accessInPageNot($access_key,$user_key,$return_value){
	$getdata = new clear_db();
	$getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getmenu_status = $getdata->my_sql_show_rows("access_user","access_key='".$access_key."' AND user_key='".$user_key."' AND access_status='1'");
	if($getmenu_status == 0){
		return $return_value;
	}else{
		return '';
	}
}

function accessModule($module_key,$return_value){
	$getdata = new clear_db();
	$getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getmodule_status = $getdata->my_sql_show_rows("modules","module_key='".$module_key."' AND module_status='1'");
	if($getmodule_status != 1){
		return '';
	}else{
		return $return_value;
	}
}


function getPhotoSize($photo){
	$size=GetimageSize($photo);
	if($size[0] > $size[1]){
		return 'height="50%"';
	}else if($size[0] < $size[1]){
		return 'width="50%"';
	}else{
		return 'height="50%" width="50%"';
	}
}

function RandomString($password_pattern,$password_prefix,$password_length)
{
	if($password_pattern == 1){
		$characters = '0123456789';
	}else if($password_pattern == 2){
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	}else if($password_pattern == 3){
		$characters = 'abcdefghijklmnopqrstuvwxyz';
	}else if($password_pattern == 4){
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	}else if($password_pattern == 5){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	}else if($password_pattern == 6){
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	}else{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	}
    
    $randstring = '';
    for ($i = 0; $i < $password_length; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
	if($randstring < $password_length){
		$randstring = '';
		 for ($i = 0; $i < $password_length; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
		return $password_prefix.$randstring;
	}else{
		return $password_prefix.$randstring;
	}
    
}

function url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
	
    $full = $protocol . "://" . $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
	$cut = str_replace('dashboard/card/print_card.php','card.php?key=',$full);
	return $cut;
}

function showStudentField($fh_key){
	$getdata = new clear_db();
	$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getfh = $getdata->my_sql_query(NULL,"field_header","fh_key='".$fh_key."'");
	switch($getfh->fh_type){
		case "1": return '<div class="form-group"><label for="'.$getfh->fh_name.'">'.$getfh->fh_title.'</label>
<input type="text" name="'.$getfh->fh_name.'" id="'.$getfh->fh_name.'" class="form-control"></div>';
			break;
		case "2": $rt ='<div class="form-group"><label for="select">'.$getfh->fh_title.'</label>
<select name="'.$getfh->fh_name.'" id="'.$getfh->fh_name.'" class="form-control">';
$getfd = $getdata->my_sql_select(NULL,"field_detail","fh_key='".$getfh->fh_key."' ORDER BY fd_title");
			while($showfd = mysql_fetch_object($getfd)){
				$rt .= '<option value="'.$showfd->fd_value.'">'.$showfd->fd_title.'</option>';
			}
$rt .='</select></div>';
			return $rt;
			break;
		case "3": return '<div class="form-group"><label for="'.$getfh->fh_name.'">'.$getfh->fh_title.'</label>
<textarea name="'.$getfh->fh_name.'" id="'.$getfh->fh_name.'" class="form-control"></textarea></div>';
			break;
	}
}
function editStudentField($fh_key,$member_key){
	$getdata = new clear_db();
	$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getfh = $getdata->my_sql_query(NULL,"field_header","fh_key='".$fh_key."'");
	$getmember = $getdata->my_sql_query(NULL,"members","member_key='".$member_key."'");
	$fhn = $getfh->fh_name;
	switch($getfh->fh_type){
		case "1": return '<div class="form-group"><label for="'.$getfh->fh_name.'">'.$getfh->fh_title.'</label>
<input type="text" name="'.$getfh->fh_name.'" id="'.$getfh->fh_name.'" class="form-control" value="'.$getmember->$fhn.'"></div>';
			break;
		case "2": $rt ='<div class="form-group"><label for="select">'.$getfh->fh_title.'</label>
<select name="'.$getfh->fh_name.'" id="'.$getfh->fh_name.'" class="form-control">';
$getfd = $getdata->my_sql_select(NULL,"field_detail","fh_key='".$getfh->fh_key."' ORDER BY fd_title");
			while($showfd = mysql_fetch_object($getfd)){
				if($showfd->fd_value == $getmember->$fhn){
					$rt .= '<option value="'.$showfd->fd_value.'" selected>'.$showfd->fd_title.'</option>';
				}else{
					$rt .= '<option value="'.$showfd->fd_value.'">'.$showfd->fd_title.'</option>';
				}
				
			}
$rt .='</select></div>';
			return $rt;
			break;
		case "3": return '<div class="form-group"><label for="'.$getfh->fh_name.'">'.$getfh->fh_title.'</label>
<textarea name="'.$getfh->fh_name.'" id="'.$getfh->fh_name.'" class="form-control">'.$getmember->$fhn.'</textarea></div>';
			break;
	}
}
function showStudentDataTitle($fh_key){
	$getdata = new clear_db();
	$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getfh = $getdata->my_sql_query(NULL,"field_header","fh_key='".$fh_key."'");
	return $getfh->fh_title;
	
}
function showStudentDataValue($fh_key,$member_key){
	$getdata = new clear_db();
	$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getfh = $getdata->my_sql_query(NULL,"field_header","fh_key='".$fh_key."'");
	$getmember = $getdata->my_sql_query(NULL,"members","member_key='".$member_key."'");
	$fhn = $getfh->fh_name;
	return $getmember->$fhn;
	
	
}
function prefixConvertor($prefix){
	$getdata = new clear_db();
	$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getprefix = $getdata->my_sql_query(NULL,"members_prefix","prefix_code='".$prefix."'");
	return $getprefix->prefix_title;
}
function groupConvertor($group_key){
	$getdata = new clear_db();
	$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getcat = $getdata->my_sql_query(NULL,"categories","categories_key='".$group_key."'");
	return $getcat->categories_name;
}
function Cokidoo_DateTime($date){
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array('วินาที', 'นาที', 'ชั่วโมง', 'วัน', 'สัปดาห์', 'เดือน', 'ปี', 'ทศวรรษ');
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = 'ที่แล้ว';
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = 'จากนี้';
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "";
    }
    
    return "$difference&nbsp;$periods[$j]&nbsp;{$tense}";
}
function getUserName($user_key){
	$getdata = new clear_db();
	$getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$getdata->my_sql_set_utf8();
	$getuser = $getdata->my_sql_query("name,lastname","user","user_key='".$user_key."'");
	return $getuser->name.'&nbsp;&nbsp;&nbsp;'.$getuser->lastname;
}
?>