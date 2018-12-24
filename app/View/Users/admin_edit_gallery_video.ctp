<script src="<?php echo HTTP_ROOT?>js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<aside class="right-side">
<section class="content-header">
		<h1>Edit Gallery Video</h1>
</section>
<section class="content"> 
<div class="pull-right" style="">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px; "  id="template-box">
	<h4 class="box-title">Edit Gallery Video</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/edit_gallery_video" method="POST" id="editTemplate" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[GalleryVideo][id]" value='<?php if(!empty($info['GalleryVideo']['id'])){ echo $info['GalleryVideo']['id']; } ?>' />           
        <div class="body bg-gray">
            <div class="form-group title_div">
              Title:<input type="text" class="required form-control cms_title"  name="data[GalleryVideo][title]" value='<?php if(!empty($info['GalleryVideo']['title'])){ echo $info['GalleryVideo']['title']; } ?>' />
            </div>
            <div id='title'></div>
            <div class="form-group">
              Link:<input type="text" class="required form-control cms_link"  name="data[GalleryVideo][link]" value='<?php if(!empty($info['GalleryVideo']['link'])){ echo $info['GalleryVideo']['link']; } ?>' />
            
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
			 var value = CKEDITOR.instances['description'].getData();
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
