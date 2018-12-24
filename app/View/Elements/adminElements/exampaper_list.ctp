<?php echo $this->Html->script('admin/AdminLTE/common.js'); ?>


<style>
#example tr th a{color:#fff;}
a.tooltips span{
width:60px;	
}
a:hover.tooltips span {
  margin-left: -30px;
}
</style>
<div id="search_result">
<div class="box-body table-responsive margin-top-20">
<table class="table table-bordered table-striped">
    <thead>
        <tr class="info"> 
			<th class="sorting_asc" style="text-align:center;">No.</th>
			<th class="sorting_asc" style="text-align:center;">Class</th>
			<th class="sorting_asc" style="text-align:center;">Subject</th>
			<th class="sorting_asc" style="text-align:center;">Date</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php if(empty($all_templates)){ ?>
      <td colspan="6" style="text-align:center; width: 30px;">No Student yet.. ! </td>
    <?php }else{
    $i=$this->Paginator->counter('%start%');
    foreach($all_templates as $all_templates){
		//pr($all_templates);die;
		?>
        <tr>
			<td style="text-align:center; width: 30px;"><?php echo $i; ?></td>		
			<td style="text-align:left; width: 40px;"><?php echo $all_templates['Class']['class_name']; ?></td>
			<td style="text-align:left; width: 40px;"><?php echo $all_templates['Subject']['subject']; ?></td>
			<td style="text-align:left; width: 40px;"><?php echo $all_templates['ExamPaper']['date']; ?></td>
			<td style="text-align:center; width: 100px;">
		<?php $id = base64_encode(convert_uuencode($all_templates['ExamPaper']['id'])); 
          if(@$all_templates['ExamPaper']['status']==1){
            $toggle_switch="fa-toggle-on";
          }else{
            $toggle_switch="fa-toggle-off";
          }
        ?>
		<?php if($all_templates['ExamPaper']['date'] >= date("Y-m-d")) {?>
			<a title=""  href="<?php echo HTTP_ROOT."admin/users/question/".$id;?>" class="btn-primary btn-sm"><i class="fa fa-lg fa-file-word-o"></i>&nbsp; View Question</a>
			<a title=""  href="<?php echo HTTP_ROOT."admin/users/exam_date/".$id;?>" class="btn-primary btn-sm"><i class="fa fa-users"></i>&nbsp; Students </a>
		
		<?php } else {?>
			<a title=""  href="<?php echo HTTP_ROOT."admin/users/result/".$id;?>" class="btn-primary btn-sm"><i class="fa fa-lg fa-file-word-o"></i>&nbsp;Result</a>
		<?php } ?>
			<!--a title="" class="tooltips" href="<?php echo HTTP_ROOT."admin/users/view_post/".$id;?>"><i class="fa fa-lg fa-eye"></i><span>View</span></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>
		  <a title="" class="updateStatus tooltips " data-model="ExamPaper" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg <?php echo $toggle_switch;?>"></i><span>Update Status</span></a>  		
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <!--a title="" class="delRec tooltips" data-model="ExamPaper" data-controller="users/product/" data-page="<?php echo $this->Paginator->current();?>" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a-->
       
      
      </td>
		</tr>
	<?php $i++; }
}  ?>	 					
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