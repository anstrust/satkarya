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
			<th class="sorting_asc" style="text-align:left;">Email ID</th>
			<th class="sorting_asc" style="text-align:left;">Contact Number</th>
			<th class="sorting_asc" style="text-align:left;">City</th>
			<th class="sorting_asc" style="text-align:left;">Subject</th>
			<th class="sorting_asc" style="text-align:center;">Message</th>
		</tr>
   </thead>
    <tbody>
    <?php if(empty($all_templates)){ ?>
      <td colspan="7" style="text-align:center; width: 30px;">No Request Yet !</td>
    <?php }else{
    $i=$this->Paginator->counter('%start%');
    foreach($all_templates as $enquiry_info){?>
        <tr>
			<td style="text-align:center; width: 30px;"><?php echo $i; ?></td>
			<td style="text-align:left; width: 80px;"><?php echo $enquiry_info['Distributer']['name']; ?></td>			
			<td style="text-align:left; width: 80px;"><?php echo $enquiry_info['Distributer']['email']; ?></td>
			<td style="text-align:left; width: 80px;"><?php echo $enquiry_info['Distributer']['phone']; ?></td>
			<td style="text-align:left; width: 80px;"><?php echo $enquiry_info['Distributer']['city']; ?></td>
			<td style="text-align:left; width: 100px;"><?php echo $enquiry_info['Distributer']['subject']; ?></td>
			<td style="text-align:left; width: 300px;"><?php echo $enquiry_info['Distributer']['message']; ?></td>
		</tr>
	<?php $i++; } 
  }?>	 					
	</tbody>
</table>
</div>
<div class="box-header" data-info="<?php echo count($total_news_template);?>">					
	<?php if(count($total_news_template)>10){
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