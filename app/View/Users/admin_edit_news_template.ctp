<script src="<?php echo HTTP_ROOT?>js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<aside class="right-side">
<section class="content-header">
		<h1>Edit Template</h1>
</section>
<section class="content">

  <div class="pull-right">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
  </div>
  
<div class="form-box" style="width:95%;"  id="template-box">
	<h4 class="box-title">Edit Newsletter Template</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/edit_news_template" method="POST" id="editTemplate" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[NewsletterTemplates][id]" value='<?php if(!empty($template_info['NewsletterTemplates']['id'])){ echo $template_info['NewsletterTemplates']['id']; } ?>' />           
        <div class="body bg-gray">
            <div class="form-group title_div">
              Title:<input type="text" class="required form-control title" name="data[NewsletterTemplates][title]" value='<?php if(!empty($template_info['NewsletterTemplates']['title'])){ echo $template_info['NewsletterTemplates']['title']; } ?>' />
            </div>
            <div id='title_id'></div>
            <div class="form-group subject_div">
              Subject:<input type="text" class="required form-control subject"  name="data[NewsletterTemplates][subject]" value='<?php if(!empty($template_info['NewsletterTemplates']['subject'])){ echo $template_info['NewsletterTemplates']['subject']; } ?>' />
            </div>
            <div id='sub_id'></div>
            <div class="form-group email_div">
               From:<input type="text" class="required form-control from_email" name="data[NewsletterTemplates][from]" value='<?php if(!empty($template_info['NewsletterTemplates']['from'])){ echo $template_info['NewsletterTemplates']['from']; } ?>' />
            </div>
            <div id='email_id'></div>
            
            <!--<div class="form-group">
               Short Codes Variables:<p class="warning short_codes fa fa-warning" style="float:right;"> &nbsp;Please do not change the words written in curly braces({}).</p>
               <input type="text" readonly class="required form-control" name="data[NewsletterTemplates][allowed_vars]" value='<?php if(!empty($template_info['NewsletterTemplates']['allowed_vars'])){ echo $template_info['NewsletterTemplates']['allowed_vars']; } ?>' />
            </div>-->
             
            <div class="form-group">
               Description:<textarea id="editor1"  name="data[NewsletterTemplates][description]" rows="45" cols="44" class="required form-control ckeditor"><?php if(!empty($template_info['NewsletterTemplates']['description'])){ echo $template_info['NewsletterTemplates']['description']; } ?></textarea>
            </div>
            <div id='des_id'></div>
           <div class="form-group text-right"> 
                <button type="submit" class="btn btn-success sub_btn">Submit </button>
            </div>
        </div>         
    </form>
</div>		
</section>
</aside>
<script type="text/javascript">
	CKEDITOR.config.height = 700;
	$(document).ready(function() {

		$('.sub_btn').click(function(){
			$('.error').remove();
       var title = $('.title').val().trim();
       var subject = $('.subject').val().trim();
       var email = $('.from_email').val();
			 var description = CKEDITOR.instances['editor1'].getData();
			 var err="<label class='error'>This Field is required</label>";
			if(title=='' || subject=='' || description=='' || email==''){
				if(title==''){
						$('#title_id').html(err);
            $('html,body').animate({scrollTop: $(".title_div").offset().top},'slow');
				}
				if(subject==''){
						$('#sub_id').html(err);
            $('html,body').animate({scrollTop: $(".title_div").offset().top},'slow');
				}
        if(email==''){
						$('#email_id').html(err);
            $('html,body').animate({scrollTop: $(".title_div").offset().top},'slow');
				}
				if(description==''){
						$('#des_id').html(err);
				}
        if(email!=''){
          var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
          var valid = emailReg.test(email);
            if(!valid) {
              $('#email_id').html('<label class="error">Please enter valid email address !</label>');
              $('html,body').animate({scrollTop: $(".title_div").offset().top},'slow');
              return false;
            } else {
              $('#email_id').html('');
            }
          }
				 return false;
			}
			if(email!=''){
          var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
          var valid = emailReg.test(email);
            if(!valid) {
              $('#email_id').html('<label class="error">Please enter valid email address !</label>');
              $('html,body').animate({scrollTop: $(".title_div").offset().top},'slow');
              return false;
            } else {
              $('#email_id').html('');
            }
          }else{
            $('#email_id').html(err);
            $('html,body').animate({scrollTop: $(".title_div").offset().top},'slow');
            return false;
          }
		});
	});	
</script>
