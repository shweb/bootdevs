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
                    @include('page-toolbar', ['breadcrumb' => '優化'])
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> 應用自動優化
                        <small>繼續優化，再優化</small>
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
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject font-dark sbold uppercase">一鍵優化所有應用</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <form action="/app-benchmarking-all-now" class="form-horizontal" method="post">
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn red">決定</button>
                                                        <button type="button" class="btn default">取消</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @foreach ($applications as $key => $app)
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject font-dark sbold uppercase">繼續優化： {{ $app->domainname or "你的應用" }}  </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <form action="/app-benchmarking-now?appid={{ $appid or "" }}" class="form-horizontal" method="post">
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green">優化</button>
                                                        <button type="button" class="btn default">取消</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row visible-ie8">
                                    <div class="col-md-12">
                                        <span class="label label-danger"> NOTE: </span> The Circle Dial plugin is not compatible with Internet Explorer 8 and older. </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>反應時間</h4>
                                        <input class="knob" data-angleoffset=-125 data-anglearc=250 data-fgcolor="#66EEFF" value="{{ $app->response_time_measure }} ">
                                    </div>
                                    <div class="col-md-4">
                                        <h4>并發數</h4>
                                        <input class="knob" data-angleoffset=-125 data-anglearc=250 data-fgcolor="#FFEE66" value="{{ $app->request_per_sec_measure }}">
                                    </div>
                                    <div class="col-md-4">
                                        <h4>帶寬</h4>
                                        <input class="knob" data-angleoffset=-125 data-anglearc=250 data-fgcolor="#11EE66" value="{{ $app->bandwidth_per_request_measure }}">
                                    </div>
                                </div>

                                <!--
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Disable display input</h4>
                                        <input class="knob" data-width="100" data-displayinput=false value="35"> </div>
                                    <div class="col-md-4">
                                        <h4>Cursor Mode</h4>
                                        <input class="knob" data-width="150" data-cursor=true data-fgcolor="#222222" data-thickness=.3 value="29"> </div>
                                    <div class="col-md-4">
                                        <h4>Display previous value</h4>
                                        <input class="knob" data-width="200" data-min="-100" data-displayprevious=true value="44"> </div>
                                </div>
                                -->
                            </div>
                        </div>
                    @endforeach
                        <!-- END PORTLET-->
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

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset("/metronic/theme/assets/global/plugins/jquery-knob/js/jquery.knob.js") }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset("/metronic/theme/assets/pages/scripts/components-knob-dials.min.js") }}" type="text/javascript"></script>


        <!--Page level plugins -->
        <script src="{{ asset("/metronic/theme/assets/pages/scripts/components-select2.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/select2/js/select2.full.min.js") }}" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->

    </body>
</html>