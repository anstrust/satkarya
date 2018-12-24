<?php if(empty($title)){$title='Admin';} ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="<?php echo HTTP_ROOT.'img/favicon.ico'?>" type="image/x-icon"/>
        <title>
          <?php echo 'Tharpanam | '. $title; ?>
        </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    </head>    
    <?php
		/************** Stylesheets *************/
		echo $this->Html->css(
			array(
				'admin/bootstrap/css/bootstrap.css',
				'font-awesome.min.css',
				'admin/AdminLTE.css',
				'ionicons.min',
				'admin/style.css',
				'admin/business-casual.css',
				'admin/datepicker.css',
				'admin/developer.css',
				'ionicons.min'
				)
		);
		
				echo $this->Html->script(array(
							'admin/common.js',
							'admin/jquery-1.11.2.js'
						)); 
					
		
		
	?>

	<?php 
				//echo $this->Html->script('common.js'); 
				//echo $this->Html->script('admin/jquery-1.11.2.js');
				
	?>
	<body class="skin-blue">        
	<?php
	if($this->params['action'] != 'admin_login'){
		echo $this->element('adminElements/admin_header'); ?>
		<div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 315px;">	
			<?php	echo $this->element('adminElements/admin_sidebar'); 
			}?>
			<?php echo $this->Session->flash(); ?>
  		<div id="loader_div" class="ld" style="display:none" >
		<table>
			<tr>
				<td>
				 <div class="loading_image">
						<div class="valid">
							<img alt="" src="<?php echo HTTP_ROOT . 'img/loader2.gif' ?>">
						</div>
				 </div>
				</td>
			</tr>
		</table>
	</div>
			<?php echo $this->fetch('content'); ?>
		</div>	
	</body>	        
	<?php
		/************** Javascript Files *************/
		echo $this->Html->script(
			array(
				'admin/jquery-ui.min.js',
				'admin/AdminLTE/jquery.validate.js',
				'admin/AdminLTE/customvalname.js',
				'admin/bootstrap/js/bootstrap.js',
				'admin/bootstrap-datepicker.js',
				'admin/tinymce/tinymce.dev.js',
				'admin/tinymce/plugins/table/plugin.dev.js',
				'admin/tinymce/plugins/paste/plugin.dev.js',
				'admin/tinymce/plugins/spellchecker/plugin.dev.js',
				'admin/AdminLTE/app.js'
				) 
			);
	?>	
	</body>
</html>		    
<script type="text/javascript">
$(document).ready(function(){
  $('.alert-success').delay(20000).fadeOut(20000);
})
</script>