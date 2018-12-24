
<script src="<?php echo HTTP_ROOT?>js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<aside class="right-side">
<section class="content-header">
		<h1>Add Blog</h1>
</section>
<section class="content">
<div class="pull-right" style="">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;"  id="template-box">
	<h4 class="box-title">Add Blog</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/add_blog" method="POST" id="add_blog" enctype="multipart/form-data">
       <div class="body bg-gray">
        <div class="form-group title_div">
          Blog Title:<input type="text" class="required form-control blog_title"  name="data[Blog][blog_title]" value='' placeholder="Blog Title" />
        </div>
        <div id='title'></div>
        <div class="form-group title_div">
			 Blog Category:
			  <select class="form-control blog_category" name="data[Blog][category]">
				<option value="0">Select</option>
				<?php 
				   foreach ($category as $category) {
					?>
				<option value="<?php echo $category['Category']['id']; ?>"><?php echo $category['Category']['category_name'];?></option>
				<?php			
				   }
				   ?>		
			 </select>
			  <div id='blog_category'></div>
        </div>
       	<div class="form-group title_div">
			Blog Description:<textarea id='description' name="data[Blog][message]" rows="45" cols="45" placeholder="Blog Description" class="required form-control ckeditor"></textarea>
		</div>
            <div id='des_id'></div>
            <div class="form-group title_div"> 
                Blog Image:
                <input type="file" class="img_ext required" name="data[Blog][image]"/>
        	</div>
        	<div id='img'></div>
			<div class="form-group text-right"> 
                <button type="submit" class="btn btn-success sub_btn">Submit </button>
            </div>
            
        </div>         
    </form>
</div>		
</section>
</aside>
<script type="text/javascript">

	CKEDITOR.config.height = 300;
	$(document).ready(function() {
		$('.sub_btn').click(function(){
		$('.error').remove();
		var value = CKEDITOR.instances['description'].getData();
		var value2=$('.blog_title').val();
		var value3=$('.blog_category').val();
		var value7=$('.img_ext').val();
		
		var err="<label class='error'>This Field is required</label>";
		if(value=='' || value2=='' || value3==0 || value7=='' )
			{
			if(value=='')
				{
						$('#des_id').html(err);
				}
			if(value3==0)
				{
						$('#blog_category').html(err);
				}	
			
			if(value7=='')
				{
						$('#img').html(err);
				}
			
			if(value2=='')
				{
					$('#title').html(err);
					$('html,body').animate({scrollTop: $(".title_div").offset().top},'slow');
				}
				 return false;
			}
			
		});
	});	
</script>
<script>
$(document).ready(function()
	{
        $('.img_ext').change(function()	
					{
						var img_name=$(this).val();
						if(img_name != "" && img_name!=null)
							{
								var img_arr=img_name.split('.');
								var ext = img_arr.pop();
								if(ext =="jpg" || ext =="jpeg" || ext =="gif" || ext =="png")
									{
									   
									}
								else
									{
										$(this).val('');
										alert('Please select an image .jpg, .png, .gif file format type.');
										return false;
										
									}
							}
					});		
			
	});	
	</script>


