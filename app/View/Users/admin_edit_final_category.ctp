<script src="<?php echo HTTP_ROOT?>js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<aside class="right-side">
<section class="content-header">
		<h1>Edit Category</h1>
</section>
<section class="content">

  <div class="pull-right">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
  </div>
  
<div class="form-box" style="width:95%;"  id="template-box">
	<h4 class="box-title">Edit Sub Category</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/edit_final_category" method="POST" id="editTemplate" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[FinalSubCategory][id]" value="<?php echo base64_encode(convert_uuencode($categoryInfo['FinalSubCategory']['id'])); ?>" />           
        <div class="body bg-gray">
            <div class="form-group title_div">
              Category Title:<input type="text" class="required form-control title" name="data[FinalSubCategory][final_category_name]" value='<?php echo $categoryInfo['FinalSubCategory']['final_category_name'];?>' />
            </div>
            <div id='title_id'></div>
            <div class="form-group title_div">
              Product Main Category 
                <select id="main_product_list" class="form-control sub_name " name="data[FinalSubCategory][sub_category_id]">
                <option  value="">Select</option>
                <?php 
                  foreach ($product_category as $product_category) 
                  {
                    echo '<option value="'.$product_category['SubCategory']['id'].'"'.($product_category['SubCategory']['id'] == $categoryInfo['FinalSubCategory']['sub_category_id'] ? ' selected="selected"' : '').'>'.$product_category['SubCategory']['category_name'].'</option>';
                  }
                ?>
                
                </select>
             
            </div>
            <div id='sub_name'></div>
             <div class="form-group title_div">
              Category Status:<br /><br />
<?php if($categoryInfo['FinalSubCategory']['status']==1) {?>
<label><input type="radio" class="" checked="checked" name="data[FinalSubCategory][status]" value='1' />Active</label> 
&nbsp;&nbsp;&nbsp;&nbsp;
<label><input type="radio" class="" name="data[FinalSubCategory][status]" value='0' /> Inactive</label> 
<?php }else {?>
<label><input type="radio" class="" name="data[FinalSubCategory][status]" value='1' />Active</label> 
&nbsp;&nbsp;&nbsp;&nbsp;
<label><input type="radio" class="" checked="checked" name="data[FinalSubCategory][status]" value='0' /> Inactive</label> 
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
      var value2=$('.sub_name').val().trim();
    
       var err="<label class='error'>This Field is required</label>";
       if(title=='' || value2=='' )
       {
          if(value2=='')
           {
            $('#sub_name').html(err);
          }
        if(title=='')
          {
            $('#title_id').html(err);
            $('html,body').animate({scrollTop: $(".title_div").offset().top},'slow');
          }

            return false;
	
			}

		});
	});	
</script>
