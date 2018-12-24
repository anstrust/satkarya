<script src="<?php echo HTTP_ROOT?>/js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<aside class="right-side">
   <section class="content-header">
        <h1>
            Add Testimonial
        </h1>
    </section>
   <section class="content">
   
        <div class="pull-right" style="margin-bottom:10px;">
           <a href="<?php echo HTTP_ROOT.'admin/users/testimonial/'?>"  class="btn btn-success btn-sm backbtn" >Back</a>
        </div>
		<br>
		<br>
		<br>
        <div class="form-box" style="width:95%; margin:30px; "  id="login-box">
       
             
            <?php echo $this->Session->flash(); ?>
            <form method="post" action="<?php echo HTTP_ROOT.'admin/users/add_testimonial'; ?>" enctype="multipart/form-data" id="addNews" >
                <div class="body bg-gray">
                    <div class="form-group">
                       Name:<input type="text" class="form-control required" name="data[Testimonial][title]"  placeholder="Name"/>
                    </div> 
					<div class="form-group">
                       Occupation:<input type="text" class="form-control required" name="data[Testimonial][occupation]"  placeholder="Occupation"/>
                    </div> 
					<div class="form-group">
                       Description:<input type="text" class="form-control required" name="data[Testimonial][description]"  placeholder="Description"/>
                    </div>
                    <!--div class="form-group">
                       Description:<textarea  class="form-control ckeditor" name = "description" id="description" > </textarea>
                    </div-->
                    <div class="form-group">
                       Image:<input type="file" class="" name="image" />
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
                "data[Testimonial][title]":
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
						"data[Testimonial][title]":
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