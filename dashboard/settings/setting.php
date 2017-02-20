<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-gear fa-fw"></i> <?php echo @LA_LB_SETTING;?></h1>
     </div>        
</div>
<ol class="breadcrumb">
  <li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
  <li class="active"><?php echo @LA_LB_SETTING;?></li>
</ol>
<div class="button_center">

<div class="panel panel-yellow">
     <div class="panel-heading"><?php echo @LA_LB_ABOUT_SYSTEM;?></div>
         <div class="panel-body">
         <?php
echo @accessInPage('7fea6fea61143d1fcb188f3080ecc446',$userdata->user_key,' <a href="?p=setting_system" class="btn btn-default btn_main_wd"><i class="fa fa-wrench fa-fw fa-6x"></i><br/><br/>'.@LA_LB_SYSTEM_SETTING.'</a>
          <a href="?p=setting_users" class="btn btn-default btn_main_wd"><i class="fa fa-user fa-fw fa-6x"></i><br/><br/>'.@LA_LB_SYSTEM_USER.'</a>
          <a href="?p=setting_backup" class="btn btn-default btn_main_wd"><i class="fa fa-database fa-fw fa-6x"></i><br/><br/>'.@LA_LB_BACKUP.'</a>');
?>
          <a href="?p=about" class="btn btn-default btn_main_wd"><i class="fa fa-info-circle fa-fw fa-6x"></i><br/><br/>เกี่ยวกับ</a>
                
         </div>
                       
</div>      
<div class="panel panel-yellow">
     <div class="panel-heading"><?php echo @LA_LB_USER_DATA;?></div>
         <div class="panel-body">
               <a href="?p=setting_info" class="btn btn-default btn_main_wd"><i class="fa flaticon-id fa-fw fa-6x"></i><br/><br/><?php echo @LA_LB_USER_DATA;?></a>
               
         </div>
                       
</div> 
<?php echo @accessModule('5b9c14b5d0d3466b6b41930fa42c881f','<div class="panel panel-primary">
     <div class="panel-heading">Lynda Link</div>
         <div class="panel-body">
               <a href="?p=setting_link_slide" class="btn btn-primary btn_main_wd"><i class="fa flaticon-pictures fa-fw fa-6x"></i><br/><br/>'.LA_LB_SLIDE_SHOW.'</a>
			   <a href="?p=setting_link_how_to_buy" class="btn btn-primary btn_main_wd"><i class="fa flaticon-basket8 fa-fw fa-6x"></i><br/><br/>'.LA_LB_HOW_TO_BUY.'</a>
			   <a href="?p=setting_link_how_to_pay" class="btn btn-primary btn_main_wd"><i class="fa flaticon-dollar22 fa-fw fa-6x"></i><br/><br/>'.LA_LB_HOW_TO_PAY.'</a>
			   <a href="?p=setting_link_about" class="btn btn-primary btn_main_wd"><i class="fa flaticon-information26 fa-fw fa-6x"></i><br/><br/>'.LA_LB_ABOUT_ME.'</a>
         </div>
                       
</div>');?>

<?php

if(@$_SESSION['uclass'] == 3){
?>    
<div class="panel panel-danger">
     <div class="panel-heading"><?php echo @LA_LB_ADMINISTRATOR;?></div>
         <div class="panel-body">
               <a href="?p=administrator_access_list" class="btn btn-danger btn_main_wd"><i class="fa fa-list fa-fw fa-6x"></i><br/><br/><?php echo @LA_LB_ADMIN_ACCESS_LIST;?></a>
               <a href="?p=administrator_cases" class="btn btn-danger btn_main_wd"><i class="fa fa-chain fa-fw fa-6x"></i><br/><br/><?php echo @LA_LB_ADMIN_PAGE_LINK;?></a>
               <a href="?p=administrator_menus" class="btn btn-danger btn_main_wd"><i class="fa fa-sitemap fa-fw fa-6x"></i><br/><br/><?php echo @LA_LB_ADMIN_MENU;?></a>
               <a href="?p=administrator_modules" class="btn btn-danger btn_main_wd"><i class="fa fa-puzzle-piece fa-fw fa-6x"></i><br/><br/><?php echo @LA_LB_ADMIN_MODULE;?></a>
               <a href="?p=administrator_helper" class="btn btn-danger btn_main_wd"><i class="fa flaticon-ring7 fa-fw fa-6x"></i><br/><br/><?php echo @LA_LB_HELP;?></a>
               
         </div>
                       
</div>         
<?php
}
?>
</div>