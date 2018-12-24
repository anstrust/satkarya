<aside class="right-side">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome_container">
   <hr>
       <h2 class="intro-text text-center"><strong>Entrepreneur Management</strong></h2>
   <hr>
</div><br /><br /><br /><br />
<section class="content">
<?php echo $this->Session->flash();?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="pull-right ">
			<a href="<?php echo HTTP_ROOT.'admin/users/dashboard'?>" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
		</div>
	</div><br /><br /><br />
	<div class="select">
	<!-- For Searching Start -->
				<b >Sector :</b>  
					<select class="required form-control title" style="width:30%;" id="sector">
							<option value="0">Select</option>
							<?php foreach($sector as $sector)
											{
							?>			
												<option value="<?php echo $sector['Sector']['id']; ?>">
													<?php echo $sector['Sector']['sector_name']; ?>
												</option>
							<?php		}
								?>				
					</select>
			<!-- For Searching End -->
			
			<!-- For Funding Start -->
				<b >Founds :</b>  
					<select class="required form-control fund" style="width:30%;" id="found">
							<option value="0">Select</option>
							<option value="1">Equity</option>
							<option value="2">Debt</option>
							<option value="3">Hybrid</option>	
										
					</select>
			<!-- For founding End -->
	</div>
	<div class="data">
		<?php 
				echo $this->element('adminElements/enterpreneur_list');
			?>
		</div>	
	</div>
</section>
</aside>
<script>
	$(document).ready(function()
		{
			var host = window.location.host;
			var proto = window.location.protocol;
			var ajax_url = proto+"//"+host+"/Inventtica/";

			$("#sector").change(function()
				{
					var sector = $(this).val();
					$.ajax({
									url:ajax_url+'admin/users/entrepreneur',
									data:{sector_id:sector},
									type:'POST',
									success:function(confirmed)
										{
											$(".data").html('');
											$(".data").html(confirmed);
										}
								})
				});
				$("#found").change(function()
				{
					var found = $(this).val();
					
					$.ajax({
									type:'POST',
									url:ajax_url+'admin/users/entrepreneur',
									data:{found_id:found},
									
									success:function(confirmed)
										{
											$(".data").html('');
											$(".data").html(confirmed);
										}
								});
				});
		});
</script>
