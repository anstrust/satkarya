<aside class="right-side">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome_container">
   <hr>
       <h2 class="intro-text text-center"><strong>Service</strong></h2>
   <hr>
</div><br /><br /><br /><br />
<section class="content">
<?php echo $this->Session->flash(); ?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="pull-right">
			<a style="cursor:pointer;" class="btn btn-success btn-sm " href="<?php echo HTTP_ROOT.'admin/users/add_service';?>">Add Service</a>
			<a href="javascript:void(0);"  onclick="history.go(-1)" class="btn btn-success btn-sm" >Back</a>
        </div>
	</div><br /><br /><br />
	<h4><strong>Service</strong></h4>
	<div id='search_result'>
		<?php echo $this->element('adminElements/admin_service');?>
	</div>
</section>
</aside>




