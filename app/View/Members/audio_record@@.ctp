<style>
.files input {
    outline: 2px dashed #92b0b3;
    outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
    padding: 120px 0px 85px 35%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
    position: absolute;
    top: 60px;
    left: 0;
    width: 50px;
    right: 0;
    height: 56px;
    content: "";
    background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
    display: block;
    margin: 0 auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute;
    bottom: 10px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    content: " or drag it here. ";
    display: block;
    margin: 0 auto;
    color: #2ea591;
    font-weight: 600;
    text-transform: capitalize;
    text-align: center;
}
</style>
<main style="margin-top:70px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-3" style="padding:10px;">
					<?php echo $this->element('frontElements/leftside_bar');?></div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12">
						<div class="row bs-wizard" style="border-bottom:0;">
							<?php if($user_data['User']['step1']==1) { ?>
							<div class="col-xs-3 bs-wizard-step complete">
							  <div class="text-center bs-wizard-stepnum">Step 1</div>
							  <div class="progress"><div class="progress-bar"></div></div>
							  <a href="#" class="bs-wizard-dot"></a>
							</div>
							<?php } else {?>
							<div class="col-xs-3 bs-wizard-step active">
							  <div class="text-center bs-wizard-stepnum">Step 1</div>
							  <div class="progress"><!--div class="progress-bar"></div--></div>
							  <a href="#" class="bs-wizard-dot"></a>
							</div>
							<?php } ?>
							<?php if($user_data['User']['step2']==1) { ?>
							
								<div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
								<div class="text-center bs-wizard-stepnum">Step 2</div>
								<div class="progress"><div class="progress-bar"></div></div>
								<a href="#" class="bs-wizard-dot"></a>
								</div>
							<?php } else {?>
							
								<div class="col-xs-3 bs-wizard-step active">
								<div class="text-center bs-wizard-stepnum">Step 2</div>
								<div class="progress"><!--div class="progress-bar"></div--></div>
								<a href="#" class="bs-wizard-dot"></a>
								</div>
							<?php } ?>
							<?php if($user_data['User']['step3']==1) { ?>
							<div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
							  <div class="text-center bs-wizard-stepnum">Step 3</div>
							  <div class="progress"><div class="progress-bar"></div></div>
							  <a href="#" class="bs-wizard-dot"></a>
							</div>
							<?php } else { ?>
							 <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
							  <div class="text-center bs-wizard-stepnum">Step 3</div>
							  <div class="progress"><!--div class="progress-bar"></div--></div>
							  <a href="#" class="bs-wizard-dot"></a>
							</div>
							<?php } ?>
							<?php if($user_data['User']['step4']==1) { ?>
							<div class="col-xs-3 bs-wizard-step active"><!-- active -->
							  <div class="text-center bs-wizard-stepnum">Step 4</div>
							  <div class="progress"><div class="progress-bar"></div></div>
							  <a href="#" class="bs-wizard-dot"></a>
							</div>
							<?php } else {?>
								<div class="col-xs-3 bs-wizard-step active"><!-- active -->
								<div class="text-center bs-wizard-stepnum">Step 4</div>
								<div class="progress"><!--div class="progress-bar"></div--></div>
								<a href="#" class="bs-wizard-dot"></a>
								</div>
							<?php } ?>
						</div>
							<h2><b>Record Voice</b></h2>
							<div class="container">
							<div class="row">
								<div class="col-md-6">
								<?php echo $this->Form->create('Audio',array('id'=>'add_post','enctype'=>'multipart/form-data','method'=>'post','url'=>array('controller'=>'Members','action'=>'audio_record')));?>
									<div class="form-group files">
									<label>Upload Your File </label>
									<?php echo $this->Form->input('audio', array('type'=>'file','required'=>'required','class'=>'input-file','label'=>false,'div'=>false));?>
									<!--input type="file" required='required' name='audio' class="form-control" multiple=""-->
									</div>
									<button class="btn btn-primary" type="submit"> Save</button>
								</form>
								</div>
							</div>
							</div>
						</div>
					</div>
					<div class="clearfix" style="margin-bottom:25px;"></div>
				</div>
			</div>
		</div>
	</div>
</main>