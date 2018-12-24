<style>
.btn-blue{
	background-color:#00a3ef;
	border-color:#00a3ef;
	color:#fff;
	}
	.intro-text {
    color: #57a4b6;
    font-size: 1.1em;
    font-weight: 400;
    letter-spacing: 1px;
    text-transform: uppercase;
}
hr {
    border-color: #57a4b6;
    max-width: 400px;
}

</style>

<aside class="right-side">
   
    <section class="content-header">
        <h1>
          View Product Description
		</h1>
    </section>
  
      <section class="content">
      
			<div class="pull-right" style="">
				<a href="javascript:void(0);"  onclick="history.go(-1)" class="btn btn-success btn-sm" >Back</a>
        	</div></br></br></br>
          
			<div class="form-box" style="width:95%; margin:30px; "  id="login-box">
			<?php if(!empty($viewNewsfeed)) { ?>	
					<div class="box-body box table-responsive margin-top-20" >
						<table class="table table-bordered table-striped" id="example1">
						    <tbody>
							<tr>
      						   <th style="background-color:transparent;width:20%;">Product Name</th>
      						   <td style="width:60%;"><?php  echo $viewNewsfeed['Product']['product_name']; ?></td>
							</tr>
							<tr>
      						   <th style="background-color:transparent;width:20%;">Company Name</th>
      						   <td style="width:60%;"><?php  echo $viewNewsfeed['Product']['company_name']; ?></td>
							</tr>
							<tr>
      						   <th style="background-color:transparent;width:20%;">Product Category</th>
      						   <td style="width:60%;"><?php  echo $viewNewsfeed['ProductCategory']['category_type']; ?></td>
							</tr>
							<tr>
      						   <th style="background-color:transparent;width:20%;">Product Sub Category</th>
      						   <td style="width:60%;"><?php  echo $viewNewsfeed['ProductSubCategory']['sub_category_name']; ?></td>
							</tr>
							<tr>
      						   <th style="background-color:transparent;width:20%;">Mrp </th>
      						   <td style="width:60%;"><?php  echo $viewNewsfeed['Product']['mrp']; ?></td>
							</tr>
							<tr>
      						   <th style="background-color:transparent;width:20%;">Discount </th>
      						   <td style="width:60%;"><?php  echo $viewNewsfeed['Product']['discount']; ?></td>
							</tr>
							<tr>
      						   <th style="background-color:transparent;width:20%;">Price </th>
      						   <td style="width:60%;"><?php  echo $viewNewsfeed['Product']['price']; ?></td>
							</tr>
						   
						       <!--tr>
      						   <th style="background-color:transparent;">Description</th>
      						   <td style="width:60%;"><div class="event-des"><?php  echo $viewNewsfeed['GalleryImage']['description']; ?></div></td>
      						 </tr-->
							
							<tr>
								<th style="background-color:transparent;">Image</th>
								<td style="width:60%;">
								<?php foreach ($viewNewsfeed['ProductImage'] as $image){ ?> 
									<a href="<?php echo HTTP_ROOT.'img/product/img/'.@$image['image'] ?>" target="_blank"><img height="125px" width="200px"  src="<?php echo HTTP_ROOT.'img/Product/img/'.@$image['image'] ?>"></a>
								<?php } ?>
								</td>
							</tr>		
							</tbody>
						</table>
						</div>
					<?php }?>
				</div>
			
			
	</section>