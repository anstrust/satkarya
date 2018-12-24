<aside class="right-side">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome_container">
   <hr>
       <h2 class="intro-text text-center"><strong>Inventti-Ancilliary Service Management</strong></h2>
   <hr>
</div><br /><br /><br /><br />
<section class="content">
<?php echo $this->Session->flash(); ?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="pull-right">
			<a href="<?php echo HTTP_ROOT;?>admin/users/dashboard" class="btn-success btn-sm backbtn" >Back</a>
		</div>
	</div><br /><br /><br />
  <h4><strong>Manage Pages</strong></h4><label>Total Inventti-Ancilliary Service: <span class="all_count"><?php echo count($totalData);?></span></label>
	<div id='search_result'>
	<?php echo $this->element('adminElements/inventtiancilliary_list');?>
	</div>
</section>
</aside>

