<script src="<?php echo HTTP_ROOT?>js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<aside class="right-side">
<section class="content-header">
		<h1>Add Exam Paper</h1>
</section>
<section class="content">
<div class="pull-right" style="">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;"  id="template-box">
	<h4 class="box-title">Add Exam</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/add_question" method="POST" id="adduser" enctype="multipart/form-data">
	 <input type="hidden" class="required" name="data[Question][exam_id]" value='<?php echo $id?>' /><div class="body bg-gray">
      
		<div class="body bg-gray">
            <div class="form-group title_div col-md-12">
              Question :<input type="text" class="form-control required"  name="data[Question][Q]" value='' />
            </div>
            <div id='Q1'></div>
            <div class="form-group title_div col-md-3">
              A:<input type="text" class="form-control required"  name="data[Question][A]" value='' />
            </div>
            <div id='A1'></div>
			<div class="form-group title_div col-md-3">
              B:<input type="text" class="form-control required"  name="data[Question][B]" value='' />
            </div>
            <div id='B1'></div>
			<div class="form-group title_div col-md-3">
              C:<input type="text" class="form-control required"  name="data[Question][C]" value='' />
            </div>
            <div id='C1'></div>
			<div class="form-group title_div col-md-3">
              D:<input type="text" class="form-control required"  name="data[Question][D]" value='' />
            </div>
            <div id='D1'></div>
			<div class="form-group title_div col-md-12">
			Correct answer: <?php echo $this->Form->input('correct_answer',array('type'=>'radio','legend'=>false,'div'=>false,'options'=>array('A'=>'First','B'=>'Second','C'=>'Third','D'=>'Fourth'),'style'=>'width:6%;','class'=>'required','name'=>'data[Question][correct_answer]'));?>
			<div id='correct_answer'></div>
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
