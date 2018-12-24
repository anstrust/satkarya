
<section class="signup_page container" >
	<div class="sign_up">
    <div class="col-sm-6 mid col-md-offset-3">
       <div class="bg_form text-center">
            <h2>SIGN IN </h2><br/>
	        <form name="loginform" id="loginform" action="" class="login-form" method="post" autocomplete="off">
                
				<div class="form-group form_rel">
	                <input type="text" name= "data[email]" class="form-control" placeholder="Email"/>
	                <i class="fa fa-envelope form" aria-hidden="true"></i>
                </div>
                <div class="form-group form_rel">
	                <input type="password" name= "data[password]" id="password" class="form-control" placeholder="Password"/>
	                <i class="fa fa-key form" aria-hidden="true"></i>
                </div>
				<div class="">
					<span>DON'T REMBMER PASSWORD?  <a style="color:#fff;" data-toggle="modal" href="#myModal">Forgot Password?</a></span>
				</div>
                <button type="submit" class="register ">Login</button>
	        </form>
	        <!--div class="">
		    	<span>DON'T HAVE A MEMBERSHIP?  <a  style="color:#fff;" href="<?php echo HTTP_ROOT.'Homes/register'?>" class="sign-in">SIGN UP</a></span>
		    </div-->
        </div>
    </div>
</div>		

</section>

<!-- Forget password -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:50%;">
		<?php echo $this->Form->create('forgotUserPassword',array('id'=>'forgotUserPassword','method'=>'post','url'=>array('controller'=>'Homes','action'=>'forgot_password')));?>	
    <div class="modal-content">	
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Forgot Password?</h4>
      </div>

      <div class="modal-body">
        <div class="forgot-password-text">
        	<p>
        		Can't remember your password? Don't worry you can recover your password in a few minutes. Just fill in the Email Address used at your
        		 registration in below text-box.
        	</p>
					<?php echo $this->Form->input('forgetEmail',array('type'=>'email','class'=>'form-control','placeholder'=>'Email Address','label'=>'Enter your Email'));?>
	             <p id="err_forgetEmail" class="error"></p>	
        </div>
      </div>
      <div class="modal-footer">
    			<?php echo $this->Form->input('Retrieve', array('div'=>false,'label'=>false,'type'=>'submit','class'=>'btn btn-custom','onclick'=>"return ajax_form('forgotUserPassword','Homes/validate_User_Forgot_Password_Ajax','loading')"));?>
      </div>
    </div>
		<?php echo $this->Form->end();?>
  </div>
</div>		
<!-- forget password end -->

<script type="text/javascript">
    $(document).ready(function(){
        var form = $("#loginform");
        form.validate({
            highlight: function(element, errorClass, validClass) {
                $(element).closest('.form-group').addClass("has-error");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass("has-error");
            },
            rules: {
               "data[username]": "required",
                "data[email]":{
                    required: true,
                    email: true,
                    // remote: {
                    //     url: '/admin/validateEmail',
                    //     type: "post",
                    //     data: {
                    //         email: function() {
                    //             return $('#addBusinessFormStep1 :input[name="email"]').val();
                    //         },
                    //         sameId: function() {
                    //             return $('#addBusinessFormStep1 :input[name="business_id"]').val();
                    //         },
                    //         model: 'business'
                    //     },
                    //     //async: true, // set async = false
                    // }
                },
                
                "data[password]": {
                    required: true,
                    minlength : 6
                },
                
            },
            messages: {
               
                "data[email]": {
                    required: "Please enter email address",
                    email: "Your email address must be in the format of name@domain.com",
                    remote: "This email is already exists in our records",
                },
                
                "data[password]": {
                    required: "Please enter your password",
                },
               
            }

        });
    });
</script>

