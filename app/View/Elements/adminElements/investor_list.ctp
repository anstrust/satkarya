<?php echo $this->Html->script('admin/AdminLTE/common.js'); ?>
<script type="text/javascript">
$(document).ready(function(){

var host = window.location.host;
var proto = window.location.protocol;
var ajax_url = proto+"//"+host+"/Inventtica/";

	
//  Updation Script
	$('.InvetorUpdateStatus').on('click',function(){
		
			$this = $(this);
			var id = $this.attr('id');
      var chk = jQuery.trim($this.find('i').attr('class'));
			if(chk.match('fa-toggle-on'))
			{
				oldClass = 'fa-toggle-on';
				newClass = 'fa-toggle-off';
				 var status = 1;
			}
			else 
			{
				oldClass = 'fa-toggle-off';
				newClass = 'fa-toggle-on';
				var status = 0;
			}
      $(this).html('<img src="'+ajax_url+'img/fbloder.gif" width=15>');
			var model = $this.attr('data-model');
			$.post(ajax_url+'admin/users/investor_update_status/'+id+'/'+model+'/'+status, function(resp){
				
				if($.trim(resp) != '')
				{
          $this.html('<i class="fa fa-lg '+newClass+'"></i><span>Update Staus</span>');
					alert(resp);
          return true;
				}
			});
		
		
		return false;
		
	});
})
	</script>
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
			<th class="sorting_asc" style="text-align:center;">No.</th>
			<th class="sorting_asc" style="text-align:left;">Name</th>
      <th class="sorting_asc" style="text-align:left;">Investor Type</th>
			<th class="sorting_asc" style="text-align:left;">Country</th>
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
			<td style="text-align:left;  padding-left:20px ; width: 200px;"><?php echo @$dataInfo['User']['name']; ?></td>			
			<td style="text-align:left; width: 150px;">
			<?php
				$array = array('1'=>'Angel Investor','2'=>'Venture Capital','3'=>'Private Equity','4'=>'Investment Company','5'=>'Others');
				foreach($array as $key =>$array)
					{
						if($dataInfo['InvestorDetail']['type_of_investor'] == $key)
							{
								echo $array;
							}
					}
			 ?></td>
			<td style="text-align:left; width: 100px;"><?php echo @$dataInfo['InvestorDetail']['Country']['country_name']; ?></td>
			<td style="text-align:left; width: 100px;"><?php echo @$dataInfo['User']['date_created']; ?></td>
			<td style="text-align:center; width: 170px;">
				<?php $id = base64_encode(convert_uuencode($dataInfo['User']['id'])); 
          if(@$dataInfo['User']['status']==1){
            $toggle_switch="fa-toggle-on";
          }else{
            $toggle_switch="fa-toggle-off";
          }
        ?>
			<a title="Edit" href="<?php echo HTTP_ROOT;?>admin/users/edit_message/<?php echo $id;?>" class="btn-primary btn-sm">											
			<i class="fa fa-edit">&nbsp;</i><span>Message</span></a>	
        <a title="" class="InvetorUpdateStatus tooltips" data-model="User" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg <?php echo $toggle_switch;?>"></i><span>Update Status</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a title="" class="tooltips" href="<?php echo HTTP_ROOT;?>admin/users/view_investor/<?php echo $id;?>"><i class="fa fa-lg fa-eye"></i><span>View Detail</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        
        <a title="" class="delRec tooltips" data-model="User" data-controller="users/investor/" data-page="<?php echo $this->Paginator->current();?>"  id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a>
				
			
					
				
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
