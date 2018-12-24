<main style="margin-top:70px;">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-3" style="padding:10px;">
				<?php echo $this->element('frontElements/leftside_bar');?></div>
			<div class="col-md-7 col-md-offset-1">
				<div class="row">
					<div class="col-md-12">
						<h2><b>Profile Information</b></h2>
						<div class="edit_profile">
							<div class="basic_info">
								<!-- <h3>Personal Information</h3> -->
									<div class="form-group">
										<label>First Name : </label>  <?php echo $user_data['User']['firstname'];?>
										
									</div>
								
									<div class="form-group">
										<label>Last Name : </label>	<?php echo $user_data['User']['lastname'];?>
									</div>
									<div class="form-group">
										<label>Email Id : </label> <?php echo $user_data['User']['email'];?>
									</div>
									<div class="form-group">
										<label>Mobile : </label> <?php echo $user_data['User']['mobile'];?>
									</div>
									
									<h6>Current Address</h6>
										<div class="form-group">
											<label>Country : </label> <?php echo $user_data['Country']['country_name'];?>
										</div>
										<div class="form-group">
											<label>State : </label> <?php echo $user_data['UserDetail']['c_state']?>
										</div>
										<div class="form-group">
											<label>City : </label> <?php echo $user_data['UserDetail']['c_city']?>
										</div>
										<div class="form-group">
											<label>Zip Code : </label> <?php echo $user_data['UserDetail']['c_zipcode']?>
										</div>
										<div class="form-group">
											<label>Address : </label> <?php echo $user_data['UserDetail']['c_address']?>
										</div>
									<h6>Permanent Address</h6>
										<div class="form-group">
											<label>State : </label> <?php echo $user_data['UserDetail']['state']?>
										</div>
										<div class="form-group">
											<label>City : </label> <?php echo $user_data['UserDetail']['city']?>
										</div>
										<div class="form-group">
											<label>Zip Code : </label> <?php echo $user_data['UserDetail']['zipcode']?>
										</div>
										<div class="form-group">
											<label>Address : </label> <?php echo $user_data['UserDetail']['address']?>
										</div>
									<h6>Gothram</h6>
										<div class="form-group">
											<label>Father Gothram : </label> <?php echo $user_data['User']['father_gothram']?>
										</div>
										<div class="form-group">
											<label>Mother Gothram : </label> <?php echo $user_data['User']['mother_gothram']?>
										</div>
									<h6> Father Information</h6>
										<div class="form-group">
											<label>Father Name : </label> <?php echo $user_data['User']['father_name']?>
										</div>
										<div class="form-group">
											<label>Father's Father Name : </label> <?php echo $user_data['User']['dad_father_name']?>
										</div>
										<div class="form-group">
											<label>Father's Father Alive : </label> <?php 
											if($user_data['User']['dad_father_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Father's Grand Father Name : </label> <?php echo $user_data['User']['dad_grand_father_name']?>
										</div>
										<div class="form-group">
											<label>Father's Grand Father Alive : </label> <?php 
											if($user_data['User']['dad_grand_father_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Father's Grand Father Name : </label> <?php echo $user_data['User']['dad_grand_father_name']?>
										</div>
										<div class="form-group">
											<label>Father's Grand Father Alive : </label> <?php 
											if($user_data['User']['dad_grand_father_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Father's Great Grand Father Name : </label> <?php echo $user_data['User']['dad_great_grand_father_name']?>
										</div>
										<div class="form-group">
											<label>Father's Great Grand Father Alive : </label> <?php 
											if($user_data['User']['dad_great_grand_father_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Father's Mother Name : </label> <?php echo $user_data['User']['dad_mother_name']?>
										</div>
										<div class="form-group">
											<label>Father's Mother Alive : </label> <?php 
											if($user_data['User']['dad_mother_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Father's Grand Mother Name : </label> <?php echo $user_data['User']['dad_grand_mother_name']?>
										</div>
										<div class="form-group">
											<label>Father's Grand Mother Alive : </label> <?php 
											if($user_data['User']['dad_grand_mother_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Father's Great Grand Mother Name : </label> <?php echo $user_data['User']['dad_great_grand_mother_name']?>
										</div>
										<div class="form-group">
											<label>Father's Great Grand Mother Alive : </label> <?php 
											if($user_data['User']['dad_great_grand_mother_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<h6> Mother Information</h6>
										<div class="form-group">
											<label>Mother Name : </label> <?php echo $user_data['User']['mother_name']?>
										</div>
										<div class="form-group">
											<label>Mother Alive : </label> <?php 
											if($user_data['User']['mother_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Mother's Father Name : </label> <?php echo $user_data['User']['mom_father_name']?>
										</div>
										<div class="form-group">
											<label>Mother's Father Alive : </label> <?php 
											if($user_data['User']['mom_father_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Mother's Grand Father Name : </label> <?php echo $user_data['User']['mom_grand_father_name']?>
										</div>
										<div class="form-group">
											<label>Mother's Grand Father Alive : </label> <?php 
											if($user_data['User']['mom_grand_father_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Mother's Great Grand Father Name : </label> <?php echo $user_data['User']['mom_great_grand_father_name']?>
										</div>
										<div class="form-group">
											<label>Mother's Great Grand Father Alive : </label> <?php 
											if($user_data['User']['mom_great_grand_father_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Mother's Mother Name : </label> <?php echo $user_data['User']['mom_mother_name']?>
										</div>
										<div class="form-group">
											<label>Mother's Mother Alive : </label> <?php 
											if($user_data['User']['mom_mother_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Mother's Grand Mother Name : </label> <?php echo $user_data['User']['mom_grand_mother_name']?>
										</div>
										<div class="form-group">
											<label>Mother's Grand Mother Alive : </label> <?php 
											if($user_data['User']['mom_grand_mother_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										<div class="form-group">
											<label>Mother's Great Grand Mother Name : </label> <?php echo $user_data['User']['mom_great_grand_mother_name']?>
										</div>
										<div class="form-group">
											<label>Mother's Great Grand Mother Alive : </label> <?php 
											if($user_data['User']['mom_great_grand_mother_alive']==1)
											{
											echo "Yes";
											}
											else
											{
												echo "No";
											}?>
										</div>
										
								
							</div>
						<div class="clearfix" style="margin-bottom:25px;"></div>
					</div>
				</div>
			</div>
			<div class="clearfix" style="margin-bottom:25px;"></div>
		</div>
	</div>
</div>
</div>
</main>