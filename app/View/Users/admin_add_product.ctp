<script src="<?php echo HTTP_ROOT?>/js/admin/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<aside class="right-side">
   <section class="content-header">
        <h1>
            ADD Product 
        </h1>
    </section>
   <section class="content">
   
        <div class="pull-right" style="">
			<a href="javascript:void(0)" onclick="history.go(-1)"  class="btn-success btn-sm backbtn" >Back</a>
		</div><br /><br /><br /><br />
        <div class="form-box" style="width:95%; margin:30px; "  id="login-box">
       
             
            <?php echo $this->Session->flash(); ?>
            <form method="POST" action="<?php echo HTTP_ROOT.'admin/users/add_product'; ?>" enctype="multipart/form-data" id="addNews" >
                <div class="body bg-gray">
					<div class="form-group col-md-12">
                       Product Name:<input type="text" class="form-control required" name="data[Product][product_name]"  placeholder="Product Name"/>
                    </div>
					<div class="form-group col-md-6">
                       Company Name:<input type="text" class="form-control required" name="data[Product][company_name]"  placeholder="Product Name"/>
                    </div>
					
					<div class="form-group col-md-6">
                       Mrp:<input type="text" class="form-control required number" maxlength="10" name="data[Product][mrp]"  placeholder="Mrp"/>
                    </div>
					<div class="form-group col-md-6">
                       Discount:<input type="text" class="form-control required number" maxlength="2" name="data[Product][discount]"  placeholder="Discount"/>
                    </div>
					<div class="form-group col-md-6">
						Cod:
						<select class="form-control required" name="data[Product][cod]">
							<option value="">Select</option>
							<option  value="1"  >Yes</option>
							<option value="2" >No</option> 	
						</select>
					</div>
					<div class="form-group col-md-6"> 
						Product Category:
						<select	id="main_product_list" class="form-control required" name="data[Product][product_category]">
							<option value="" class="sm-hd">Select</option>
							<?php   
								foreach ($category as $product_category) 
									{ 
									?>
										<option value="<?php echo $product_category['ProductCategory']['id'] ;?>"><?php echo $product_category['ProductCategory']['category_type']; ?></option>
									<?php }
									?>
						</select>            
					</div> 
					<div class="form-group col-md-6">
						Product Sub Category
						<select	 id="product_sub_category" class="form-control required" name="data[Product][product_sub_category]">
						<option value=" ">Select</option>
						
						</select>
					</div>
					<div class="form-group col-md-12">
						Product description 
						<?php echo $this->Form->input('product_description',array('type'=>'textarea','row'=>'2','class'=>'form-control required','label'=>false,'div'=>false));?>
					</div>
                    <div class="form-group col-md-12">
                       Image:<input type="file" class="required" name="data[Product][image][]" multiple = "multiple"/>
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
                "data[Memory][title]":
                {
                    required:true,
                
                },
				"data[Memory][school]":
                {
                    required:true,
                
                },
                "data[Memory][image]":
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
						"data[Memory][title]":
						{
							required:'This field is required'
						},
						"data[Memory][school]":
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
<script type="text/javascript">
$(document).ready(function(){
    $('#main_product_list').on('change',function(){
    	
    		var product_category_id = $(this).val();
        	dataString="prodcut_list_id="+product_category_id;
        	//alert(dataString);
            $.ajax({
 				url: "ajaxproduct_sub_category",
            	type: "POST",
            	data: dataString,//alert(data);
				success: function(data)
				 {   
				  $('#product_sub_category').html(data);
				  $("#loader").hide();
	             }
            }); 
        
    });
	$('#product_sub_category').on('change',function(){
    	
    		var product_category_id = $(this).val();
        	dataString="prodcut_list_id="+product_category_id;
        	//alert(dataString);
            $.ajax({
 				url: "ajaxsub_category",
            	type: "POST",
            	data: dataString,//alert(data);
				success: function(data)
				{   
					$('#sub_category').html(data);
					$("#loader").hide();
				}
            }); 
        
    });
	
    
   
});
</script>
<script type="text/javascript">
$(document).ready(function()
	{
		$(".number").on('keypress blur',function (e)
		{
			
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
				{
					return false;
				}
		});	
		
		
	});
</script>