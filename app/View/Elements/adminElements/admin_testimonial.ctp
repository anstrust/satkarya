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
			<th class="sorting_asc" style="text-align:center;">Occupation</th>
			<th class="sorting_asc" style="text-align:center;">Description</th>
			<th class="sorting_asc" style="text-align:center;">Date</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    
       <?php if(!empty($newsfeed_list)){ $i=1; foreach($newsfeed_list as $news) { ?>
					  
      <tr>
			<td style="text-align:center; width: 30px;"> <?php echo $i; ?></td>
			<td style="text-align:center; width: 100px;"><?php echo $news['Testimonial']['title'] ? $news['Testimonial']['title']:''; ?></td>
			<td style="text-align:center; width: 80px;"><?php echo $news['Testimonial']['occupation'] ? $news['Testimonial']['occupation']:''; ?></td>
			<td style="text-align:center; width: 200px;"><?php echo $news['Testimonial']['description'] ? $this->Text->truncate($news['Testimonial']['description'],50, array('ellipsis' => '...','exact' => false)):''; ?></td>
			<td style="text-align:center; width: 50px;"><?php echo $news['Testimonial']['date'] ? $news['Testimonial']['date']:''; ?></td>
			
			<td style="text-align:center; width: 100px;">
				<a title="View" href="<?php echo HTTP_ROOT.'admin/users/view_testimonial/'.base64_encode(convert_uuencode($news['Testimonial']['id']));?>" class="btn btn-primary btn-sm">
						<i class="fa fa-search"></i>
				</a>
				<a title="Edit" href="<?php echo HTTP_ROOT.'admin/users/edit_testimonial/'.base64_encode(convert_uuencode($news['Testimonial']['id']));?>" class="btn btn-primary btn-sm">
						<i class="fa fa-edit"></i>
				</a>
				<a title="" class="delRec  btn btn-primary btn-sm" data-model="Testimonial" data-controller="users/testimonial/" data-page="<?php echo $this->Paginator->current();?>" id="<?php echo base64_encode(convert_uuencode($news['Testimonial']['id']));?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a>
    
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