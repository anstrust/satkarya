<script type="text/javascript">
$(document).ready(function(){

var host = window.location.host;
var proto = window.location.protocol;
var ajax_url = proto+"//"+host+"/Inventtica/";

	
//  Updation Script
	$('.AppointmentStatus').on('click',function(){
		
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
			$.post(ajax_url+'admin/users/chat_request_update_status/'+id+'/'+model+'/'+status, function(resp){
				
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
	</script><?php 
#pr($enquiry_info);die;
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
			<th class="sorting_asc" style="text-align:left;">Investor Name</th>
			<th class="sorting_asc" style="text-align:left;">Company Name</th>
			<th class="sorting_asc" style="text-align:left;">Requested on</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php if(empty($enquiry_info)){ ?>
      <td colspan="7" style="text-align:center; width: 30px;">No Request Yet !</td>
    <?php }else{
    $i=$this->Paginator->counter('%start%');
    foreach($enquiry_info as $enquiry_info){?>
        <tr>
			<td style="text-align:center; width: 30px;"><?php echo $i; ?></td>
			<td style="text-align:left; width: 200px;"><?php echo $enquiry_info['Investor']['name']; ?></td>			
			<td style="text-align:left; width: 200px;"><?php echo $enquiry_info['Entrepreneur']['name']; ?></td>
		
			<td style="text-align:left; width: 150px;"><?php echo $enquiry_info['ChatRequest']['date']; ?></td>
			<td style="text-align:center; width: 120px;">
				<?php $id = base64_encode(convert_uuencode($enquiry_info['ChatRequest']['id'])); 
          if(@$enquiry_info['ChatRequest']['status']==1){
            $toggle_switch="fa-toggle-on";
          }else{
            $toggle_switch="fa-toggle-off";
          }
        ?>
				
        <a title="" class="AppointmentStatus tooltips" data-model="ChatRequest" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg <?php echo $toggle_switch;?>"></i><span>Update Status</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a title="" class="tooltips" href="<?php echo HTTP_ROOT;?>admin/users/view_chat_request/<?php echo $id;?>"><i class="fa fa-lg fa-eye"></i><span>View Detail</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        
        <a title="" class="delRec tooltips" data-model="ChatRequest" data-controller="users/chat_request/" data-page="<?php echo $this->Paginator->current();?>" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a>
				
				
				
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