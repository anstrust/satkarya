<aside class="right-side">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome_container">
   <hr>
       <h2 class="intro-text text-center"><strong>Ritu Management</strong></h2>
   <hr>
</div><br /><br /><br /><br />
<section class="content">
<?php echo $this->Session->flash(); ?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="pull-right">
			<a href="<?php echo HTTP_ROOT;?>admin/users/add_ritu" class="btn-success btn-sm backbtn" ><i class="fa fa-lg fa-plus"></i> &nbsp;Add Ritu Post</a>&nbsp;&nbsp;&nbsp;
			<a href="<?php echo HTTP_ROOT;?>admin/users/dashboard" class="btn-success btn-sm backbtn" >Back</a>
		</div>
	</div><br /><br /><br />
  <h4><strong>Ritu Post</strong></h4><label>Total Post : <span class="all_count"><?php echo count($total);?></span></label>
	<div id='search_result'>
	<?php echo $this->element('adminElements/ritu_list');?>
	</div>
</section>
</aside>

