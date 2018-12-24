<?php //pr("sbsdbu");die;?>
<?php echo $this->Html->script('admin/AdminLTE/common.js'); ?>
<style>
#example tr th a{color:#fff;}
a.tooltips span{
width:60px;	
}
a:hover.tooltips span {
  margin-left: -30px;
}
</style>
<div id="search_result">
<div class="box-body table-responsive margin-top-20">
<table class="table table-bordered table-striped">
    <thead>
        <tr class="info"> 
			<th class="sorting_asc" style="text-align:center;">No.</th>
			<th class="sorting_asc" style="text-align:center;">User Name</th>
		  	<th class="sorting_asc" style="text-align:center;">Comment</th>
			<th class="sorting_asc" style="text-align:center;">Posted On</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php if(empty($blog_comment)){ ?>
      <td colspan="6" style="text-align:center; width: 30px;">No Comment in this Blog .. </td>
    <?php }else{
    $i=$this->Paginator->counter('%start%');
    foreach($blog_comment as $blog_comment){?>
        <tr>
			<td style="text-align:center; width: 30px;"><?php echo $i; ?></td>
			<td style="text-align:center; width: 150px;"><?php echo $blog_comment['BlogComment']['username']; ?></td>	
			<td style="text-align:center; width: 300px;" ><?php echo substr(strip_tags($blog_comment['BlogComment']['message']), 0, 100).' ...'; ?></td>
			<td style="text-align:center; width: 150px;"><?php echo $blog_comment['BlogComment']['created_at']; ?></td>
			<td style="text-align:center; width: 120px;">
			<?php $id = base64_encode(convert_uuencode($blog_comment['BlogComment']['id'])); ?>

			
		
        <a title="View Comment Details" class="tooltips" href="<?php echo HTTP_ROOT;?>admin/users/view_blog_comment_detail/<?php echo $id;?>"><i class="fa fa-lg fa-eye"></i></a>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        
		<!--	<a title="" class="updateStatus tooltips" data-model="Post" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg <?php echo $toggle_switch;?>"></i></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
				
			<!--	<a href="<?php echo HTTP_ROOT."admin/admin/edit_post/".$id;?>"><i class="fa fa-edit"></i></a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
        
	    
        <a title="BlogComment" class="delRec tooltips" data-model="BlogComment" data-controller="" data-page="<?php echo $this->Paginator->current();?>"  id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
        		
      </td>
		</tr>
	<?php $i++; }
}  ?>	 					
	</tbody>
</table>
</div>
<div class="box-header" data-info="<?php echo count($totel_comment);?>">					
	<?php if(count($totel_comment)>10){
	$this->Paginator->options(array(
						'update' => '#search_result',
						'evalScripts' => true,
						'before' => $this->Js->get('#loader_div')->effect('fadeIn', array('speed' => 'fast')),
						'complete' => $this->Js->get('#loader_div')->effect('fadeOut', array('speed' => 'fast'))
					));		
	echo $this->element('adminElements/table_head'); 
	echo $this->Js->writeBuffer();		
		}

	?>
</div>
</div>
