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
			<th class="sorting_asc" style="text-align:center;">Name</th>
			<th class="sorting_asc" style="text-align:center;">Subject</th>
			<th class="sorting_asc" style="text-align:center;">Description</th>
			<th class="sorting_asc">From</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php if(empty($all_templates)){ ?>
      <td colspan="6" style="text-align:center; width: 30px;">No Newsletter Template here.. </td>
    <?php }else{
    $i=$this->Paginator->counter('%start%');
    foreach($all_templates as $all_templates){?>
        <tr>
			<td style="text-align:center; width: 30px;"><?php echo $i; ?></td>
			<td style="text-align:left; width: 150px;"><?php echo $all_templates['NewsletterTemplates']['title']; ?></td>			
			<td style="text-align:left; width: 150px;"><?php echo $all_templates['NewsletterTemplates']['subject']; ?></td>
			<td style="text-align:left; width: 600px;" ><?php echo substr(strip_tags($all_templates['NewsletterTemplates']['description']), 0, 200).' ...'; ?></td>
			<td style="text-align:left; width: 250px;"> <?php echo $all_templates['NewsletterTemplates']['from']; ?> </td>
			<td style="text-align:center; width: 120px;">
				
        <?php $id = base64_encode(convert_uuencode($all_templates['NewsletterTemplates']['id'])); ?>
				
				<a title="" class="tooltips" href="<?php echo HTTP_ROOT."admin/users/edit_news_template/".$id;?>"><i class="fa fa-lg fa-edit"></i><span>Edit</span></a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <a title="" class="delRec tooltips" data-model="NewsletterTemplates" data-controller="users/newsletters/" data-page="<?php echo $this->Paginator->current();?>" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
        <?php if($title=='Newsletters Listings'){ ?>    
        
				<a title="" class="tooltips" id="" href="<?php echo HTTP_ROOT."admin/users/newsletter_send_subscribers/".$id;?>"><i class="fa fa-lg  fa-external-link"></i><span>Use it</span></a>
        
        <?php } ?>    		
      </td>
		</tr>
	<?php $i++; }
}  ?>	 					
	</tbody>
</table>
</div>
<div class="box-header" data-info="<?php echo count($total_news_template);?>">					
	<?php if(count($total_news_template)>10){
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