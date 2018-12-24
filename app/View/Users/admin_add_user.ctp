<script src="<?php echo HTTP_ROOT?>js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<aside class="right-side">
<section class="content-header">
		<h1>Add Student</h1>
</section>
<section class="content">
<div class="pull-right" style="">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;"  id="template-box">
	<h4 class="box-title">Add Student</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/add_user" method="POST" id="adduser" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[User][class_id]" value='<?php echo $id; ?>' />           
        <div class="body bg-gray">
            <div class="form-group title_div col-md-6">
              First Name:<input type="text" class="form-control required"  name="data[User][firstname]" value='' />
            </div>
            <div id='firstname'></div>
            <div class="form-group title_div col-md-6">
              Last Name:<input type="text" class="form-control required"  name="data[User][lastname]" value='' />
            </div>
            <div id='lastname'></div>
			<div class="form-group title_div col-md-12 ">
              Email:<input type="text" class="form-control required "  name="data[User][email]" value='' />
            </div>
            <div id='email'></div>
           <div class="form-group text-right"> 
                <button type="submit" class="btn btn-success sub_btn">Submit </button>
            </div>
            
        </div>         
    </form>
</div>		
</section>
</aside>
<script type="text/javascript">
    $(document).ready(function(){
        $('#adduser').validate(
        {
            rules:
            {
                "data[User][firstname]":
                {
                    required:true
                
                },
                "data[User][lastname]":
                {
                    required:true
                
                },
                
                "data[User][email]":
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
