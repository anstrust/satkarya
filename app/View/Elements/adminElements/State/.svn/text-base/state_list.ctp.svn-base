<?php  echo $this->Html->script('newadmin/tablesorter.js');?>
	
	<!--.........start..pagination........-->
	<script id="js">$(function(){
	var pagerOptions = {
		container: $(".pager"),
		ajaxUrl: null,
		ajaxProcessing: function(ajax){
			if (ajax && ajax.hasOwnProperty('data')) {
				// return [ "data", "total_rows" ];
				return [ ajax.data, ajax.total_rows ];
			}
		},
		updateArrows: true,
		page: 0,
		size: 10,
		removeRows: false,
		// css class names of pager arrows
		cssNext: '.next', // next page arrow
		cssPrev: '.prev', // previous page arrow
		cssFirst: '.first', // go to first page arrow
		cssLast: '.last', // go to last page arrow
		cssGoto: '.gotoPage', // select dropdown to allow choosing a page
		cssPageDisplay: '.pagedisplay', // location of where the "output" is displayed
		cssPageSize: '.pagesize', 
		cssDisabled: 'disabled' // Note there is no period "." in front of this class name
	};
	$("table")
		.tablesorter({
			theme: 'blue',
			widgets: ['zebra'],
			headers: { 
		            
		            9: { 
		                
		            } 
		        } 
		})
		// bind to pager events
		.bind('pagerChange pagerComplete pagerInitialized pageMoved', function(e, c){
			var msg = '" event triggered, ' + (e.type === 'pagerChange' ? 'going to' : 'now on') +
				' page ' + (c.page + 1) + '/' + c.totalPages;
			$('#display')
				.append('<li>"' + e.type + msg + '</li>')
				.find('li:first').remove();
		})

		.tablesorterPager(pagerOptions);

		$('button:contains(Add)').click(function(){
			// add two rows
			var row = '<tr><td>StudentXX</td><td>Mathematics</td><td>male</td><td>33</td><td>39</td><td>54</td><td>73</td><td><button class="remove" title="Remove this row">X</button></td></tr>' +
				'<tr><td>StudentYY</td><td>Mathematics</td><td>female</td><td>83</td><td>89</td><td>84</td><td>83</td><td><button class="remove" title="Remove this row">X</button></td></tr>',
				$row = $(row);
			$('table')
				.find('tbody').append($row)
				.trigger('addRows', [$row]);
		});

		$('table').delegate('button.remove', 'click' ,function(){
			var t = $('table');
			$(this).closest('tr').remove();
			t.trigger('update');
		});

		$('button:contains(Destroy)').click(function(){
			
			var $t = $(this);
			if (/Destroy/.test( $t.text() )){
				$('table').trigger('destroy.pager');
				$t.text('Restore Pager');
			} else {
				$('table').tablesorterPager(pagerOptions);
				$t.text('Destroy Pager');
			}
		});

		$('.toggle').click(function(){
			var mode = /Disable/.test( $(this).text() );
			$('table').trigger( (mode ? 'disable' : 'enable') + '.pager');
			$(this).text( (mode ? 'Enable' : 'Disable') + 'Pager');
		});
		$('table').bind('pagerChange', function(){
			$('.toggle').text('Disable Pager');
		});
	
$(".tablesorter-header").append('<span class="ui-icon ui-icon-carat-2-n-s"></span>');
$(".tablesorter-header-inner").each(function(){
	var content=$(this).text();
	if(content=="Action")
	{
		$(this).next().remove();
	}
});
});
</script>
	<!--.........end..pagination........-->

<!--<script type="text/javascript">
$(document).ready(function() {
	$("#sort-table")
	.tablesorter({
		widgets: ['zebra'],
		headers: { 
		            
		         } 
	})
	$(".header").append('<span class="ui-icon ui-icon-carat-2-n-s"></span>');

  });
$(document).ready(function(){
	
	$("#MemberSearch").validate({
	
	  rules:
	  {
		    "data[Member][email]":
			{
				
				email:true
			}
	  },
	  message:
	  {
		  "data[Member][email]":
		  {
			  
			  email:'Invalid email'
		  }
	  }
	
	});
});
</script>-->
<div id="page-content">
    <div style="float:left; width:100%; padding-bottom:14px;">
   
     
    </div> 
    <div id="page-content-wrapper" style="padding:0; margin:0; background:0; box-shadow:0 0 0 0 #fff;">
        <div class="hastable">
        	<table id="sort-table"> 
				<thead> 
					<tr>
					   <!--<th>S.No</th>-->
					    <th>State Abbriviation</th>
					   <th>State Name</th>
					   <th>Country Name</th>
					   <th>Action</th>
					   
					   
                    </tr> 
				</thead> 
				<tbody> 
					<?php
						if(!empty($state))
						{
							//number of the ﬁrst record being displayed. 
							foreach($state as $states)
							{ 
				    ?>
								<tr> 
									<!--<td><php echo $i; ?></td>-->
									
								  	<td><?php echo $states['State']['state_abb']; ?></td>
									<td><?php echo $states['State']['name']; ?></td>
									<td><?php echo $states['Country']['name']; ?></td>
									
                                   
                                  	<td>
									<?php $stateId = base64_encode(convert_uuencode($states['State']['id'])); ?>
									
                                        <a title="Edit" href="<?php echo HTTP_ROOT."admin/Manages/editstate/".$stateId; ?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip">
											<span class="ui-icon ui-icon-pencil"></span>
										</a>
                                        
                                   
                                       
                                  
                                        <a title="Delete" class="delRec btn_no_text btn ui-state-default ui-corner-all tooltip" href="<?php echo HTTP_ROOT."admin/Manages/deletestate/".$stateId;?>" onclick="return confirm('Are you sure you want to delete the record?');">
											<span class="ui-icon ui-icon-circle-close"></span>
										</a>
                                    </td>
                                   
								</tr> 
					<?php	
							}
						} else {
					?>
							<tr>
								<td colspan="7">No Record Found.</td>
							</tr>
					<?php		
						}
					?>					
				</tbody>
			</table>
			<div class="clear"></div>
			
			<div id="pager">					
				<?php echo $this->element('adminElements/table_head'); ?>
			</div>
			
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>

