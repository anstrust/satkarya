<script src="<?php echo HTTP_ROOT?>js/backEnd/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<aside class="right-side">
<section class="content-header">
		<h1>Add Comment</h1>
</section>
<section class="content">
<div class="pull-right" style="">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;"  id="template-box">
	<h4 class="box-title">Add Comment</h4>   
    <?php echo $this->Session->flash(); ?>
    <br>
    <form  action="<?php echo HTTP_ROOT?>admin/admin/add_comment" method="POST" id="add_comment" enctype="multipart/form-data">
	<input type="hidden" class="required" name="data[BlogComment][blog_id]" value="<?php echo $id;?>" />
        <div class="body bg-gray">
        	
           	<div class="form-group title_div">
              User Name:<input type="text" class="required form-control cms_title"  name="data[BlogComment][username]" value='' />
            </div>
            <div id='title'></div>
			<div class="form-group title_div">
               Blog Comment:<textarea id='description' name="data[BlogComment][message]" rows="45" cols="45"  class="required form-control ckeditor"></textarea>
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
                    var err="<label class='error'>This Field is required</label>";
			if(value2==''||value=='')
				{
					if(value=='')
					{
						$('#des_id').html(err);
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

