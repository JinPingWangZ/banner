<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/favicon.png">
    <title>Metrovic Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/plugins/chartist-plugin-tooltip-master/dist/
    chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/plugins/css-chart/css-chart.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- toast CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="<?php echo base_url() ?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />



    <!--Form css plugins -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/plugins/html5-editor/bootstrap-wysihtml5.css" rel="stylesheet" />
    <!--Form css plugins end -->


    <!-- Vector CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Calendar CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- summernotes CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />
    <!-- wysihtml5 CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/html5-editor/bootstrap-wysihtml5.css" />
    <!-- Dropzone css -->
    <link href="<?php echo base_url() ?>assets/plugins/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <!-- Cropper CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/cropper/cropper.min.css" rel="stylesheet">

    <!-- Footable CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />

    <!-- Date picker plugins css -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="<?php echo base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url() ?>assets/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    
</head>

<body class="fix-header fix-sidebar card-no-border">
    
    <!-- Preloader - style you can find in spinners.css -->
    
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
    <!-- Main wrapper - style you can find in pages.scss -->
    
    <div id="main-wrapper" style="min-height:1188px">
        
        <!-- Topbar header - style you can find in pages.scss -->
        
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                
                <!-- Logo -->
                
                <div class="navbar-header">
                    <!-- <a class="navbar-brand" href="<?php echo base_url('admin/dashboard') ?>">
                        <b>
                            <img src="<?php echo base_url() ?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <img src="<?php echo base_url() ?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span>
                         <img src="<?php echo base_url() ?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <img src="<?php echo base_url() ?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> 
                     </a>  commented by Sinbad-->
                    <div class="logo-w">
                        <a class="logo" href="<?php echo base_url('admin/dashboard') ?>">
                          <div class="logo-element"></div>
                          <div class="logo-label">
                            Clean Admin
                          </div>
                        </a>
                    </div>
                </div>
                
                <!-- End Logo -->
                
                <div class="navbar-collapse">
                    
                    <!-- toggle and nav items -->
                    
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted sin-top-forecolor waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        
                        
                        
                        <!-- Messages -->
                        
                        <li class="nav-item dropdown mega-dropdown"> 
                            <a class="nav-link dropdown-toggle text-muted sin-top-forecolor waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                            <div class="dropdown-menu scale-up-left">
                                <ul class="mega-dropdown-menu row">
                                    <li class="col-lg-3 col-xlg-2 m-b-30">
                                        <h4 class="m-b-20">CAROUSEL</h4>
                                        <!-- CAROUSEL -->
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container"> <img class="d-block img-fluid" src="<?php echo base_url() ?>assets/images/big/img1.jpg" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="<?php echo base_url() ?>assets/images/big/img2.jpg" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="<?php echo base_url() ?>assets/images/big/img3.jpg" alt="Third slide"></div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                        </div>
                                        <!-- End CAROUSEL -->
                                    </li>
                                    <li class="col-lg-3 m-b-30">
                                        <h4 class="m-b-20">ACCORDION</h4>
                                        <!-- Accordian -->
                                        <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingOne">
                                                    <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Collapsible Group Item #1
                                                </a>
                                              </h5> </div>
                                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Collapsible Group Item #2
                                                </a>
                                              </h5> </div>
                                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingThree">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Collapsible Group Item #3
                                                </a>
                                              </h5> </div>
                                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">CONTACT US</h4>
                                        <!-- Contact -->
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </li>
                                    <li class="col-lg-3 col-xlg-4 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <!-- End Messages -->
                        
                        <!-- Search -->
                        
                        <li class="nav-item hidden-sm-down search-box">
                            <a class="nav-link hidden-sm-down text-muted sin-top-forecolor waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        
                    </ul>
                    
                    <!-- User profile and search -->
                    
                    <ul class="navbar-nav my-lg-0">
                        

                        <!-- Comment -->
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted sin-top-forecolor text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center sin-a-blue-color" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <!-- End Comment -->
                        
                        
                        <!-- Messages -->
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted sin-top-forecolor waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="<?php echo base_url() ?>assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="<?php echo base_url() ?>assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="<?php echo base_url() ?>assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="<?php echo base_url() ?>assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <!-- End Messages -->
                        
                        
                        
                        <!-- Profile -->
                        
                        <li class="nav-item dropdown sin-top-profile">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url() ?>assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <div class="sin-bg-icon">
                                    <i class="fa fa-google-wallet"></i>
                                </div>
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                <img src="<?php echo base_url() ?>assets/images/users/1.jpg" alt="user" style="border-radius:50%">
                                            </div>
                                            <div class="u-text" style="margin:20px 0 0 0">
                                                <h4 style="color:#fff"><?php echo $this->session->userdata('name'); ?></h4>
                                                <p class="text-muted"><?php echo $this->session->userdata('email'); ?></p>
                                                <!-- <a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a> -->
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider sin"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li role="separator" class="divider sin"></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li role="separator" class="divider sin"></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider sin"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider sin"></li>
                                    <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        
        <!-- End Topbar header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
       
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap side-profile">
                                <div style="display:inline-block;float:left;width:70px;height:70px;border-radius:50%;padding:7px;border:1px solid #b4b4b4">
                                    <img src="<?php echo base_url() ?>assets/images/users/1.jpg" alt="user" class="profile-pic" width="100%" style="border-radius:50%;"/>
                                </div>
                                <div style="display:inline-block;margin-top:14px;margin-left:15px">
                                    <h4><?php echo $this->session->userdata('name'); ?></h4>
                                                <p class="text-muted"><?php echo $this->session->userdata('email'); ?></p>
                                </div>

                                <div class="sin-side-profile">
                                    <div class="sin-bg-icon">
                                        <i class="fa fa-google-wallet"></i>
                                    </div>
                                    <ul class="dropdown-user">
                                        <li style="padding-bottom: 10px">
                                            <div class="dw-user-box">
                                                <div class="u-img">
                                                    <img src="<?php echo base_url() ?>assets/images/users/1.jpg" alt="user" style="border-radius:50%">
                                                </div>
                                                <div class="u-text" style="margin:20px 0 0 0">
                                                    <h4 style="color:#fff"><?php echo $this->session->userdata('name'); ?></h4>
                                                    <p class="text-muted"><?php echo $this->session->userdata('email'); ?></p>
                                                    <!-- <a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a> -->
                                                </div>
                                            </div>
                                        </li>
                                        <li role="separator" class="divider sin"></li>
                                        <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                        <li role="separator" class="divider sin"></li>
                                        <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                        <li role="separator" class="divider sin"></li>
                                        <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                        <li role="separator" class="divider sin"></li>
                                        <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                        <li role="separator" class="divider sin"></li>
                                        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-small-cap sin-side-setting">
                                <div>
                                    <a href="#" class="link" data-toggle="tooltip" data-placement="bottom" title="Settings" style="display:inline-block"><i class="ti-settings"></i></a>
                                    <a href="#" class="link" data-toggle="tooltip" data-placement="bottom" title="Email" style="display:inline-block"><i class="mdi mdi-gmail"></i></a>
                                    <a href="<?php echo base_url('auth/logout') ?>" class="link" data-toggle="tooltip" data-placement="bottom" title="Logout" style="display:inline-block"><i class="mdi mdi-power"></i></a>
                                </div>
                            </li>
                            <li class="sin-menu" style="margin-top:15px">
                                <a class="waves-effect waves-dark" href="<?php echo base_url('admin/dashboard') ?>" aria-expanded="false">
                                    <i class="mdi mdi-gauge"></i>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="has-arrow " href="<?php echo base_url('admin/user/all_user_list') ?>" ><i class="fa fa-user"></i><span class="hide-menu">User</span></a>
                                <div class="sin-side-submenu">
                                    <div class="sin-sub-title">User</div>
                                    <div class="sin-submenu-hr"></div>
                                    <i class="fa fa-user-o sin-submenu-text"></i>
                                    <?php if ($this->session->userdata('role') == 'admin'): ?>
                                        <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/user') ?>"> Add User </a></div></div>
                                        <div class="sin-submenu-hr"></div>
                                        <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/user/power') ?>"> Add User Power</a></div></div>
                                    <?php else: ?>
                                        <?php if(check_power(1)):?>
                                            <div class="sin-submenu-hr"></div>
                                            <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/user') ?>"> Add User </a></div></div>
                                        <?php endif; ?>
                                    <?php endif ?>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/user/all_user_list') ?>"> All Users</a></div></div>
                                </div>
                            </li>
                            <li class="nav-devider"></li>

                            <li class="sin-menu">
                                <a class="has-arrow " href="#" ><i class="mdi mdi-menu"></i><span class="hide-menu">Categories</span></a>
                                <div class="sin-side-submenu">
                                    <div class="sin-sub-title">Categories</div>
                                    <div class="sin-submenu-hr"></div>
                                    <i class="mdi mdi-menu sin-submenu-text"></i>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/category') ?>"> Category </a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/sub_category') ?>">Sub category</a></div></div>
                                </div>
                            </li>
                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="has-arrow " href="#" ><i class="mdi mdi-bullseye"></i><span class="hide-menu">Items</span></a>                            
                                <div class="sin-side-submenu">
                                    <div class="sin-sub-title">Items</div>
                                    <div class="sin-submenu-hr"></div>
                                    <i class="mdi mdi-bullseye sin-submenu-text"></i>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/items') ?>"> All items </a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/items/add') ?>"> Add new items</a></div></div>
                                </div>
                            </li>

                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="" href="<?php echo base_url('admin/dashboard/backup') ?>" ><i class="fa fa-cloud-download"></i><span class="hide-menu">Backup Database</span></a>
                            </li>
                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="has-arrow " href="#" ><i class="mdi mdi-file"></i><span class="hide-menu">Forms</span></a>
                                <div class="sin-side-submenu">
                                    <div class="sin-sub-title">Forms</div>
                                    <div class="sin-submenu-hr"></div>
                                    <i class="mdi mdi-file sin-submenu-text"></i>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/form/general') ?>"> Form Basic Layout </a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/form/addons') ?>"> Form Addons</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/form/material') ?>">Form Material</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/form/validation') ?>"> Form Validation</a></div></div>
                                </div>
                            </li>
                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="has-arrow " href="#" ><i class="mdi mdi-table"></i><span class="hide-menu">Tables</span></a>
                                <div class="sin-side-submenu">
                                    <div class="sin-sub-title">Tables</div>
                                    <div class="sin-submenu-hr"></div>
                                    <i class="mdi mdi-table sin-submenu-text"></i>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/table/basic') ?>">Basic Tables </a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/table/layout') ?>">Table Layouts</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/table/datatable') ?>">Data Tables</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/table/editable') ?>">Editable Table</a></div></div>
                                </div>
                            </li>
                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="has-arrow " href="#" ><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Ui Elements</span></a>
                                <div class="sin-side-submenu">
                                    <div class="sin-sub-title">Ui Elements</div>
                                    <div class="sin-submenu-hr"></div>
                                    <i class="mdi mdi-chart-bubble sin-submenu-text"></i>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/cards') ?>">Cards</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/buttons') ?>">Buttons</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/modals') ?>">Modals</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/tabs') ?>">Tab</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/tooltip') ?>">Tooltip stylish</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/sweet_alert') ?>">Sweet Alert</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/notification') ?>">Nofitication</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/timeline') ?>">Timeline</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/typography') ?>">Typography</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/bootstrap_ui') ?>">Bootstrap UI</a></div></div>
                                </div>
                            </li>
                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="has-arrow " href="#" ><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Sample Pages</span></a>
                                <div class="sin-side-submenu">
                                    <div class="sin-sub-title">Sample Pages</div>
                                    <div class="sin-submenu-hr"></div>
                                    <i class="mdi mdi-book-open-variant sin-submenu-text"></i>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/pages/blank') ?>"> Blank page </a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/table/login') ?>"> Login</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/table/register') ?>"> Register</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/table/lockscreen') ?>"> Lockscreen</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/table/recover') ?>"> Recover password</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/table/profile') ?>"> Profile page</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/table/invoice') ?>"> Invoice</a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/table/error') ?>"> Error Pages</a></div></div>
                                </div>
                            </li>
                            
                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="" href="<?php echo base_url('admin/ui/mail') ?>" ><i class="mdi mdi-email"></i><span class="hide-menu">Inbox</span></a>
                            </li>
                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="has-arrow " href="#" ><i class="mdi mdi-map-marker"></i><span class="hide-menu">Maps</span></a>
                                <div class="sin-side-submenu">
                                    <div class="sin-sub-title">Maps</div>
                                    <div class="sin-submenu-hr"></div>
                                    <i class="mdi mdi-map-marker sin-submenu-text"></i>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/google_map') ?>"> Google Maps </a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/vector_map') ?>"> Vector Maps</a></div></div>
                                </div>
                            </li>
                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="" href="<?php echo base_url('admin/ui/widget') ?>" ><i class="mdi mdi-widgets"></i><span class="hide-menu">Widgets</span></a>
                            </li>
                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="has-arrow " href="#" ><i class="mdi mdi-file-chart"></i><span class="hide-menu">Charts</span></a>
                                <div class="sin-side-submenu">
                                    <div class="sin-sub-title">Charts</div>
                                    <div class="sin-submenu-hr"></div>
                                    <i class="mdi mdi-file-chart sin-submenu-text"></i>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/morris_chart') ?>"> Morris Chart </a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/js_chart') ?>"> Chartjs</a></div></div>
                                </div>
                            </li>
                            <li class="nav-devider"></li>
                            <li class="sin-menu">
                                <a class="has-arrow " href="#" ><i class="mdi mdi-bullseye"></i><span class="hide-menu">Apps</span></a>
                                <div class="sin-side-submenu">
                                    <div class="sin-sub-title">Apps</div>
                                    <div class="sin-submenu-hr"></div>
                                    <i class="mdi mdi-bullseye sin-submenu-text"></i>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/calender') ?>"> Calendar </a></div></div>
                                    <div class="sin-submenu-hr"></div>
                                    <div class="sin-rel"><div class="sin-ball"> <a href="<?php echo base_url('admin/ui/contact') ?>"> Contact / Employee</a></div></div>
                                </div>
                            </li>
                        </ul>
                        <div style="height:100px"></div>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
                
            </aside>
            
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            
            <!-- Page wrapper  -->
            
            <div class="page-wrapper">
            <!-- ==========================Dynamicaly Show Main Page Content============================ -->

                <?php echo $main_content; ?>
            
            <!-- ==========================Dynamicaly Show Main Page Content============================ -->
            </div>

            <!-- End Page wrapper  -->
            <!-- footer -->
                
            <footer class="footer">
                © 2018 Macrotech Metrovic Admin Dashboard
            </footer>
            
            <!-- End footer -->
        
        
    </div>

    <!-- End Wrapper -->
    
    <!-- All Jquery -->
    
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <!--<script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() ?>assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url() ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
    
    <!-- This page plugins -->
    
    <!-- chartist chart -->
    <script src="<?php echo base_url() ?>assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/echarts/echarts-all.js"></script>
    
    <!-- Vector map JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Calendar JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/moment/moment.js"></script>
    <script src='<?php echo base_url() ?>assets/plugins/calendar/dist/fullcalendar.min.js'></script>
    <script src="<?php echo base_url() ?>assets/plugins/calendar/dist/jquery.fullcalendar.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/calendar/dist/cal-init.js"></script>
    
    <!-- sparkline chart -->
    <script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dashboard4.js"></script>

    <!-- Sweet-Alert  -->
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    
    <!-- toast notification CSS -->
    <script src="<?php echo base_url() ?>assets/plugins/toast-master/js/jquery.toast.js"></script>
    <script src="<?php echo base_url() ?>assets/js/toastr.js"></script>

    <!-- google maps api -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCUBL-6KdclGJ2a_UpmB2LXvq7VOcPT7K4&amp;sensor=true"></script>
    <script src="<?php echo base_url() ?>assets/plugins/gmaps/gmaps.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/gmaps/jquery.gmaps.js"></script>

    <!-- Vector map JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/vectormap/jvectormap.custom.js"></script>

    <!--Morris JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/morrisjs/morris.js"></script>
    <script src="<?php echo base_url() ?>assets/js/morris-data.js"></script>
    <!-- Chart JS -->
    
    <script src="<?php echo base_url() ?>assets/plugins/Chart.js/chartjs.init.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/Chart.js/Chart.min.js"></script>

    <!-- Invoice print JS -->
    <script src="<?php echo base_url() ?>assets/js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>


    <!-- Start Table js -->
    
    <!-- This is data table js -->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>

    <!-- Editable datatable-->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/tiny-editable/numeric-input-example.js"></script>
    <script>
    $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
    $('#editable-datatable').editableTableWidget().numericInputExample().find('td:first').focus();
    $(document).ready(function() {
        $('#editable-datatable').DataTable();
    });
    </script>

    <!-- End Table js -->

    <!-- Start Forms js -->

    <script src="<?php echo base_url() ?>assets/js/validation.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/summernote/dist/summernote.min.js"></script>
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input").iCheck({
            checkboxClass: "icheckbox_square-green",
            radioClass: "iradio_square-green"
        }), $(".touchspin").TouchSpin(), $(".switchBootstrap").bootstrapSwitch();
    }(window, document, jQuery);
    </script>

    <script src="<?php echo base_url() ?>assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script>
    jQuery(document).ready(function() {

        //summernone text editor
        jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
            });

        });

        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>
    <!-- End form js -->

    <!-- auto hide message div-->
    <script type="text/javascript">
        $( document ).ready(function(){
           $('.delete_msg').delay(3000).slideUp();
        });
    </script>

