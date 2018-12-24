<aside class="right-side">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome_container">
   <hr>
       <h2 class="intro-text text-center"><strong>Admin Trending Company</strong></h2>
   <hr>
</div><br /><br /><br /><br />
<section class="content">
<div id="flash"><?php echo $this->Session->flash();?></div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
	
    <!--<h4><strong>Admin Trending Company</strong></h4><label>Total Investors : <span class="all_count"><?php echo $totalData;?></span></label>-->
	<?php 
    echo $this->element('adminElements/admin_trending_list');
  ?>
	</div>
</section>
</aside>
