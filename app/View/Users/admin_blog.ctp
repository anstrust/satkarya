
<aside class="right-side">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome_container">
   <hr>
       <h2 class="intro-text text-center"><strong>Blog's</strong></h2>
   <hr>
</div><br /><br /><br /><br />
<section class="content">
<?php echo $this->Session->flash(); ?>
</br></br>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="pull-right">
		<a href="<?php echo HTTP_ROOT.'admin/users/add_blog'?>"  class="btn-success btn-sm backbtn" ><i class="fa fa-lg fa-plus"></i> &nbsp;Add Blog</a>
			<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
		</div>
	</div><br /><br /><br />
  <h4><strong>Manage Blog</strong></h4><label>Total Blog's :  <span class="all_count"><?php echo count($totel_blog);?></span></label>	  
  
	<div id='search_result' class="search_result">
	<?php echo $this->element('adminElements/blog_list');?>
	</div>
</section>
</aside>




