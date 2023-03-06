
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School of Health Technology, Kano! | Student Dashboard </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img src="<?= base_url('images/sht_kano_logo_no_border.jpg') ?>" alt="SHT Logo" style="width:35px;height:35px;" > <span>SHT Kano</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <img src="<?php echo is_file("uploads/students/passport_".$_SESSION['current_student_id']."_.jpg")?'uploads/students/passport_'.$_SESSION['current_student_id'].'_.jpg':base_url('images/avatar.png'); ?>" alt="Passport Picture" class="img-circle profile_img" style="width:60px;height:60px;" >
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $_SESSION['current_student_fullname'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                <li><a href="<?= url_to('studentDashboard') ?>"><i class="fa fa-home"></i> Home</a></li>

                <li><a><i class="fa fa-file-text"></i> My Information <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('passport') ?>">Passport</a></li>
                      <!--<li><a href="#">Other Information</a></li>-->
                    </ul>
                  </li>

                  <?php if ($_SESSION['is_new'] != "YES") { ?>
                  <li><a><i class="fa fa-file-text"></i> Examination <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!--<li><a href="">Payments</a></li>-->
                      <li><a href="<?= base_url('examCard') ?>">Exam Cards</a></li>
                      <?php if ($_SESSION['department'] != null || !empty($_SESSION['department'])) { ?>
                        <?php if (str_contains($_SESSION['department'], 'Nutrition')) { ?>
                          <li><a href="<?= base_url('payInduction') ?>">Pay Induction</a></li>
                        <?php } ?>
                      <?php } ?>
                    </ul>
                  </li>
                <?php }  ?>
                 
                <li><a><i class="fa fa-file-text"></i> Payments <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!--<li><a href="">Payments</a></li>-->
                      <?php if ($_SESSION['is_new'] == "YES") { ?>
                        <li><a href="<?= base_url('payAcceptance') ?>">Pay Acceptance Fee</a></li>
                        <li><a href="<?= base_url('payMedical') ?>">Pay Medical Fee</a></li>
                        <li><a href="<?= base_url('payRegistration') ?>">Pay Registration (New)</a></li>
                      <?php } else { ?>

                        <li><a href="<?= base_url('payReturningRegistration') ?>">Pay Registration (Returning)</a></li>
                        <!-- <li><a href="<?= base_url('paySiwes') ?>">Pay SIWES Fee</a></li>
                        <li><a href="<?= base_url('payPractical') ?>">Pay Practical Fee</a></li> -->
                      <?php } ?>

                    </ul>
                </li>

                <li><a><i class="fa fa-file-text"></i> Receipts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!--<li><a href="">Payments</a></li>-->
                        <li><a href="<?= base_url('registrationReceipt') ?>">Registration Receipt</a></li>
                        <li><a href="#">All My Receipts</a></li>
                       
                     
                    </ul>
                </li>

                <li><a><i class="fa fa-file-text"></i> Course Registration <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!--<li><a href="">Payments</a></li>-->
                     
                        <li><a href="#">Regiser Courses</a></li>
                        <li><a href="#">Edit My Courses</a></li>
                       
                    </ul>
                </li>

                <li><a><i class="fa fa-file-text"></i> My Docs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!--<li><a href="">Payments</a></li>-->
                     
                        <li><a href="#">CRF</a></li>
                        <li><a href="#">ID Card</a></li>
                       
                    </ul>
                </li>
               

                  <li><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">Change Password</a></li>
                      <li><a>Edit Profile<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Basic Info</a>
                            </li>
                            <li><a href="#level2_1">Next of Kin</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
                  </li>

                  <li><a href="<?= url_to('studentLogout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>




                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?php echo is_file("uploads/students/passport_".$_SESSION['current_student_id']."_.jpg")?'uploads/students/passport_'.$_SESSION['current_student_id'].'_.jpg':base_url('images/avatar.png'); ?>" alt=""> <?= $_SESSION['current_student_fullname'] ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="<?= url_to('studentLogout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
            <?= $this->renderSection('content') ?>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Designed and Developed By<a href="https://iworldoftech.com">IWORLDOFTECH</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="vendors/raphael/raphael.min.js"></script>
    <script src="vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

  </body> 
</html>