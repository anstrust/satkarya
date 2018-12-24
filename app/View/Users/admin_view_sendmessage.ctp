<?php //pr($profileInfo);die;
$approved = '<span class="label label-success">Approved</span>';
$pending = '<span class="label label-warning">Pending</span>';
$notConf = '<span class="label label-info">Not confirmed</span>';
//$id = base64_encode(convert_uuencode($profileInfo['InventtiMessage']['id']));
//pr($id);die;?>
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
		<h1>Message Description</h1>
</section>  
<section class="content">
<div class="pull-right" style="">
   <!-- <a class="btn-success btn-sm backbtn" data-toggle="modal" href="#myModal"><i class="fa fa-lg fa-mail-reply"></i> &nbsp;Reply</a>-->
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;" id="template-box">
	<h4 class="box-title">Send Message Detail</h4>   
    <?php echo $this->Session->flash(); ?>
      
     <!-- /tabs -->
        <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#one" data-toggle="tab"> Send Message Info</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="one"><br>
								<div class="body bg-gray">
									<table class="table table-bordered table-striped">
										<thead>
											<tr class="info"> 
												<th colspan=2 class="sorting_asc" style="text-align:left;">Message  Detail Description</th>
											</tr>
									 </thead>
										<tbody>
											<tr>
												<td style="text-align:left; width: 20px;">Name :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['InventtiMessage']['name'];?> </td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Organization :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['InventtiMessage']['organization'];?></td>
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Subject :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['InventtiMessage']['subject'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Email :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['InventtiMessage']['email'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Message :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['InventtiMessage']['message'];?></td>			
											</tr> 
											<tr>
												<td style="text-align:left; width: 20px;">Posted on :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$profileInfo['InventtiMessage']['date'];?></td>			
											</tr>								
											            
										</tbody>
									</table>
								</div>		
            	</div>
						
				</div>
        </div>
        <!-- /tabs -->			
			
				
				
</section>
</aside>
