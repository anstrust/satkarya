<aside class="right-side">
<section class="content-header">
		<h1>News Feed</h1>
</section>
<section class="content">
<div class="pull-right" style="margin-bottom:10px;">
           <a href="javascript:void(0);"  onclick="history.go(-1)" class="btn btn-success btn-sm backbtn" >Back</a>
        </div>
<?php if($myvar = $this->Session->flash()){ ?>
	 <div class="response-msg ui-corner-all">
	 <?php echo $myvar;?>
	 </div>
  <?php } ?>
	<div>
		<div id="top-buttons">		
       <a style="cursor:pointer;" class="btn-primary btn-sm btn ui-state-default ui-corner-all" href="<?php echo HTTP_ROOT.'admin/users/addNewsfeed';?>">ADD NEWS Feed</a>
	   </div>
	</div>
	<?php echo $this->element('adminElements/admin_newsfeedlist');?>

</section>
</aside>