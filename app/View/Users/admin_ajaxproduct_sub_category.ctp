<?php
if($selectbox)
 {
 echo $this->Form->input('Product.product_sub_category', array('class'=>'form-control','type' => 'select','label'=>true,'label'=>'state:','options' => $selectbox ,'empty' =>'Select A Product','required'=>'false'));
 }
?>