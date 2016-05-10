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
                                <span>費用</span>
                            </li>
                        </ul>
                        @include('page-toolbar')
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> 費用管理
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
                        <div class="tabbable-line tabbable-custom-profile">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#paymentrecord" data-toggle="tab"> 消費記錄 </a>
                                </li>
                                <li>
                                    <a href="#payment" data-toggle="tab"> 充值 </a>
                                </li>
                                <li>
                                    <a href="#creditcode" data-toggle="tab"> 優惠卷 </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="paymentrecord">
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-advance table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <i class="fa fa-briefcase"></i> 產品 </th>
                                                <th class="hidden-xs">
                                                    <i class="fa fa-question"></i> 消費時間 </th>
                                                <th>
                                                    <i class="fa fa-bookmark"></i> 費用 </th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $sales_records as $key => $record)
                                            <tr>
                                                <td>
                                                    <a href="javascript:;"> {{ $key or "error" }} {{ $record['product'] or "error" }} </a>
                                                </td>
                                                <td class="hidden-xs"> {{ $record['time'] or "error" }} </td>
                                                <td> {{ $record['amount'] or "error" }}
                                                    <span class="label label-sm label-success label-mini"> 已付 </span>
                                                </td>
                                                <td>
                                                    <a href="#/sales-record-detials" class="btn dark btn-sm btn-outline sbold uppercase">
                                                        <i class="fa fa-share"></i> 查看 </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="payment">
                                <div class="portlet-body">
                                    @include('user-payment')
                                    <!-- END SAMPLE FORM PORTLET-->
                                </div>
                            </div>
                            <div class="tab-pane" id="creditcode">
                                <div class="portlet-body">
                                    <div class="portlet light bordered">
                                        <form action="/user-creditcode-save">
                                            <div class="form-group">
                                                    <label class="control-label">優惠卷碼</label>
                                                    <input type="email" placeholder="baodbqowbeqobobqwu123" class="form-control" />
                                                </div>
                                            <div class="margin-top-10">
                                                <button type="submit" class="btn green button-submit">決定</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END SAMPLE FORM PORTLET-->
                                </div>
                            </div>
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
        
        <!--Page level plugins -->
        <script src="{{ asset("/metronic/theme/assets/pages/scripts/components-select2.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/select2/js/select2.full.min.js") }}" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->

    </body>

</html>