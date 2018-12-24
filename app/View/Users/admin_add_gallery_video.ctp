<script src="<?php echo HTTP_ROOT?>js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<aside class="right-side">
<section class="content-header">
		<h1>Add New Post</h1>
</section>
<section class="content">
<div class="pull-right" style="">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;"  id="template-box">
	<h4 class="box-title">Add Gallery Video </h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/add_gallery_video" method="POST" id="editTemplate" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[GalleryVideo][id]" value='' />           
        <div class="body bg-gray">
            <div class="form-group title_div">
              Title:<input type="text" class="required form-control cms_title"  name="data[GalleryVideo][title]" value='' />
            </div>
            <div id='title'></div>
            <div class="form-group">
			<label>How to upload video</label>
			<p>
				1. Use the youtube site to find the video you want</br>
				2. Click the 'Share' button below the video</br>
				3. Click the 'Embed' button next to the link they show you</br>
				4. Copy the url given and paste it into this text box.
			</p>
              Link:<input type="text" class="required form-control cms_link"  name="data[GalleryVideo][link]" value='' />
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
	CKEDITOR.config.height = 300;
	$(document).ready(function() {

		$('.sub_btn').click(function(){
			$('.error').remove();
			 var value = $('.cms_title').val();
			 var value2=$('.cms_title').val();
			 var value3=$('.cms_link').val();
			 var err="<label class='error'>This Field is required</label>";
			if(value=='' || value2=='' || value3==''){
				if(value3==''){
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
