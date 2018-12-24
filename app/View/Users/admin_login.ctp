<style>
.abc{
margin-left: 20px;

}
</style>

<div class="form-box" id="login-box">
    <img  style="margin:0 0 20px 14%;" class="img-responsive postin_img" src="<?php echo HTTP_ROOT.'img/logo.png'?>">
    <div class="header">Admin Sign In</div>
    <form id="login_form" action="<?php echo HTTP_ROOT.'admin/users/login'?>" method="post">
        <div class="body bg-gray">
            <?php echo $this->Session->flash(); ?>
            <div class="form-group">
                <input type="text" value="<?php echo @$stayTuned['username']; ?>" name="data[Admin][username]" class="form-control" placeholder="Username"/>
            </div>
            <div class="form-group">
                <input type="password" value="<?php echo @$stayTuned['password']; ?>" name="data[Admin][password]" class="form-control" placeholder="Password"/>
            </div>
            <div class="form-group abc">
            <?php 
                if(!empty($stayTuned))
                {
                    echo $this->Form->input('Admin.rememberMe', array('type' => 'checkbox','id'=>'login-remember', 'label' => 'Remember me','checked'=>'checked', 'value'=>1)); 
                }   
                else
                {
                    echo $this->Form->input('Admin.rememberMe', array('type' => 'checkbox','id'=>'login-remember','label' => 'Remember me', 'value'=>1)); 
                }
            ?>
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive btn-block">Sign me in</button>
            <p><a data-toggle="modal" href="#myModal">I forgot my password</a></p>
        </div>
    </form>
</div>
<!-- bootstrap modal for forgot password -->    
<form id="forgotPassword" action="<?php echo HTTP_ROOT.'admin/users/forgot_password'?>" method="post">       
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                    <div class="modal-body">
                        Forgot your password?
                        <br>
                        <br>
                        No problem. Just enter your email id you used at the time of registration in the box below:
                        <input style="margin-top:10px;" type="text" class="form-control margintop10" placeholder="Email" name="data[Admin][email]">
                    </div>
                <div class="modal-footer">
                    <button type="button" id="close_modal" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#login_form').validate(
        {
            rules:
            {
                "data[Admin][username]":
                {
                    required:true
                
                },
                "data[Admin][password]":
                {
                    required:true
                    
                }
            }
        });

        $('#forgotPassword').validate(
        {
            rules:
            {
                "data[Admin][email]":
                {
                    required:true,
                    email:true
                    
                }
            }
        });
        $('#close_modal').click(function(){
            $('#forgotPassword').trigger("reset");
            var jqueryValidator = jQuery("#forgotPassword").validate();
            jqueryValidator.resetForm(); 
        });
    })
</script>
