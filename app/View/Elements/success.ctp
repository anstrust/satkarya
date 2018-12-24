<?php if(!empty($message)): ?>
	<div class="alert alert-success successMSG text-center">
	    <i class="fa fa-check-square-o"></i> <?php echo $message; ?>
	</div>
<?php endif; ?>
<script>
$(document).ready(function(){
setTimeout(function(){$(".alert-success").fadeOut()},
10000);
	});
</script>