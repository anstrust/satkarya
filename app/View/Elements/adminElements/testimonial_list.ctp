<?php echo $this->Html->script('admin/AdminLTE/common.js'); ?>
<style>
#example tr th a{color:#fff;}
a.tooltips span{
width:80px;	
}
a:hover.tooltips span {
  margin-left: -40px;
}
</style>
<div id="search_result">
<div class="box-body table-responsive margin-top-20">
<table class="table table-bordered table-striped">
    <thead>
        <tr class="info"> 
			<th class="sorting_asc" style="text-align:center;">No.</th>
			<th class="sorting_asc" style="text-align:left;">Name</th>
      <th class="sorting_asc" style="text-align:left;">Description</th>
			<th class="sorting_asc" style="text-align:left;">Posted on</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php if(empty($testimonial_info)){ ?>
      <td colspan="7" style="text-align:center; width: 30px;">No Request Yet !</td>
    <?php }else{
    $i=$this->Paginator->counter('%start%');
    foreach($testimonial_info as $testimonial_info){?>
        <tr>
			<td style="text-align:center; width: 30px;"><?php echo $i; ?></td>
			<td style="text-align:left; width: 150px;"><?php echo $testimonial_info['Testimonial']['name']; ?></td>			
			<td style="text-align:left; width: 300px;"><?php echo substr(strip_tags($testimonial_info['Testimonial']['description']), 0, 100).' ...'; ?></td>
			<td style="text-align:left; width: 150px;"><?php echo $testimonial_info['Testimonial']['posted_on']; ?></td>
			<td style="text-align:center; width: 120px;">
				<?php $id = base64_encode(convert_uuencode($testimonial_info['Testimonial']['id'])); 
          if(@$testimonial_info['Testimonial']['status']==1){
            $toggle_switch="fa-toggle-on";
          }else{
            $toggle_switch="fa-toggle-off";
          }
        ?>
				
        <a title="" class="updateStatus tooltips" data-model="Testimonial" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg <?php echo $toggle_switch;?>"></i><span>Update Staus</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a title="" class="tooltips" href="<?php echo HTTP_ROOT;?>admin/users/view_testimonials/<?php echo $id;?>"><i class="fa fa-lg fa-eye"></i><span>View Detail</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        
        <a title="" class="delRec tooltips" data-model="Testimonial" data-controller="users/testimonials/" data-page="<?php echo $this->Paginator->current();?>" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a>
				
				
				
         	</td>
		</tr>
	<?php $i++; } 
  }?>	 					
	</tbody>
</table>
</div>
<div class="box-header" data-info="<?php echo count($total_testimonial);?>">					
	<?php if(count($total_testimonial)>10){
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