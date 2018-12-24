<main style="margin-top:70px;">
<section id="contact">
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
				<?php echo $this->Form->create('Contact',array('id'=>'contact_us','enctype'=>'multipart/form-data','method'=>'post','url'=>array('controller'=>'Homes','action'=>'contact')));?>
				<div class="row" >
                  <div class="col-sm-6">
                    <div class="form-group">
					<?php echo $this->Form->input('name',array('type'=>'text','class'=>'form-control','placeholder'=>'Name','label'=>false,'div'=>false));?>
					<p id="err_name" class="error"></p>
				   </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                    <?php echo $this->Form->input('email',array('type'=>'text','class'=>'form-control','placeholder'=>'Email','label'=>false,'div'=>false));?>
					<p id="err_email" class="error"></p></div>
                  </div>
                
				<div class="col-sm-6">
					<div class="form-group">
						<?php echo $this->Form->input('phone',array('type'=>'text','class'=>'form-control','placeholder'=>'Mobile Number','label'=>false,'div'=>false));?>
						<p id="err_phone" class="error"></p>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<?php echo $this->Form->input('subject',array('type'=>'text','class'=>'form-control','placeholder'=>'Subject','label'=>false,'div'=>false));?>
						<p id="err_subject" class="error"></p>
					</div>
				</div>
				</div>
                <div class="form-group">
                <?php echo $this->Form->input('message',array('type'=>'textarea','rows'=>"4",'class'=>'form-control','placeholder'=>'Enter your message','label'=>false,'div'=>false));?>
				<p id="err_message" class="error"></p>
			   </div>                        
                <div class="form-group">
					<?php echo $this->Form->button('Send',array('class'=>'btn btn-primary','type'=>'submit','onclick'=>"return ajax_form('contact_us','Homes/validate_contact_us_ajax','loading')"));?>
				</div>
				<?php echo $this->Form->end();?>   
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Address:</span> 2400 South Avenue A </li>
                  <li><i class="fa fa-phone"></i> <span> Phone:</span> +900000000  </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:someone@yoursite.com"> support@oxygen.com</a></li>
                  <li><i class="fa fa-globe"></i> <span> Website:</span> <a href="#">www.sitename.com</a></li>
                </ul>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->