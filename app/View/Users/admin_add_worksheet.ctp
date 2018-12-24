
<aside class="right-side">
<section class="content-header">
		<h1>Add WorkSheet</h1>
</section>
<section class="content">
<div class="pull-right" style="">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;"  id="template-box">
	<h4 class="box-title">Add WorkSheet</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/add_worksheet" method="POST" id="addworksheet" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[WorkSheet][class_id]" value='<?php echo $id; ?>' />           
        <div class="body bg-gray">
            <div class="form-group title_div col-md-12">
              Subject:<input type="text" class="form-control required"  name="data[WorkSheet][subject]" value='' />
            </div>
            <div class="form-group title_div col-md-12">
              Upload File<input type="file" class="img_ext required"  name="data[WorkSheet][file]" value='' />
            </div>
            
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
        $('#addworksheet').validate(
        {
            rules:
            {
                "data[WorkSheet][subject]":
                {
                    required:true
                
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
        if(ext_lcase=='docx' || ext_lcase=='doc' || ext_lcase=='pdf' || ext_lcase=='jpeg' || ext_lcase=='jpg' || ext_lcase=='png' || ext_lcase=='gif')
        {
            return true;
        } else {
            return false;
        } }, "Please select valid format file (like docx, pdf, jpeg, png & gif)" );
    })
</script>
