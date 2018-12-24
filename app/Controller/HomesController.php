<?php
class HomesController extends AppController 
	{
		var $helpers = array('Form','Html','Js','Paginator','Time','Text','Number','Session');
   		var $components = array('Cookie','Session','RequestHandler','Email','Auth');
		public function beforeFilter()
   			{
   				$this->disableCache();
                parent::beforeFilter();
				$this->Auth->allow('checkusername','vedio','checkmail','register','signup','faculty','faq','addmission','image_gallery','video_gallery','parent_speak','awards','news_event','validate_contact_us_ajax','about','validate_signup_org_ajax','site_feedback','director_desk','validate_site_chat_ajax','site_chat','validate_site_feedback_ajax','validate_User_Forgot_Password_Ajax','forgot_password','contact','validate_login_user_ajax','login','index','validate_signup_user_ajax','emailVerification','validate_newsletter_subscriber_Ajax','courses','videos');
   				$session =  $this->Session->read('Auth.User.email');
   				$actionUrl = array('login','login');
   				if(!empty($session) && in_array($this->params['action'], $actionUrl))
   					{
   						$this->redirect(array('controller'=>'Members', 'action'=>'profile'));
   					}	
   			}
		
		public function index()
		{
			$this->layout = "home";
		}
				
		public function about() 
		{
			$this->layout = "public";
		}
		public function register()
		{
			$this->loadModel('User');
			$this->loadModel('UserDetail');
			$this->loadModel('EmailTemplate');
			if($this->Session->check('Auth.User.id'))
			{
				$this->redirect(array('controller'=>'homes','action'=>'index'));
				exit();
			}
			$this->layout = "home";
			if($this->request->is('post'))
			{
				if(!empty($this->request->data))
				{
					$data = $this->request->data; 
					$insertData = $data;
					$insertData['password']= md5($insertData['password']);
					$insertData['activation_code']=sha1(md5($insertData['email']));
					$insertData['status']=1;
					if($this->User->save($insertData))
						{
							$user_id = $this->User->getLastInsertId();
							$array = array();
							$array['user_id'] = $user_id;
							$this->UserDetail->save($array);
							//Email Verification Mail Start --> 
							$template = $this->EmailTemplate->find('first',array('conditions'=>array('EmailTemplate.alias'=>'sign_up_user')));
							$emailContent = $template['EmailTemplate']['description'];
							$emailContent = str_replace('{[logo]}','<img src="'.HTTP_ROOT.'img/print_logo.png">' ,$emailContent);
							$emailContent = str_replace('{[username]}',@$data['username'] ,$emailContent);
							$emailContent = str_replace('{[verificationURL]}','<a href="'.HTTP_ROOT.'Homes/emailVerification/'.$insertData['activation_code'].'">Activate Account</a>' ,$emailContent);
							$email = new CakeEmail();
							$email->template('common_template');
							$email->emailFormat('both');
							$email->viewVars(array('emailContent' => $emailContent));
							$email->to($data['email']);
							$email->from($template['EmailTemplate']['from']);
							$email->subject($template['EmailTemplate']['subject']);	
							//pr($email);die;
							$email->send();
							//Email Verification Mail End -->
							
							$this->Session->setflash('You have registered successfully','success');               
							$this->redirect(array('controller'=>'homes','action'=>'login'));
						}
					}
			}
		}
		public function login()
		{
			if($this->Session->check('Auth.User.id'))
			{
				$this->redirect(array('controller'=>'homes','action'=>'index'));
				exit();
			}  
			$this->layout="home";
			$this->loadModel('User'); 
			if($this->request->is('post'))
			{
				if(!empty($this->request->data))
				{
					$data = $this->request->data;  
					$user = $this->User->find('first',array('conditions'=>array('User.email'=>$data['email'],'User.password'=>md5($data['password']))));
					if(!empty($user))
					{
						$data['User']['id'] = $user['User']['id'];
						$data['User']['firstname'] = $user['User']['firstname'];
						$data['User']['lastname'] = $user['User']['lastname'];
						$data['User']['email'] = $user['User']['email'];
						$data['User']['user_type'] = $user['User']['user_type'];
						//pr($data);die;
						if($this->Auth->login($data['User'])) 
							{	
								$this->Session->setFlash('Login Successfully!','success');
   								$this->redirect(array('controller'=>'Members', 'action'=>'profile'));
							}
					}
					else
					{
						$this->Session->setFlash('Invalid Authentication!','error');               
						$this->redirect(array('controller'=>'homes','action'=>'login'));
					} 
	   
				}
			}

		}
		public function logout()
   		{
   			$this->Session->delete('Auth.User');
   			$this->Session->setFlash('Logout Successfully!','success');
   			$this->redirect(array('controller'=>'homes','action'=>'login'));
   		}

		public function checkmail()
		{
			$this->loadModel('User');
			$result=$this->User->find('count', array('conditions'=>array('User.email'=>$_POST['data']['email'])));
			if($result > 0)
			{
				echo 'false';
			}
			else
			{
				echo 'true';
			}die;	
		
		}
		public function checkusername()
		{
			$this->loadModel('User');
			$result=$this->User->find('count', array('conditions'=>array('User.username'=>$_POST['data']['username'])));
			if( $result> 0 )
			{
				echo 'false';
			}
			else{
				echo 'true';
			}	
			die;
		}
 		public function forgot_password()
		{	
			$this->loadModel('User');
			$this->loadModel('EmailTemplate');
			if(!empty($_POST))
				{
				
							$data=$this->data;
							$info = $this->User->find('first',array('conditions'=>array('User.email'=>$data['forgotUserPassword']['forgetEmail'])));
							$shuffled = substr(str_shuffle ("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
							$new_password = $shuffled;
							$pwd=md5($new_password);
							$this->User->updateAll(array("password"=>"'".$pwd."'"),array("User.email"=>$info['User']['email']));
							$template = $this->EmailTemplate->findByAlias('forget_password'); 
							$emailContent = $template['EmailTemplate']['description'];
							$emailContent = str_replace('{[logo]}','<img src="'.HTTP_ROOT.'img/print_logo.png">' ,$emailContent);
							$emailContent = str_replace('{[firstname]}',$info['User']['firstname'] ,$emailContent);
							$emailContent = str_replace('{[lastname]}',$info['User']['lastname'] ,$emailContent);
							$emailContent = str_replace('{[email]}',$info['User']['email'] ,$emailContent);
							$emailContent = str_replace('{[password]}',$new_password ,$emailContent);
							$email = new CakeEmail();
							$email->template('common_template');
							$email->emailFormat('both');
							$email->viewVars(array('emailContent' => $emailContent));	
							$email->to($this->data['forgotUserPassword']['forgetEmail']);
							$email->from($template['EmailTemplate']['from']);
							$email->subject($template['EmailTemplate']['subject']);	
							$email->send();
							$this->Session->setFlash('Your password has been send Successfully in your email id, please check mail !','success');
							$this->redirect(array('controller'=>'Homes','action'=>'login'));
						
				}
		}
   
   public function validate_User_Forgot_Password_Ajax()
   		{
   			$this->layout="";
   			$this->autoRender=false;
   			if($this->RequestHandler->isAjax())
   				{
   					$errors_msg = null;
   					$errors=$this->validate_User_Forgot_Password($this->data);
   					if( is_array($this->data))
   						{
   							$new_array = $this->data['forgotUserPassword'];
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
   	
   	public function validate_User_Forgot_Password($data) 
   		{	
   			$errors = array ();
   			$this->loadModel('User');
   			$social_accounts =  $this->User->find('first',array('conditions'=>array('User.email'=>$data['forgotUserPassword']['forgetEmail']),'fields'=>array('create_type')));
   			if(trim($data['forgotUserPassword']['forgetEmail']) == '')
   				{
   					$errors['forgetEmail'][] = 'Please enter this field'."\n"; 
   				} 
   			else	
   				{
   					if($this->validEmail(trim($data['forgotUserPassword']['forgetEmail']))=='false') 
   						{
   							$errors['forgetEmail'][] = 'This is invalid email'."\n"; 	
   						}
   					else 
   						{
   							if($this->User->findByEmail($data['forgotUserPassword']['forgetEmail'])==false)
   								{
   									$errors['forgetEmail'][] = 'This email that you have entered is not exist !'."\n"; 		
   								}
   							else
   								{
   									if($social_accounts['User']['create_type']  != "Website")
   										{
   											$errors['forgetEmail'][] = 'This email was register from social network, so you can not retrieve any password!'."\n";
   										}
   								}	
   						}
   				}	
   			return $errors;	
   		}
		public function emailVerification($activationLink=NULL)
   		{
			$this->loadModel('User');
   			if($this->User->find('first',array('conditions'=>array('User.status'=>0,'User.activation_code'=>$activationLink)))>0)
   				{
                  $this->User->updateAll(array('User.status' => 1),array('User.activation_code'=>$activationLink));
                  $this->Session->setFlash('Your account has been activated successfully !','success');
   					$this->redirect(array('controller'=>'Homes', 'action'=>'index'));
   				}
   			elseif($this->User->find('first',array('conditions'=>array('User.status'=>1,'User.activation_code'=>$activationLink)))>0)
   				{
                 $this->Session->setFlash('Your account is already activated !','error');
   					$this->redirect(array('controller'=>'Homes', 'action'=>'index'));					
   				}
   		}
		public function contact()
			{
				$this->layout = "public";
				$this->loadModel('Contact');
				$this->loadModel('EmailTemplate');
			
				if(!empty($this->data))
					{
						//pr($this->data);die;
						$data=$this->data;
						$data_new =array();
						$data_new['name'] = $this->data['Contact']['name'];
						$data_new['subject'] = $this->data['Contact']['subject'];
						$data_new['email'] = $this->data['Contact']['email'];
						$data_new['phone'] = $this->data['Contact']['phone'];
						$data_new['message'] = $this->data['Contact']['message'];
						if($this->Contact->save($data_new));
							{
								$contact_id = $this->Contact->getLastInsertId();
								$contact_email=$this->Contact->find('first',array('conditions'=>array('Contact.id'=>$contact_id)));
								$data['email']='oapsindia@gmail.com';
								$array = array();
								$template = $this->EmailTemplate->find('first',array('conditions'=>array('EmailTemplate.alias'=>'contact_us')));
								//pr($template);die;
								$emailContent = $template['EmailTemplate']['description'];
								$emailContent = str_replace('{[name]}',@$contact_email['Contact']['name'] ,$emailContent);
								$emailContent = str_replace('{[subject]}',@$contact_email['Contact']['subject'] ,$emailContent);
								$emailContent = str_replace('{[message]}',@$contact_email['Contact']['message'] ,$emailContent);
								$emailContent = str_replace('{[phone]}',@$contact_email['Contact']['phone'] ,$emailContent);
								$email = new CakeEmail();
								$email->template('common_template');
								$email->emailFormat('both');
								$email->viewVars(array('emailContent' => $emailContent));
								$email->to($data['email']);
								$email->from($template['EmailTemplate']['from']);
								$email->subject(@$contact_email['Contact']['subject']);
								//pr($email);die;	
								$email->send();
								$this->Session->setFlash('Thanks for contacting Us, We will contact you back soon','success');
								$this->redirect(array('controller'=>'Homes', 'action'=>'contact'));
							
							}
					}
				}
			
			public function validate_contact_us_ajax()
				{
					$this->layout="";
					$this->autoRender=false;
					if($this->RequestHandler->isAjax())
						{
							$errors_msg = null;
							$errors=$this->validate_contact_us($this->data);
							if( is_array($this->data))
								{
									$new_array = $this->data['Contact'];
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
			
			public function validate_contact_us($data)
				{
					
					$errors = array ();
					if(trim($data['Contact']['name']) == '')
						{
							$errors['name'][] = 'This field is required.'."\n";
						}
					if(trim($data['Contact']['subject']) == '')
						{
							$errors['subject'][] = 'This field is required.'."\n";
						}
					if(trim($data['Contact']['message']) == '')
						{
							$errors['message'][] = 'This field is required.'."\n";
						}
					if(trim($data['Contact']['phone']) == '')
						{
							$errors['phone'][] = 'This field is required.'."\n";
						}	
					if(trim($data['Contact']['email']) == '')
						{
							$errors['email'][] = 'This field is required.'."\n"; 
						}
					else
						{
							if($this->validEmail(trim($data['Contact']['email']))=='false') 
								{
									$errors['email'][] = 'Email is invalid.'."\n"; 	
								}
							
						}
									
						
					return $errors;	
				}
		// chat now start
		public function site_chat()
			{
				$this->loadModel('Chat');	
				if(!empty($this->data))
					{   
						$data = $this->data;
						//pr($data);die;	
						$this->loadModel('EmailTemplate');	
						$data_new=array();
						$data_new['name']=$this->data['Chat']['name1'];
						$data_new['email']=$this->data['Chat']['email1'];
						$data_new['message']=$this->data['Chat']['message1'];
						if($this->Chat->save($data_new))
							{
								$id = $this->Chat->getLastInsertId();
								$chat=$this->Chat->find('first',array('conditions'=>array('Chat.id'=>$id)));
								$data['email']='oapsindia@gmail.com';
								$array = array();
								$template = $this->EmailTemplate->find('first',array('conditions'=>array('EmailTemplate.alias'=>'chat_now')));
								$emailContent = $template['EmailTemplate']['description'];
								$emailContent = str_replace('{[phone]}',@$chat['Chat']['phone'] ,$emailContent);
								$emailContent = str_replace('{[name]}',@$chat['Chat']['name'] ,$emailContent);
								$emailContent = str_replace('{[message]}',@$chat['Chat']['message'] ,$emailContent);
								$emailContent = str_replace('{[email]}',@$chat['Chat']['email'] ,$emailContent);
								$email = new CakeEmail();
								$email->template('common_template');
								$email->emailFormat('both');
								$email->viewVars(array('emailContent' => $emailContent));
   								$email->to($data['email']);
								$email->from($template['EmailTemplate']['from']);
								$email->subject($template['EmailTemplate']['subject']);	
								//pr($email);die;
								$email->send();
								$this->Session->setFlash('Thanks for your Inquiry, We will contact you back soon.','success');	
								$this->redirect(array('controller'=>'Homes','action'=>'index'));
							}
						
						
					}
			}
		
		public function validate_site_chat_ajax()
			{
				$this->layout="";
				$this->autoRender=false;
					if($this->RequestHandler->isAjax())
						{
							$errors_msg = null;
							$errors=$this->validate_site_chat($this->data);
								if( is_array($this->data))
									{
										$new_array = $this->data['Chat'];
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
	   
        public function  validate_site_chat($data)
            {
                $errors = array ();
                
				if(trim($data['Chat']['name1']) == '')
					{
						$errors['name1'][] = 'Please enter this field'."\n"; 
					}
				if(trim($data['Chat']['email1']) == '')
					{
						$errors['email1'][] = 'This field is required.'."\n"; 
					}
				else
					{
						if($this->validEmail(trim($data['Chat']['email1']))=='false') 
							{
								$errors['email1'][] = 'Email is invalid.'."\n"; 	
							}
						
					}
				if(trim($data['Chat']['message1']) == '')
					{
						$errors['message1'][] = 'Please enter this field'."\n"; 
					}	
						
                return $errors;   
            } 
        // chat now end
        public function management() 
        {
        	$this->layout="public";
        }
        public function faculty() 
        {
        	$this->layout="public";
		}
		public function addmission() 
		{
			$this->layout="public";
			$this->loadModel('Admission');
			$info=$this->Admission->find('all',array('Admission.id desc'));
			$this->set(compact('info'));	
		}
		public function faq() 
		{
			$this->layout="public";
			$this->loadModel('Faq');
			$faqList = $this->Faq->find('all', array('limit'=>10,'order'=>('Faq.id desc')));
			$this->set(compact('faqList'));	
	 	}
	 	public function image_gallery() 
	 	{
	 		$this->layout="public";
			$this->loadModel('GalleryImage');
			$info=$this->GalleryImage->find('all',array('order'=>('GalleryImage.id desc')));
			$this->set(compact('info'));
		}
		public function video_gallery() 
		{
			$this->layout="public";
			$this->loadModel('GalleryVideo');
			$video=$this->GalleryVideo->find('all',array('order'=>('GalleryVideo.id desc')));
			$this->set(compact('video'));	
	 
		}

	
				


	
	}
?>