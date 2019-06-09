 <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Ui-Bootstrap</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Bootstrap</li>
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
                                <div class="row">
                                    <div class="col-lg-6 m-b-30">
                                        <h4 class="card-title">Badges</h4>
                                        <h6 class="card-subtitle">Use class <code>.badge</code> and for colors <code>badge-success</code> for get desire badge.</h6>
                                        <h1>Example heading <span class="badge badge-default">New</span></h1>
                                        <h2>Example heading <span class="badge badge-success">New</span></h2>
                                        <h3>Example heading <span class="badge badge-info">New</span></h3>
                                        <h4>Example heading <span class="badge badge-primary">New</span></h4>
                                        <h5>Example heading <span class="badge badge-danger">New</span></h5>
                                        <h6>Example heading <span class="badge badge-warning">New</span></h6>
                                    </div>
                                    <div class="col-lg-3 m-b-30">
                                        <h4 class="card-title">Contextual Badge variations</h4>
                                        <h6 class="card-subtitle">Use class <code>.badge</code> and for colors <code>badge-success</code> for get desire badge.</h6>
                                        <span class="badge badge-default">Default</span>
                                        <br/>
                                        <span class="badge badge-primary">Primary</span>
                                        <br/>
                                        <span class="badge badge-success">Success</span>
                                        <br/>
                                        <span class="badge badge-info">Info</span>
                                        <br/>
                                        <span class="badge badge-warning">Warning</span>
                                        <br/>
                                        <span class="badge badge-danger">Danger</span>
                                    </div>
                                    <div class="col-lg-3 m-b-30">
                                        <h4 class="card-title">Pill badges</h4>
                                        <h6 class="card-subtitle">Use class <code>.badge-pill</code> and for colors <code>badge-success</code> for get desire badge.</h6>
                                        <span class="badge badge-pill badge-default">Default</span>
                                        <br/>
                                        <span class="badge badge-pill badge-primary">Primary</span>
                                        <br/>
                                        <span class="badge badge-pill badge-success">Success</span>
                                        <br/>
                                        <span class="badge badge-pill badge-info">Info</span>
                                        <br/>
                                        <span class="badge badge-pill badge-warning">Warning</span>
                                        <br/>
                                        <span class="badge badge-pill badge-danger">Danger</span>
                                    </div>
                                    <div class="col-12">
                                        <br>
                                        <br>
                                        <hr>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-lg-5 m-b-30">
                                        <h4 class="card-title">Collapse (Toggle)</h4>
                                        <h6 class="card-subtitle">click below button, for Use a link with the <code>href</code> attribute, with class <code>.collapse</code> get desire toggle.</h6>
                                        <p>
                                            <a class="btn btn-info" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Link with href
                                      </a>
                                            <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                Button with data-target
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 offset-lg-1">
                                        <h4 class="card-title">Accordion example</h4>
                                        <h6 class="card-subtitle">Extend the default collapse behavior to create an accordion.<code><a href="#code" data-toggle="collapse" class="text-danger">Get HTMl</a></code></h6>
                                        <div class="collapse" id="code">
                                            <div class="card card-body">
                                                <pre>
                                        <code class="language-html" data-lang="html"><span class="nt">&lt;div</span> <span class="na">id=</span><span class="s">"accordionexample"</span> <span class="na">class=</span><span class="s">"accordion"</span> <span class="na">role=</span><span class="s">"tablist"</span> <span class="na">aria-multiselectable=</span><span class="s">"true"</span><span class="nt">&gt;</span>
                                          <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card"</span><span class="nt">&gt;</span>
                                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-header"</span> <span class="na">role=</span><span class="s">"tab"</span> <span class="na">id=</span><span class="s">"headingOne"</span><span class="nt">&gt;</span>
                                              <span class="nt">&lt;h5</span> <span class="na">class=</span><span class="s">"mb-0"</span><span class="nt">&gt;</span>
                                                <span class="nt">&lt;a</span> <span class="na">data-toggle=</span><span class="s">"collapse"</span> <span class="na">data-parent=</span><span class="s">"#accordionexample"</span> <span class="na">href=</span><span class="s">"#collapseexaOne"</span> <span class="na">aria-expanded=</span><span class="s">"true"</span> <span class="na">aria-controls=</span><span class="s">"collapseexaOne"</span><span class="nt">&gt;</span>
                                                  Collapsible Group Item #1
                                                <span class="nt">&lt;/a&gt;</span>
                                              <span class="nt">&lt;/h5&gt;</span>
                                            <span class="nt">&lt;/div&gt;</span>

                                            <span class="nt">&lt;div</span> <span class="na">id=</span><span class="s">"collapseexaOne"</span> <span class="na">class=</span><span class="s">"collapse show"</span> <span class="na">role=</span><span class="s">"tabpanel"</span> <span class="na">aria-labelledby=</span><span class="s">"headingOne"</span><span class="nt">&gt;</span>
                                              <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-body"</span><span class="nt">&gt;</span>
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                              <span class="nt">&lt;/div&gt;</span>
                                            <span class="nt">&lt;/div&gt;</span>
                                          <span class="nt">&lt;/div&gt;</span>
                                          <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card"</span><span class="nt">&gt;</span>
                                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-header"</span> <span class="na">role=</span><span class="s">"tab"</span> <span class="na">id=</span><span class="s">"headingTwo"</span><span class="nt">&gt;</span>
                                              <span class="nt">&lt;h5</span> <span class="na">class=</span><span class="s">"mb-0"</span><span class="nt">&gt;</span>
                                                <span class="nt">&lt;a</span> <span class="na">class=</span><span class="s">"collapsed"</span> <span class="na">data-toggle=</span><span class="s">"collapse"</span> <span class="na">data-parent=</span><span class="s">"#accordionexample"</span> <span class="na">href=</span><span class="s">"#collapseexaTwo"</span> <span class="na">aria-expanded=</span><span class="s">"false"</span> <span class="na">aria-controls=</span><span class="s">"collapseexaTwo"</span><span class="nt">&gt;</span>
                                                  Collapsible Group Item #2
                                                <span class="nt">&lt;/a&gt;</span>
                                              <span class="nt">&lt;/h5&gt;</span>
                                            <span class="nt">&lt;/div&gt;</span>
                                            <span class="nt">&lt;div</span> <span class="na">id=</span><span class="s">"collapseexaTwo"</span> <span class="na">class=</span><span class="s">"collapse"</span> <span class="na">role=</span><span class="s">"tabpanel"</span> <span class="na">aria-labelledby=</span><span class="s">"headingTwo"</span><span class="nt">&gt;</span>
                                              <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-body"</span><span class="nt">&gt;</span>
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                              <span class="nt">&lt;/div&gt;</span>
                                            <span class="nt">&lt;/div&gt;</span>
                                          <span class="nt">&lt;/div&gt;</span>
                                          <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card"</span><span class="nt">&gt;</span>
                                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-header"</span> <span class="na">role=</span><span class="s">"tab"</span> <span class="na">id=</span><span class="s">"headingThree"</span><span class="nt">&gt;</span>
                                              <span class="nt">&lt;h5</span> <span class="na">class=</span><span class="s">"mb-0"</span><span class="nt">&gt;</span>
                                                <span class="nt">&lt;a</span> <span class="na">class=</span><span class="s">"collapsed"</span> <span class="na">data-toggle=</span><span class="s">"collapse"</span> <span class="na">data-parent=</span><span class="s">"#accordionexample"</span> <span class="na">href=</span><span class="s">"#collapseexaThree"</span> <span class="na">aria-expanded=</span><span class="s">"false"</span> <span class="na">aria-controls=</span><span class="s">"collapseexaThree"</span><span class="nt">&gt;</span>
                                                  Collapsible Group Item #3
                                                <span class="nt">&lt;/a&gt;</span>
                                              <span class="nt">&lt;/h5&gt;</span>
                                            <span class="nt">&lt;/div&gt;</span>
                                            <span class="nt">&lt;div</span> <span class="na">id=</span><span class="s">"collapseexaThree"</span> <span class="na">class=</span><span class="s">"collapse"</span> <span class="na">role=</span><span class="s">"tabpanel"</span> <span class="na">aria-labelledby=</span><span class="s">"headingThree"</span><span class="nt">&gt;</span>
                                              <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-body"</span><span class="nt">&gt;</span>
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. 
                                              <span class="nt">&lt;/div&gt;</span>
                                            <span class="nt">&lt;/div&gt;</span>
                                          <span class="nt">&lt;/div&gt;</span>
                                        <span class="nt">&lt;/div&gt;</span></code>
                                            </pre>
                                            </div>
                                        </div>
                                        <div id="accordion2" class="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingOne">
                                                    <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapse1" aria-expanded="true" aria-controls="collapseOne">
                                              Collapsible Group Item #1
                                            </a>
                                          </h5>
                                                </div>
                                                <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse2" aria-expanded="false" aria-controls="collapseTwo">
                                              Collapsible Group Item #2
                                            </a>
                                          </h5>
                                                </div>
                                                <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingThree">
                                                    <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse3" aria-expanded="false" aria-controls="collapseThree">
                                              Collapsible Group Item #3
                                            </a>
                                          </h5>
                                                </div>
                                                <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <br>
                                        <br>
                                        <hr>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-lg-6 m-b-30">
                                        <h4 class="card-title">Label Example</h4>
                                        <h6 class="card-subtitle">Use class <code>.label </code> for get desire text.</h6>
                                        <h1>Example heading <span class="label label-inverse">New</span></h1>
                                        <h2>Example heading <span class="label label-success">New</span></h2>
                                        <h3>Example heading <span class="label label-info">New</span></h3>
                                        <h4>Example heading <span class="label label-primary">New</span></h4>
                                        <h5>Example heading <span class="label label-danger">New</span></h5>
                                        <h6>Example heading <span class="label label-warning">New</span></h6>
                                    </div>
                                    <div class="col-lg-3 m-b-30">
                                        <h4 class="card-title">Contextual Label variations</h4>
                                        <h6 class="card-subtitle">Use class <code>.label</code> and for colors <code>label-success & .label-light-success</code> for get desire label.</h6>
                                        <span class="label label-inverse">Default</span> <span class="label label-light-inverse">Default</span>
                                        <br>
                                        <span class="label label-primary">Primary</span> <span class="label label-light-primary">Primary</span>
                                        <br>
                                        <span class="label label-success">Success</span> <span class="label label-light-success">Success</span>
                                        <br>
                                        <span class="label label-info">Info</span> <span class="label label-light-info">Info</span>
                                        <br>
                                        <span class="label label-warning">Warning</span> <span class="label label-light-warning">Warning</span>
                                        <br>
                                        <span class="label label-danger">Danger</span> <span class="label label-light-danger">Danger</span>
                                    </div>
                                    <div class="col-lg-3 m-b-30">
                                        <h4 class="card-title">Label rounded</h4>
                                        <h6 class="card-subtitle">Use class <code>.label .label-rounded</code> and for colors <code>label-success</code> for get desire label.</h6>
                                        <span class="label label-rounded label-inverse">Default</span>
                                        <br>
                                        <span class="label label-rounded label-primary">Primary</span>
                                        <br>
                                        <span class="label label-rounded label-success">Success</span>
                                        <br>
                                        <span class="label label-rounded label-info">Info</span>
                                        <br>
                                        <span class="label label-rounded label-warning">Warning</span>
                                        <br>
                                        <span class="label label-rounded label-danger">Danger</span>
                                    </div>
                                    <div class="col-12">
                                        <br>
                                        <br>
                                        <hr>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-lg-4 m-b-30">
                                        <h4 class="card-title">Simple pagination</h4>
                                        <h6 class="card-subtitle">To make pagination give class <code>pagination</code> to ul</h6>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-lg-4 m-b-30">
                                        <h4 class="card-title">Working with icons</h4>
                                        <h6 class="card-subtitle">To make pagination give class <code>pagination</code> to ul</h6>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-lg-4 m-b-30">
                                        <h4 class="card-title">Disabled and active states</h4>
                                        <h6 class="card-subtitle">To make pagination active or disable give class <code>.disabled & .active</code> to ul</h6>
                                        <nav aria-label="...">
                                            <ul class="pagination">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active">
                                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-12">
                                        <br>
                                        <br>
                                        <hr>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-lg-4 m-b-30">
                                        <h4 class="card-title">Sizing</h4>
                                        <h6 class="card-subtitle">Fancy larger or smaller pagination? Add<code>.pagination-lg </code> for additional sizes.</h6>
                                        <nav aria-label="...">
                                            <ul class="pagination pagination-lg">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-lg-4 m-b-30">
                                        <h4 class="card-title">Sizing</h4>
                                        <h6 class="card-subtitle">Fancy larger or smaller pagination? Add<code>.pagination-sm </code> for additional sizes.</h6>
                                        <nav aria-label="...">
                                            <ul class="pagination pagination-sm">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-lg-4 m-b-30">
                                        <h4 class="card-title">Alignment</h4>
                                        <h6 class="card-subtitle">Change the alignment of pagination components with felxbox <code>justify-content-center, justify-content-end, </code></h6>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-12">
                                        <br>
                                        <br>
                                        <hr>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-lg-4 m-b-30">
                                        <h4 class="card-title">Image with round corner</h4>
                                        <h6 class="card-subtitle"><code>.img-rounded</code></h6>
                                        <img src="../assets/images/big/img1.jpg" alt="image" class="img-responsive img-rounded" width="200">
                                        <p class="m-t-15 m-b-0">
                                    </div>
                                    <div class="col-lg-4 text-center m-b-30">
                                        <h4 class="card-title">Image with circle</h4>
                                        <h6 class="card-subtitle"><code>.img-circle</code> Make sure the image is square not ractangle</h6>
                                        <img src="../assets/images/users/5.jpg" alt="image" class="img-circle" width="290">
                                        <p class="m-t-15 m-b-0">
                                    </div>
                                    <div class="col-lg-4">
                                        <h4 class="card-title">Image with Thumbnail</h4>
                                        <h6 class="card-subtitle"><code>img-thumbnail</code></h6>
                                        <img src="../assets/images/big/img5.jpg" alt="image" class="img-responsive img-thumbnail" width="200">
                                        <p class="m-t-15 m-b-0">
                                    </div>
                                    <div class="col-12">
                                        <br>
                                        <br>
                                        <hr>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="card-title">jumbotron</h4>
                                        <h6 class="card-subtitle">A lightweight, flexible component that can optionally extend the entire viewport to showcase key marketing messages on your site.</h6>
                                        <div class="jumbotron">
                                            <h1 class="display-3">Hello, world!</h1>
                                            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                                            <hr class="my-4">
                                            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                                            <p class="lead">
                                                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="card-title">Fluid jumbotron</h4>
                                        <h6 class="card-subtitle">To make the jumbotron full width, and without rounded corners, add the <code>jumbotron-fluid</code></h6>
                                        <div class="jumbotron jumbotron-fluid">
                                            <div class="container">
                                                <h1 class="display-3">Fluid jumbotron</h1>
                                                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                                            </div>
                                        </div>
                                    </div>
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
            <!-- ============================================================== -->