<script src="<?php echo HTTP_ROOT?>js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<aside class="right-side">
<section class="content-header">
		<h1>Write Message</h1>
</section>
<section class="content">
<div class="pull-right" style="">
		<!--<?php $id = base64_encode(convert_uuencode($id));?>-->
		<a href="<?php echo HTTP_ROOT.'admin/users/message/'.$id;?>"  class="btn-success btn-sm backbtn" >Previous Messages</a>
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px; "  id="template-box">
	<h4 class="box-title">Message</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/edit_message" method="POST" id="editmsg" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[Message][user_id]" value="<?php echo $datainfo['User']['id'];?>"/>           
        <div class="body bg-gray">
           
            <div class="form-group title_div">
              Title:<input type="text" class="required form-control msg_title"  name="data[Message][title]" value='' />
            </div>
            <div id='title'></div>
            <div class="form-group">
               Message Box:<textarea id='msg' name="data[Message][message]" rows="45" cols="44" class="required form-control ckeditor"></textarea>
            </div>
            <div id='msg_id'></div>
           <div class="form-group text-right"> 
                <button type="submit" class="btn btn-success sub_btn">Send </button>
            </div>
            
        </div>         
    </form>
</div>		
</section>
</aside>
<script type="text/javascript">
	CKEDITOR.config.height = 400;
	$(document).ready(function() {

		$('.sub_btn').click(function(){
			$('.error').remove();
			 var value = CKEDITOR.instances['msg'].getData();
			 var value2=$('.msg_title').val();
			 var err="<label class='error'>This Field is required</label>";
			if(value=='' || value2==''){
				if(value==''){
						$('#msg_id').html(err);
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
