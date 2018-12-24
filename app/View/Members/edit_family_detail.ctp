<style>
.error
{
	color:red;
}
</style>

<main style="margin-top:70px;">
<div class="container" style="margin-top:25px;">
	<div class="row">
			
		<div class="col-md-12">
		
			<div class="col-md-3" style="padding:10px;">
				<?php echo $this->element('frontElements/leftside_bar');?>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
			<div class="row bs-wizard" style="border-bottom:0;">
                <?php if($user_data['User']['step1']==1) { ?>
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                </div>
                <?php } else {?>
				<div class="col-xs-3 bs-wizard-step active">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><!--div class="progress-bar"></div--></div>
                  <a href="#" class="bs-wizard-dot"></a>
                </div>
				<?php } ?>
				<?php if($user_data['User']['step2']==1) { ?>
				
					<div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
					<div class="text-center bs-wizard-stepnum">Step 2</div>
					<div class="progress"><div class="progress-bar"></div></div>
					<a href="#" class="bs-wizard-dot"></a>
					</div>
                <?php } else {?>
				
					<div class="col-xs-3 bs-wizard-step active">
					<div class="text-center bs-wizard-stepnum">Step 2</div>
					<div class="progress"><!--div class="progress-bar"></div--></div>
					<a href="#" class="bs-wizard-dot"></a>
					</div>
				<?php } ?>
				<?php if($user_data['User']['step3']==1) { ?>
                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                </div>
				<?php } else { ?>
                 <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><!--div class="progress-bar"></div--></div>
                  <a href="#" class="bs-wizard-dot"></a>
                </div>
                <?php } ?>
				<?php if($user_data['User']['step4']==1) { ?>
                <div class="col-xs-3 bs-wizard-step active"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                </div>
				<?php } else {?>
					<div class="col-xs-3 bs-wizard-step active"><!-- active -->
					<div class="text-center bs-wizard-stepnum">Step 4</div>
					<div class="progress"><!--div class="progress-bar"></div--></div>
					<a href="#" class="bs-wizard-dot"></a>
					</div>
				<?php } ?>
            </div>
			<h2><b>Family Detail</b></h2>
			<div class="edit_profile">
			<?php echo $this->Form->create('User',array('id'=>'edit_profile','enctype'=>'multipart/form-data','method'=>'post','url'=>array('controller'=>'Members','action'=>'edit_family_detail')));?>
			<?php echo $this->Form->input('user_id',array('type'=>'hidden','class'=>'user','label'=>false,'div'=>false,'value'=>$user_data['User']['id']))?>
			<?php echo $this->Form->input('id',array('type'=>'hidden','class'=>'form-control','label'=>false,'div'=>false,'value'=>$user_data['User']['id']))?>
			<!-- Basic Info -->
			<div class="basic_info">
			<!-- <h3>Personal Information</h3> -->
				<div class="row">
					<div class="col-md-12">
					<h2>Gothram</h2>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Father Gothram</label>
							<?php echo $this->Form->input('father_gothram',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['father_gothram'],'label'=>false,'div'=>false));?>
							<p id="err_father_gothram" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mother Gothram</label>
							<?php echo $this->Form->input('mother_gothram',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['mother_gothram'],'label'=>false,'div'=>false));?>
							<p id="err_mother_gothram" class="error"></p>
						</div>
					</div>
					
					<h2>Father Information</h2>
					<div class="col-md-12 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Father Name</label>
							<?php echo $this->Form->input('father_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['father_name'],'label'=>false,'div'=>false));?>
							<p id="err_father_name" class="error"></p>
						</div>
					</div>	
					<!--div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Father Alive</label>
							<select class="form-control" name="data[User][father_alive]">
							<?php if($user_data['User']['father_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['father_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Yes</option>
								<option value="2" >No</option> 	
							
							<?php } ?>
							</select>
							<p id="err_father_alive" class="error"></p>
						</div>
					</div-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Dad's Father Name</label>
							<?php echo $this->Form->input('dad_father_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['dad_father_name'],'label'=>false,'div'=>false));?>
							<p id="err_dad_father_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Dad's Father Alive</label>
							<select class="form-control" name="data[User][dad_father_alive]">
							<?php if($user_data['User']['dad_father_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['dad_father_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Yes</option>
								<option value="2" >No</option> 	
							<?php } ?>
							</select>
							<p id="err_dad_father_alive" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Dad's Grand Father Name</label>
							<?php echo $this->Form->input('dad_grand_father_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['dad_grand_father_name'],'label'=>false,'div'=>false));?>
							<p id="err_dad_grand_father_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Dad's Grand Father Alive</label>
							<select class="form-control" name="data[User][dad_grand_father_alive]">
							<?php if($user_data['User']['dad_grand_father_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['dad_grand_father_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Yes</option>
								<option value="2" >No</option> 	
							<?php } ?>
							</select>
							<p id="err_dad_grand_father_alive" class="error"></p>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Dad's Mother Name</label>
							<?php echo $this->Form->input('dad_mother_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['dad_father_name'],'label'=>false,'div'=>false));?>
							<p id="err_dad_mother_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Dad's Mother Alive</label>
							<select class="form-control" name="data[User][dad_mother_alive]">
							<?php if($user_data['User']['dad_mother_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['dad_mother_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Yes</option>
								<option value="2" >No</option> 	
							<?php } ?>
							</select>
							<p id="err_dad_mother_alive" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Dad's Grand Mother Name</label>
							<?php echo $this->Form->input('dad_grand_mother_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['dad_grand_mother_name'],'label'=>false,'div'=>false));?>
							<p id="err_dad_grand_mother_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Dad's Grand Mother Alive</label>
							<select class="form-control" name="data[User][dad_grand_mother_alive]">
							<?php if($user_data['User']['dad_grand_mother_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['dad_grand_mother_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Yes</option>
								<option value="2" >No</option> 	
							<?php } ?>
							</select>
							<p id="err_dad_grand_mother_alive" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Dad's Great Grand Mother Name</label>
							<?php echo $this->Form->input('dad_great_grand_mother_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['dad_great_grand_mother_name'],'label'=>false,'div'=>false));?>
							<p id="err_dad_great_grand_mother_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Dad's Great Grand Father Alive</label>
							<select class="form-control" name="data[User][dad_great_grand_mother_alive]">
							<?php if($user_data['User']['dad_great_grand_mother_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['dad_great_grand_mother_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Yes</option>
								<option value="2" >No</option> 	
							<?php } ?>
							</select>
							<p id="err_dad_great_grand_mother_alive" class="error"></p>
						</div>
					</div>
					<h2>Mother Information</h2>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mother Name</label>
							<?php echo $this->Form->input('mother_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['mother_name'],'label'=>false,'div'=>false));?>
							<p id="err_mother_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mother Alive</label>
							<select class="form-control" name="data[User][mother_alive]">
							<?php if($user_data['User']['mother_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['mother_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Yes</option>
								<option value="2" >No</option> 	
							
							<?php } ?>
							</select>
							<p id="err_mother_alive" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Father Name</label>
							<?php echo $this->Form->input('mom_father_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['mom_father_name'],'label'=>false,'div'=>false));?>
							<p id="err_mom_father_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Father Alive</label>
							<select class="form-control" name="data[User][mom_father_alive]">
							<?php if($user_data['User']['mom_father_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['mom_father_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Yes</option>
								<option value="2" >No</option> 	
							<?php } ?>
							</select>
							<p id="err_mom_father_alive" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Grand Father Name</label>
							<?php echo $this->Form->input('mom_grand_father_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['mom_grand_father_name'],'label'=>false,'div'=>false));?>
							<p id="err_mom_grand_father_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Grand Father Alive</label>
							<select class="form-control" name="data[User][mom_grand_father_alive]">
							<?php if($user_data['User']['mom_grand_father_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['mom_grand_father_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option value="1">Yes</option>
								<option value="2">No</option> 	
							<?php } ?>
							</select>
							<p id="err_mom_grand_father_alive" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Great Grand Father Name</label>
							<?php echo $this->Form->input('mom_great_grand_father_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['mom_great_grand_father_name'],'label'=>false,'div'=>false));?>
							<p id="err_mom_great_grand_father_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Great Grand Father Alive</label>
							<select class="form-control" name="data[User][mom_great_grand_father_alive]">
							<?php if($user_data['User']['mom_great_grand_father_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['mom_great_grand_father_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option value="1">Yes</option>
								<option value="2">No</option> 	
							<?php } ?>
							</select>
							<p id="err_mom_great_grand_father_alive" class="error"></p>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Mother Name</label>
							<?php echo $this->Form->input('mom_mother_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['mom_mother_name'],'label'=>false,'div'=>false));?>
							<p id="err_mom_mother_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Mother Alive</label>
							<select class="form-control" name="data[User][mom_mother_alive]">
							<?php if($user_data['User']['mom_mother_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['mom_mother_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Yes</option>
								<option value="2" >No</option> 	
							<?php } ?>
							</select>
							<p id="err_mom_mother_alive" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Grand Mother Name</label>
							<?php echo $this->Form->input('mom_grand_mother_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['mom_grand_mother_name'],'label'=>false,'div'=>false));?>
							<p id="err_mom_grand_mother_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Grand Mother Alive</label>
							<select class="form-control" name="data[User][mom_grand_mother_alive]">
							<?php if($user_data['User']['mom_grand_mother_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['mom_grand_mother_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Yes</option>
								<option value="2" >No</option> 	
							<?php } ?>
							</select>
							<p id="err_mom_grand_mother_alive" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Great Grand Mother Name</label>
							<?php echo $this->Form->input('mom_great_grand_mother_name',array('type'=>'text','class'=>'form-control','value'=>@$user_data['User']['mom_great_grand_mother_name'],'label'=>false,'div'=>false));?>
							<p id="err_mom_great_grand_mother_name" class="error"></p>
						</div>
					</div>	
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mom's Great Grand Father Alive</label>
							<select class="form-control" name="data[User][mom_great_grand_mother_alive]">
							<?php if($user_data['User']['mom_great_grand_mother_alive']==1){ ?>
								<option  value="1" selected="selected" >Yes</option>
								<option value="2" >No</option>
							<?php } elseif($user_data['User']['mom_great_grand_mother_alive']==2) {?>
							<option  value="1">Yes</option>
							<option value="2" selected="selected">No</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Yes</option>
								<option value="2" >No</option> 	
							<?php } ?>
							</select>
							<p id="err_mom_great_grand_mother_alive" class="error"></p>
						</div>
					</div>
						
					</div>
				</div>
			</div>
				<!-- Basic Info End -->
				<?php echo $this->Form->button('Save',array('class'=>'btn btn-primary hover-right','type'=>'submit', 'onclick'=>"return ajax_form('edit_profile','Members/validate_edit_family_detail_ajax','loading')"));?>
				<?php echo $this->Form->end(); ?>
			</div>
			<div class="clearfix" style="margin-bottom:25px;">
			</div>
		</div>
	</div>
	</div>
	</div>
</main>		
		
		
		
	


<script type="text/javascript">
$(document).ready(function()
	{
		$('#clear').click(function()
		{
		
			$("#edit_profile").trigger('reset');
		});
		$(".number").on('keypress blur',function (e)
		{
			
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
				{
					return false;
				}
		});	
		
		var characters= 12;
		$("#counter").append("You have  <strong>"+ characters+"</strong> characters remaining");
		$("#contact").keyup(function()
		{
    		if($(this).val().length > characters)
    		{
         $(this).val($(this).val().substr(0, characters));
			}
    	});
    	var zipcode= 8;
		$("#counter").append("You have  <strong>"+ characters+"</strong> characters remaining");
		$("#zip").keyup(function()
		{
    		if($(this).val().length > zipcode)
    		{
         $(this).val($(this).val().substr(0, zipcode));
			}

    	});
	});
</script>
  <script>
 
					$('#datepicker').click(function(){
						
						$(this).datetimepicker({
						timepicker:false,
						format:'Y-m-d'	
						});
					});
				
  
  </script>	