

<aside class="right-side">
<section class="content-header">
		<h1>Edit Trending</h1>
</section>
<section class="content"> 
<div class="pull-right" style="">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px; "  id="template-box">
	<h4 class="box-title">Edit Trending Company</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/edit_treading" method="POST" id="edittrending" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[TrendingCompany][id]" value='<?php if(!empty($trending_info['TrendingCompany']['id'])){ echo $trending_info['TrendingCompany']['id']; } ?>' />           
        <div class="body bg-gray">
           <div class="form_company">
              Company Name:<input type="text" class="required form-control "  name="data[TrendingCompany][name]" value='<?php echo $trending_info['TrendingCompany']['name']; ?>' />
				<p id="err_name" class="error"></p>            
            </div>
            <div id='company_id'></div>
            <div class="form-group email_div">
               Email:<input type="text" class="required form-control from_email" name="data[TrendingCompany][email]" value='<?php echo $trending_info['TrendingCompany']['email']; ?>' />
				<p id="err_email" class="error"></p>              
            </div>
            <div id='email_id'></div>
            <div class="form_status">
					Category Status:
					<br>
					<br>
					<label>
						<input class="" type="radio" name="data[TrendingCompany][status]" <?php if($trending_info['TrendingCompany']['status'] == 1) { echo 'checked=true';}?>/>Active
					</label>
					<label>
						<input class="" type="radio" name="data[TrendingCompany][status]" <?php if($trending_info['TrendingCompany']['status'] == 0) { echo 'checked=true';}?>/>Inactive
					</label>
				</div>
            
          <div class="form-group text-right"> 
                <button type="submit" class="btn btn-success sub_btn">Submit </button>
            </div>
            
        </div>         
    </form>
</div>		
</section>
</aside>
<script>
$(document).ready(function()
	{
		$('.sub_btn').click(function() 
			{
				return ajax_form('edittrending','Users/validate_admin_edit_treading_ajax','loading');
			});
	});
</script>