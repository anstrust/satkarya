<aside class="right-side">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome_container">
   <hr>
       <h2 class="intro-text text-center"><strong>Investors Management</strong></h2>
   <hr>
</div><br /><br /><br /><br />
<section class="content">
<div id="flash"><?php echo $this->Session->flash();?></div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
		<div class="pull-right ">
			<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
		</div>
	</div><br /><br /><br />
    <h4><strong>Investors</strong></h4><label>Total Investors : <span class="all_count"><?php echo $totalData;?></span></label>
	<?php 
    echo $this->element('adminElements/investor_list');
  ?>
	</div>
</section>
</aside>
