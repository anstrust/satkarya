<!DOCTYPE html>
<html lang="en-US">
  <head>
    <script type="text/javascript" src="js/.js"></script>
    <script type="text/javascript" src="js/"></script>      
  </head>
  
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Tharpanam</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<!-- Custom CSS -->
		<?php
				# --->  CSS Links
				echo $this->Html->css('bootstrap.css');
				echo $this->Html->css('components.css');
				echo $this->Html->css('icons.css');
				echo $this->Html->css('responsee.css');
				echo $this->Html->css('owl.carousel.css');
				echo $this->Html->css('owl.theme.css');
				echo $this->Html->css('style.css');
				echo $this->Html->css('template-style.css');
				
			?>
		<link href='https://fonts.googleapis.com/css?family=Playfair+Display&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    	
		<?php
			# ---> Js Links
			echo $this->Html->script('common.js');
			echo $this->Html->script('jquery-1.8.3.min.js');
			echo $this->Html->script('bootstrap.min.js');
			echo $this->Html->script('jquery-ui.min.js');
			echo $this->Html->script('jquery.validate.js');
			echo $this->Html->script('responsee.js');
			echo $this->Html->script('owl.carousel.js');
			echo $this->Html->script('template-scripts.js');
			
			
			
			
		?>	
	
	</head>
	<body>
				<?php 	
							echo $this->element('frontElements/header_home');
							echo $this->Session->flash(); 
							echo $this->fetch('content');
							echo $this->element('frontElements/footer_home');
				?>
	</body>
</html>



