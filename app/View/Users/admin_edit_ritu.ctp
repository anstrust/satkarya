<script src="<?php echo HTTP_ROOT?>js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<aside class="right-side">
<section class="content-header">
		<h1>Edit Ritu</h1>
</section>
<section class="content"> 
<div class="pull-right" style="">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px; "  id="template-box">
	<h4 class="box-title">Edit Ritu</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/edit_ritu" method="POST" id="editTemplate" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[Ritu][id]" value='<?php if(!empty($info['Ritu']['id'])){ echo $info['Ritu']['id']; } ?>' />           
        <div class="body bg-gray">
            <div class="form-group title_div">
              Title:<input type="text" class="required form-control" required="required" name="data[Ritu][title]" value='<?php if(!empty($info['Ritu']['title'])){ echo $info['Ritu']['title']; } ?>' />
            </div>
            <div id='title'></div>
            <div class="form-group">
               Description:
			   <input type="text" class="required form-control" required="required"  name="data[Ritu][title]" value='<?php if(!empty($info['Ritu']['description'])){ echo $info['Ritu']['description']; } ?>' />
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

