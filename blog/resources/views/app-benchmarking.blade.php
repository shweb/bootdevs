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
                                <a href="/home">{{ $page_title or "主頁" }}</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>應用跑分</span>
                            </li>
                        </ul>
                        @include('page-toolbar')
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> 應用跑分
                        <small>評測你的應用/服務器水平</small>
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
                        <div class="col-md-6">
                            <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>跑分機器 </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="/app-benchmarking-start">
                                        <div class="form-actions top">
                                            <button type="submit" class="btn green">開始</button>
                                            @if ( isset ($select2_serverconf) )
                                            <a href="/app-wizard-begin" class="btn default">部署新應用</a>
                                            <a href="/app-optimize-begin" class="btn default">優化在跑應用</a>
                                            @endif
                                        </div>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label">IP / 域名</label>
                                                <input type="text" class="form-control" placeholder="www.yourdomain.com">
                                                <span class="help-block">www.yourdomain.com</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">高權限用戶</label>
                                                <div class="input-icon">
                                                    <i class="fa fa-bell-o"></i>
                                                    <input type="text" class="form-control" placeholder="root"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="email" class="form-control" placeholder="Email Address"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">密碼</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" placeholder="Password">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <!--
                                            <div class="form-group">
                                                <label class="control-label">Right Icon</label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-microphone"></i>
                                                    <input type="text" class="form-control" placeholder="Right icon"> </div>
                                            </div>
                                            -->
                                            <div class="form-group">
                                                <label for="select2-single-append" class="control-label">對比值</label>
                                                <div class="input-group select2-bootstrap-prepend">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" name="select2_serverconf_checked" value="checked" checked> 
                                                    </span>
                                                    <select id="select2-single-append" class="form-control select2-allow-clear spinner" name="select2_serverconf">
                                                        <option></option>
                                                        <optgroup label="跟什麼機器比較">
                                                            <option value="aws">AWS C4.large</option>
                                                            <option value="aliyun" selected="selected">Aliyun 2G 4Core</option>
                                                            <option value="linode">Linode USD80</option>
                                                            <option value="ucloud" disabled="disabled">Gitlab</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">備署</label>
                                                <input type="text" class="form-control spinner" placeholder="評測記錄備署"> </div>
                                            </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- BEGIN CHART PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-green-haze"></i>
                                        <span class="caption-subject bold uppercase font-green-haze"> 能力值</span>
                                        <span class="caption-helper">假設對比值為 100 </span>
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="fullscreen"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="chart_9" class="chart" style="height: 400px;"> </div>
                                </div>
                            </div>
                            <!-- END CHART PORTLET-->
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
                <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset("/metronic/theme/assets/global/plugins/amcharts/amcharts/amcharts.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/amcharts/amcharts/serial.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/amcharts/amcharts/pie.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/amcharts/amcharts/radar.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/amcharts/amcharts/themes/light.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/amcharts/amcharts/themes/patterns.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/amcharts/amcharts/themes/chalk.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/amcharts/ammap/ammap.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/amcharts/amstockcharts/amstock.js") }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset("/metronic/theme/assets/pages/scripts/charts-amcharts.js") }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!--Page level plugins -->
        <script src="{{ asset("/metronic/theme/assets/pages/scripts/components-select2.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/select2/js/select2.full.min.js") }}" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->

    </body>

</html>