<?php echo $this->Html->script('admin/AdminLTE/common.js'); ?>
<style>
#example tr th a{color:#fff;}
</style>
<div class="box-body box table-responsive margin-top-20">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr class="info"> 
			<th class="sorting_asc" style="text-align:center;">S.No</th>
			<th class="sorting_asc" style="text-align:center;">Title</th>
			<th class="sorting_asc" style="text-align:center;">Url</th>
			<th class="sorting_asc" style="text-align:center;">Date</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    
       <?php if(!empty($newsfeed_list)){ $i=1; foreach($newsfeed_list as $news) { ?>
					  
      <tr>
			<td style="text-align:center; width: 50px;"> <?php echo $i; ?></td>
			<td style="text-align:center; width: 300px;"><?php echo $news['Project']['title'] ? $news['Project']['title']:''; ?></td>
			<td style="text-align:center; width: 150px;"><?php echo $news['Project']['link'] ? $news['Project']['link']:''; ?></td>
			<td style="text-align:center; width: 150px;"><?php echo $news['Project']['date'] ? $this->Text->truncate($news['Project']['date'],50, array('ellipsis' => '...','exact' => false)):''; ?></td>
			<td style="text-align:center; width: 300px;">
				<a title="View" href="<?php echo HTTP_ROOT.'admin/users/view_project/'.base64_encode(convert_uuencode($news['Project']['id']));?>" class="btn btn-primary btn-sm">
						<i class="fa fa-search"></i>
				</a>
				<a title="Edit" href="<?php echo HTTP_ROOT.'admin/users/edit_project/'.base64_encode(convert_uuencode($news['Project']['id']));?>" class="btn btn-primary btn-sm">
						<i class="fa fa-edit"></i>
				</a>
				&nbsp;
				<a title="" class="delRec tooltips btn btn-primary btn-sm " data-model="Project" data-controller="" data-page="<?php echo $this->Paginator->current();?>" id="<?php echo base64_encode(convert_uuencode($news['Project']['id']));?>" href="javascript:void(0)">  <i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a>
    		
				
			</td>
		</tr>
		
	<?php $i++; } }?>	
				
	</tbody>
</table>
    
              
			     		
                <?php if(empty($newsfeed_list)){?>
					<div style="font-size:20px;text-align:center;padding-top:5px;">No Records Found</div>
				<?php } ?>



              <div class="box-header">					
						<?php echo $this->element('adminElements/table_head'); ?>
					</div>


</div>