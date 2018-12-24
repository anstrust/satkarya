<script src="<?php echo HTTP_ROOT?>/js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<aside class="right-side">
   <section class="content-header">
        <h1>
            ADD Service
        </h1>
    </section>
   <section class="content">
   
        <div class="pull-right" style="">
			<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
		</div><br /><br /><br /><br />
        <div class="form-box" style="width:95%; margin:30px; "  id="login-box">
       
             
            <?php echo $this->Session->flash(); ?>
            <form method="post" action="<?php echo HTTP_ROOT.'admin/users/add_service'; ?>" enctype="multipart/form-data" id="addNews" >
                <div class="body bg-gray">
                    <div class="form-group">
                       Title:<input type="text" class="form-control required" name="data[Service][title]"  placeholder="Image Tilte"/>
                    </div>
                    
                    <div class="form-group">
                       Image:<input type="file" class="" name="image" />
                    </div>
					<div class="form-group">
                       Description:<textarea  class="form-control ckeditor" name = "description" id="description" > </textarea>
                    </div>
                    <div class="form-group text-right"> 
                        <button type="submit" class="btn btn-success">Submit </button>
                    </div>
                </div>         
            </form>
        </div>
        <script type="text/javascript">
        $(document).ready(function(){
        $("#addNews").validate({
        ignore: "",	
        rules:
            {
                "data[Service][title]":
                {
                    required:true,
                
                },
                "image":
                 {
                  required:true,  
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
						"data[NewsMaster][title]":
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