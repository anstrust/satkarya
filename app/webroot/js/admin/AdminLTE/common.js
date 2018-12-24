$(document).ready(function(){

var host = window.location.host;
var proto = window.location.protocol;
var ajax_url = proto+"//"+host+"/tarpanam/";



	
//  Updation Script
	$('.updateStatus').on('click',function(){
		
			$this = $(this);
			var id = $this.attr('id');
      var chk = jQuery.trim($this.find('i').attr('class'));
			if(chk.match('fa-toggle-on'))
			{
				oldClass = 'fa-toggle-on';
				newClass = 'fa-toggle-off';
				 var status = 1;
			}
			else 
			{
				oldClass = 'fa-toggle-off';
				newClass = 'fa-toggle-on';
				var status = 0;
			}
      $(this).html('<img src="'+ajax_url+'img/fbloder.gif" width=15>');
			var model = $this.attr('data-model');
			$.post(ajax_url+'admin/users/updateStatus/'+id+'/'+model+'/'+status, function(resp){
				
				if($.trim(resp) == 'done')
				{
          $this.html('<i class="fa fa-lg '+newClass+'"></i><span>Update Staus</span>');
          return true;
				}
			});
		
		
		return false;
		
	});
	
//  Deletion Script	
	$('.delRec').click(function(){
			if(confirm('Do you really want to delete this Content?'))
			{
				$this = $(this);
				var id = $(this).attr('id');
				var model = $this.attr('data-model');
        		var controller = $this.attr('data-controller');
				var page = $this.attr('data-page');
				$.post(ajax_url+'/admin/users/delete_data/'+id+'/'+model,function(resp){
					$this.parents('tr').fadeOut(2000,function(){
						$(this).remove();
            //window.location.reload();
            $.post(ajax_url+'/admin/'+controller+'page:'+page, function(get_data){
              $('#search_result').html(get_data);
              $('.all_count').html($('.box-header').attr('data-info'));
            });          
					});

				});
			}
			return false;					
	});
	
//Admin trending company status
$('.adminstatus').on('click',function(){
		
			$this = $(this);
			var id = $this.attr('id');
      var chk = jQuery.trim($this.find('i').attr('class'));
			if(chk.match('fa-toggle-on'))
			{
				oldClass = 'fa-toggle-on';
				newClass = 'fa-toggle-off';
				 var status = 1;
			}
			else 
			{
				oldClass = 'fa-toggle-off';
				newClass = 'fa-toggle-on';
				var status = 0;
			}
      $(this).html('<img src="'+ajax_url+'img/fbloder.gif" width=15>');
			var model = $this.attr('data-model');
			$.post(ajax_url+'admin/users/adminstatus/'+id+'/'+model+'/'+status, function(resp){
				
				if($.trim(resp) == 'done')
				{
          $this.html('<i class="fa fa-lg '+newClass+'"></i><span>Update Staus</span>');
          return true;
				}
			});
		
		
		return false;
		
	});
		
	
  
});
