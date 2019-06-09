<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Notifications</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Notifications</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                        <h4 class="m-t-0 text-info">$58,356</h4></div>
                    <div class="spark-chart">
                        <div id="monthchart"></div>
                    </div>
                </div>
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                        <h4 class="m-t-0 text-primary">$48,356</h4></div>
                    <div class="spark-chart">
                        <div id="lastmonthchart"></div>
                    </div>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Simple Toastr Alerts</h4>
                    <h6 class="card-subtitle">You can use four different alert <code>info, warning, success, and error</code> message.</h6>
                    <div class="button-box">
                        <button class="tst1 btn btn-info">Info Message</button>
                        <button class="tst2 btn btn-warning">Warning Message</button>
                        <button class="tst3 btn btn-success">Success Message</button>
                        <button class="tst4 btn btn-danger">Danger Message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-4 col-md-12">
                            <h4 class="card-title">Alert with different color</h4>
                            <h6 class="card-subtitle">use the class <code>alert alert-*colors*</code> for dezier</h6>
                            <div class="alert alert-success">This is an example top alert. You can edit what u wish. </div>
                            <div class="alert alert-danger">This is an example top alert. You can edit what u wish. </div>
                            <div class="alert alert-warning">This is an example top alert. You can edit what u wish. </div>
                            <div class="alert alert-info">This is an example top alert. You can edit what u wish. </div>
                        </div>
                        <!-- Column -->
                        <div class="col-lg-4 col-md-12">
                            <h4 class="card-title">Dissmissal Alert</h4>
                            <h6 class="card-subtitle">add the button with <code>close</code> class</h6>
                            <div class="alert alert-success"> <i class="ti-user"></i> This is an example top alert. You can edit what u wish.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="alert alert-danger"> <i class="ti-user"></i> This is an example top alert. You can edit what u wish.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="alert alert-warning"> <i class="ti-user"></i> This is an example top alert. You can edit what u wish.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="alert alert-info"> <i class="ti-user"></i> This is an example top alert. You can edit what u wish.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-lg-4 col-md-12">
                            <h4 class="card-title">Alert with image / icon </h4>
                            <h6 class="card-subtitle">add the image / icon before content </h6>
                            <div class="alert alert-success"> <i class="ti-user"></i> This is an example top alert. You can edit what u wish.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="alert alert-danger"> <img src="<?php echo base_url() ?>assets/images/users/1.jpg" width="30" class="img-circle" alt="img"> This is an example top alert. You can edit what u wish.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="alert alert-warning"> <img src="<?php echo base_url() ?>assets/images/users/1.jpg" width="30" class="img-circle" alt="img"> This is an example top alert. You can edit what u wish.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="alert alert-info"> <i class="ti-user"></i> This is an example top alert. You can edit what u wish.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-6 col-md-12">
                            <h4 class="card-title">Alert with rounded corner </h4>
                            <h6 class="card-subtitle">add the <code>alert-rounded</code> class to the alert </h6>
                            <div class="alert alert-success alert-rounded"> <i class="ti-user"></i> This is an example top alert. You can edit what u wish.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="alert alert-danger alert-rounded"> <img src="<?php echo base_url() ?>assets/images/users/1.jpg" width="30" class="img-circle" alt="img"> This is an example top alert. You can edit what u wish.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="alert alert-warning alert-rounded"> <img src="<?php echo base_url() ?>assets/images/users/1.jpg" width="30" class="img-circle" alt="img"> This is an example top alert. You can edit what u wish.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="alert alert-info alert-rounded">This is an example top alert. You can edit what u wish.
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-6 col-md-12">
                            <h4 class="card-title">Alert with content </h4>
                            <h6 class="card-subtitle">Alerts can also contain additional HTML elements </h6>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> This is an example top alert. You can edit what u wish. Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.
                            </div>
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                <h3 class="text-info"><i class="fa fa-exclamation-circle"></i> Information</h3> This is an example top alert. You can edit what u wish. Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.
                            </div>
                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning</h3> This is an example top alert. You can edit what u wish. Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->