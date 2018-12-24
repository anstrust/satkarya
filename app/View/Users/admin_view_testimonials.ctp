<script src="<?php echo HTTP_ROOT?>js/admin_js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<?php $id = base64_encode(convert_uuencode(@$user_info['Testimonial']['id']));?>
<style type="text/css">
.button{
  padding:8px 20px;
  border:1px solid #286090;
  border-radius:5px;
}
.btn-default{
  border:1px solid #ddd;
}

table{
    font-size: 15px;
    margin-top:20px;
}
table tbody tr td{
  padding: 20px;
}
table span{
  font-size:14px;
.error{
font-size:12px;
}
</style>
<aside class="right-side">
<section class="content-header">
		<h1>User Testimonial Description</h1>
</section>  
<section class="content">
<div class="pull-right" style="">
   <!-- <a class="btn-success btn-sm backbtn" data-toggle="modal" href="#myModal"><i class="fa fa-lg fa-mail-reply"></i> &nbsp;Reply</a>-->
		<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
</div> 
<div class="form-box" style="width:95%; margin:30px;" id="template-box">
	<h4 class="box-title">Testimonial Detail</h4>   
    <?php echo $this->Session->flash(); ?>
    <form  action="<?php echo HTTP_ROOT?>admin/users/edit_faqs" method="POST" id="editTemplate" enctype="multipart/form-data">
    <input type="hidden" class="required" name="data[Faq][id]" value='<?php echo @$id; ?>' />           
        <div class="body bg-gray">
          <table class="table table-bordered table-striped">
            <thead>
              <tr class="info"> 
                <th colspan=2 class="sorting_asc" style="text-align:left;">User Detail Description</th>
              </tr>
           </thead>
            <tbody>
              <tr>
                <td style="text-align:left; width: 20px;">Full name :</td>
                <td style="text-align:left; width: 200px;"><?php echo @$user_info['Testimonial']['name'];?></td>			
              </tr>
              <tr>
                <td style="text-align:left; width: 20px;">Testimonial Status :</td>
                <td style="text-align:left; width: 200px;">
							<?php 
								if($user_info['Testimonial']['status']==0){
									echo '<font color=red><strong>Inactive</strong></font>';
								 }else{
									echo '<font color=green><strong>Active</strong></font>';
								 }
							?>
		</td>			
              </tr>  
              <tr>
                <td style="text-align:left; width: 20px;">Request Date :</td>
                <td style="text-align:left; width: 200px;"><?php echo @$user_info['Testimonial']['posted_on'];?></td>			
              </tr> 
              <tr>
                <td colspan=2 style="text-align:justify; width: 20px;"><strong>Message :</strong><br><br>
                
                <span><?php echo @$user_info['Testimonial']['description'];?></span>
                
                </td>
              </tr>                
            </tbody>
          </table>
        </div>         
    </form>
</div>		
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
                        To :<input type="text" readonly class="required form-control"  name="to" value='<?php echo @$user_info['Testimonial']['email'];?>' />
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
