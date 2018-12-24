<aside class="right-side">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome_container">
   <hr>
       <h2 class="intro-text text-center"><strong>Post Management</strong></h2>
   <hr>
</div><br /><br /><br /><br />
<section class="content">
<?php echo $this->Session->flash();?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
		<div class="pull-right ">
			<a href="<?php echo HTTP_ROOT.'admin/users/dashboard'?>" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
		</div>
	</div><br /><br /><br />
    <h4><strong>Post</strong></h4><label>Total Post : <span class="all_count"><?php echo count($total_news_template);?></span></label>
	<?php echo $this->element('adminElements/post_list');?>
	</div>
</section>
</aside>
