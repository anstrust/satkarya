<?php echo $this->Html->script('admin/AdminLTE/common.js');

$approved = '<span class="label label-success">Approved</span>';
$pending = '<span class="label label-warning">Pending</span>';
$deline = '<span class="label label-danger">Decline</span>';
//pr($dataInfo);die; 
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


<div id="search_result">
<div class="box-body table-responsive margin-top-20">
<table class="table table-bordered table-striped">
    <thead>
        <tr class="info"> 
			<!--<th class="sorting_asc" style="text-align:center;">No.</th>-->
			<th class="sorting_asc" style="text-align:left;">Name</th>
			<th class="sorting_asc" style="text-align:left;">Type</th>
			<th class="sorting_asc" style="text-align:left;">Contact Email</th>
			<th class="sorting_asc" style="text-align:left;">Profile Viewed</th> 
			<th class="sorting_asc" style="text-align:left;">Posted on</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php    
    if(empty($dataInfo)){?>
      <td colspan="7" style="text-align:center; width: 30px;">No Record Here Yet !</td>
      
    <?php }else{
    $i=$this->Paginator->counter('%start%');
    foreach($dataInfo as $dataInfo){?>
        <tr>
        <?php if($dataInfo['User']['status']==1) { 
        
        ?>
		<!--	<td style="text-align:center; width: 30px;"><?php echo $i; ?></td>-->
			<td style="text-align:left; width: 200px;"><?php echo $dataInfo['User']['name']; ?></td>
			<td style="text-align:left; width: 200px;">
			<?php if($dataInfo['User']['user_type']==1)
						{
							echo 'Entrepreneur';						
						}
					if($dataInfo['User']['user_type']==2)
						{
							echo 'Investor';						
						}
						
			 ?></td>
			<td style="text-align:left; width: 150px;"><?php echo $dataInfo['User']['email']; ?></td>
			<td style="text-align:center; width: 100px;"><strong>
<?php
			if($dataInfo['User']['profile_viewed']==0)
				{
					echo "Admin";				
				}
			else
				{
					echo $dataInfo['User']['profile_viewed'];
				}
			 ?>
</strong></td>  
			<td style="text-align:left; width: 150px;"><?php echo $dataInfo['User']['date_created']; ?></td> 
			<td style="text-align:center; width: 120px;">
			<?php $id = base64_encode(convert_uuencode($dataInfo['User']['id'])); 
			if($dataInfo['User']['user_type']==1) { ?>
		   <a title="" class="tooltips" href="<?php echo HTTP_ROOT;?>admin/users/view_entrepreneur/<?php echo $id;?>"><i class="fa fa-lg fa-eye"></i><span>View Detail</span></a>
 	       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 			<?php } ?>	   
 	    <?php if($dataInfo['User']['user_type']==2) { ?>
		  <a title="" class="tooltips" href="<?php echo HTTP_ROOT;?>admin/users/view_investor/<?php echo $id;?>"><i class="fa fa-lg fa-eye"></i><span>View Detail</span></a>
 	       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
         </td>
		<?php } ?>
		</tr>
		<?php } ?>
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
