<script src="<?php echo HTTP_ROOT?>js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<aside class="right-side">
<section class="content-header">
		<h1>Edit FAQ</h1>
</section>
<section class="content"> 
<div class="pull-right" style="">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px; "  id="template-box">
	<h4 class="box-title">Edit FAQ</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/edit_faqs" method="POST" id="editTemplate" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[Faq][id]" value='<?php if(!empty($faq_info['Faq']['id'])){ echo $faq_info['Faq']['id']; } ?>' />           
        <div class="body bg-gray">
            <div class="form-group title_div">
              Title:<input type="text" class="required form-control cms_title"  name="data[Faq][question]" value='<?php if(!empty($faq_info['Faq']['question'])){ echo $faq_info['Faq']['question']; } ?>' />
            </div>
            <div id='title'></div>
            <div class="form-group">
               Description:<textarea id='description' name="data[Faq][answer]" rows="45" cols="44" class="required form-control ckeditor"><?php if(!empty($faq_info['Faq']['answer'])){ echo $faq_info['Faq']['answer']; } ?></textarea>
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
			 var value = CKEDITOR.instances['description'].getData();
			 var value2=$('.cms_title').val();
			 var err="<label class='error'>This Field is required</label>";
			if(value=='' || value2==''){
				if(value==''){
						$('#des_id').html(err);
				}
				if(value2==''){
						$('#title').html(err);
            $('html,body').animate({scrollTop: $(".title_div").offset().top},'slow');
				}
				 return false;
			}
			
		});
	});	
</script>
