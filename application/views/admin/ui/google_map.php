<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Google map</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Google map</li>
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
                    <h4 class="card-title">Simple Basic Map</h4>
                    <div id="gmaps-simple" class="gmaps"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Market with Info window</h4>
                    <div id="markermap" class="gmaps"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Over Layer Map</h4>
                    <div id="overlayermap" class="gmaps"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Polygonal Map</h4>
                    <div id="polymap" class="gmaps"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Routes Map</h4>
                    <div id="routesmap" class="gmaps"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Styled Map</h4>
                    <div id="styledmap" class="gmaps"></div>
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