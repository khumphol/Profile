<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-home fa-fw"></i> <?php echo @LA_MN_HOME;?></h1>
     </div>        
</div>
<ol class="breadcrumb">
  <li class="active"><?php echo @LA_MN_HOME;?></li>
</ol>
<div class="row">
<div class="col-md-7" >
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators "  >
        <?php
		$i=0;
		$getslide = $getdata->my_sql_select(NULL,"slideshow","slide_status='1' ORDER BY slide_sorting");
									while($showslide = mysql_fetch_object($getslide)){
										if($i==0){
											echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';
										}else{
											echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
										}
										$i++;
										
									}
		?>
         
        </ol>
        <div class="carousel-inner" >
         <?php
		 $j=0;
									$getslide2 = $getdata->my_sql_select(NULL,"slideshow","slide_status='1' ORDER BY slide_sorting");
									while($showslide2 = mysql_fetch_object($getslide2)){
										if($j == 0){
												echo '  <div class="item active"><a href="'.$showslide2->slide_link.'"  class="img-hover" ><img src="../resource/slideshow/images/'.$showslide2->slide_file.'" alt="Slider"></a></div>';
										}else{
											echo '  <div class="item "><a href="'.$showslide2->slide_link.'"  class="img-hover" ><img src="../resource/slideshow/images/'.$showslide2->slide_file.'" alt="Slider"></a></div>';
										}
										$j++;
									}
									?>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
      <br/>
</div>
<div class="col-md-5"><div class="panel panel-default">
                        <div class="panel-heading">
							<i class="fa fa-newspaper-o"></i> ข่าวประชาสัมพันธ์
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                               <?php
								$getnews  = $getdata->my_sql_select(NULL,"news","news_status = '1' ORDER BY news_insert DESC LIMIT 5");
		while($shownews = mysql_fetch_object($getnews)){
								?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo @$shownews->news_key;?>"><i class="fa fa-newspaper-o"></i> <?php echo @$shownews->news_title;?></a>
                                        </h4>
                                    </div>
                                    <div id="<?php echo @$shownews->news_key;?>" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            <?php echo @$shownews->news_detail;?>
                                        </div>
										<div class="panel-footer"><i class="fa fa-clock-o"></i> <?php echo @Cokidoo_DateTime($shownews->news_insert);?>&nbsp;By&nbsp;<?php echo @getUserName($shownews->user_key);?>
                                  </div>
                                    </div>
                                </div>
                                <?php
		}
								?>
                                
                                
                                
                            </div>
                            
                            
                        </div>
                       
                    </div></div>
</div>