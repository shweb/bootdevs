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
        <link href="{{ asset("/metronic/theme/assets/pages/css/profile-2.min.css") }}" rel="stylesheet" type="text/css" />
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
 
                        <!-- BEGIN PAGE TITLE-->
                        <h3 class="page-title"> 管理你的賬號
                            <small></small>
                        </h3>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="profile">
                            <div class="tabbable-line tabbable-full-width">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab"> 账户信息 </a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab"> 個人信息 </a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_6" data-toggle="tab"> 交易紀錄 </a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_7" data-toggle="tab"> 通知 </a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_8" data-toggle="tab"> API </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <ul class="list-unstyled profile-nav">
                                                    <li>
                                                        <img src="{{ asset("/metronic/theme/assets/pages/media/profile/people19.png") }}" class="img-responsive pic-bordered" alt="" />
                                                        <a href="javascript:;" class="profile-edit"> edit </a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a href="javascript:;"> 账户余额 
                                                            <span> {{ Auth::User()->moneyleft }} 999 </span>
                                                        </a>
                                                    </li>
                                                    <!--
                                                    <li>
                                                        <a href="javascript:;"> Messages
                                                            <span> 3 </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Friends </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Settings </a>
                                                    </li>
                                                    -->
                                                </ul>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-8 profile-info">
                                                        <h1 class="font-green sbold uppercase"> {{ Auth::User()->name }} </h1>
                                                        <p> 当前套餐： {{ Auth::User()->package }}
                                                            </p>
                                                        <p>
                                                            <a href="javascript:;"> {{ Auth::User()->website }} </a>
                                                        </p>
                                                        <ul class="list-inline">
                                                            <li>
                                                                <i class="fa fa-map-marker"></i> {{ Auth::User()->country }} </li>
                                                            <li>
                                                                <i class="fa fa-calendar"></i> {{ Auth::User()->birth }} </li>
                                                            <li>
                                                                <i class="fa fa-briefcase"></i> {{ Auth::User()->occuption }} </li>
                                                            <li>
                                                                <i class="fa fa-star"></i> {{ Auth::User()->nick }} </li>
                                                            <li>
                                                                <i class="fa fa-heart"></i> {{ Auth::User()->interest }} </li>
                                                        </ul>
                                                    </div>
                                                    <!--end col-md-8-->
                                                    <div class="col-md-4">
                                                        <div class="portlet sale-summary">
                                                            <div class="portlet-title">
                                                                <div class="caption font-red sbold"> 成果 </div>
                                                                <div class="tools">
                                                                    <a class="reload" href="javascript:;"> </a>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <ul class="list-unstyled">
                                                                    <li>
                                                                        <span class="sale-info"> 已優化應用
                                                                            <i class="fa fa-img-up"></i>
                                                                        </span>
                                                                        <span class="sale-num"> 23 </span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="sale-info"> 已部署代碼次
                                                                            <i class="fa fa-img-down"></i>
                                                                        </span>
                                                                        <span class="sale-num"> 87 </span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="sale-info"> 性能提升 </span>
                                                                        <span class="sale-num"> 2377 </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-md-4-->
                                                </div>
                                                <!--end row-->
                                                <div class="tabbable-line tabbable-custom-profile">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a href="#tab_1_11" data-toggle="tab"> 消費記錄 </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_1_22" data-toggle="tab"> 按次消費 </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab_1_11">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--tab_1_2-->
                                    <div class="tab-pane" id="tab_1_3">
                                        <div class="row profile-account">
                                            <div class="col-md-3">
                                                <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                    <li class="active">
                                                        <a data-toggle="tab" href="#tab_1-1">
                                                            <i class="fa fa-cog"></i> 個人信息 </a>
                                                        <span class="after"> </span>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="tab" href="#tab_2-2">
                                                            <i class="fa fa-picture-o"></i> 頭像 </a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="tab" href="#tab_3-3">
                                                            <i class="fa fa-lock"></i> 更改密碼 </a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="tab" href="#tab_4-4">
                                                            <i class="fa fa-eye"></i> 關聯 Email </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="tab-content">
                                                    <div id="tab_1-1" class="tab-pane active">
                                                        <form role="form" action="/userinfo-save">
                                                            <div class="form-group">
                                                                <label class="control-label">姓名</label>
                                                                <input type="text" placeholder="丘秉宜" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">手機</label>
                                                                <input type="text" placeholder="18621194620" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">關於</label>
                                                                <textarea class="form-control" rows="3" placeholder="寫下自己吧"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">個人網址</label>
                                                                <input type="text" placeholder="http://www.mywebsite.com" class="form-control" /> </div>
                                                            <div class="margiv-top-10">
                                                                <a href="javascript:;" class="btn green"> 保存 </a>
                                                                <a href="javascript:;" class="btn default"> 取消 </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab_2-2" class="tab-pane">
                                                        <p></p>
                                                        <form action="/save-avatar" role="form">
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> 更改头像 </span>
                                                                            <span class="fileinput-exists"> 更改 </span>
                                                                            <input type="file" name="..."> </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> 刪除 </a>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger"> NOTE! </span>
                                                                    <span> 只支持 Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 </span>
                                                                </div>
                                                            </div>
                                                            <div class="margin-top-10">
                                                                <a href="javascript:;" class="btn green"> 提交 </a>
                                                                <a href="javascript:;" class="btn default"> 取消 </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab_3-3" class="tab-pane">
                                                        <form action="/valid-change-password" id="submit_form">
                                                            <div class="form-group">
                                                                <label class="control-label">現在密碼</label>
                                                                <input type="password" placeholder="old password" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">更改密碼</label>
                                                                <input type="password" placeholder="new password" name="password" class="form-control" id="submit_form_password"/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">確應密碼</label>
                                                                <input type="password" placeholder="retype password" name="rpassword" class="form-control" /> </div>
                                                            <div class="margin-top-10">
                                                                <a href="javascript:;" class="btn green"> Change Password </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab_4-4" class="tab-pane">
                                                        <form action="/save-new-email">
                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                        <tr>
                                                                            <th>
                                                                                <i class="fa fa-briefcase"></i> Email </th>
                                                                            <th class="hidden-xs">
                                                                                <i class="fa fa-question"></i> 解綁 </th>
                                                                            <th> </th>
                                                                        </tr>
                                                                </thead>
                                                                @foreach ( $current_user_emails as $key => $email )
                                                                <tr>
                                                                    <td> 
                                                                        {{ $email or "error" }}
                                                                        <span class="label label-sm label-success label-mini"> {{ $key or "error" }} </span>
                                                                    </td>
                                                                    <td>
                                                                        <label class="uniform-inline">
                                                                            <input type="checkbox" value="" /> 刪除 </label>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </table>
                                                             <div class="form-group">
                                                                    <label class="control-label">新增EMAIL</label>
                                                                    <input type="email" placeholder="Email 地址" class="form-control" />
                                                                </div>
                                                            <!--end profile-settings-->
                                                            <div class="margin-top-10">
                                                                <a href="javascript:;" class="btn green"> 保存 </a>
                                                                <a href="javascript:;" class="btn default"> 取消 </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-md-9-->
                                        </div>
                                    </div>
                                    <!--end tab-pane-->
                                    <div class="tab-pane" id="tab_1_6">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <i class="fa fa-briefcase"></i> 方式 </th>
                                                            <th>
                                                                <i class="fa fa-briefcase"></i> 時間 </th>
                                                            <th class="hidden-xs">
                                                                <i class="fa fa-question"></i> 充值 </th>
                                                            <th> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ( $payment as $key => $value )
                                                        <tr>
                                                            <td> 
                                                                {{ $value['product'] or "error" }}
                                                                <span class="label label-sm label-success label-mini"> {{ $key or "error" }} </span>
                                                            </td>
                                                            <td> 
                                                                {{ $value['time'] or "error" }}
                                                            </td>
                                                            <td> 
                                                                {{ $value['amount'] or "error" }}
                                                                <span class="label label-sm label-success label-mini"> {{ $value['confirmed'] or "未支付" }} </span>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end tab-pane-->
                                    <div class="tab-pane" id="tab_1_7">
                                        <div class="row">
                                            <!-- BEGIN FORM-->
                                            <form action="#" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email 通知</label>
                                                        <div class="col-md-9">
                                                            <input type="checkbox" checked class="make-switch" checked>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">微信通知</label>
                                                        <div class="col-md-9">
                                                            <input type="checkbox" class="make-switch" checked data-on-color="primary" data-off-color="info">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">手機短信</label>
                                                        <div class="col-md-9">
                                                            <input type="checkbox" class="make-switch">
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">持续集成通知</label>
                                                        <div class="col-md-9">
                                                            <div class="margin-bottom-10">
                                                                <label for="option1">在優化成功时通知我</label>
                                                                <input id="option1" type="radio" name="radio1" value="option1" class="make-switch switch-radio1"> </div>
                                                            <div class="margin-bottom-10">
                                                                <label for="option2">在優化失败时通知我</label>
                                                                <input id="option2" type="radio" name="radio1" value="option2" class="make-switch switch-radio1"> </div>
                                                            <div class="margin-bottom-10">
                                                                <label for="option3">如優化试结果发生改变，通知我</label>
                                                                <input id="option3" type="radio" name="radio1" value="option3" class="make-switch switch-radio1"> </div>
                                                        </div>
                                                    </div>
                                                    <!--
                                                    <div class="form-group last">
                                                        <label class="control-label col-md-3">Modal</label>
                                                        <div class="col-md-9">
                                                            <a href="#myModal" role="button" class="btn red btn-outline" data-toggle="modal"> View in Modal </a>
                                                        </div>
                                                    </div>
                                                    -->
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <a href="javascript:;" class="btn green">
                                                                <i class="fa fa-check"></i> 決定</a>
                                                            <a href="javascript:;" class="btn btn-outline grey-salsa">取消</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div id="myModal" class="modal fade" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <a href="javascript:;" class="close" data-dismiss="modal" aria-hidden="true"></a>
                                                            <h4 class="modal-title">Bootstrap switches</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="#" class="form-horizontal">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Default Sizes</label>
                                                                    <div class="col-md-9">
                                                                        <input type="checkbox" checked class="make-switch" data-size="small">
                                                                        <input type="checkbox" checked class="make-switch" data-size="normal">
                                                                        <input type="checkbox" checked class="make-switch" data-size="large"> </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Colors</label>
                                                                    <div class="col-md-9">
                                                                        <input type="checkbox" class="make-switch" checked data-on-color="primary" data-off-color="info">
                                                                        <input type="checkbox" class="make-switch" checked data-on-color="success" data-off-color="warning">
                                                                        <input type="checkbox" class="make-switch" checked data-on-color="warning" data-off-color="danger"> </div>
                                                                </div>
                                                                <div class="form-group last">
                                                                    <label class="control-label col-md-3">Disabled / Readonly</label>
                                                                    <div class="col-md-9">
                                                                        <input type="checkbox" checked disabled class="make-switch" />
                                                                        <input type="checkbox" checked readonly class="make-switch" /> </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="javascript:;" class="btn grey-salsa btn-outline" data-dismiss="modal">Close</a>
                                                            <a href="javascript:;" class="btn green">
                                                                <i class="fa fa-check"></i> Save changes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                    <!--end tab-pane-->
                                </div>
                            </div>
                        </div>
                    <!-- Main content END -->

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
        <script src="{{ asset("/metronic/theme/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js") }}" type="text/javascript"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/gmaps/gmaps.min.js") }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        <script src="{{ asset("/metronic/theme/assets/pages/scripts/components-select2.min.js") }}" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset("/metronic/theme/assets/global/plugins/select2/js/select2.full.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets//pages/scripts/components-bootstrap-switch.min.js") }}" type="text/javascript"></script>
        <!-- Control validation here -->
        <script src="{{ asset("/metronic/theme/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/jquery-validation/js/additional-methods.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/metronic/theme/assets/pages/scripts/form-wizard.js") }}" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->

    </body>

</html>