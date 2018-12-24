<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo HTTP_ROOT.'img/adminImg/adminProfile/'.$this->Session->read('Admin.image'); ?>" class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
				<p>Welcome</p>
				<p><?php echo $this->Session->read('Admin.firstname').' '.$this->Session->read('Admin.lastname');?></p>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="active">
				<a href="<?php echo HTTP_ROOT.'admin/users/dashboard'?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			

			<!--li class="treeview">
				<a href="#">
					<i class="fa  fa-newspaper-o"></i>
					<span>Newsletter Module</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo HTTP_ROOT.'admin/users/newsletters'?>"><i class="fa fa-angle-double-right"></i> Newsletters</a></li>
					<li><a href="<?php echo HTTP_ROOT.'admin/users/newsletter_subscribers'?>"><i class="fa fa-angle-double-right"></i> Subscribed Members</a></li>
				</ul>
			</li-->

			<!--li class="treeview">
				<a href="#">
					<i class="fa fa-th-large"></i>
					<span>FAQs</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo HTTP_ROOT.'admin/users/faqs'?>"><i class="fa fa-angle-double-right"></i> Manage FAQs</a></li>
				
				</ul>
			</li-->
			<li class="treeview">
				<a href="#">
					<i class="fa fa-user"></i>
					<span>User Management</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
				
					<li><a href="<?php echo HTTP_ROOT.'admin/users/user'?>"><i class="fa fa-angle-double-right"></i> User</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-file"></i>
					<span>Pancahang Management</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo HTTP_ROOT.'admin/users/ritu'?>"><i class="fa fa-angle-double-right"></i>Ritu</a></li>
					<li><a href="<?php echo HTTP_ROOT.'admin/users/month'?>"><i class="fa fa-angle-double-right"></i>Month</a></li>
					<li><a href="<?php echo HTTP_ROOT.'admin/users/day'?>"><i class="fa fa-angle-double-right"></i>Day</a></li>
				
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-phone-square"></i>
					<span>Video Management</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo HTTP_ROOT.'admin/users/video'?>"><i class="fa fa-angle-double-right"></i> Manage video</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-phone-square"></i>
					<span>Request Management</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo HTTP_ROOT.'admin/users/contacts'?>"><i class="fa fa-angle-double-right"></i> Manage Contact-us</a></li>
				</ul>
			</li>
			<!--li class="treeview">
				<a href="#">
					<i class="fa fa-files-o"></i>
					<span>Template Modules</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo HTTP_ROOT.'admin/users/email_templates'?>"><i class="fa fa-angle-double-right"></i> Email Templates</a></li>
				</ul>
			</li-->

		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
