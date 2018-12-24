<script src="<?php echo HTTP_ROOT?>/js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            EDIT NEWS
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="pull-right" style="margin-bottom:10px;">
        <a href="javascript:void(0)" onclick="history.go(-1)"  class="btn btn-success btn-sm backbtn" >Back</a>
    </div>
        <div class="form-box" style="width:700px; margin:30px; "  id="login-box">
        
            <h4 class="box-title">Edit News</h4>    
			<?php if($myvar = $this->Session->flash()){ ?>
				<div class="response-msg ui-corner-all">
					<?php echo $myvar;?>
				</div>
			<?php } ?>
            <form method="post" action="<?php echo HTTP_ROOT;?>admin/Users/editNewsfeed" enctype="multipart/form-data" id="newsfeed_content">
            <input type="hidden" name="data[Newsfeed][id]" value="<?php echo @$newsfeed_content['Newsfeed']['id'];?>" >           
                <div class="body bg-gray">
                    <div class="form-group">
                     Title:<input type="text"  class="form-control required" name="data[Newsfeed][title]" value="<?php echo $newsfeed_content['Newsfeed']['title']; ?>" />
                    </div>
                    <div class="form-group">
                     Description:<textarea  class="form-control ckeditor" name = "description" id="description" ><?php if(!empty($newsfeed_content['Newsfeed']['description'])): echo $newsfeed_content['Newsfeed']['description'];endif;?> </textarea>
                    </div>
                     
					      <div class="form-group">
                     Image :<input id="image" name="image" type="file"  />                          
                      <div>
							  <img height="200px" width="200px"  src="<?php echo HTTP_ROOT.'img/adminImage/'.@$newsfeed_content['Newsfeed']['image'] ?>"> 
					      </div>                    
					  </div>
                      <div class="form-group text-right"> 
                        <button type="submit" class="btn btn-success"/>Submit </button>
                    </div>
                </div>         
            </form>
       
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<script type="text/javascript">
     $(document).ready(function(){
		$("#newsfeed_content").validate({
        ignore: "",	
        rules:
            {
                "data[Newsfeed][name]":
                {
                    required:true
                
                },
               
                "description":
                
				{
				required: function() {
					CKEDITOR.instances.description.updateElement();
					var messageLength = CKEDITOR.instances['description'].getData().replace(/<p><br>&nbsp;/gi, '').length;
					if( !messageLength ) {
						return true;
					}
				},

				},
				  },
			
			messages: {
					   "description":
						{
							required:'This field is required'
						},
						"data[Newsfeed][name]":
						{
							required:'This field is required'
						},
						
			   		},
				errorPlacement: function(label, element) {
					if (element.is("textarea.ckeditor")) {
						label.insertAfter(element.next());
					} else {
						label.insertAfter(element)
					}
				}
			
        });
        
    });
    
</script>