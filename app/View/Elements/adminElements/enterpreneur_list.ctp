<?php echo $this->Html->script('admin/AdminLTE/common.js');

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
.td-img{
	 width:50px; 
	 border-radius:30px;
}
</style>
<h4><strong>Entrepreneurs</strong></h4><label>Total Entrepreneur : <span class="all_count"><?php echo $totalData;?></span></label>
<div id="search_result">
<div class="box-body table-responsive margin-top-20">
<table class="table table-bordered table-striped">
    <thead>
        <tr class="info"> 
			<th class="sorting_asc" style="text-align:center;">No.</th>
    		<th class="sorting_asc" style="text-align:left;">Company Name</th>
			<th class="sorting_asc" style="text-align:left;">Contact Email</th>
			<th class="sorting_asc" style="text-align:left;">Status</th>
			<th class="sorting_asc" style="text-align:left;">Posted on</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php if(empty($dataInfo)){ ?>
      <td colspan="7" style="text-align:center; width: 30px;">No Entrepreneur Yet !</td>
    <?php }else{
    $i=$this->Paginator->counter('%start%');
    foreach($dataInfo as $dataInfo){?>
        <tr>
			<td style="text-align:center; width: 30px;"><?php echo $i; ?></td>
			<td style="text-align:left; width: 200px;"><?php echo $dataInfo['User']['name']; ?></td>
			<td style="text-align:left; width: 150px;"><?php echo $dataInfo['User']['email']; ?></td>
			<td style="text-align:center; width: 100px;"><?php echo $dataInfo['User']['status']==1 ? $approved : $pending; ?></td>
			<td style="text-align:left; width: 150px;"><?php echo $dataInfo['User']['date_created']; ?></td>
			<td style="text-align:center; width: 120px;">
				<?php $id = base64_encode(convert_uuencode($dataInfo['User']['id'])); 
          if(@$dataInfo['User']['status']==1){
            $toggle_switch="fa-toggle-on";
          }else{
            $toggle_switch="fa-toggle-off";
          }
        ?>
				
        <!--<a title="" class="updateStatus tooltips" data-model="User" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg <?php echo $toggle_switch;?>"></i><span>Update Status</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->

			<a title="Edit" href="<?php echo HTTP_ROOT;?>admin/users/edit_message/<?php echo $id;?>" class="btn-primary btn-sm">											
			<i class="fa fa-edit">&nbsp;</i><span>Message</span></a>		

        <a title="" class="tooltips" href="<?php echo HTTP_ROOT;?>admin/users/view_entrepreneur/<?php echo $id;?>"><i class="fa fa-lg fa-eye"></i><span>View Detail</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        
        <a title="" class="delRec tooltips" data-model="User" data-controller="users/entrepreneur/" data-page="<?php echo $this->Paginator->current();?>"  id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a>
				
				
				
         	</td>
		</tr>
	<?php $i++; } 
  }?>	 					
	</tbody>
</table>
</div>
<div class="box-header" data-info="<?php echo count($totalData);?>">					
	<?php if(count($totalData)>10){
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
