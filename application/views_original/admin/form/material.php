<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Forms</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Form</li>
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
                    <h4 class="card-title">Animated line inputs</h4>
                    <h6 class="card-subtitle">Just add <code>form-material</code> class to the form that's it.</h6>
                    <form class="form-material m-t-40">
                        <div class="form-group">
                            <label>Default Text <span class="help"> e.g. "George deo"</span></label>
                            <input type="text" class="form-control form-control-line" value="Some text value..."> </div>
                        <div class="form-group">
                            <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                            <input type="email" id="example-email2" name="example-email" class="form-control" placeholder="Email"> </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" value="password"> </div>
                        <div class="form-group">
                            <label>Placeholder</label>
                            <input type="text" class="form-control" placeholder="placeholder"> </div>
                        <div class="form-group">
                            <label>Text area</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Input Select</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                        </div>
                        <div class="form-group">
                            <label>Helping text</label>
                            <input type="text" class="form-control form-control-line"> <span class="help-block text-muted"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span> </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Line Inputs Forms</h4>
                    <h6 class="card-subtitle">Just add <code>form-control-line</code> class to form</h6>
                    <form class="form-control-line m-t-40">
                        <div class="form-group">
                            <label>Default Text <span class="help"> e.g. "George deo"</span></label>
                            <input type="text" class="form-control form-control-line" value="Some text value..."> </div>
                        <div class="form-group">
                            <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                            <input type="email" id="example-email2" name="example-email" class="form-control" placeholder="Email"> </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" value="password"> </div>
                        <div class="form-group">
                            <label>Placeholder</label>
                            <input type="text" class="form-control" placeholder="placeholder"> </div>
                        <div class="form-group">
                            <label>Text area</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Input Select</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                        </div>
                        <div class="form-group">
                            <label>Helping text</label>
                            <input type="text" class="form-control form-control-line"> <span class="help-block text-muted"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input States</h4>
                    <h6 class="card-subtitle">Just add <code>.has-success, .has-warning, .has-danger</code> class to the <code>.form-group</code> div. Add <code>.form-control-success, .form-control-warning, .form-control-danger</code> class in the <code>input</code> tag.</h6>
                    <form class="form-control-line m-t-40">
                        <div class="form-group has-success">
                            <label class="form-control-label" for="success">Success State</label>
                            <input type="text" class="form-control form-control-success" id="success">
                        </div>
                        <div class="form-group has-warning">
                            <label class="form-control-label" for="warning">Warning State</label>
                            <input type="text" class="form-control form-control-warning" id="warning">
                        </div>
                        <div class="form-group has-danger">
                            <label class="form-control-label" for="error">Error State</label>
                            <input type="text" class="form-control form-control-danger" id="error">
                        </div>
                        <div class="form-group has-success">
                            <label class="form-control-label" for="success">Success State with Feedback</label>
                            <input type="text" class="form-control form-control-success" id="success">
                            <div class="form-control-feedback">Success! You've done it.</div>
                        </div>
                        <div class="form-group has-warning">
                            <label class="form-control-label" for="warning">Warning State with Feedback</label>
                            <input type="text" class="form-control form-control-warning" id="warning">
                            <div class="form-control-feedback">This is last warning!!</div>
                        </div>
                        <div class="form-group has-danger">
                            <label class="form-control-label" for="error">Error State with Feedback</label>
                            <input type="text" class="form-control form-control-danger" id="error">
                            <div class="form-control-feedback">It's too dangerous!!</div>
                        </div>
                    </form>
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
<!-- ============================================================== -->