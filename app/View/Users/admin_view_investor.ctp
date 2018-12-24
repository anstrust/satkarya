<script src="<?php echo HTTP_ROOT?>js/admin_js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<?php $id = base64_encode(convert_uuencode(@$profileInfo['User']['id']));?>
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
		<h1>Investor Description</h1>
</section>  
<section class="content">
<div class="pull-right" style="">
   <!-- <a class="btn-success btn-sm backbtn" data-toggle="modal" href="#myModal"><i class="fa fa-lg fa-mail-reply"></i> &nbsp;Reply</a>-->
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;" id="template-box">
	<h4 class="box-title">Investor Detail</h4>   
    <?php echo $this->Session->flash(); ?>
         

     <!-- /tabs -->
        <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#one" data-toggle="tab">Investor Profile</a></li>
            <li><a href="#two" data-toggle="tab">Business-Network List</a></li>
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
                <td style="text-align:left; width: 200px;"><?php echo @$profileInfo['User']['name'];?> &nbsp;&nbsp;&nbsp;&nbsp;<img style="border-radius:50px;" width='50' height='50' src="<?php echo HTTP_ROOT;?>img/frontEnd/investor_photo/<?php echo empty($profileInfo['InvestorDetail']['photo']) ? 'noimg.png' : $profileInfo['InvestorDetail']['photo'];?>"></td>			
              </tr> 
              <tr>
                <td style="text-align:left; width: 20px;">Investor Email :</td>
                <td style="text-align:left; width: 200px;"><?php echo @$profileInfo['User']['email'];?></td>			
              </tr>               
              <tr>
                <td style="text-align:left; width: 20px;">Investor type :</td>
                <td style="text-align:left; width: 200px;">
                <?php 
                 if($profileInfo['InvestorDetail']['type_of_investor']==1)
                 		{
								echo "Angel Investor";                 		
                 		}
                 if($profileInfo['InvestorDetail']['type_of_investor']==2)
                 		{
								echo "Venture Capital";                 		
                 		}
                 if($profileInfo['InvestorDetail']['type_of_investor']==3)
                 		{
								echo "Private Equity";                 		
                 		}
                 if($profileInfo['InvestorDetail']['type_of_investor']==4)
                 		{
								echo "Investment Company";                 		
                 		}
                 if($profileInfo['InvestorDetail']['type_of_investor']==5)
                 		{
								echo "Others";                 		
                 		}
                ?></td>			
              </tr> 
              <tr>
                <td style="text-align:left; width: 20px;">Country :</td>
                <td style="text-align:left; width: 200px;"><?php echo @$profileInfo['Country']['country_name'];?></td>			
              </tr> 
              <tr>
                <td style="text-align:left; width: 20px;">City :</td>
                <td style="text-align:left; width: 200px;"><?php echo @$profileInfo['InvestorDetail']['city'];?></td>			
              </tr> 								

              <tr>
                <td style="text-align:left; width: 20px;">Company Pitch :</td>
                <td style="text-align:left; width: 200px;"><?php echo @$profileInfo['InvestorDetail']['existing_portfolio'];?></td>			
              </tr> 	
	
              <tr>
                <td style="text-align:left; width: 20px;">Investment amount :</td>
                <td style="text-align:left; width: 200px;"><?php echo @$profileInfo['InvestorDetail']['investment_size'];?></td>			
              </tr> 		
              <tr>
                <td style="text-align:left; width: 20px;">Agreement Status :</td>
                <td style="text-align:left; width: 200px;"><?php echo @$profileInfo['InvestorDetail']['agreement_status']==1 ? 'Yes' : 'No';?></td>			
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
												<th class="sorting_asc" style="text-align:left;">Investor Name</th>
												<th class="sorting_asc" style="text-align:left;">Email</th>
												<th class="sorting_asc" style="text-align:left;">Type of Investor</th>
												<th class="sorting_asc" style="text-align:left;">Existing Portfolio</th>
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
											if($bnListInfo['BnInvestor']['sender_id']==$profileInfo['User']['id']) {
											?>
											<tr>
												<td style="text-align:center; "><img class="frnd-pic" src="<?php echo HTTP_ROOT.'img/frontEnd/investor_photo/';echo empty($bnListInfo['Receiver']['InvestorDetail']['photo']) ? 'noimg.png' : $bnListInfo['Receiver']['InvestorDetail']['photo'];?>"></td>
												<td style="text-align:left; "><?php echo $bnListInfo['Receiver']['name'];?></td>
												<td  style="text-align:left; width:150px; "><?php echo $bnListInfo['Receiver']['email'];?></td>														
										<td  style="text-align:left; width:150px; "><?php echo $bnListInfo['Receiver']['InvestorDetail']['type_of_investor'];?></td>												
												<td  style="text-align:left; width:150px; "><?php echo $bnListInfo['Receiver']['InvestorDetail']['existing_portfolio'];?></td>														
												<td  style="text-align:left; width:150px; "><?php echo date('d-F-Y',strtotime($bnListInfo['BnInvestor']['created_on']));?></td>														
											</tr>
										<?php }elseif($bnListInfo['BnInvestor']['receiver_id']==$profileInfo['User']['id']){ ?>
											<tr>
												<td style="text-align:center; "><img class="frnd-pic" src="<?php echo HTTP_ROOT.'img/frontEnd/investor_photo/';echo empty($bnListInfo['Sender']['InvestorDetail']['photo']) ? 'noimg.png' : $bnListInfo['Sender']['InvestorDetail']['photo'];?>"></td>
												<td style="text-align:left; "><?php echo $bnListInfo['Sender']['name'];?></td>
												<td  style="text-align:left; width:150px; "><?php echo $bnListInfo['Sender']['email'];?></td>														
												<td  style="text-align:left; width:150px; "><?php echo $bnListInfo['Sender']['InvestorDetail']['type_of_investor'];?></td>														
												<td  style="text-align:left; width:150px; "><?php echo $bnListInfo['Sender']['InvestorDetail']['existing_portfolio'];?></td>														
												<td  style="text-align:left; width:150px; "><?php echo date('d-F-Y',strtotime($bnListInfo['BnInvestor']['created_on']));?></td>														
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
