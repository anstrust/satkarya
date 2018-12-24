<style>
#example tr th a{color:#fff;}
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
			<th class="sorting_asc">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php
    $i=$this->Paginator->counter('%start%');
    foreach($all_templates as $all_templates){?>
        <tr>
			<td style="text-align:center; width: 30px;"><?php echo $i; ?></td>
			<td style="text-align:left; width: 150px;"><?php echo $all_templates['EmailTemplate']['title']; ?></td>			
			<td style="text-align:left; width: 150px;"><?php echo $all_templates['EmailTemplate']['subject']; ?></td>
			<td style="text-align:left; width: 600px;" ><?php echo substr(strip_tags($all_templates['EmailTemplate']['description']), 0, 200).' ...'; ?></td>
			<td style="text-align:left; width: 250px;"> <?php echo $all_templates['EmailTemplate']['from']; ?> </td>
			<td style="text-align:center; width: 120px;">
				<?php $template_id = base64_encode(convert_uuencode($all_templates['EmailTemplate']['id'])); ?>
				<a title="Edit" href="<?php echo HTTP_ROOT."admin/users/editEmailTemplate/".$template_id;?>" class="btn-primary btn-sm">											
					<i class="fa fa-edit">&nbsp; Edit</i>
				</a>
         	</td>
		</tr>
	<?php $i++; } ?>	 					
	</tbody>
</table>
</div>
<div class="box-header">					
	<?php if(count($total_email_template)>10){
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