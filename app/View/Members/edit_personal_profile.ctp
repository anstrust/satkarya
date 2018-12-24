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
                  <div class="progress"><div class="progress-bar"></div></div>
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
					<div class="col-xs-3 bs-wizard-step active"><!-- complete -->
					<div class="text-center bs-wizard-stepnum">Step 2</div>
					<div class="progress"><div class="progress-bar"></div></div>
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
			<h2><b>Edit Profile</b></h2>
			<div class="edit_profile">
			<?php echo $this->Form->create('User',array('id'=>'edit_profile','enctype'=>'multipart/form-data','method'=>'post','url'=>array('controller'=>'Members','action'=>'edit_personal_profile')));?>
			<?php echo $this->Form->input('user_id',array('type'=>'hidden','class'=>'user','label'=>false,'div'=>false,'value'=>$user_data['User']['id']))?>
			<?php echo $this->Form->input('id',array('type'=>'hidden','class'=>'form-control','label'=>false,'div'=>false,'value'=>$user_data['UserDetail']['id']))?>
			<!-- Basic Info -->
			<div class="basic_info">
			<!-- <h3>Personal Information</h3> -->
				<div class="row">
					<div class="col-md-12">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>First Name</label>
							<?php echo $this->Form->input('firstname',array('type'=>'text','class'=>'form-control','value'=>$user_data['User']['firstname'],'label'=>false,'div'=>false));?>
							<p id="err_firstname" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Last Name</label>
							<?php echo $this->Form->input('lastname',array('type'=>'text','class'=>'form-control','value'=>$user_data['User']['lastname'],'label'=>false,'div'=>false));?>
							<p id="err_lastname" class="error"></p>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
					
						<div class="form-group">
							<label>Email Id</label>
							<?php echo $this->Form->input('email',array('type'=>'text','class'=>'form-control','readonly'=>'readonly','value'=>$user_data['User']['email'],'label'=>false,'div'=>false));?>
							<p id="err_email" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Date of birth</label>
							<?php echo $this->Form->input('dob',array('type'=>'text','id'=>"datepicker",'class'=>'form-control','value'=>@$user_data['User']['dob'],'label'=>false,'div'=>false));?>
							<p id="err_dob" class="error"></p>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Mobile</label>
							<?php echo $this->Form->input('mobile',array('type'=>'text','id'=>'contact','class'=>'form-control number','value'=>$user_data['User']['mobile'],'label'=>false,'div'=>false));?>
							<p id="err_mobile" class="error"></p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Category</label>
							<select class="form-control" name="data[User][category]">
							<?php if($user_data['User']['category']==1){ ?>
								<option  value="1" selected="selected" >Smardha</option>
								<option value="2">Other Bhramins</option>
								<option value="3">Non Bhramins with Poonal</option>
								<option value="4">Non Bhramins without Poonal</option>
							<?php } elseif($user_data['User']['category']==2) {?>
								<option  value="1"  >Smardha</option>
								<option value="2" selected="selected">Other Bhramins</option>
								<option value="3">Non Bhramins with Poonal</option>
								<option value="4">Non Bhramins without Poonal</option> 	
							<?php } elseif($user_data['User']['category']==3) {?>
								<option  value="1"  >Smardha</option>
								<option value="2">Other Bhramins</option>
								<option value="3" selected="selected">Non Bhramins with Poonal</option>
								<option value="4">Non Bhramins without Poonal</option> 	
							<?php } elseif($user_data['User']['category']==4) {?>
								<option  value="1" >Smardha</option>
								<option value="2">Other Bhramins</option>
								<option value="3">Non Bhramins with Poonal</option>
								<option value="4" selected="selected">Non Bhramins without Poonal</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1" >Smardha</option>
								<option value="2">Other Bhramins</option>
								<option value="3">Non Bhramins with Poonal</option>
								<option value="4">Non Bhramins without Poonal</option> 	
							 	
							
							<?php } ?>
							</select>
							
						</div>
						<p id="err_category" class="error"></p>
					</div>
					<!--div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Gender</label>
							<select class="form-control" name="data[User][gender]">
							<?php if($user_data['User']['gender']==1){ ?>
								<option  value="1" selected="selected" >Male</option>
								<option value="2" >Female</option>
							<?php } elseif($user_data['User']['gender']==2) {?>
							<option  value="1">Male</option>
							<option value="2" selected="selected">Female</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1"  >Male</option>
								<option value="2" >Female</option> 	
							
							<?php } ?>
							</select>
							<p id="err_gender" class="error"></p>
						</div>
					</div-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Current living place India</label>
							<select class="form-control" name="data[User][user_type]">
							<?php if($user_data['User']['user_type']==1){ ?>
								<option  value="1" selected="selected" >yes</option>
								<option value="2" >no</option>
							<?php } elseif($user_data['User']['user_type']==2) {?>
							<option  value="1">yes</option>
							<option value="2" selected="selected">no</option> 	
							<?php }else { ?>
								<option value="0">Select</option>
								<option  value="1">yes</option>
								<option value="2" >no</option> 	
							
							<?php } ?>
							</select>
							<p id="err_user_type" class="error"></p>
						</div>
					</div>
						<h2>Current Address</h2>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label>Country</label>
								<select	 class="form-control " name="data[User][country]">
								<option value="0">Select</option>
								<?php   
								foreach ($country as $country) 
									{ 
										echo '<option value="'.$country['Country']['id'].'"'.($country['Country']['id'] == $user_data['User']['country'] ? ' selected="selected"' : '').'>'.$country['Country']['country_name'].'</option>';
									}
								?>
								</select>
								<p id="err_country" class="error"></p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label>State/Province</label>
								<?php echo $this->Form->input('c_state', array('id'=>'autosuggest_state','class'=>'form-control','type'=>'text','value'=>@$user_data['UserDetail']['c_state'],'label'=>false,'div'=>false)); ?>	
								<p id="err_c_state" class="error"></p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label>City</label>
									<?php echo $this->Form->input('c_city',array('type'=>'text','class'=>'form-control','value'=>$user_data['UserDetail']['c_city'],'label'=>false,'div'=>false));?>
								<p id="err_c_city" class="error"></p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label>Zip Code</label>
									<?php echo $this->Form->input('c_zipcode',array('type'=>'text','id'=>'zip','class'=>'form-control number','value'=>@$user_data['UserDetail']['c_zipcode'],'label'=>false,'div'=>false));?>
									<p id="err_c_zipcode" class="error"></p>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label>Address</label>
									<?php echo $this->Form->input('c_address',array('type'=>'text','class'=>'form-control','value'=>$user_data['UserDetail']['c_address'],'label'=>false,'div'=>false));?>
									<p id="err_c_address" class="error"></p>
							</div>
						</div>
						<h2>Permanent Address</h2>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label>State/Province</label>
								<?php echo $this->Form->input('state', array('id'=>'autosuggest_state','class'=>'form-control','type'=>'text','value'=>@$user_data['UserDetail']['state'],'label'=>false,'div'=>false)); ?>	
								<p id="err_state" class="error"></p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label>City</label>
									<?php echo $this->Form->input('city',array('type'=>'text','class'=>'form-control','value'=>$user_data['UserDetail']['city'],'label'=>false,'div'=>false));?>
								<p id="err_city" class="error"></p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label>Zip Code</label>
									<?php echo $this->Form->input('zipcode',array('type'=>'text','id'=>'zip','class'=>'form-control number','value'=>@$user_data['UserDetail']['zipcode'],'label'=>false,'div'=>false));?>
									<p id="err_zipcode" class="error"></p>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label>Address</label>
									<?php echo $this->Form->input('address',array('type'=>'text','class'=>'form-control','value'=>$user_data['UserDetail']['address'],'label'=>false,'div'=>false));?>
									<p id="err_address" class="error"></p>
							</div>
							
						</div>
						
					</div>
						
					</div>
				</div>
				<!-- Basic Info End -->
				<?php echo $this->Form->button('Save',array('class'=>'btn btn-primary hover-right','type'=>'submit', 'onclick'=>"return ajax_form('edit_profile','Members/validate_edit_personal_profile_ajax','loading')"));?>
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