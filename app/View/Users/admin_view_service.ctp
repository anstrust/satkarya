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
          View Service 
		</h1>
    </section>
  
      <section class="content">
      
			<div class="pull-right" style="">
				<a href="<?php echo HTTP_ROOT.'admin/users/service/'?>"  class="btn btn-success btn-sm backbtn" >Back</a>
			</div></br></br></br>
          
			<div class="form-box" style="width:95%; margin:30px; "  id="login-box">
			<?php if(!empty($viewNewsfeed)) { ?>	
					<div class="box-body box table-responsive margin-top-20" >
						<table class="table table-bordered table-striped" id="example1">
						    <tbody>
							<tr>
      						   <th style="background-color:transparent;width:20%;">Title</th>
      						   <td style="width:60%;"><?php  echo $viewNewsfeed['Service']['title']; ?></td>
							</tr>
						   
							<tr>
      						   <th style="background-color:transparent;">Description</th>
      						   <td style="width:60%;"><div class="event-des"><?php  echo $viewNewsfeed['Service']['description']; ?></div></td>
							</tr>
								<tr>
      						   <th style="background-color:transparent;">Image</th>
      						   <td style="width:60%;">
      						   <img height="125px" width="200px"  src="<?php echo HTTP_ROOT.'img/adminImage/'.@$viewNewsfeed['Service']['image'] ?>">
      						   </td>
      						 </tr>		
							</tbody>
						</table>
						</div>
					<?php }?>
				</div>
			
			
	</section>