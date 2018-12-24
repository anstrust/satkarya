<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Profile
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="pull-right" style="margin-bottom:10px;">
        <a href="<?php echo HTTP_ROOT?>admin/Users/changePassword" class="btn-success btn-sm backbtn chgPwd" id="changeShow"><i class="fa fa-lg fa-key"></i> &nbsp;Change Password</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
    </div>
        <div class="form-box" style="width:95%; margin:30px; "  id="login-box">
            <h4 class="box-title">Edit Your Profile</h4>    
            <?php echo $this->Session->flash(); ?>
            <form method="post" action="<?php echo HTTP_ROOT;?>admin/Users/edit_profile" enctype="multipart/form-data" id="editProfile">
            <input type="hidden" name="data[Admin][id]" value="<?php echo $this->Session->read('Admin.id');?>" >           
                <div class="body bg-gray">
                    <div class="form-group">
                      <label>First Name:</label><input type="text" class="form-control required" name="data[Admin][firstname]" value="<?php echo $this->Session->read('Admin.firstname');?>" placeholder="Full name"/>
                    </div>
                    <div class="form-group">
                      <label>Last Name:</label><input type="text" class="form-control required" name="data[Admin][lastname]" value="<?php echo $this->Session->read('Admin.lastname');?>" placeholder="Full name"/>
                    </div>
                    <div class="form-group">
                       <label>Username:</label><input type="text"  class="form-control required" name="data[Admin][username]" value="<?php echo $this->Session->read('Admin.username');?>" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                       <label>Email:</label><input type="text" class="form-control required" name="data[Admin][email]" value="<?php echo $this->Session->read('Admin.email');?>" palceholder="Email Address" />
                    </div>
                   <div class="form-group"> 
                        <label>Profile Picture</label>
                        <input type="file" class="img_ext" name="admin_image" />
                    </div>
                    <div class="form-group"> 
                        <img width="120" src="<?php echo HTTP_ROOT.'img/adminImg/adminProfile/'.$this->Session->read('Admin.image');?>">
                    </div>
                    <div class="form-group text-right"> 
                        <button type="submit" class="btn btn-success">Submit </button>
                    </div>
                </div>         
            </form>
        <p style="font-size:20px;"></p>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#editProfile').validate(
        {
            rules:
            {
                "data[Admin][firstname]":
                {
                    required:true
                
                },
                "data[Admin][lastname]":
                {
                    required:true
                
                },
                "data[Admin][username]":
                {
                    required:true
                
                },
                "data[Admin][email]":
                {
                    required:true,
                    email:true
                    
                }
            }
        });
        jQuery.validator.addMethod('img_ext',function(value,element){ 
        if(value=="")
        {
            return true;
        }
        var ext_index=value.lastIndexOf('.');
        var ext=value.substring(ext_index+1);
        var ext_lcase=ext.toLowerCase();
        if(ext_lcase=='jpeg' || ext_lcase=='jpg' || ext_lcase=='png' || ext_lcase=='gif')
        {
            return true;
        } else {
            return false;
        } }, "Please select valid format file (like jpeg, png & gif)" );
    })
</script>
