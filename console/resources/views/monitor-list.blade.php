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
                    @include('page-toolbar', ['breadcrumb' => '第三方監控'])
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> 應用監控接入例表
                        <small>一覽所有之接入</small>
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
                            <!--Main content START -->
                            <div class="portlet">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-shopping-cart"></i> 已監控接入例表 </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <i class="fa fa-briefcase"></i> 供應商 </th>
                                                    <th class="hidden-xs">
                                                        <i class="fa fa-question"></i> 應用名 </th>
                                                    <th>
                                                        <i class="fa fa-bookmark"></i> 用戶名 </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ( $monitored_applications as $appname => $monitors)
                                                @foreach ( $monitors as $monitor )
                                                <tr>
                                                    <td>
                                                        <a href="javascript:;"> {{ $monitor['vendor'] or "error" }} </a>
                                                    </td>
                                                    <td class="hidden-xs"> {{ $appname or "error" }} </td>
                                                    <td> {{ Auth::User()->name }}
                                                        <span class="label label-sm label-success label-mini"> 有效 </span>
                                                    </td>
                                                    <td>
                                                        <a href="#/monitor-unbind" class="btn dark btn-sm btn-outline sbold uppercase">
                                                            <i class="fa fa-share"></i> 解綁 </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>



                            <!--Main content END -->
                                       
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