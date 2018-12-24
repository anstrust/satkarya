<script src="<?php echo HTTP_ROOT?>js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<aside class="right-side">
<section class="content-header">
		<h1>Edit School</h1>
</section>
<section class="content">

  <div class="pull-right">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
  </div>
  
<div class="form-box" style="width:95%;"  id="template-box">
	<h4 class="box-title">Edit School</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/edit_school" method="POST" id="editTemplate" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[School][id]" value="<?php echo base64_encode(convert_uuencode($categoryInfo['School']['id'])); ?>" />           
        <div class="body bg-gray">
            <div class="form-group title_div">
              School Name:<input type="text" class="required form-control title" name="data[School][school_name]" value='<?php echo $categoryInfo['School']['school_name'];?>' />
            </div>
            <div id='title_id'></div>
             <div class="form-group title_div">
              School Status:<br /><br />
<?php if($categoryInfo['School']['status']==1) {?>
<label><input type="radio" class="" checked="checked" name="data[School][status]" value='1' />Active</label> 
&nbsp;&nbsp;&nbsp;&nbsp;
<label><input type="radio" class="" name="data[School][status]" value='0' /> Inactive</label> 
<?php }else {?>
<label><input type="radio" class="" name="data[School][status]" value='1' />Active</label> 
&nbsp;&nbsp;&nbsp;&nbsp;
<label><input type="radio" class="" checked="checked" name="data[School][status]" value='0' /> Inactive</label> 
<?php }?> 			
					             
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

	$(document).ready(function() {

		$('.sub_btn').click(function(){
			$('.error').remove();
       var title = $('.title').val().trim();
			 var err="<label class='error'>This Field is required</label>";
			if(title==''){

				$('#title_id').html(err);
            $('html,body').animate({scrollTop: $(".title_div").offset().top},'slow');
            return false;
	
			}

		});
	});	
</script>