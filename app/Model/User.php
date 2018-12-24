<?php
		class User extends AppModel 
			{
				var $name = 'User';
				var $actsAs = array('Containable');
				var $belongsTo = array(
															'Country'=>array(		
															'className' => 'Country',
															'foreignKey'=> 'country'
															),
														/*	'Industry'=>array(		
															'className' => 'Industry',
															'foreignKey'=> 'industry'
															),
															'Category'=>array(		
															'className' => 'Category',
															'foreignKey'=> 'category'
															),
															
															'FunctionCategory'=>array(		
															'className' => 'FunctionCategory',
															'foreignKey'=> 'category'
															),
															'Institute'=>array(		
															'className' => 'Institute',
															'foreignKey'=> 'institute'
															),*/
														
											);
				var $hasOne =array(
											'UserDetail'=>array(		
											'className' => 'UserDetail',
											'foreignKey'=> 'user_id'
											),
											/*'UserEducation'=>array(		
											'className' => 'UserEducation',
											'foreignKey'=> 'user_id'
											),
											
											'UserWork'=>array(		
											'className' => 'UserWork',
											'foreignKey'=> 'user_id'
											),	
											'UserWorkDetail'=>array(		
											'className' => 'UserWorkDetail',
											'foreignKey'=> 'user_id'
											)	*/								

										);
				  var $hasMany =array(
										/*	'MyNetwork'=>array(
											'className' => 'MyNetwork',
											'foreignKey'=> 'sender_id'
											),
											'Home'=>array(
											'className' => 'Home',
											'foreignKey'=> 'user_id'
											)	*/

					); 
			}
?>
