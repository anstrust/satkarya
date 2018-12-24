<style>
.row {
    margin-right: -15px!important;
}
</style>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php echo $this->Session->flash(); ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <div class="col-lg-3 col-sm-3 col-xs-12"> 
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>
                        Admin
                      </h3>
                      <p>
                        Admin
                      </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="javascript:void(0)" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>     
           </div>
           <!--
           <div class="col-lg-3 col-md-3  col-sm-3 col-xs-12">
                           
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                      Company
                                    </h3>
                                    <p>
                                      Company
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a class="small-box-footer" href="<?php echo HTTP_ROOT;?>admin/Users/showCompany">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-3 col-md-3  col-sm-3 col-xs-12">
                           
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        Teacher
                                    </h3>
                                    <p>
                                        Teacher's 
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a class="small-box-footer" href="<?php echo HTTP_ROOT;?>admin/Users/showTeachers">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                           
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        Student
                                    </h3>
                                    <p>
                                        Student's
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a class="small-box-footer" href="<?php echo HTTP_ROOT;?>admin/Users/showStudents">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        -->
                        
                       <!-- <div class="col-lg-3 col-xs-6">
                              <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>
                                        Payments
                                    </h3>
                                    <p>
                                        Payments
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a class="small-box-footer" href="<?php echo HTTP_ROOT;?>admin/Users/student_payments">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-xs-6">
                            
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                       Sales Partners
                                    </h3>
                                    <p>
                                        Sales Partners
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a class="small-box-footer" href="<?php echo HTTP_ROOT;?>admin/Users/show_sales_partners">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                      <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3>
                                       Subjects
                                    </h3>
                                    <p>
                                       Subjects
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-pricetag-outline"></i>
                                </div>
                                <a class="small-box-footer" href="<?php echo HTTP_ROOT;?>admin/Users/show_subjects">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>-->
                        

        
        </div>          
           
    
    </section>
</aside>
