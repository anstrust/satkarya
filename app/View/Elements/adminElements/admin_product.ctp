<?php echo $this->Html->script('admin/AdminLTE/common.js'); ?>
<style>
#example tr th a{color:#fff;}
</style>
<div class="box-body box table-responsive margin-top-20">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr class="info"> 
			<th class="sorting_asc" style="text-align:center;">S.No</th>
			<th class="sorting_asc" style="text-align:center;">Product Name</th>
			<th class="sorting_asc" style="text-align:center;">Company Name</th>
			<th class="sorting_asc" style="text-align:center;">Mrp</th>
			<th class="sorting_asc" style="text-align:center;">Discount</th>
			<th class="sorting_asc" style="text-align:center;">Price</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
	</thead>
	<tbody>
       <?php if(!empty($newsfeed_list)){ $i=1; foreach($newsfeed_list as $news) { ?>
		<tr>
			<td style="text-align:center; width: 30px;"> <?php echo $i; ?></td>
			<td style="text-align:center; width: 100px;"><?php echo $news['Product']['product_name'] ? $news['Product']['product_name']:''; ?></td>
			<td style="text-align:center; width: 100px;"><?php echo $news['Product']['company_name'] ? $news['Product']['company_name']:''; ?></td>
			<td style="text-align:center; width: 100px;"><?php echo $news['Product']['mrp'] ? $news['Product']['mrp']:''; ?></td>
			<td style="text-align:center; width: 100px;"><?php echo $news['Product']['discount'] ? $news['Product']['discount']:''; ?></td>
			<td style="text-align:center; width: 100px;"><?php echo $news['Product']['price'] ? $news['Product']['price']:''; ?></td>
			<td style="text-align:center; width: 100px;">
			<?php $id = base64_encode(convert_uuencode($news['Product']['id'])); 
			if($news['Product']['status']==1){
            $toggle_switch="fa-toggle-on";
			}else{
            $toggle_switch="fa-toggle-off";
			}
			?>
				<!--a product_name="" class="updateStatus tooltips btn btn-primary btn-sm" data-model="Product" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg <?php echo $toggle_switch;?>"></i></a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				-->
				<a product_name="View" href="<?php echo HTTP_ROOT.'admin/users/view_product/'.base64_encode(convert_uuencode($news['Product']['id']));?>" class="btn btn-primary btn-sm">
						<i class="fa fa-search"></i>
				</a>
				&nbsp;&nbsp;
				<a product_name="Edit" href="<?php echo HTTP_ROOT.'admin/users/edit_product/'.base64_encode(convert_uuencode($news['Product']['id']));?>" class="btn btn-primary btn-sm">
						<i class="fa fa-edit"></i>
				</a>
				<!--a title="" class="delRec tooltips btn btn-primary btn-sm" data-model="Product" data-page="<?php echo $this->Paginator->current();?>" id="<?php echo base64_encode(convert_uuencode($news['Product']['id']));?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a>
      		
				</a-->
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