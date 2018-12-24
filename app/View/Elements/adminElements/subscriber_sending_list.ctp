<style>
#example tr th a{color:#fff;}
a.tooltips span{
width:80px;	
}
a:hover.tooltips span {
  margin-left: -40px;
}

</style>
<div id="search_result">
<div class="table-responsive margin-top-20">

<table class="table table-bordered table-striped">
    <thead>
        <tr class="info"> 
			<th class="sorting_asc" style="text-align:center;"><input type="checkbox" name="email" value="blank mail" class="ckeckbox_parent" /><input readonly type="hidden" value="blank mail" name="email"></th>
      <th class="sorting_asc" style="text-align:center;">No.</th>
			<!--<th class="sorting_asc" style="text-align:left; ">Name</th>-->
      <th class="sorting_asc" style="text-align:left; ">Email ID</th>
			<th class="sorting_asc" style="text-align:left;">Subscribed at</th>
		</tr>
    </thead>
    
    <tbody>
    <?php 
    if(empty($subscriber_info)) { ?>
    <tr>
      <td colspan=5 style="text-align:center; ">No Subscriber yet!</td>
		</tr>    
    <?php }else{$i=1;
    foreach($subscriber_info as $subscriber_info){?>
    <tr>
      <td style="text-align:center;width:50px;"><input name="email<?php echo $i; ?>" type="checkbox" class="ckeckbox_child" value='<?php echo $subscriber_info['NewsletterSubscriber']['email']; ?>'></td>
			<td style="text-align:center; width:50px;"><?php echo $i; ?></td>
			<!--<td style="text-align:left;width:200px;"><?php echo $subscriber_info['NewsletterSubscriber']['name']; ?></td>	-->
			<td style="text-align:left; width:300px;"><?php echo $subscriber_info['NewsletterSubscriber']['email']; ?></td>
			<td style="text-align:left; "><?php echo $subscriber_info['NewsletterSubscriber']['subscribed_at']; ?></td>
		</tr>
	<?php $i++; } 
}?>	 					
	</tbody>
  
</table>
</div>

</div>