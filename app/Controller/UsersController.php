<?php
ob_start();
class UsersController extends AppController
{
	var $name='Users';
	var $uses=array('Admin','User'); 
	var $helpers = array('Session','Html','Js','Form','Paginator','Text');
	public $components = array('Session','Email','RequestHandler','Cookie','Resize','Upload','Paginator');

	public function beforeFilter()
		{
			parent::beforeFilter();
			$this->layout="admin";
			$this->disableCache();
			$actionUrl=array('admin_login','admin_forgot_password');
			if($this->Session->read('Admin.id')=='' && !in_array($this->params['action'],$actionUrl))
				{
					$this->redirect(array('controller'=>'users','action' => 'login','admin' => true));
				}	
		}
	
	public function admin_delete_data($id=NULL, $model=NULL)
		{
			
			$this->loadModel($model);
			$id=convert_uudecode(base64_decode(@$id));
			if($this->RequestHandler->isAjax()){
		
				if(!empty($id)) {	 
					$this->$model->delete($id);
				}
				echo "done";			
			}
			die;	
		}	
		
	public function search()
		{
			$this->loadmodel('User');			 
			 if(!empty($this->data))
				{
					$data=$this->data;
					$result=$this->User->find('all', array('conditions'=> array('User.name'=>$data['User']['search'])));
					$this->set('result',$result);          	
		      }	
		}		
		
		
		

	public function admin_updateStatus($id =NULL, $model=NULL, $status=NULL)
		{

			$this->loadModel($model);
			$id=convert_uudecode(base64_decode(@$id));
			if($this->RequestHandler->isAjax())
				{
					if($status == 0)
						{
							if($model == 'Blog')
								{
									$this->live_feed('Blog','New Blog');
								}
							elseif($model =='Discussion')
								{
									$this->live_feed('Discussion','New Discussion');
								}
							$this->$model->updateAll(array("$model.status"=>1),array("$model.id"=>$id));
						}
					else
						{
							$this->$model->updateAll(array("$model.status"=>0),array("$model.id"=>$id));
						}
				echo "done";	
			}die;					
		}
		
	public function admin_login()
		{
			$title = "Signup";
			$this->loadModel('Admin');
			$this->set(compact('title'));
			if($this->Cookie->check('rememberMe'))
				{
					$stayTuned = $this->Cookie->read('rememberMe');
					$this->set('stayTuned', $stayTuned);
				}
			if(!empty($this->data))
				{
					$data = $this->data;
					$admin_result = $this->Admin->find('first',array('conditions'=>array('Admin.username'=>$data['Admin']['username'],'Admin.password'=>md5($data['Admin']['password']))));

					if(!empty($admin_result))
						{
							$this->Admin->updateAll(array('Admin.last_login'=>'now()'),array('Admin.id'=>$admin_result['Admin']['id']));
							if (@$data['Admin']['rememberMe'] == 1) 
								{
									$cookieTime = "12 months"; 
									unset($data['Admin']['rememberMe']);
									$this->Cookie->write('rememberMe', $data['Admin'], true, $cookieTime);
								}
							else
								{
									$this->Cookie->delete('rememberMe');
								}
							$this->Session->write('Admin',$admin_result['Admin']);
							$this->redirect(array('controller'=>'users','action'=>'dashboard','admin'=>true));
						}
					else
						{
							$this->Session->setFlash('Authentication Failed!','error');
							$this->redirect(array('controller'=>'users','action'=>'login','admin'=>true));
						}
				}
		}

	public function admin_logout() 
		{

			$this->Session->destroy();
			$this->Session->setFlash('Logout Successfully!','success');
			$this->redirect(array('controller'=>'users','action'=>'login','admin'=>true));
		}

	public function admin_dashboard()
		{
			$this->set(compact('title'));
			
		}
	
