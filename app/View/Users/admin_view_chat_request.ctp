<script src="<?php echo HTTP_ROOT?>js/admin_js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<?php 
$friend = '<span class="label label-success">Friend</span>';
$pending = '<span class="label label-warning">Pending</span>';
$notConf = '<span class="label label-info">Not confirmed</span>';
$id = base64_encode(convert_uuencode(@$profileInfo['Testimonial']['id']));?>
<style type="text/css">
.nav-tabs li[class=active] a{
	background-color:#F9F9F9;
	}
	.nav-tabs li[class=active] a:hover{
	background-color:#F9F9F9;
	}
	.nav-tabs li[class=active]  a:focus{background-color:#F9F9F9;
	}
	.button{
  padding:8px 20px;
  border:1px solid #286090;
  border-radius:5px;
}
.btn-default{
  border:1px solid #ddd;
}

table{
    font-size: 12px;
    margin-top:20px;
}
table tbody tr td{
  padding: 20px;
}
table span{
  font-size:14px;
.error{
font-size:12px;
}.req-date{
	font-size: 12px;
	font-style: italic;
	font-weight: bold;}
</style>
<aside class="right-side">
<section class="content-header">
		<h1>User Description</h1>
</section>  
<section class="content">
<div class="pull-right" style="">
   <!-- <a class="btn-success btn-sm backbtn" data-toggle="modal" href="#myModal"><i class="fa fa-lg fa-mail-reply"></i> &nbsp;Reply</a>-->
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;" id="template-box">
	<h4 class="box-title">User Detail</h4>   
    <?php echo $this->Session->flash(); ?>
      
     <!-- /tabs -->
        <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#one" data-toggle="tab">Investor Profile</a></li>
            <li><a href="#two" data-toggle="tab">Entrepreneur Profile</a></li>

          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="one"><br>
								<div class="body bg-gray">
									<table class="table table-bordered table-striped">
										<thead>
											<tr class="info"> 
												<th colspan=2 class="sorting_asc" style="text-align:left;">Investor Detail Description</th>
											</tr>
									 </thead>
										<tbody>
											<tr>
												<td style="text-align:left; width: 20px;">Investor Name :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Investor']['name'];?> &nbsp;&nbsp;&nbsp;&nbsp;<img style="border-radius:50px;" width='50' height='50' src="<?php echo HTTP_ROOT;?>img/frontEnd/investor_photo/<?php echo empty($profileInfo['Investor']['InvestorDetail']['photo']) ? 'noimg.png' : $profileInfo['Investor']['InvestorDetail']['photo'];?>"></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Investor Email :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Investor']['email'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Type of Investor :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Investor']['InvestorDetail']['type_of_investor'];?></td>
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">City :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Investor']['InvestorDetail']['city'];?></td>			
											</tr> 								
											<tr>
												<td style="text-align:left; width: 20px;">Existing Portfolio :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Investor']['InvestorDetail']['existing_portfolio'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Investment Size :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Investor']['InvestorDetail']['investment_size'];?></td>			
											</tr> 	

											<tr>
												<td style="text-align:left; width: 20px;">Agreement ? :</td>
												<td style="text-align:left; width: 200px;"><?php echo $profileInfo['Investor']['InvestorDetail']['investment_size']==1 ? 'Yes' : 'No';?></td>			
											</tr> 	             
										</tbody>
									</table>
								</div>		

           
            </div>
            <div class="tab-pane" id="two"><br>
								<div class="body bg-gray">
									<table class="table table-bordered table-striped">
										<thead>
											<tr class="info"> 
												<th colspan=2 class="sorting_asc" style="text-align:left;">Entrepreneur Detail Description</th>
											</tr>
									 </thead>
										<tbody>
											<tr>
												<td style="text-align:center; width: 20px;"><img width='150' height='70' src="<?php echo HTTP_ROOT;?>img/frontEnd/company_logo/<?php echo empty($profileInfo['Entrepreneur']['EntrepreneurDetail']['logo']) ? 'noimg.png' : $profileInfo['Entrepreneur']['EntrepreneurDetail']['logo'];?>"></td>
												<td valign='middle' style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['name'];?></td>			
											</tr>
											<tr>
												<td style="text-align:left; width: 20px;">Company Email :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['email'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Company Contact Number :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['company_contacts'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Company Philosophy :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['comapny_philosophy'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">City :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['city'];?></td>			
											</tr> 								
											<tr>
												<td style="text-align:left; width: 20px;">Founder Name :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['founder_name'];?> &nbsp;&nbsp;&nbsp;&nbsp;<img style="border-radius:50px;" width='50' height='50' src="<?php echo HTTP_ROOT;?>img/frontEnd/company_founder_image/<?php echo empty($profileInfo['Entrepreneur']['EntrepreneurDetail']['logo']) ? 'noimg.png' : $profileInfo['Entrepreneur']['EntrepreneurDetail']['founder_image'];?>"></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Company Pitch :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['comapny_pitch'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Company Video URL :</td>
												<td style="text-align:left; width: 200px;"><a href="<?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['comapny_video'];?>" target="_blank"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['comapny_video'];?></a></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Company Requirement :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['comapny_requirement'];?></td>			
											</tr> 	

											<tr>
												<td style="text-align:left; width: 20px;">Client Board on :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['client_board'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Website :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['company_url'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Founder Education:</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['founder_education'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Founder Background :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['founder_background'];?></td>			
											</tr> 								
											<tr>
												<td style="text-align:left; width: 20px;">Foundation on :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['year_founded'];?></td>			
											</tr> 
											<tr>
												<td colspan=2 style="text-align:justify; width: 20px;"><strong>Description :</strong><br><br>
												<span><?php echo @$profileInfo['Entrepreneur']['EntrepreneurDetail']['description'];?></span>
												</td>
											</tr>                
										</tbody>
									</table>
								</div>		
			
						</div>
        </div>
        <!-- /tabs -->			
			
				
				
</section>





<!-- bootstrap modal for forgot password -->    
<form id="forgotPassword" action="<?php echo HTTP_ROOT.'admin/users/view_contacts'?>" method="post">       
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Send Notification</h4>
                </div>
                    <div class="modal-body">
                      <div class="form-group title_div">
                        To :<input type="text" readonly class="required form-control"  name="to" value='<?php echo @$profileInfo['Testimonial']['email'];?>' />
                      </div>
                      <div class="form-group title_div">
                        Subject :<input type="text" class="required form-control cms_title"  name="subject" value='<?php echo $n_info['EmailTemplate']['subject'];?>' />
                        <div id='title'></div>
                      </div>
                      
                      <div class="form-group">
                         Message :<textarea id='description' name="message" rows="45" cols="44" class="required form-control ckeditor"><?php echo $emailContent;?></textarea>
                         <div id='des_id'></div>
                      </div>
                      
                    </div>
                <div class="modal-footer">
                    <button type="button" id="close_modal" class="btn-default button" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn-primary button submit_btn"><i class="fa fa-lg fa-send"></i> &nbsp;Send</button>
                </div>
            </div>
        </div>
    </div>
</form>
</aside>
<script type="text/javascript">

	CKEDITOR.config.height = 150;
	$(document).ready(function() {

		$('.submit_btn').click(function(){
			$('.error').remove();
			 var value = CKEDITOR.instances['description'].getData();
			 var value2=$('.cms_title').val();
			 var err="<i class='error'><font size=2>This field is required</font></i>";
			if(value=='' || value2==''){
				if(value==''){
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
