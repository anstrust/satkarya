<?php
	ob_start();
class MembersController extends AppController 
	{
		var $helpers = array('Form','Html','Js','Paginator','Time','Text','Number','Session');
		var $components = array('Cookie','Session','RequestHandler','Email','Auth');
		public function beforeFilter()
			{
				$this->disableCache();
				parent::beforeFilter();		
				ini_set('memory_limit', '512M');
				$check_data = parent::beforeFilter();
				$this->Auth->allow('post_details','validate_contact_us_ajax','contact_us','about_us','blog_list','terms_and_conditions','privacy_policy','faq','groupemailVerification','validate_post_job_ajax','global_job','job_details','global_event','event_details','validate_edit_personal_profile_ajax','newsletter_subscriber','validate_login_user_ajax','login','linkedinLogin','index','signup','validate_signup_user_ajax','linkedinLogin','facebookLogin','googleLogin','emailVerification','validate_newsletter_subscriber_Ajax');
				$session =  $this->Session->read('Auth.User.email');
				$actionUrl = array('login', 'index');
				if(!empty($session) && in_array($this->params['action'], $actionUrl))
					{
						$this->redirect(array('controller'=>'Members', 'action'=>'profile'));
					}
			}
		public function profile()
			{
				$this->layout = "public";
				$this->loadModel('User');
				$user_data=$this->User->find('first',array('conditions'=>array('User.id'=>$this->Session->read('Auth.User.id'))));
				//pr($user_data);die;
				$this->set(compact('user_data'));
			}
		public function audio_record() 
			{
				$this->layout = "audio";
				$this->loadModel('User');
				$this->loadModel('Audio');
				$user_data=$this->User->find('first',array('conditions'=>array('User.id'=>$this->Session->read('Auth.User.id')),'fields'=>array('id','step1','step2','step4','step3')));
				$this->set(compact('user_data'));
				if(!empty($this->data))
					{
						$data  =  $this->data;
						//pr($data);die;
						if(!empty($data['Audio']['audio']['name']))
						{ 	
							//App::import('Component','Resize');
							$destination = 'files/';
							//$resize = new ResizeComponent();
							$imgName = pathinfo($data['Audio']['audio']['name']);
							$ext = strtolower($imgName['extension']);
							if($ext == 'mp3' || $ext == 'wav' )
								{	
									$filename= time() . '-' . preg_replace('/[^A-Za-z0-9\-.]/', '',$data['Audio']['audio']['name']);
									$file_tmp = $data['Audio']['audio']['tmp_name'];
									$destination = 'files/';
									move_uploaded_file($file_tmp,$destination.$filename);
									$data['Audio']['audio']['name']=$filename;
								}		
						}
						$name=$data['Audio']['audio']['name'];
						$data1=array();
						$data1['step3']=1;
						$data1['id']=$this->Session->read('Auth.User.id');
						$this->User->save($data1);
						$data = array();
						$data['audio']=$name;
						$data['user_id']=$this->Session->read('Auth.User.id');
						
						if($this->Audio->save($data))
							{
								$this->Session->setFlash('Your Audio was uplaoded Successfully !','success');
								$this->redirect(array('controller'=>'Members','action'=>'profile'));
								
							}
							
					}
			}
		public function video() 
			{
				$this->layout = "public";
				$this->loadModel('Video');
				require_once 'src/VedicRishiClient.php';
				$userId = "603392";
				$apiKey = "fa7eb70067973c32d487748fa0b4822b";
				$data = array(
					'date' => 25,
					'month' => 12,
					'year' => 2018,
					'hour' => 4,
					'minute' => 0,
					'latitude' => 25.123,
					'longitude' => 82.34,
					'timezone' => 5.5,
					
				);
				$vedicRishi = new VedicRishiClient($userId, $apiKey);
				$responseData2 = $vedicRishi->getAdvancedPanchang($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);
				pr($responseData2);die;

				
				$data1=json_decode($responseData, true);
				pr($data1);die;
				$tithi=$data1["tithi"];				
				$info=$this->Video->find('first',array('conditions'=>array('Video.title'=>$tithi)));
				$this->set(compact('info'));
				
			}		
		public function edit_personal_profile() 
			{
				ini_set('memory_limit', '-1');	
				$this->layout = "public";
				$this->loadModel('User');
				$this->loadModel('UserDetail');
				$this->loadModel('Country');
				$country=$this->Country->find('all');
				$user_data=$this->User->find('first',array('conditions'=>array('User.id'=>$this->Session->read('Auth.User.id')),'recursive'=>2));
				$this->set(compact('user_data','country'));
				if(!empty($this->data))
					{
						$data=$this->data;
						//pr($data);die;
						$data=array();
						$data['id']=$this->data['User']['id'];			
						$data['firstname']=$this->data['User']['firstname'];	
						$data['lastname']=$this->data['User']['lastname'];
						$data['user_type']=$this->data['User']['user_type'];			
						$data['dob']=$this->data['User']['dob'];			
						$data['mobile']=$this->data['User']['mobile'];			
						$data['country']=$this->data['User']['country'];
						$data['category']=$this->data['User']['category'];
						$data['step1']=1;
						$this->User->save($data);
						$this->Session->write('Auth.User.firstname',$this->data['User']['firstname']);
						$this->Session->write('Auth.User.lastname',$this->data['User']['lastname']);
						$data1=array();
						$data1['id']=$this->data['User']['id'];
						$data1['user_id']=$this->data['User']['user_id'];			
						$data1['state']=$this->data['User']['state'];			
						$data1['city']=$this->data['User']['city'];			
						$data1['zipcode']=$this->data['User']['zipcode'];			
						$data1['address']=$this->data['User']['address'];			
						$data1['c_state']=$this->data['User']['c_state'];			
						$data1['c_city']=$this->data['User']['c_city'];			
						$data1['c_zipcode']=$this->data['User']['c_zipcode'];			
						$data1['c_address']=$this->data['User']['c_address'];	
						
						if($this->UserDetail->save($data1))
							{
								$this->Session->setFlash('Your Profile was Updated Successfully !','success');
								$this->redirect(array('controller'=>'Members','action'=>'profile'));
							}
					}
			}
		public function validate_edit_personal_profile_ajax()
			{
				$this->layout="";
				$this->autoRender=false;
					if($this->RequestHandler->isAjax())
						{
							$errors_msg = null;
							$errors=$this->validate_edit_personal_profile($this->data);
								if( is_array($this->data))
									{
										$new_array = $this->data['User'];
											foreach ($new_array as $key => $value)
												{
													if( array_key_exists ($key, $errors))
														{
															foreach ( $errors [ $key ] as $k => $v )
																{
																	$errors_msg .= "error|$key|$v";
																}	
														}
													else 
														{
															$errors_msg .= "ok|$key\n";
														}
												}
									}
								echo $errors_msg;
								die;
						}	
			}
		public function validate_edit_personal_profile($data)
			{
				$errors = array ();
					if(trim($data['User']['firstname']) == '')
						{
							$errors['firstname'][] = 'Please enter the firstname.'."\n";
						}
					if(trim($data['User']['lastname']) == '')
						{
							$errors['lastname'][] = 'Please enter the lastname.'."\n";
						}
					
					if(trim($data['User']['mobile']) == '')
						{
							$errors['mobile'][] = 'Please enter the contact number.'."\n";
						}
					else
					   {
						  $cou= strlen($data['User']['mobile']);
						  if($cou>10 )
						  {
							 $errors['mobile'][] = 'Please enter 10 digit phone number.'."\n";
						  }
						  else
						  {
						  if($cou<10)
							 {
								$errors['mobile'][] = 'Please enter 10 digit phone number.'."\n";
							 }
						  }  
					   } 	
					if(trim($data['User']['address']) == '')
						{
							$errors['address'][] = 'Please enter the address.'."\n";
						} 
					if(trim($data['User']['dob']) == '')
						{
							$errors['dob'][] = 'Please enter the Date of birth.'."\n";
						}	
					if(trim($data['User']['user_type']) == 0)
						{
							$errors['user_type'][] = 'Please select the yes/no.'."\n";
						}
					if(trim($data['User']['country']) == 0)
						{
							$errors['country'][] = 'Please select country.'."\n";
						}
					if(trim($data['User']['category']) == 0)
						{
							$errors['category'][] = 'Please select category.'."\n";
						}
					if(trim($data['User']['c_state']) == '')
						{
							$errors['c_state'][] = 'Please enter the current State.'."\n";
						}
					if(trim($data['User']['c_city']) == '')
						{
							$errors['c_city'][] = 'Please enter the current city.'."\n";
						} 
					if(trim($data['User']['c_zipcode']) == '')
						{
							$errors['c_zipcode'][] = 'Please enter the current zipcode.'."\n";
						} 
					if(trim($data['User']['c_address']) == '')
						{
							$errors['c_address'][] = 'Please enter the current address.'."\n";
						} 
						
					return $errors;	
			}
		public function edit_family_detail() 
			{
				ini_set('memory_limit', '-1');	
				$this->layout = "public";
				$this->loadModel('User');
				$user_data=$this->User->find('first',array('conditions'=>array('User.id'=>$this->Session->read('Auth.User.id')),'recursive'=>2));
				//pr($user_data);die;
				$this->set(compact('user_data'));
				if(!empty($this->data))
					{
						$data=$this->data;
						//pr($data);die;
						$data=array();
						$data['id']=$this->data['User']['id'];			
						$data['father_gothram']=$this->data['User']['father_gothram'];			
						$data['mother_gothram']=$this->data['User']['mother_gothram'];			
						$data['father_name']=$this->data['User']['father_name'];	
						$data['father_alive']=$this->data['User']['father_alive'];	
						$data['dad_father_name']=$this->data['User']['dad_father_name'];	
						$data['dad_father_alive']=$this->data['User']['dad_father_alive'];	
						$data['dad_grand_father_name']=$this->data['User']['dad_grand_father_name'];	
						$data['dad_grand_father_alive']=$this->data['User']['dad_grand_father_alive'];	
						$data['dad_mother_name']=$this->data['User']['dad_mother_name'];	
						$data['dad_mother_alive']=$this->data['User']['dad_mother_alive'];	
						$data['dad_grand_mother_name']=$this->data['User']['dad_grand_mother_name'];	
						$data['dad_grand_mother_alive']=$this->data['User']['dad_grand_mother_alive'];	
						$data['dad_great_grand_mother_name']=$this->data['User']['dad_great_grand_mother_name'];	
						$data['dad_great_grand_mother_alive']=$this->data['User']['dad_great_grand_mother_alive'];	
						$data['mother_name']=$this->data['User']['mother_name'];	
						$data['mother_alive']=$this->data['User']['mother_alive'];	
						$data['mom_father_name']=$this->data['User']['mom_father_name'];	
						$data['mom_father_alive']=$this->data['User']['mom_father_alive'];	
						$data['mom_grand_father_name']=$this->data['User']['mom_grand_father_name'];	
						$data['mom_grand_father_alive']=$this->data['User']['mom_grand_father_alive'];	
						$data['mom_mother_name']=$this->data['User']['mom_mother_name'];	
						$data['mom_mother_alive']=$this->data['User']['mom_mother_alive'];	
						$data['mom_grand_mother_name']=$this->data['User']['mom_grand_mother_name'];	
						$data['mom_grand_mother_alive']=$this->data['User']['mom_grand_mother_alive'];	
						$data['mom_great_grand_mother_name']=$this->data['User']['mom_great_grand_mother_name'];	
						$data['step2']=1;
						//pr($data);die;						
						if($this->User->save($data))
							{
								$this->Session->setFlash('Your family details was Updated Successfully !','success');
								$this->redirect(array('controller'=>'Members','action'=>'profile'));
							}
					}
			}
		public function validate_edit_family_detail_ajax()
			{
				$this->layout="";
				$this->autoRender=false;
					if($this->RequestHandler->isAjax())
						{
							$errors_msg = null;
							$errors=$this->validate_edit_family_detail($this->data);
								if( is_array($this->data))
									{
										$new_array = $this->data['User'];
											foreach ($new_array as $key => $value)
												{
													if( array_key_exists ($key, $errors))
														{
															foreach ( $errors [ $key ] as $k => $v )
																{
																	$errors_msg .= "error|$key|$v";
																}	
														}
													else 
														{
															$errors_msg .= "ok|$key\n";
														}
												}
									}
								echo $errors_msg;
								die;
						}	
			}
		public function validate_edit_family_detail($data)
			{
				$errors = array ();
				if(trim($data['User']['mother_gothram']) == '')
					{
						$errors['mother_gothram'][] = 'Please enter the mother gothram.'."\n";
					}
				if(trim($data['User']['father_gothram']) == '')
					{
						$errors['father_gothram'][] = 'Please enter the father gothram.'."\n";
					}
				if(trim($data['User']['father_name']) == '')
					{
						$errors['father_name'][] = 'Please enter the father name.'."\n";
					} 
				/* if(trim($data['User']['father_alive']) == 0)
					{
						$errors['father_alive'][] = 'Please select yes/no.'."\n";
					} */
				if(trim($data['User']['dad_father_name']) == '')
					{
						$errors['dad_father_name'][] = 'Please enter the dad father name.'."\n";
					} 
				if(trim($data['User']['dad_father_alive']) == 0)
					{
						$errors['dad_father_alive'][] = 'Please select yes/no.'."\n";
					}
				if(trim($data['User']['dad_grand_father_name']) == '')
					{
						$errors['dad_grand_father_name'][] = 'Please enter the dad grand father name.'."\n";
					} 
				if(trim($data['User']['dad_grand_father_alive']) == 0)
					{
						$errors['dad_grand_father_alive'][] = 'Please select yes/no.'."\n";
					}
				if(trim($data['User']['dad_mother_name']) == '')
					{
						$errors['dad_mother_name'][] = 'Please enter the dad mother name.'."\n";
					} 
				if(trim($data['User']['dad_mother_alive']) == 0)
					{
						$errors['dad_mother_alive'][] = 'Please select yes/no.'."\n";
					}
				if(trim($data['User']['dad_grand_mother_name']) == '')
					{
						$errors['dad_grand_mother_name'][] = 'Please enter the dad grand mother name.'."\n";
					} 
				if(trim($data['User']['dad_grand_mother_alive']) == 0)
					{
						$errors['dad_grand_mother_alive'][] = 'Please select yes/no.'."\n";
					}
				if(trim($data['User']['dad_great_grand_mother_name']) == '')
					{
						$errors['dad_great_grand_mother_name'][] = 'Please enter the dad great grand mother name.'."\n";
					} 
				if(trim($data['User']['dad_great_grand_mother_alive']) == 0)
					{
						$errors['dad_great_grand_mother_alive'][] = 'Please select yes/no.'."\n";
					}
				if(trim($data['User']['mother_name']) == '')
					{
						$errors['mother_name'][] = 'Please enter the mother name.'."\n";
					} 
				if(trim($data['User']['mother_alive']) == 0)
					{
						$errors['mother_alive'][] = 'Please select yes/no.'."\n";
					}
				if(trim($data['User']['mom_father_name']) == '')
					{
						$errors['mom_father_name'][] = 'Please enter the mother father name.'."\n";
					} 
				if(trim($data['User']['mom_father_alive']) == 0)
					{
						$errors['mom_father_alive'][] = 'Please select yes/no.'."\n";
					}
				if(trim($data['User']['mom_grand_father_name']) == '')
					{
						$errors['mom_grand_father_name'][] = 'Please enter the mother grand father name.'."\n";
					} 
				if(trim($data['User']['mom_grand_father_alive']) == 0)
					{
						$errors['mom_grand_father_alive'][] = 'Please select yes/no.'."\n";
					}
				if(trim($data['User']['mom_mother_name']) == '')
					{
						$errors['mom_mother_name'][] = 'Please enter the mom mother name.'."\n";
					} 
				if(trim($data['User']['mom_mother_alive']) == 0)
					{
						$errors['mom_mother_alive'][] = 'Please select yes/no.'."\n";
					}
				if(trim($data['User']['mom_grand_mother_name']) == '')
					{
						$errors['mom_grand_mother_name'][] = 'Please enter the mom grand mother name.'."\n";
					} 
				if(trim($data['User']['mom_grand_mother_alive']) == 0)
					{
						$errors['mom_grand_mother_alive'][] = 'Please select yes/no.'."\n";
					}
				if(trim($data['User']['mom_great_grand_mother_name']) == '')
					{
						$errors['mom_great_grand_mother_name'][] = 'Please enter the mom great grand mother name.'."\n";
					} 
				if(trim($data['User']['mom_great_grand_mother_alive']) == 0)
					{
						$errors['mom_great_grand_mother_alive'][] = 'Please select yes/no.'."\n";
					}	
				if(trim($data['User']['mom_great_grand_father_name']) == '')
					{
						$errors['mom_great_grand_father_name'][] = 'Please enter the mom great grand father name.'."\n";
					} 
				if(trim($data['User']['mom_great_grand_father_alive']) == 0)
					{
						$errors['mom_great_grand_father_alive'][] = 'Please select yes/no.'."\n";
					}	
				
				return $errors;	
			}
		public function change_password()
			{
				$this->loadModel('User');	
					if(!empty($this->data))
						{   
							$data = $this->data;
							$new_password  =md5($data['User']['password']);
							$this->User->updateAll(array('User.password'=>"'".$new_password."'"),array('User.id'=>$data['User']['id'])); 
							$this->Session->setFlash( "Your password change successfully!",'success');	
							$this->redirect(array('controller'=>'Members','action'=>'profile'));	
						}
			}
		public function validate_change_password_ajax()
			{
				$this->layout="";
				$this->autoRender=false;
					if($this->RequestHandler->isAjax())
						{
							$errors_msg = null;
							$errors=$this->validate_change_password($this->data);
								if( is_array($this->data))
									{
										$new_array = $this->data['User'];
										foreach ($new_array as $key => $value)
											{
												if( array_key_exists ($key, $errors))
													{
														foreach ( $errors [ $key ] as $k => $v )
															{
																$errors_msg .= "error|$key|$v";
															}	
													}
												else 
													{
														$errors_msg .= "ok|$key\n";
													}
											}
									}
								echo $errors_msg;
								die;
						}	
			}
		public function  validate_change_password($data)
			{
				$errors = array ();
				$this->loadModel('User');
				$user_result = $this->User->find('first',array('conditions'=>array('User.id'=>$data['User']['id']),'fields'=>array('id','password')));
							if(trim($data['User']['current_password']) == '')
								{  
									$errors['current_password'][] = 'Please enter your current password !'."\n";                   
								}
								else
								{
									if(md5($data['User']['current_password']) != $user_result['User']['password'])
										{          
											$errors['current_password'][] = 'You have entered incorrect password !'."\n";
										}
								}  
							if(trim($data['User']['password']) == '')
								{
									$errors['password'][] = 'This field is required.'."\n";
								}
							 if(trim($data['User']['confirm_password']) == '')
								{
									$errors['confirm_password'][] = 'This field is required.'."\n";
								}
								else
								{
									if(trim($data['User']['confirm_password']) != trim($data['User']['password']))
										{
											$errors['confirm_password'][] = 'Confirm Password and Password should be equal'."\n";
										}
								}   
						
				return $errors;   
			}
		public function upload_photo()
			{
				$this->loadModel('User');
					if(!empty($this->data))
						{
							$data  =  $this->data;
								if(@$data['User']['photo']['name'] != '')
									{
										// To Resize the Logo Start
										App::import('Component', 'Resize');			
										$resize = new ResizeComponent();
										$file_name_logo = @$data['User']['photo']['name'];		
										$allowedext = array("jpg", "jpeg", "gif", "png");
										$imgarr = explode(".", $file_name_logo);
										$imgext = end($imgarr);
										$filename = time() . '-' . preg_replace('/[^A-Za-z0-9\-.]/', '', $file_name_logo);	
											if(in_array($imgext, $allowedext)) 
												{	  		            
													$file_tmp = @$data['User']['photo']['tmp_name'];
													if($data['User']['photo_hidden'] !='')
														{
															@unlink('../../app/webroot/img/frontEnd/user/photo/'.$data['User']['photo_hidden']);
															@unlink('../../app/webroot/img/frontEnd/user/thumbling_photo/'.$data['User']['photo_hidden']);
														}	
													$destination = realpath('../../app/webroot/img/frontEnd/user/photo') . '/';
													$destinationThumbling = realpath('../../app/webroot/img/frontEnd/user/thumbling_photo') . '/';
													$destShow_image = $resize->resize($file_tmp,$destination.$filename , 'auto', 800, 600, 0, 0, 0, 0);
													$destShow_imageThumbling = $resize->resize($file_tmp,$destinationThumbling.$filename , 'auto', 80, 60, 0, 0, 0, 0);
												}
										// To Resize the Logo End
										
													$data['User']['photo']=$filename;
									}
								elseif(@$data['User']['photo_hidden'] != '')
									{
										$data['User']['photo'] = $data['User']['photo_hidden'];		
									}
								else
									{
										$data['User']['photo'] = '';
									}
									$id = $data['User']['id'];		
									$this->User->updateAll(array('User.photo'=>"'".$data['User']['photo']."'"), array('User.id'=>$id));
									$this->Session->write('Auth.User.photo',$data['User']['photo']);
									$this->Session->setFlash("Your Photo Was Updated Successfully",'success');	
									$this->redirect(array('controller'=>'Members','action'=>'profile'));
						}	
			}	
			

			 

	}
?>
