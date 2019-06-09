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
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Select 2</h4>
                                <h6 class="card-subtitle"> Select2 for custom search and select</h6>
                                <h5 class="m-t-30">Single select2</h5>
                                <select class="select2" style="width: 100%">
                                    <option>Select</option>
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                    <optgroup label="Central Time Zone">
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>
                                    </optgroup>
                                    <optgroup label="Eastern Time Zone">
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="IN">Indiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="OH">Ohio</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WV">West Virginia</option>
                                    </optgroup>
                                </select>
                                <h5 class="m-t-20">Multiple select boxes</h5>
                                <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                    <optgroup label="Central Time Zone">
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>
                                    </optgroup>
                                    <optgroup label="Eastern Time Zone">
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="IN">Indiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="OH">Ohio</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WV">West Virginia</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bootstrap Select boxes</h4>
                                <h6 class="card-subtitle">Just add bootstrap-select-min.js and same css & add class <code>.selectpicker</code> to select</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="m-t-30 m-b-10">Select box</h5>
                                        <select class="selectpicker" data-style="form-control btn-secondary">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="m-t-30 m-b-10">Select boxes with optgroups</h5>
                                        <select class="selectpicker" data-style="form-control btn-secondary">
                                            <optgroup label="Picnic">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </optgroup>
                                            <optgroup label="Camping">
                                                <option>Tent</option>
                                                <option>Flashlight</option>
                                                <option>Toilet Paper</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="m-t-30">Multiple select boxes</h5>
                                        <select class="selectpicker" multiple data-style="form-control btn-secondary">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="m-t-30">With colored Button Classes</h5>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="selectpicker m-b-20 m-r-10" data-style="btn-primary">
                                            <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                                            <option data-tokens="mustard">Burger, Shake and a Smile</option>
                                            <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="selectpicker m-b-20 m-r-10" data-style="btn-info btn-outline-info">
                                            <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                                            <option data-tokens="mustard">Burger, Shake and a Smile</option>
                                            <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="selectpicker m-b-20 m-r-10" data-style="btn-warning ">
                                            <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                                            <option data-tokens="mustard">Burger, Shake and a Smile</option>
                                            <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="selectpicker m-b-20 m-r-10" data-style="btn-danger">
                                            <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                                            <option data-tokens="mustard">Burger, Shake and a Smile</option>
                                            <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="selectpicker m-b-20 m-r-10" data-style="btn-success">
                                            <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                                            <option data-tokens="mustard">Burger, Shake and a Smile</option>
                                            <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="selectpicker m-b-20" data-style="btn-default">
                                            <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                                            <option data-tokens="mustard">Burger, Shake and a Smile</option>
                                            <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Switcher</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="box-title">Basic</h4>
                                        <p class="text-muted  font-13"> add the following line <code> class="js-switch" data-color="#009efb"</code> to your input element. </p>
                                        <div class="switchery-demo m-b-30">
                                            <input type="checkbox" checked class="js-switch" data-color="#009efb" />
                                            <input type="checkbox" checked class="js-switch" data-color="#f62d51" />
                                            <input type="checkbox" checked class="js-switch" data-color="#26c6da" />
                                            <input type="checkbox" checked class="js-switch" data-color="#ffbc34" />
                                            <input type="checkbox" checked class="js-switch" data-color="#7460ee" />
                                            <input type="checkbox" checked class="js-switch" data-color="#3d3b3b" /> </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h4 class="box-title">Sizes</h4>
                                        <p class="text-muted font-13"> You can add <code> data-size="small",data-size="large"</code> to your input element for different sizes. </p>
                                        <div class="m-b-30">
                                            <input type="checkbox" checked class="js-switch" data-color="#f62d51" data-size="small" />
                                            <input type="checkbox" checked class="js-switch" data-color="#26c6da" />
                                            <input type="checkbox" checked class="js-switch" data-color="#ffbc34" data-size="large" /> </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h4 class="box-title">Secondary color</h4>
                                        <p class="text-muted font-13"> You can apply <code> data-color="@color" data-secondary-color="@color"</code> to your input element to both color. </p>
                                        <div class="m-b-30">
                                            <input type="checkbox" class="js-switch" data-color="#26c6da" data-secondary-color="#f62d51" />
                                            <input type="checkbox" class="js-switch" data-color="#009efb" data-secondary-color="#7460ee" /> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Input Tags</h4>
                                <h6 class="card-subtitle">Add <code>data-role="tagsinput"</code> to your input field & its automatically change it to a tags input.</h6>
                                <div class="tags-default">
                                    <input type="text" value="Amsterdam,Washington,Sydney" data-role="tagsinput" placeholder="add tags" /> </div>
                                <h4 class="card-title m-t-30">Select Tags</h4>
                                <h6 class="card-subtitle">You can also use <code>select multiple</code> to your input field.</h6>
                                <select multiple data-role="tagsinput">
                                    <option value="Amsterdam">Amsterdam</option>
                                    <option value="Washington">Washington</option>
                                    <option value="Sydney">Sydney</option>
                                </select>
                                <h4 class="card-title  m-t-30">Input Group Tags</h4>
                                <h6 class="card-subtitle">You can also use group tag <code>data-role="tagsinput"</code> to your input field.</h6>
                                <div class="input-group  m-t-20 m-b-30"> <span class="input-group-addon">Tags</span>
                                    <input type="text" value="Amsterdam,Washington,Sydney" data-role="tagsinput" placeholder="add tags"> </div>
                                <div class="input-group">
                                    <input type="text" value="Amsterdam,Washington,Sydney" data-role="tagsinput" placeholder="add tags"> <span class="input-group-addon">Tags</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- Row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bootstrap TouchSpin</h4>
                                <h6 class="card-subtitle">Use the <code> data-plugin="touchSpin" </code> to create a Bootstrap style spinner.</h6>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form class="p-r-20">
                                            <div class="form-group">
                                                <label class="control-label">Vertical Touchspin</label>
                                                <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="" name="vertical-spin"> </div>
                                            <div class="form-group">
                                                <label class="control-label">Postfix</label>
                                                <input id="tch1" type="text" value="55" name="tch1" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"> </div>
                                            <div class="form-group m-b-0">
                                                <label class="control-label">Prefix</label>
                                                <input id="tch2" type="text" value="0" name="tch2" class=" form-control" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"> </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-6">
                                        <form>
                                            <div class="form-group">
                                                <label class="control-label">Init </label>
                                                <input id="tch3" type="text" value="" name="tch3" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"> </div>
                                            <div class="form-group">
                                                <label class="control-label">Value set 30 </label>
                                                <input id="tch3_22" type="text" value="30" name="tch3_22" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"> </div>
                                            <div class="form-group m-b-0">
                                                <label class="control-label">Button group</label>
                                                <div class="input-group">
                                                    <input id="tch5" type="text" class="form-control" name="tch5" value="50" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-secondary btn-outline dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
                                                        <div class="dropdown-menu"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                                                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="#">Separated link</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Text Editor</h4>
                                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="summernote">
                                    <h3>Default Summernote</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="inline-editor">
                                    <h4 class="card-title m-b-40">You can select content and edit inline</h4>
                                    <h3>Title Heading will be <b>apear here</b></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitconsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud Exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <ul class="list-icons">
                                        <li><i class="fa fa-check text-success"></i> Lorem ipsum dolor sit amet</li>
                                        <li><i class="fa fa-check text-success"></i> Consectetur adipiscing elit</li>
                                        <li><i class="fa fa-check text-success"></i> Integer molestie lorem at massa </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="click2edit m-b-40">Click on Edite button and change the text then save it.</div>
                                <button id="edit" class="btn btn-info btn-rounded" onclick="edit()" type="button">Edit</button>
                                <button id="save" class="btn btn-success btn-rounded" onclick="save()" type="button">Save</button>
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