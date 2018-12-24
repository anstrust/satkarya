

<aside class="right-side">
<section class="content-header">
		<h1>Add New Trending Company</h1>
</section>
<section class="content">

  <div class="pull-right">
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
  </div>
  
<div class="form-box" style="width:95%;"  id="Trending_comapny">
	<h4 class="box-title">Add New Trending Company</h4>   
    <?php echo $this->Session->flash(); ?>
    <form   action="<?php echo HTTP_ROOT?>admin/Users/add_trending_company" method="POST" id="addtrending" enctype="multipart/form-data" >
    <input type="hidden" class="required" name="data[TrendingCompany][id]" value='' />           
        <div class="body bg-gray">
        		<div id='title_id'></div>
            <div class="form_company">
              Company Name:<input type="text" class="required form-control from_name"  name="data[TrendingCompany][name]" value='' palceholder="Company Name"/>
				<p id="err_name" class="error"></p>            
            </div>
            <div id='company_id'></div>
				<div class="form-group email_div">
               Email:<input type="text" class="required form-control from_email" name="data[TrendingCompany][email]" value='' />
				<p id="err_email" class="error"></p>             
            </div>
            <div id='email_id'></div>
            
            
            
				<div class="form_status">
					Category Status:
					<br>
					<br>
					<label>
						<input class="" type="radio" value="1" name="data[TrendingCompany][status]" checked="checked">Active
					</label>
					<label>
						<input class="" type="radio" value="0" name="data[TrendingCompany][status]">Inactive
					</label>
				</div>
                        
            <div class="form-group text-right"> 
                <button type="submit" class="btn btn-success sub_btn" >Submit </button>
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
				return ajax_form('addtrending','Users/validate_admin_add_trending_company_ajax','loading');
			});
	});
</script>
