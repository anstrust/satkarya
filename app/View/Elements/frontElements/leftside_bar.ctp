	<a class="btn btn-warning" style="width:100%;margin:2px;" href="<?php echo HTTP_ROOT.'Members/profile'?>" >DashBoard</a>
	<a class="btn btn-warning" style="width:100%;margin:2px;" href="<?php echo HTTP_ROOT.'Members/edit_personal_profile'?>" >Personal Profile</a>
	<a class="btn btn-warning" style="width:100%;margin:2px;" href="<?php echo HTTP_ROOT.'Members/edit_family_detail'?>" >Family Details</a>
	<a class="btn btn-success"  style="width:100%;margin:2px;" href="<?php echo HTTP_ROOT.'Members/audio_record'?>">Audio Record</a>
	<a class="btn btn-success"  style="width:100%;margin:2px;" href="<?php echo HTTP_ROOT.'Members/video'?>">Video</a>
	<a class="btn btn-success"  style="width:100%;margin:2px;" href="#changePassword" data-toggle="modal" >Change Password</a>
			
			
<!-- For  Change Password Start-->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo $this->Form->create('User',array('id'=>'changePasswordForm','method'=>'post','url'=>array('controller'=>'Members','action'=>'change_password')));?>  
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Change Password</h4>
            </div>
            <div class="modal-body">
                <div class="email-text">
                    <?php echo $this->Form->input('id',array('type'=>'hidden','class'=>'form-control', 'value'=>$this->Session->read('Auth.User.id')));?>
                    <?php echo $this->Form->input('current_password',array('type'=>'password','class'=>'form-control','placeholder'=>'Current Password','label'=>'Current Password'));?>
                    <p id="err_current_password" class="error"></p> 
                </div>
                <div class="email-text">
                    <?php echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','placeholder'=>'New Password','label'=>'New Password'));?>
                    <p id="err_password" class="error"></p> 
                </div>
                <div class="email-text">
                    <?php echo $this->Form->input('confirm_password',array('type'=>'password','class'=>'form-control','placeholder'=>'Confirm Paswword','label'=>'Confirm Paswword'));?>
                    <p id="err_confirm_password" class="error"></p> 
                </div>
            </div>
            <div class="modal-footer">
                <?php echo $this->Form->input('Submit', array('div'=>false,'label'=>false,'type'=>'submit','class'=>'btn btn-primary','onclick'=>"return ajax_form('changePasswordForm','Members/validate_change_password_ajax','loading')"));?>
            </div>
        </div>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php //pr($user_name);die;?>
<!-- For  Change Password End-->