<aside class="right-side">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome_container">
   <hr>
       <h2 class="intro-text text-center"><strong>Search Details</strong></h2>
   <hr>
</div><br /><br /><br /><br />
<section class="content">
<div id="flash"><?php echo $this->Session->flash();?></div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="form-group "pull-right "">	
	<?php
		echo $this->Form->create('User', array('method' => 'post','enctype'=>'multipart/form-data','url'=>array('controller'=>'Users','action'=>"search")));
   	echo $this->Form->input('search', array('label'=>false,'type' =>'text','placeholder'=>"Search",'style'=>"text-align:left;height:35px;, width: 200px;"));
  		echo $this->Form->submit('search',array('class'=>"btn btn-success sub_btn"));
		echo $this->form->end();
	?>
</div>

	<?php 
   	 echo $this->element('adminElements/search_list');
  	?>
	</div>
	
</section>
</aside>