<script type="text/javascript">
    $( document ).ready( function() {

        $('ul.my-lg-0 > li').hover(function(){
            if ( $(this).hasClass('show') ) {
                $(this).removeClass('show');
            } else {
                $(this).addClass('show');
            }
        })

        $('ul.my-lg-0 > li, ul.my-lg-0 > li > a').click(function(ev){
            ev.stopImmediatePropagation();
        });
        
        $('li.side-profile').hover(function(){
            var dom_disp_div = $(this).children('div.sin-side-profile');
            if (dom_disp_div.hasClass('show')){
                dom_disp_div.removeClass('show');
            } else {
                dom_disp_div.addClass('show');
                
            }
        })

        $('.sidebar-nav > ul > li.sin-menu').hover(function(event){
            if($(this).hasClass('sin-menu-hover')){
                $(this).removeClass('sin-menu-hover');
            } else {
                $(this).addClass('sin-menu-hover');
            }

            if($(this).children().first().hasClass('has-arrow')) {
                var childA = $(this).children().first();
                var ooffset = childA.offset();
                var ttop,lleft;
                if($('body').hasClass('mini-sidebar')) {
                    ttop = ooffset.top - 135 + 'px';
                    lleft = '55px';
                    // lleft = ooffset.left + childA.innerWidth() +'px';
                } else {                    
                    ttop = ooffset.top - 60 + 'px';
                    lleft = '225px';
                    // lleft = ooffset.left + childA.innerWidth() +'px';
                }
                
                var nnext = childA.next();

                nnext.css('top', ttop);
                nnext.css('left', lleft);
                // nnext.css('left', '225px');

                if(nnext.hasClass('sin-show')) {
                    nnext.removeClass('sin-show');
                    nnext.css('left', '260px');
                } else {
                    nnext.addClass('sin-show');
                }
            }
        })

    })
</script>
    <!-- Style switcher -->
    
    <script src="<?php echo base_url() ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>


</body>

</html>
