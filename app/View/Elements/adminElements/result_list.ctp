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
			<th class="sorting_asc" style="text-align:center;">Student Name</th>
			<th class="sorting_asc" style="text-align:center;">Attempt </th>
			<th class="sorting_asc" style="text-align:center;">Correct</th>
			<th class="sorting_asc" style="text-align:center;">Wrong</th>
			<th class="sorting_asc" style="text-align:center;">Result</th>
			<th class="sorting_asc" style="text-align:center;">Subject Answer</th>
			<th class="sorting_asc" style="text-align:center;">Totel Marks</th>
			<th class="sorting_asc" style="text-align:center;">Give Mark</th>
		</tr>
   </thead>
    <tbody>
    <?php if(empty($all_templates)){ ?>
      <td colspan="7" style="text-align:center; width: 30px;">No record yet.. ! </td>
    <?php }else{
    $i=$this->Paginator->counter('%start%');
    foreach($all_templates as $all_templates){
		//pr($all_templates);die;
		?>
        <tr>
			<td style="text-align:center; width: 20px;"><?php echo $i; ?></td>		
			<td style="text-align:left; width: 50px;"><?php echo $all_templates['User']['username']; ?></td>
			<td style="text-align:left; width: 10px;"><?php echo $all_templates['Result']['attemp_question']; ?></td>
			<td style="text-align:left; width: 10px;"><?php echo $all_templates['Result']['correct_question']; ?></td>
			<td style="text-align:left; width: 10px;"><?php echo $all_templates['Result']['wrong_question']; ?></td>
			<td style="text-align:left; width: 10px;"><?php echo $all_templates['Result']['result']; ?></td>
			<td style="text-align:left; width: 200px;"><?php echo $all_templates['Result']['subjective_answer']; ?></td>
			<td style="text-align:left; width: 20px;"><?php echo $all_templates['Result']['totel_marks']; ?></td>
			<td style="text-align:center; width: 60px;">
				
      
		<?php if(!empty($all_templates['Result']['give_marks'])){
				echo $all_templates['Result']['give_marks'];
		 }else {?>
		<form  action="<?php echo HTTP_ROOT?>admin/users/savemarks" method="POST" id="adduser" enctype="multipart/form-data">
			<input type="hidden" class="required" name="data[Result][id]" value='<?php echo $all_templates['Result']['id'];?>' />
			<input type="hidden" class="required" name="data[Result][result]" value='<?php echo $all_templates['Result']['result'];?>' />
			<input type="hidden" class="required" name="data[Result][exam_id]" value='<?php echo $all_templates['Result']['exam_id'];?>' />
			<input type="text" style="height:30px;width:50px;" maxlength="1" class="required"  name="data[Result][give_marks]" value='' />
			<button type="submit" class="btn btn-primary btn-sm">Submit </button>
        </form>
		 <?php } ?>
		
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#adduser').validate(
        {
            rules:
            {
                "data[Result][give_marks]":
                {
                    required:true
                
                }
            }
        });
       
    })
</scrip