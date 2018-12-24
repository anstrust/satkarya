<?php //pr($institute);die;?>
<!--section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Sign<span>Up</span></h2>
			</div>
		</div>
	</div>
</section-->
<section class="signup_page container" >
	<div class="sign_up">
    <div class="col-sm-6 mid col-md-offset-3">
       <div class="bg_form text-center">
            <form name="registerform" id="registerform" class="login-form" action="" method="post" autocomplete="off">
                <div class="form-group form_rel">
	                <input type="text" name= "data[firstname]" class="form-control" placeholder="First Name"/>
	                <i class="fa fa-user form" aria-hidden="true"></i>
                </div>
                <div class="form-group form_rel">
	                <input type="text" name= "data[lastname]" class="form-control" placeholder="Last Name"/>
	                <i class="fa fa-user form" aria-hidden="true"></i>
                </div>
                <!--div class="form-group form_rel">
	                <input type="text" name= "data[username]" class="form-control" minlength="6" placeholder="User Name"/>
	                <i class="fa fa-user form" aria-hidden="true"></i>
                </div-->
                <div class="form-group form_rel">
	                <input type="text" name= "data[email]" class="form-control" placeholder="Email"/>
	                <i class="fa fa-envelope form" aria-hidden="true"></i>
                </div>
                <div class="form-group form_rel">
	                <input type="password" name= "data[password]" id="password" class="form-control" placeholder="Password"/>
	                <i class="fa fa-key form" aria-hidden="true"></i>
                </div>
                <div class="form-group form_rel">
	                <input type="password" name= "data[retype_password]" class="form-control" placeholder="Retype password"/>
	                <i class="fa fa-key form" aria-hidden="true"></i>
                </div>
                
                <!-- <span class="privacy-policy-check">By creating an account, I agree to Fitness Assurance's Terms of Use and Privacy Policy and to receive emails.</span> -->
                <button type="submit" id="btn_check" class="register">Register</button>
	        </form>

	        <div class="signup-btn">
		    	<span>ALREADY HAVE A MEMBERSHIP?<a style="color:#fff;" href="<?php echo HTTP_ROOT.'Homes/login'?>" class="sign-in">SIGN IN</a></span>
		    </div>
        </div>
    </div>
</div>		
		
				
			
		
		
		
	
</section>
<script type="text/javascript">
    $(document).ready(function(){
		
        var form = $("#registerform");
        form.validate({
            highlight: function(element, errorClass, validClass) {
                $(element).closest('.form-group').addClass("has-error");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass("has-error");
            },
            rules: {
                "data[firstname]": "required",
                "data[lastname]": "required",
                /* "data[username]":{
									required: true,
									remote: 
									{
										url: "checkusername",
										type: "post"
									},async: false
								}, */
								
                "data[email]":{
									required: true,
									email: true,
									remote: 
									{
										url: "checkmail",
										type: "post",
										
									},async: false
									
								},
                
                "data[password]": 
				{
                    required: true,
                    minlength : 6
                },
                "data[retype_password]": 
				{
                    required:true,
                    minlength : 6,
                    equalTo : "#password"
                },
            },
            messages: 
			{
                "data[firstname]": 
				{
                    required: "Please specify your first name"
                },
                "data[lastname]": 
				{
                    required: "Please specify your last name"
                },
                "data[username]": 
				{
                    required: "Please specify your username",
					remote:"This username name is already exists in our records",
                },
                "data[email]": 
				{
                    required: "Please specify your email address",
                    email: "Your email address must be in the format of name@domain.com",
                    remote: "This email is already exists in our records",
                },
                
                "data[password]": {
                    required: "Please specify your password",
                },
                "data[retype_password]": {
                    required: "Please confirm your password",
                }
            },
            /* submitHandler: function(form){
                
                if($("#privacy_accept").is(":checked")){
                    $("#privacy_accept-error").hide();
                    form.submit();
                }
                else{
                    $("#privacy_accept-error").show();
                    return false;
                }

            } */

        });
    });
</script>

