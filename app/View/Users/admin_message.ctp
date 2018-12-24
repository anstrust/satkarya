

<aside class="right-side">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome_container">
   <hr>
       <h2 class="intro-text text-center"><strong>Previous Messages Details</strong></h2>
   <hr>
</div><br /><br /><br /><br />
<section class="content">

<div class="pull-right" style="">
		<!--<a href="<?php echo HTTP_ROOT.'admin/users/message'?>"  class="btn-success btn-sm backbtn" >Previous Messages</a> -->
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div><br /><br />
<div id="flash"><?php echo $this->Session->flash();?></div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <?php 
    echo $this->element('adminElements/message_list');
  ?>
	</div>
	
</section>
</aside>