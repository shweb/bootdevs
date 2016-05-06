<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    @include('header-css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset("/metronic/theme/assets/global/plugins/select2/css/select2.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/metronic/theme/assets/global/plugins/select2/css/select2-bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!--Begin header -->
        @include('header')
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            @include('sidebar')
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->

                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="/home">{{ $page_title or "Home" }}</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Portlets</span>
                            </li>
                        </ul>
                        @include('page-toolbar')
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> 應用設定
                        <small>自動化你的應用</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    @if( isset($notice) )
                        <div class="note note-info">
                            <p> {{ $notice or "" }}
                                <br> {{ $notice_details or "" }}
                                <a href="/app-auto" target="_blank"> {{ $notice_url or "" }} </a>
                            </p>
                        </div>
                    @endif
                    <div class="row" id="sortable_portlets">
                            <!--Main content here -->
                                       <div class="portlet light portlet-fit bordered form">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-red-sunglo"></i>
                                                    <span class="caption-subject font-red-sunglo bold uppercase">{{ $appname or "請選擇你的應用" }} </span>
                                                    <span class="caption-helper">來自動化 {{ $appname or "請選擇你的應用" }}</span>
                                                </div>
                                                <div class="actions">
                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                        <i class="icon-cloud-upload"></i>
                                                    </a>
                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                        <i class="icon-wrench"></i>
                                                    </a>
                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab"> 自動化配置 </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab"> 監控 </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> 應用管理
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="#tab_1_3" tabindex="-1" data-toggle="tab"> 部署代碼 </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_1_4" tabindex="-1" data-toggle="tab"> 部署歷史 </a>
                                                            </li>
                                                            <li>
                                                                <a href="#apmbindingpage" tabindex="-1" data-toggle="tab"> 第三方監控</a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_1_3" tabindex="-1" data-toggle="tab"> 手動重起 </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_1_3" tabindex="-1" data-toggle="tab"> Log </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_1_4" tabindex="-1" data-toggle="tab"> 刪除應用</a>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade active in" id="tab_1_1">
                                                        @include('app-settings-form')
                                                    </div>
                                                    <div class="tab-pane fade" id="tab_1_2">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="portlet light portlet-fit bordered">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class=" icon-layers font-green"></i>
                                                                            <span class="caption-subject font-green bold uppercase">性能</span>
                                                                        </div>
                                                                        <div class="actions">
                                                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                <i class="icon-cloud-upload"></i>
                                                                            </a>
                                                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                <i class="icon-wrench"></i>
                                                                            </a>
                                                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                                <i class="icon-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <div id="highchart_2" style="height:500px;"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="tab_1_3">
                                                        @include('code-deploy-form-select2')
                                                        @include('commit-history')
                                                    </div>
                                                    <div class="tab-pane fade" id="tab_1_4">
                                                        @include('history-list')
                                                    </div>
                                                    <div class="tab-pane fade" id="apmbindingpage">
                                                        @include('monitor-manager')
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-bottom-20"> </div>
                                                
                                            </div>

                                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            @include('quick-sidebar')
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        @include('footer')
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        @include('js-plugin')
        
        <script src="{{ asset("/metronic/theme/assets/pages/scripts/form-samples.min.js") }}" type="text/javascript"></script>
        <!--Chart plugins -->
        <script src="{{ asset("/metronic/theme/assets/pages/scripts/charts-highcharts.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/highcharts/js/highcharts.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/highcharts/js/highcharts-3d.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/highcharts/js/highcharts-more.js") }}" type="text/javascript"></script>
        
        <!--Page level plugins -->
        <script src="{{ asset("/metronic/theme/assets/pages/scripts/components-select2.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/select2/js/select2.full.min.js") }}" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->

    </body>

</html>