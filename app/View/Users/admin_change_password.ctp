<aside class="right-side">
	<section class="content-header">
     <h1>Change Password</h1>
 	</section>
  <section class="content">
    <div class="pull-right" style="margin-bottom:10px;">
        <a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
    </div>	
  	<div class="form-box" style="width:95%; margin:30px; "  id="login-box">
    <?php echo $this->Session->flash(); ?>
    <h4 class="box-title">Change Your Password</h4>
      <form method="post" action="<?php echo HTTP_ROOT.'admin/users/changePassword'?>" enctype="multipart/form-data" id="changePsw">
      <div class="body bg-gray">
          <div class="form-group">
            Current Password:<input type="password" id="oldPass" class="form-control required" name="data[Admin][old_password]" placeholder="Old Password"/>
          </div>
          <div class="form-group">
             New Password:<input type="password"  class="form-control required" name="data[Admin][new_password]" id="newPass" placeholder="New Password"/>
          </div>
          <div class="form-group">
             Confirm Password:<input type="password" class="form-control required" name="data[Admin][confirm_password]" id="confPass" placeholder="Confirm Password" />
          </div>
          <div class="form-group text-right"> 
              <button type="submit" class="btn btn-success">Submit </button>
          </div> 
      </form>
    </div>
  </section>
</aside>
<script type="text/javascript">
  $(document).ready(function(){
    $('#changePsw').validate(
    {
        rules:
        {
            "data[Admin][old_password]":
            {
                required:true
            
            },
            "data[Admin][new_password]":
            {
                required:true
            
            },
            "data[Admin][conform_password]":
            {
                equalTo: "#newPass"
            
            }
        }
    });
    $('#changePsw').validate(); 
    $("#oldPass").rules('add',{
       messages: {remote: "Please enter correct Current Password."}});
    $("#confPass").rules('add',{equalTo: "#newPass",
         messages: {equalTo: "New password and confirm password field doesn't match."}});
  })
</script>