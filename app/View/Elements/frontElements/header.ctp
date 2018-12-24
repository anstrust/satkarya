<!-- HEADER -->
    <header role="banner" class="position-absolute">    
      <!-- Top Navigation -->
      <nav class="background-transparent background-transparent-hightlight full-width ">
        <div class="s-12 l-2">
          <a href="<?php echo HTTP_ROOT.''?>" class="logo">
            <!-- Logo White Version -->
            <img class="logo-white" src="<?php //echo HTTP_ROOT.'img/logo.png';?>" alt="Tarpanam">
            <!-- Logo Dark Version -->
            <img class="logo-dark" src="<?php //echo  HTTP_ROOT.'img/logo-dark.png'; ?>" alt="Tarpanam">
          </a>
        </div>
        <div class="top-nav s-12 l-10">
          <p class="nav-text"></p>
          <ul class="right chevron">
            <li><a href="<?php echo HTTP_ROOT.'';?>">Home</a></li>
            <!--li><a>Services</a>
              <ul>
                <li><a>Service 1</a>
                  <ul>
                    <li><a>Service 1 A</a></li>
                    <li><a>Service 1 B</a></li>
                  </ul>
                </li>
                <li><a>Service 2</a></li>
              </ul>
            </li-->
            <li><a href="<?php echo HTTP_ROOT.'homes/about'?>">About</a></li>
            <li><a href="<?php echo HTTP_ROOT.'homes/contact'?>">Contact</a></li>
			<?php $session=$this->Session->read('Auth.User.email');
			 if(!empty($session)){?>
			 <li><a href="<?php echo HTTP_ROOT.'Homes/logout'?>">LogOut</a></li>
			
			 <?php } else { ?>
			<li><a href="<?php echo HTTP_ROOT.'Homes/register'?>">SignUp</a></li>
			<li><a href="<?php echo HTTP_ROOT.'Homes/login'?>">LogIn</a></li>
			 <?php } ?>
		  </ul>
        </div>
      </nav>
    </header>
    


