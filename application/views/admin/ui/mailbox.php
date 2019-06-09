<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Email App</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Email App</li>
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
    

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xlg-2 col-lg-4 col-md-4">
                        <div class="card-body inbox-panel"><a href="#" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Compose</a>
                            <ul class="list-group list-group-full">
                                <li class="list-group-item active"> <a href="javascript:void(0)"><i class="mdi mdi-gmail"></i> Inbox </a><span class="badge badge-success ml-auto">6</span></li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-star"></i> Starred </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-send"></i> Draft </a><span class="badge badge-danger ml-auto">3</span></li>
                                <li class="list-group-item ">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-file-document-box"></i> Sent Mail </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-delete"></i> Trash </a>
                                </li>
                            </ul>
                            <h3 class="card-title m-t-40">Labels</h3>
                            <div class="list-group b-0 mail-list"> <a href="#" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Work</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Family</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Private</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Friends</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporate</a> </div>
                        </div>
                    </div>
                    <div class="col-xlg-10 col-lg-8 col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">Compose New Message</h3>
                            <div class="form-group">
                                <input class="form-control" placeholder="To:">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Subject:">
                            </div>
                            <div class="form-group">
                                <textarea class="textarea_editor form-control" rows="15" placeholder="Enter text ..."></textarea>
                            </div>
                            <h4><i class="ti-link"></i> Attachment</h4>
                            <form action="#" class="dropzone">
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                            <button type="submit" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> Send</button>
                            <button class="btn btn-inverse m-t-20"><i class="fa fa-times"></i> Discard</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Start Page Content -->
    <h3>Mail List</h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xlg-2 col-lg-4 col-md-4">
                        <div class="card-body inbox-panel"><a href="#" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Compose</a>
                            <ul class="list-group list-group-full">
                                <li class="list-group-item active"> <a href="javascript:void(0)"><i class="mdi mdi-gmail"></i> Inbox </a><span class="badge badge-success ml-auto">6</span></li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-star"></i> Starred </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-send"></i> Draft </a><span class="badge badge-danger ml-auto">3</span></li>
                                <li class="list-group-item ">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-file-document-box"></i> Sent Mail </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-delete"></i> Trash </a>
                                </li>
                            </ul>
                            <h3 class="card-title m-t-40">Labels</h3>
                            <div class="list-group b-0 mail-list"> <a href="#" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Work</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Family</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Private</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Friends</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporate</a> </div>
                        </div>
                    </div>
                    <div class="col-xlg-10 col-lg-8 col-md-8">
                        <div class="card-body">
                            <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-inbox-arrow-down"></i></button>
                                <button type="button" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-alert-octagon"></i></button>
                                <button type="button" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-delete"></i></button>
                            </div>
                            <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary text-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-folder font-18 "></i> </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Dropdown link</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                </div>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn text-dark btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-label font-18"></i> </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Dropdown link</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                </div>
                            </div>
                            <button type="button " class="btn btn-secondary m-r-10 m-b-10 text-dark"><i class="mdi mdi-reload font-18"></i></button>
                            <div class="btn-group m-b-10" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn m-b-10 text-dark btn-secondary p-10 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Mark as all read</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                            </div>
                        </div>
                        <div class="card-body p-t-0">
                            <div class="card b-all shadow-none">
                                <div class="inbox-center table-responsive">
                                    <table class="table table-hover no-wrap">
                                        <tbody>
                                            <tr class="unread">
                                                <td style="width:40px">
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox0" value="check">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td style="width:40px" class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Hritik Roshan</td>
                                                <td class="max-texts"> <a href="app-email-detail.html" /><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> 12:30 PM </td>
                                            </tr>
                                            <tr class="unread">
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox1" value="check">
                                                        <label for="checkbox1"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs-down">Genelia Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 13 </td>
                                            </tr>
                                            <tr class="unread">
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox2" value="check">
                                                        <label for="checkbox2"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 12 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox3" value="check">
                                                        <label for="checkbox3"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Akshay Kumar</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-warning">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 12 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox4" value="check">
                                                        <label for="checkbox4"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Hritik Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 12 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox5" value="check">
                                                        <label for="checkbox5"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs-down">Genelia Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 11 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox6" value="check">
                                                        <label for="checkbox6"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 11 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox7" value="check">
                                                        <label for="checkbox7"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Akshay Kumar</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-warning">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 11 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox8" value="check">
                                                        <label for="checkbox8"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Hritik Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 10 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox9" value="check">
                                                        <label for="checkbox9"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs-down">Genelia Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 10 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox10" value="check">
                                                        <label for="checkbox10"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 10 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox11" value="check">
                                                        <label for="checkbox11"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Akshay Kumar</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-warning">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox" id="checkbox12" value="check">
                                                        <label for="checkbox12"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Hritik Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox13" value="check">
                                                        <label for="checkbox13"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs-down">Genelia Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox14" value="check">
                                                        <label for="checkbox14"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End PAge Content -->
    


    <!-- Start Mail Details -->

    <h3>Mail Details View</h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xlg-2 col-lg-4 col-md-4">
                        <div class="card-body inbox-panel"><a href="#" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Compose</a>
                            <ul class="list-group list-group-full">
                                <li class="list-group-item active"> <a href="javascript:void(0)"><i class="mdi mdi-gmail"></i> Inbox </a><span class="badge badge-success ml-auto">6</span></li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-star"></i> Starred </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-send"></i> Draft </a><span class="badge badge-danger ml-auto">3</span></li>
                                <li class="list-group-item ">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-file-document-box"></i> Sent Mail </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-delete"></i> Trash </a>
                                </li>
                            </ul>
                            <h3 class="card-title m-t-40">Labels</h3>
                            <div class="list-group b-0 mail-list"> <a href="#" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Work</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Family</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Private</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Friends</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporate</a> </div>
                        </div>
                    </div>
                    <div class="col-xlg-10 col-lg-8 col-md-8">
                        <div class="card-body">
                            <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-inbox-arrow-down"></i></button>
                                <button type="button" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-alert-octagon"></i></button>
                                <button type="button" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-delete"></i></button>
                            </div>
                            <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary text-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-folder font-18 "></i> </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Dropdown link</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                </div>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn text-dark btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-label font-18"></i> </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Dropdown link</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                </div>
                            </div>
                            <button type="button " class="btn btn-secondary m-r-10 m-b-10 text-dark"><i class="mdi mdi-reload font-18"></i></button>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn m-b-10 text-dark btn-secondary p-10 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Mark as all read</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                            </div>
                        </div>
                        <div class="card-body p-t-0">
                            <div class="card b-all shadow-none">
                                <div class="card-body">
                                    <h3 class="card-title m-b-0">Your message title goes here</h3>
                                </div>
                                <div>
                                    <hr class="m-t-0">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex m-b-40">
                                        <div>
                                            <a href="javascript:void(0)"><img src="<?php echo base_url() ?>assets/images/users/1.jpg" alt="user" width="40" class="img-circle" /></a>
                                        </div>
                                        <div class="p-l-10">
                                            <h4 class="m-b-0">Pavan kumar</h4>
                                            <small class="text-muted">From: jonathan@domain.com</small>
                                        </div>
                                    </div>
                                    <p><b>Dear USer</b></p>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                                    <p>enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                </div>
                                <div>
                                    <hr class="m-t-0">
                                </div>
                                <div class="card-body">
                                    <h4><i class="fa fa-paperclip m-r-10 m-b-10"></i> Attachments <span>(3)</span></h4>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a href="#"> <img class="img-thumbnail img-responsive" alt="attachment" src="<?php echo base_url() ?>assets/images/big/img1.jpg"> </a>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="#"> <img class="img-thumbnail img-responsive" alt="attachment" src="<?php echo base_url() ?>assets/images/big/img2.jpg"> </a>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="#"> <img class="img-thumbnail img-responsive" alt="attachment" src="<?php echo base_url() ?>assets/images/big/img3.jpg"> </a>
                                        </div>
                                    </div>
                                    <div class="b-all m-t-20 p-20">
                                        <p class="p-b-20">click here to <a href="#">Reply</a> or <a href="#">Forward</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Mail Details -->
    
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->