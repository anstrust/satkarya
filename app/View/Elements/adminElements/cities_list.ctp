<div class="box-body box table-responsive margin-top-20">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr class="info"> 
			<th class="sorting_asc" style="text-align:center;"><?php echo $this->Paginator->sort('title', 'No'); ?></th>
			<th class="sorting_asc" style="text-align:center;"><?php echo $this->Paginator->sort('title', 'City'); ?></th>
			<th class="sorting_asc">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php
    if(!empty($all_cities)){
    $i=1;
    foreach($all_cities as $city){ ?>
        <tr>
			<td style="text-align:center; width: 50px;"><?php echo $i; ?></td>
			<td style="text-align:center; width: 350px;"><?php echo $city['City']['city']; ?></td>
			<td style="text-align:left; width: 250px;">
				<?php $city_id = base64_encode(convert_uuencode($city['City']['id'])); ?>
				<a title="Edit" href="<?php echo HTTP_ROOT."admin/users/edit_city/".$city_id;?>" class="btn btn-primary btn-sm">
					<i class="fa fa-edit">&nbsp; Edit</i>
				</a>
				<a title="Delete" href="<?php echo HTTP_ROOT."admin/users/common_delete/City/".$city_id;?>" class="btn btn-danger btn-sm">
					<i class="fa fa-remove">&nbsp; Delete</i>
				</a>
         	</td>
		</tr>
	<?php $i++; } }else{ ?>
	<tr>
		<td class="text-center" colspan="8">No Record Found</td>
	</tr>		
	<?php  } ?>	 					
	</tbody>
</table>
</div>
<div class="box-header">					
	<?php echo $this->element('adminElements/table_head'); ?>
</div>