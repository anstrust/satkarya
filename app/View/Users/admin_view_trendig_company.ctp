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
		<h1>Entrepreneur Description</h1>
</section>  
<section class="content">
<div class="pull-right" style="">
   <!-- <a class="btn-success btn-sm backbtn" data-toggle="modal" href="#myModal"><i class="fa fa-lg fa-mail-reply"></i> &nbsp;Reply</a>-->
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;" id="template-box">
	<h4 class="box-title">Entrepreneur Detail</h4>   
    <?php echo $this->Session->flash(); ?>
      
     <!-- /tabs -->
        <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#one" data-toggle="tab">Entrepreneur Profile</a></li>
            <li><a href="#two" data-toggle="tab">Business-Network List</a></li>

          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="one"><br>
								<div class="body bg-gray">
									<table class="table table-bordered table-striped">
										<thead>
											<tr class="info"> 
												<th colspan=2 class="sorting_asc" style="text-align:left;">Entrepreneur Detail Description</th>
											</tr>
									 </thead>
										<tbody>
									
											<tr>
												<td style="text-align:center; width: 20px;"><img width='150' height='70' src="<?php echo HTTP_ROOT;?>img/frontEnd/company_logo/<?php echo empty($profileInfo['EntrepreneurDetail']['logo']) ? 'dummy.png' : $profileInfo['EntrepreneurDetail']['logo'];?>"></td>
												<td valign='middle' style="text-align:left; width: 200px;"><h3><?php echo @$profileInfo['User']['name'];?></h3></td>			
											</tr>
											<tr>
												<td style="text-align:left; width: 20px;">Company Email :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['User']['email'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Sector :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['Sector']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['Sector']['sector_name'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Country :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['country']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['Country']['country_name'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">City :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['city']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['city'];?></td>			
											</tr> 								
											<tr>
												<td style="text-align:left; width: 20px;">Founder Name :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['founder_name']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['founder_name'];?> &nbsp;&nbsp;&nbsp;&nbsp;<img style="border-radius:50px;" width='50' height='50' src="<?php echo HTTP_ROOT;?>img/frontEnd/company_founder_image/<?php echo empty($profileInfo['EntrepreneurDetail']['founder_image']) ? 'dummy.png' : $profileInfo['EntrepreneurDetail']['founder_image'];?>"></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Further Detail :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['further_detail']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['further_detail'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Company Video URL :</td>
												<td style="text-align:left; width: 200px;"><a href="<?php echo empty($profileInfo['EntrepreneurDetail']['comapny_video']) ? 'javascript:void(0)' : $profileInfo['EntrepreneurDetail']['comapny_video'];?>" target="_blank"><?php echo empty($profileInfo['EntrepreneurDetail']['comapny_video']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['comapny_video'];?></a></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Year of Foundation :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['year_founded']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['year_founded'];?></td>			
											</tr> 	

											<tr>
												<td style="text-align:left; width: 20px;">Stage of Development :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['stage_of_development']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['stage_of_development'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Website :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['company_url']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['company_url'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Founder Education:</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['founder_education']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['founder_education'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Industrial Skill :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['industrial_skill']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['industrial_skill'];?></td>			
											</tr> 	
											
											
											
											<tr>
												<td style="text-align:left; width: 20px;">Board of director :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['board_of_director']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['board_of_director'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Individual Team Member :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['individual_team_member']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['individual_team_member'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Employment Duration :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['employment_duration']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['employment_duration'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Employee Base :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['employee_base']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['employee_base'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Service Name :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['service_name']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['service_name'];?></td>			
											</tr> 	
											<tr>
												<td colspan=2 style="text-align:justify; width: 20px;"><strong>Service Description :</strong><br><br>
												<span><?php echo empty($profileInfo['EntrepreneurDetail']['service_description']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['service_description'];?></span>
												</td>
											</tr> 											
											<tr>
												<td style="text-align:left; width: 20px;">Product Name:</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['product_name']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['product_name'];?></td>			
											</tr> 		
											<tr>
												<td colspan=2 style="text-align:justify; width: 20px;"><strong>Product Description :</strong><br><br>
												<span><?php echo empty($profileInfo['EntrepreneurDetail']['product_description']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['product_description'];?></span>
												</td>
											</tr> 


											<tr>
												<td style="text-align:left; width: 20px;">Client Portfolio :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['portfolio']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['portfolio'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Market Traction :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['market_traction']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['market_traction'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Market Operation :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['market_operation']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['market_operation'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Company Title :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['compan_sector']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['compan_sector'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Customer Base :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['customer_base']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['customer_base'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Annual Turnover :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['turnover']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['turnover'];?></td>			
											</tr> 	
											<tr>
												<td style="text-align:left; width: 20px;">Market Share :</td>
												<td style="text-align:left; width: 200px;"><?php echo empty($profileInfo['EntrepreneurDetail']['market_share']) ? '-- Not mentioned yet --' : $profileInfo['EntrepreneurDetail']['market_share'];?></td>			
											</tr> 												
											<tr>
												<td style="text-align:left; width: 20px;">Created on :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['User']['date_created'];?></td>			
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
												<th class="sorting_asc" style="text-align:left;">Image</th>
												<th class="sorting_asc" style="text-align:left;">Company Name</th>												
												<th class="sorting_asc" style="text-align:left;">Founder Name</th>
												<th class="sorting_asc" style="text-align:left;">Company Foundation</th>
												<th class="sorting_asc" style="text-align:left;">Website</th>
												<th class="sorting_asc" style="text-align:left;">Friend on</th>
											</tr>
									 </thead>
										<tbody>
										
										<?php 
										if(empty($bnListInfo)){?>
											<tr>
												<td colspan=6 style="text-align:center; ">This investor has no any Business-Network</td>
											</tr>											
										<?php }else{
										foreach($bnListInfo as $bnListInfo){
											if($bnListInfo['BnEntrepreneur']['sender_id']==$profileInfo['User']['id']) {
											?>
											<tr>
												<!--<td style="text-align:center; "><img class="frnd-pic" src="<?php echo HTTP_ROOT.'img/frontEnd/company_founder_image/';echo empty($bnListInfo['Receiver']['EntrepreneurDetail']['founder_image']) ? 'noimg.png' : $bnListInfo['Receiver']['EntrepreneurDetail']['founder_image'];?>"></td>-->
												<td  style="text-align:left; width:150px; "><?php echo $bnListInfo['Receiver']['name'];?></td>		
												<td style="text-align:left; "><?php echo empty($bnListInfo['Receiver']['EntrepreneurDetail']['founder_name']) ? '--' : $bnListInfo['Receiver']['EntrepreneurDetail']['founder_name'];?></td>
																								
										<td  style="text-align:left; width:150px; "><?php echo $bnListInfo['Receiver']['EntrepreneurDetail']['year_founded'];?></td>												
												<td  style="text-align:left; width:150px; "><a href="http://<?php echo $bnListInfo['Receiver']['EntrepreneurDetail']['company_url'];?>" target="_blank"><?php echo $bnListInfo['Receiver']['EntrepreneurDetail']['company_url'];?></a></td>														
												<td  style="text-align:left; width:150px; "><?php echo date('d-F-Y',strtotime($bnListInfo['BnEntrepreneur']['created_on']));?></td>														
											</tr>
										<?php }elseif($bnListInfo['BnEntrepreneur']['receiver_id']==$profileInfo['User']['id']){ ?>
											<tr>
												<td style="text-align:center; "><img class="frnd-pic" src="<?php echo HTTP_ROOT.'img/frontEnd/company_founder_image/';echo empty($bnListInfo['Sender']['EntrepreneurDetail']['founder_image']) ? 'noimg.png' : $bnListInfo['Sender']['EntrepreneurDetail']['founder_image'];?>"></td>
												<td  style="text-align:left; width:150px; "><?php echo $bnListInfo['Sender']['name'];?></td>		
												<td style="text-align:left; "><?php echo empty($bnListInfo['Sender']['EntrepreneurDetail']['founder_name']) ? '--' : $bnListInfo['Sender']['EntrepreneurDetail']['founder_name'];?></td>												
												<td  style="text-align:left; width:150px; "><?php echo $bnListInfo['Sender']['EntrepreneurDetail']['year_founded'];?></td>														
												<td  style="text-align:left; width:150px; "><a href="http://<?php echo $bnListInfo['Sender']['EntrepreneurDetail']['company_url'];?>" target="_blank"><?php echo $bnListInfo['Sender']['EntrepreneurDetail']['company_url'];?></a>
												</td>														
												<td  style="text-align:left; width:150px; "><?php echo date('d-F-Y',strtotime($bnListInfo['BnEntrepreneur']['created_on']));?></td>														
											</tr>											
									<?php		}
											}
										}?>	                
										</tbody>
									</table>
								</div>		 	    
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
