<?php if(!empty($message)): ?>
	<div class="alert alert-danger errorMSG text-center">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo $message; ?>
    </div>
<?php endif; ?>
<script>
$(document).ready(function(){
	setTimeout(function(){$(".alert-danger").fadeOut()},5000);
});
</script>
</script>