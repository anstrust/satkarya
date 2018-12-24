
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
		<h1>Blog Description</h1>
</section>  
<section class="content">
	<div class="pull-right" style="">
	   <!-- <a class="btn-success btn-sm backbtn" data-toggle="modal" href="#myModal"><i class="fa fa-lg fa-mail-reply"></i> &nbsp;Reply</a>-->
			<a href="admin/users/blog/" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
	</div> 
	<div class="form-box" style="width:95%; margin:30px;" id="template-box">
		<div class="tab-pane active" ><br>
			<div class="tabbable">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#one" data-toggle="tab">Blog Information</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="One"><br>
						<div class="body bg-gray">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="info"> 
										<th colspan=2 class="sorting_asc" style="text-align:left;">Blog Details</th>
									</tr>
								</thead>
									<tbody>
										<tr>
											<td style="text-align:left; width: 20px;">Blog image :</td>
											<td style="text-align:left; width: 20px;"><img height="100px" width="100px" src="<?php echo HTTP_ROOT.'img/Blog/img/'.$blog_info['Blog']['image'];?>"></td>		
										</tr>
										<tr>
											<td style="text-align:left; width: 20px;">Blog Title :</td>
											<td style="text-align:left; width: 200px;"><?php echo $blog_info['Blog']['blog_title'];?></td>		
										</tr> 
										
										<tr>
											<td style="text-align:left; width: 20px;">Description :</td>
											<td style="text-align:left; width: 200px;"><?php echo $blog_info['Blog']['message'];?></td>			
										</tr> 
										<tr>
											<td style="text-align:left; width: 20px;">Posted On  :</td>
											<td style="text-align:left; width: 200px;"><?php echo $blog_info['Blog']['added_on'];?></td>			
										</tr> 
										<tr>
											<td style="text-align:left; width: 120px;">
												<?php $id = base64_encode(convert_uuencode(@$blog_info['Blog']['id']));?> 
												<a title="Edit" href="<?php echo HTTP_ROOT;?>admin/users/blog_comment/<?php echo $id;?>" class="btn-primary btn-sm">											
												<i class="fa fa-view">&nbsp;</i><span>See The Blog Comments </span></a>
											</td>
										</tr>
									</tbody>
							</table>
						</div>	
					</div>		
				</div>				
			</div>
		</div>
	</div>			
</section>
</aside>

