<?php 
#pr($datainfo);die;
echo $this->Html->script('admin/AdminLTE/common.js');
$approved = '<span class="label label-success">Approved</span>';
$pending = '<span class="label label-warning">Pending</span>';
$deline = '<span class="label label-danger">Decline</span>';
 ?>
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
			<th class="sorting_asc" style="text-align:center;">Blog Category</th>
			<th class="sorting_asc" style="text-align:left;">Blog Title</th>
			<th class="sorting_asc" style="text-align:left;">Blog Description</th>
			<th class="sorting_asc" style="text-align:left;">Posted on</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php if(empty($datainfo)){ ?>
      <td colspan="7" style="text-align:center; width: 30px;">No Blog(s) Yet !</td>
    <?php }else{
    $i=$this->Paginator->counter('%start%');
    foreach($datainfo as $enquiry_info) {?>
        <tr>
			<td style="text-align:center; width: 30px;"><?php echo $i; ?></td>
			<td style="text-align:left; width: 30px;"><strong><?php echo $enquiry_info['Category']['category']; ?></strong></td>
			<td style="text-align:left; width: 200px;"><?php echo $enquiry_info['Blog']['blog_title']; ?></td>			
			<td style="text-align:left; width: 200px;"><?php echo strlen($enquiry_info['Blog']['description'])>100 ? substr($enquiry_info['Blog']['description'],0,100).'...' : $enquiry_info['Blog']['description']; ?></td>
		
			<td style="text-align:left; width: 150px;"><?php echo $enquiry_info['Blog']['posted_on']; ?></td>
			<td style="text-align:center; width: 120px;">
				<?php $id = base64_encode(convert_uuencode($enquiry_info['Blog']['id'])); 
          if(@$enquiry_info['Blog']['status']==1){
            $toggle_switch="fa-toggle-on";
          }else{
            $toggle_switch="fa-toggle-off";
          }
        ?>
				
        <a title="" class="updateStatus tooltips" data-model="Blog" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg <?php echo $toggle_switch;?>"></i><span>Update Status</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a title="" class="tooltips" href="<?php echo HTTP_ROOT;?>admin/users/view_blogs/<?php echo $id;?>"><i class="fa fa-lg fa-eye"></i><span>View Detail</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        
        <a title="" class="delRec tooltips" data-model="Blog" data-controller="users/blogs/" data-page="<?php echo $this->Paginator->current();?>" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a>
				
				
				
         	</td>
		</tr>
	<?php $i++; } 
  }?>	 					
	</tbody>
</table>
</div>
<div class="box-header" data-info="<?php echo count($total_enquiry);?>">					
	<?php if(count($total_enquiry)>10){
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