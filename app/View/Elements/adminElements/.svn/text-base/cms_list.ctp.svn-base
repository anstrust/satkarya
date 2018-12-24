<style>
#example tr th a{color:#fff;}
</style>
<div id="search_result">
<div class="box-body table-responsive margin-top-20">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr class="info"> 
			<th style="text-align:center;">Name</th>
			<th style="text-align:center;">Title</th>
      <th style="text-align:center;">Description</th>
			<th style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php
    foreach($info_cms as $cms){?>
        <tr>
			<td style="text-align:left; width: 150px;"><?php echo $cms['Cms']['name']; ?></td>			
			<td style="text-align:left; width: 150px;"><?php echo $cms['Cms']['title']; ?></td>
      <td style="text-align:left; width: 400px;"><?php echo $this->Text->truncate(strip_tags($cms['Cms']['description']),150,array('ending'=>'...','exact'=>false));?></td>
			<td style="text-align:center; width: 70px;">
				<?php $cms_id = base64_encode(convert_uuencode($cms['Cms']['id'])); ?>
				<a title="Edit" href="<?php echo HTTP_ROOT."admin/users/edit_cms/".$cms_id;?>" class="btn-primary btn-sm">											
					<i class="fa fa-edit">&nbsp; Edit</i>
				</a>
         	</td>
		</tr>
	<?php  } ?>	 					
	</tbody>
</table>
</div>
<div class="box-header">	
	<?php if(count($total_cms)>10){
	$this->Paginator->options(array(
						'update' => '#search_result',
						'evalScripts' => true,
						'before' => $this->Js->get('#loader_div')->effect('fadeIn', array('speed' => 'fast')),
						'complete' => $this->Js->get('#loader_div')->effect('fadeOut', array('speed' => 'fast'))
					));		
	echo $this->element('adminElements/table_head'); 
	echo $this->Js->writeBuffer();
	}?>
</div>

</div>
