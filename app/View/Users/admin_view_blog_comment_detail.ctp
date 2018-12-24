
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
		<h1>Blog Comment Description</h1>
</section>  
<section class="content">
	<div class="pull-right" style="">
	   <!-- <a class="btn-success btn-sm backbtn" data-toggle="modal" href="#myModal"><i class="fa fa-lg fa-mail-reply"></i> &nbsp;Reply</a>-->
			<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
	</div> 
	<div class="form-box" style="width:95%; margin:30px;" id="template-box">
		<div class="tab-pane active" ><br>
			<div class="tabbable">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#one" data-toggle="tab">Comment Information</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="One"><br>
						<div class="body bg-gray">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="info"> 
										<th colspan=2 class="sorting_asc" style="text-align:left;">Comment Details</th>
									</tr>
								</thead>
									<tbody>
										<tr>
											<td style="text-align:left; width: 20px;">User Name :</td>
											<td style="text-align:left; width: 200px;"><?php echo $comment_detail['User']['firstname'];?> <?php echo $comment_detail['User']['lastname'];?> </td>		
										</tr> 
										<tr>
											<td style="text-align:left; width: 20px;">Post Comment:</td>
											<td style="text-align:left; width: 200px;"><?php echo $comment_detail['BlogComment']['message'];?></td>		
										</tr> 
										<tr>
											<td style="text-align:left; width: 20px;">Posted On  :</td>
											<td style="text-align:left; width: 200px;"><?php echo $comment_detail['BlogComment']['created_at'];?></td>			
										</tr> 
										<!--
										<tr>
											<td style="text-align:left; width: 120px;">
											<?php $id = base64_encode(convert_uuencode(@$comment_detail['BlogComment']['id']));?> 
											<a title="View Post Comment" href="<?php echo HTTP_ROOT;?>admin/admin/group_post_comment/<?php echo $id;?>" class="btn-primary btn-sm">											
											<i class="fa fa-view">&nbsp;</i><span>See The Post Comment</span></a>
											 </td>
										</tr>
										-->
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

