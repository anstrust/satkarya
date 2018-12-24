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
	<h4 class="box-title">Add Ritu Post</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/add_ritu" method="POST" id="editTemplate" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[Ritu][id]" value='' />           
        <div class="body bg-gray">
            <div class="form-group title_div">
              Title:<input required="required" type="text" class="required form-control cms_title"  name="data[Ritu][title]" value='' />
            </div>
            <div class="form-group">
			Description:
			   <input type="text" required="required" class="required form-control description"  name="data[Ritu][description]" value='' />
			   
			</div>
           <div class="form-group text-right"> 
                <button type="submit" class="btn btn-success sub_btn">Submit </button>
            </div>
            
        </div>         
    </form>
</div>		
</section>
</aside>

