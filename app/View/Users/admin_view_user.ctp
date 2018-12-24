<script src="<?php echo HTTP_ROOT?>js/admin_js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<?php #pr($productInfo);die;
$approved = '<span class="label label-success">Approved</span>';
$pending = '<span class="label label-warning">Pending</span>';
$notConf = '<span class="label label-info">Not confirmed</span>';
$id = base64_encode(convert_uuencode(@$productInfo['Product']['id']));?>
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
		<h1>Post Description</h1>
</section>  
<section class="content">
<div class="pull-right" style="">
   <!-- <a class="btn-success btn-sm backbtn" data-toggle="modal" href="#myModal"><i class="fa fa-lg fa-mail-reply"></i> &nbsp;Reply</a>-->
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;" id="template-box">
	<h4 class="box-title">Post Detail</h4>   
    <?php echo $this->Session->flash(); ?>
      
     <!-- /tabs -->
        <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#one" data-toggle="tab">Post Info</a></li>
            <!--li><a href="#two" data-toggle="tab">Product Features </a></li-->
            <li><a href="#three" data-toggle="tab">Post Image</a></li>

          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="one"><br>
								<div class="body bg-gray">
									<table class="table table-bordered table-striped">
										<thead>
											<tr class="info"> 
												<th colspan=2 class="sorting_asc" style="text-align:left;">Product Detail Description</th>
											</tr>
									 </thead>
										<tbody>
											<tr>
												<td style="text-align:left; width: 20px;">Post :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$productInfo['Post']['text'];?> </td>			
											</tr> 										
											 
											<tr>
												<td style="text-align:left; width: 20px;">Approval Status :</td>
												<td style="text-align:left; width: 200px;"><?php echo @$productInfo['Post']['status']==1 ? $approved : $pending;?></td>
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
								<th colspan=2 class="sorting_asc" style="text-align:left;">Product Detail Description</th>
							</tr>
					 </thead>
						<tbody>
						<?php if(empty($productInfo['ProductDetail'])) {?>
						
						<?php } else {
							foreach($productInfo['ProductDetail'] as $replies) {?>
						
							<tr>
								<td style="text-align:left; width: 20px;"><?php echo @$replies['title'];?> :</td>
								<td style="text-align:left; width: 200px;"><?php echo @$replies['description'];?></td>			
							</tr> 
						<?php }
						}?>	

						</tbody>
					</table>
				</div>		
			
			</div>
			<div class="tab-pane" id="three"><br>
				<div class="body bg-gray">
					<table class="table table-bordered table-striped">
						<thead>
							<tr class="info"> 
								<th colspan=2 class="sorting_asc" style="text-align:left;">Product Images</th>
							</tr>
					 </thead>
						<tbody>
						<?php if(empty($productInfo['PostImage'])) {
							
						?>
						
						<?php } else { //pr($productInfo);
							foreach($productInfo['PostImage'] as $product) {
								//pr($product);die;
								?>
						
							<tr>
								<td style="text-align:left; width: 300px;">
								<div class="thumb-image detail_images"> <img src="<?php echo HTTP_ROOT.'
							img/frontEnd/Post/img/'.$product['image']; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
								</td>
							</tr> 
						<?php }
						}?>	

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
                        To :<input type="text" readonly class="required form-control"  name="to" value='<?php echo @$productInfo['Testimonial']['email'];?>' />
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
