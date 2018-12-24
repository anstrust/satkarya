<style type="text/css">
.button{
  border-radius:5px;
  border:0 none;
  margin-right:30%;
}
</style>

<aside class="right-side">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 welcome_container">
   <hr>
       <h2 class="intro-text text-center"><strong>Newsletter Management</strong></h2>
   <hr>
</div><br /><br /><br /><br />
<section class="content">
<?php echo $this->Session->flash();?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
		<div class="pull-right ">
			<a href="<?php echo HTTP_ROOT.'admin/users/dashboard'?>" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
		</div>
	</div><br /><br /><br />

    <h4><strong>Newsletter Subscribed Members</strong></h4><label>Total Newsletter Subscribers : <span class="all_count"><?php echo count($subscriber_info);?></span></label><br/><br/><br/>
    <label>Filter by Name : </label><input type="text" id="filter" class="form-control" placeholder="Enter text" style="width:200px;"><br/>

<form method="post">
  <div class="subscriber_sending_list">
  <?php 
    echo $this->element('adminElements/subscriber_sending_list');
  ?>
	</div>
  <br /><br />
  <div class="pull-right ">
		<button type="submit" class="btn-success btn-sm backbtn button" ><i class='fa fa-lg fa-send'></i> &nbsp;Send Newsletter</button>
	</div>
	<br /><br /><br /><br /><br /><br />
 </form> 
  
</section>
</aside>
<script type="text/javascript">
$(document).ready(function(){

  var url='<?php echo HTTP_ROOT;?>admin/users/newsletter_send_subscribers';
  
//  Check-box select all Script  
  
  $('.ckeckbox_parent').click(function(){
    if($(this).is(':checked')){
      $('.ckeckbox_child').prop('checked', true);
    } else {
      $('.ckeckbox_child').prop('checked', false);
    }
  });
  
  
//  Uncheked Parent-checkbox when any one child ckeckbox Uncheked 
  
  $('.ckeckbox_child').click(function(){
  var ckecked = $('form').find('tbody').find(':checked').length;
  var unckecked = $('form').find('tbody').find('input').length;
  
    if(ckecked!=unckecked){
      $('.ckeckbox_parent').prop('checked', false);
    } else {
      $('.ckeckbox_parent').prop('checked', true);
    }
  });
  
  
//  AJAX search Script  
  
  $('#filter').keyup(function(e){
   
   $('.ckeckbox_parent').attr('checked', false);
   
  if(e.which <= 45 && e.which >= 9 || e.which <= 222 && e.which >= 106 || e.which <= 93 && e.which >= 91){

  }else{
    $('tbody').html('<td colspan="5" style="text-align:center; padding:20px 0; font-size:14px;"><img src="<?php echo HTTP_ROOT;?>img/loader2.gif" height=30> <em> &nbsp;Please wait...</em></td>');
    var data = $(this).val();
    
    $.ajax({
      url:url,
      type:'POST',
      data:'filter='+data,
      success:function(info){
        $('tbody').html(info);
      }
    })
  }
  
 
  })

//  Check-box validation Script 
  
  $('form').submit(function(e){
    var data = $('form').find('tbody').find('input').length;
    var count = $('form').find('tbody').find(':checked').length;
    if(data==0){
      alert('No Subscriber yet!');
      return false;
    }else{
      if(count==0){
        alert('Please select atleast one !');
        return false;
      }else{
        return true;
      }
    }
  
  })
  
  
})
</script>