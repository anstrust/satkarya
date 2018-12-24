<style>
.btn-blue{
	background-color:#00a3ef;
	border-color:#00a3ef;
	color:#fff;
	}
	.intro-text {
    color: #57a4b6;
    font-size: 1.1em;
    font-weight: 400;
    letter-spacing: 1px;
    text-transform: uppercase;
}
hr {
    border-color: #57a4b6;
    max-width: 400px;
}

</style>

<aside class="right-side">
   
    <section class="content-header">
        <h1>
          View Gallery Image
		</h1>
    </section>
	
      <section class="content">
	    <div class="pull-right" style="margin-bottom:10px;">
			<a href="<?php echo HTTP_ROOT.'admin/users/testimonial/'?>"  class="btn btn-success btn-sm backbtn" >Back</a>
		</div>
		<div class="form-box" style="width:95%; margin:30px; "  id="login-box">
				<?php if(!empty($viewNewsfeed)) { ?>	
					<div class="box-body box table-responsive margin-top-20" >
						<table class="table table-bordered table-striped" id="example1">
						    <tbody>
							<tr>
      						   <th style="background-color:transparent;width:20%;">Name</th>
      						   <td style="width:60%;"><?php  echo $viewNewsfeed['Testimonial']['title']; ?></td>
							</tr>
							<tr>
      						   <th style="background-color:transparent;width:20%;">Occupation</th>
      						   <td style="width:60%;"><?php  echo $viewNewsfeed['Testimonial']['occupation']; ?></td>
							</tr>
							<tr>
      						   <th style="background-color:transparent;width:20%;">Description</th>
      						   <td style="width:60%;"><?php  echo $viewNewsfeed['Testimonial']['description']; ?></td>
							</tr>
						   
						       <!--tr>
      						   <th style="background-color:transparent;">Description</th>
      						   <td style="width:60%;"><div class="event-des"><?php  echo $viewNewsfeed['Award']['description']; ?></div></td>
      						 </tr-->
								<tr>
      						   <th style="background-color:transparent;">Image</th>
      						   <td style="width:60%;">
      						   <img height="125px" width="200px"  src="<?php echo HTTP_ROOT.'img/adminImage/'.@$viewNewsfeed['Testimonial']['image'] ?>">
      						   </td>
      						 </tr>		
							</tbody>
						</table>
						</div>
					<?php }?>
				</div>
		
			
	</section>