	public function admin_edit_profile()
		{
			$title = "Edit Profile";
			$this->set(compact('title'));
			$this->loadModel('Admin');

			if(!empty($this->data))
				{
					$data = $this->data;			  			
					if(!empty($_FILES['admin_image']['name']))
						{
							$unlink_location = realpath('../webroot/img/adminImg/adminProfile/'). '/';
							$imageInfo = $this->Session->read('Admin');
							unlink($unlink_location.$imageInfo['image']);	
							$imgName = pathinfo($_FILES['admin_image']['name']);			
							$ext = strtolower($imgName['extension']);	
							if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='gif')
							{
								$destination = realpath('../webroot/img/adminImg/adminProfile/'). '/';
								$file = str_replace(":","_",$_FILES['admin_image']['name']);
								$filename = $file;
								move_uploaded_file($_FILES['admin_image']['tmp_name'],$destination.$filename);
								$data['Admin']['image'] = $filename;
							}
						}	
					if($this->Admin->save($data))
						{
							$admin_info = $this->Admin->find('first');
							$this->Session->write('Admin',$admin_info['Admin']);
							$this->Session->setFlash('Profile has been updated successfully!','success');
							$this->redirect(array('controller'=>'Users','action'=>'dashboard','admin' => true));
						}
					else
						{
							$this->Session->setFlash('Some error occured, please try again!','error');
							$this->redirect(array('controller'=>'Users','action'=>'edit_profile','admin' => true));
						}
				}
		}

	public function admin_changePassword()
		{
			$title = "Change Password";
			$this->set(compact('title'));
			$this->loadModel('Admin');

			if(!empty($this->data))
				{
					$admin_result = $this->Admin->find('first',array('fields'=>array('id','password')));
					$admin_info = $admin_result['Admin'];
					$data = $this->data;

					if(md5($data['Admin']['old_password']) === $admin_info['password'])
						{
							$this->Admin->id = $admin_info['id'];
							if($this->Admin->saveField('password',md5($data['Admin']['new_password'])))
								{
									$this->Session->setFlash('Password has been updated successfully!','success');
									$this->redirect(array('controller'=>'Users','action'=>'dashboard','admin' => true));
								}
							else
								{
									$this->Session->setFlash('Some error occured, Please try again!','error');
									$this->redirect(array('controller'=>'Users','action'=>'changePassword','admin' => true));
								}
						}
					else
						{
							$this->Session->setFlash('You have entered incorrect current password, Please enter correct current password and try again','error');
							$this->redirect(array('controller'=>'Users','action'=>'changePassword','admin' => true));
						}
				}
		}

	public function admin_forgot_password()
		{
			$this->loadModel('Admin');
			$this->loadModel('EmailTemplate');
			$data = $this->data;
			//pr($data);die;
			if(!empty($data))
				{
					$admin_info = $this->Admin->find('first',array('conditions'=>array('Admin.email'=>$data['Admin']['email'])));
					if($data['Admin']['email'] === $admin_info['Admin']['email'])
						{ 
							$current_date = date('d F Y', strtotime(date('Y-m-d')));
							$shuffled = substr(str_shuffle ("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
							$new_password = $shuffled;
							$pwd=md5($new_password);
							$template = $this->EmailTemplate->find('first',array('conditions'=>array('EmailTemplate.alias'=>'admin_forget_password')));

							$emailContent = $template['EmailTemplate']['description'];
							$emailContent = str_replace('{[logo]}','<img src="'.HTTP_ROOT.'img/logo.png">' ,$emailContent);
							$emailContent = str_replace('{[firstname]}',@$admin_info['Admin']['firstname'] ,$emailContent);
							$emailContent = str_replace('{[lastname]}',@$admin_info['Admin']['lastname'] ,$emailContent);
							$emailContent = str_replace('{[username]}',@$admin_info['Admin']['username'] ,$emailContent);
							$emailContent = str_replace('{[password]}',@$new_password ,$emailContent);
							$emailContent = str_replace('{[current_date]}',@$current_date ,$emailContent);
	
							$email = new CakeEmail();
							$email->template('common_template');
							$email->emailFormat('both');
							$email->viewVars(array('emailContent' => $emailContent));
							$email->to($admin_info['Admin']['email']);
							$email->from($template['EmailTemplate']['from']);
							$email->subject($template['EmailTemplate']['subject']);					
							$email->send();

							$this->Admin->updateAll(array('Admin.password'=>$pwd),$conditions,array('Admin.email'=> $data['Admin']['email']));
							$this->Session->setFlash('Password sent!','success');
							$this->redirect(array('controller'=>'Users','action'=>'login','admin' => true));
						}
					else
						{
							$this->Session->setFlash('Wrong email id.','error');
							$this->redirect(array('controller'=>'Users','action'=>'login','admin' => true));
						}
				}
		} 	
		
   

   


    
		
# --- Contact Request --->

	public function admin_contacts()
	{
		$this->loadModel('Contact');
		$title = 'User Enquiry';
		$this->set(compact('title'));
		$this->layout = 'admin';
		$total_enquiry = $this->Contact->find('all');
		$this->paginate = array('limit'=>10, 'order'=>'Contact.id desc');
		$enquiry_info = $this->paginate('Contact');
		$this->set(compact('enquiry_info','total_enquiry'));
		if($this->RequestHandler->isAjax()){
			echo $this->render('/Elements/adminElements/enquiry_list','ajax');die;
		}
		
	}

	public function admin_view_contacts($id=NULL)
	{
	      $this->loadModel('Contact');
	      $title = "User Description";
	      $this->Set(compact('title'));
	      $this->layout = "admin";
	      $id = convert_uudecode(base64_decode($id));
	      $user_info = $this->Contact->find('first',array('conditions'=>array('Contact.id'=>$id)));

			$this->loadModel('EmailTemplate');
			$n_info=$this->EmailTemplate->find('first',array('conditions'=>array('EmailTemplate.alias'=>'enquiry_reply')));	
			$emailContent = $n_info['EmailTemplate']['description'];
			$emailContent = str_replace('{[logo]}','<img src="'.HTTP_ROOT.'img/logo.png">' ,$emailContent);
			$emailContent = str_replace('{[name]}',@$user_info['Contact']['name'] ,$emailContent);
			$emailContent = str_replace('{[subject]}',@$user_info['Contact']['subject'] ,$emailContent);
			$emailContent = str_replace('{[email]}',@$user_info['Contact']['email'] ,$emailContent);
			$this->set(compact('user_info','n_info','emailContent')); 

		if($this->data){
			$emailContent = $this->data['message'];
			$email = new CakeEmail();
			$email->template('common_template');
			$email->emailFormat('both');
			$email->viewVars(array('emailContent' => $emailContent));
			$email->to($this->data['to']);
			$mail_from=$n_info['EmailTemplate']['from'];
			$email->from($mail_from);
			$email->subject($this->data['subject']);	
			//pr($email);die;
			$email->send();
			$this->Session->setFlash('Message sent successfully!','success');
			$this->redirect(array('controller'=>'Users','action'=>'contacts','admin' => true));
		}
	}
	
	
	public function admin_user()
		{
			$this->loadModel('User');
			$title = 'User';
			$this->set(compact('title'));
			$this->layout = 'admin';
			$total_news_template = $this->User->find('all',array('recursive'=>-1));
			$this->paginate = array('limit'=>15, 'order'=>'User.id desc','recursive'=>1);
			$all_templates = $this->paginate('User');
			//pr($all_templates);die;
			$this->set(compact('all_templates','total_news_template'));
			if($this->RequestHandler->isAjax())
				{
					echo $this->render('/Elements/adminElements/user_list','ajax');die;
				}
		}
	public function admin_view_user($id=NULL)
		{
			$this->loadModel('Post');
			$id = convert_uudecode(base64_decode($id));
			$productInfo = $this->Post->find('first',array('conditions'=>array('Post.id'=>$id), 'recursive'=>2));
			$this->set(compact('productInfo')); 

		}	

	
	
	public function admin_about()   //  Admission Management
		{
			$title='About';
			$this->loadModel('About');
			$this->set(compact('title'));
			$this->layout='admin';
			$total_admission=$this->About->find('all');
			$this->paginate=array('limit'=>10,'order'=>'About.id DESC');
			$info_admission=$this->paginate('About');
			$this->set(compact('info_admission','total_admission'));
			if($this->RequestHandler->isAjax())
				{
					echo $this->render('/Elements/adminElements/about_list','ajax');die;
				}
		}
		
		
    	
	
    public function admin_edit_about($id=null)
	{
		$title='Edit About Post';
		$this->loadModel('About');
		$this->set(compact('title'));
		$this->layout='admin';
		$id=convert_uudecode(base64_decode($id));
		$info = $this->About->find('first',array('conditions'=>array('About.id'=>$id)));
		$this->set(compact('info'));
		if(!empty($this->data)){
			$data=$this->data;
			if($this->About->save($data)){
				$this->Session->setFlash('About updated Successfully','success');
				$this->redirect(array('action'=>'about','admin'=>true));
			}
		}
    }
	function admin_video()
   	{
		$this->layout="admin";
		$this->loadModel("Video");
		$this->paginate = array('Video'=>array('order'=>array('Video.id'=>'DESC'),'limit'=>10));
		$newsfeed_list = $this->paginate('Video');
		$title = 'Video';
		$this->set(compact('newsfeed_list','title')); 	
	}

	function admin_add_video()
	{
		$this->layout="admin";
		$this->loadModel("Video");
		$title = 'Add Video';
		$this->set(compact('title'));
		if($this->request->is('post') && (!empty($this->request->data)))
		{
  	  	    $data = $this->request->data;
			$data['Video']['title']=$data['Video']['title'];
  	  	    $data['Video']['date']= date('Y-m-d h-i-s');
			if(!empty($data['Video']['video']['name']))
				{ 	
					//App::import('Component','Resize');
					$destination = 'files/';
					//$resize = new ResizeComponent();
					$imgName = pathinfo($data['Video']['video']['name']);
					$ext = strtolower($imgName['extension']);
					if($ext == 'mp4' || $ext == 'MTS' )
						{	
							$filename= time() . '-' . preg_replace('/[^A-Za-z0-9\-.]/', '',$data['Video']['video']['name']);
							$file_tmp = $data['Video']['video']['tmp_name'];
							$destination = 'files/';
							move_uploaded_file($file_tmp,$destination.$filename);
							$data['Video']['video']=$filename;
						}		
				}
			if($this->Video->save($data))
	           {
					$this->Session->setFlash('Video   has been added successfully','success');
					$this->redirect(array('action'=>'video'));
				}
	 			else 
				{
					$this->Session->setFlash('Error in adding','error');
					$this->redirect($this->referer());	 			 	 	
				}                     	
		}
    }
	
	public function admin_ritu()   //  Ritu Management
		{
			$title='Ritu';
			$this->loadModel('Ritu');
			$this->set(compact('title'));
			$this->layout='admin';
			$total=$this->Ritu->find('all');
			$this->paginate=array('limit'=>10,'order'=>'Ritu.id DESC');
			$info=$this->paginate('Ritu');
			$this->set(compact('info','total'));
			if($this->RequestHandler->isAjax())
				{
					echo $this->render('/Elements/adminElements/ritu_list','ajax');die;
				}
		}
	 public function admin_add_ritu()
		{
			$title='Add Ritu ';
			$this->loadModel('Ritu');
			$this->set(compact('title'));
			$this->layout='admin';
			if(!empty($this->data))
				{
					$data=$this->data;
					if($this->Ritu->save($data)){
					$this->Session->setFlash('Ritu post Added Successfully','success');
					$this->redirect(array('action'=>'ritu','admin'=>true));
					}
				}
		}	
	public function admin_edit_ritu($id=null)
	{
		$title='Edit Ritu';
		$this->loadModel('Ritu');
		$this->set(compact('title'));
		$this->layout='admin';
		$id=convert_uudecode(base64_decode($id));
		$info = $this->Ritu->find('first',array('conditions'=>array('Ritu.id'=>$id)));
		$this->set(compact('info'));
		if(!empty($this->data))
		{
			$data=$this->data;
			if($this->Ritu->save($data))
			{
				$this->Session->setFlash('Ritu updated Successfully','success');
				$this->redirect(array('action'=>'ritu','admin'=>true));
			}
		}
    }
	public function admin_month()   //  Month Management
		{
			$title='Month';
			$this->loadModel('Month');
			$this->set(compact('title'));
			$this->layout='admin';
			$total=$this->Month->find('all');
			$this->paginate=array('limit'=>10,'order'=>'Month.id DESC');
			$info=$this->paginate('Month');
			$this->set(compact('info','total'));
			if($this->RequestHandler->isAjax())
				{
					echo $this->render('/Elements/adminElements/month_list','ajax');die;
				}
		}
	 public function admin_add_month()
		{
			$title='Add Month Post';
			$this->loadModel('Month');
			$this->set(compact('title'));
			$this->layout='admin';
			if(!empty($this->data))
				{
					$data=$this->data;
					//pr($data);die;
					if($this->Month->save($data)){
					$this->Session->setFlash('Month post Added Successfully','success');
					$this->redirect(array('action'=>'month','admin'=>true));
					}
				}
		}	
	public function admin_edit_month($id=null)
	{
		$title='Edit Month';
		$this->loadModel('Month');
		$this->set(compact('title'));
		$this->layout='admin';
		$id=convert_uudecode(base64_decode($id));
		$info = $this->Month->find('first',array('conditions'=>array('Month.id'=>$id)));
		$this->set(compact('info'));
		if(!empty($this->data))
		{
			$data=$this->data;
			if($this->Month->save($data))
			{
				$this->Session->setFlash('Month updated Successfully','success');
				$this->redirect(array('action'=>'month','admin'=>true));
			}
		}
    }	
	
	public function admin_day()   //  Announcement Management
		{
			$title=' Day';
			$this->loadModel('Day');
			$this->set(compact('title'));
			$this->layout='admin';
			$total=$this->Day->find('all');
			$this->paginate=array('limit'=>10,'order'=>'Day.id DESC');
			$info=$this->paginate('Day');
			$this->set(compact('info','total'));
			if($this->RequestHandler->isAjax())
				{
					echo $this->render('/Elements/adminElements/ day_list','ajax');die;
				}
		}
	public function admin_add_day()
		{
			$title='Add Day Post';
			$this->loadModel('Day');
			$this->set(compact('title'));
			$this->layout='admin';
			if(!empty($this->data))
				{
					$data=$this->data;
					if($this->Day->save($data)){
					$this->Session->setFlash('Day post Added Successfully','success');
					$this->redirect(array('action'=>'day','admin'=>true));
					}
				}
		}	
	public function admin_edit_day($id=null)
	{
		$title='Edit Day Post';
		$this->loadModel('Day');
		$this->set(compact('title'));
		$this->layout='admin';
		$id=convert_uudecode(base64_decode($id));
		$info = $this->Day->find('first',array('conditions'=>array('Day.id'=>$id)));
		$this->set(compact('info'));
		if(!empty($this->data))
		{
			$data=$this->data;
			if($this->Day->save($data))
			{
				$this->Session->setFlash('Day updated Successfully','success');
				$this->redirect(array('action'=>'day','admin'=>true));
			}
		}
    }
	
}

?>
