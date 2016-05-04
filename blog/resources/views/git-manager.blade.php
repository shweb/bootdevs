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
                    <h3 class="page-title"> Git 設定
                        <small> 第三方代碼庫管理 </small>
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
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-dark sbold "> 
                                        <img src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-512.png" width="30px"></img>  
                                        Github | 當前用戶 {{Auth::User()->name}}
                                    </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <form action="/app-benchmarking-all-now" class="form-horizontal" method="post">
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        @if ( isset($github_user) ) 
                                                        <button type="submit" class="btn red">解除</button>
                                                        @else
                                                        <button type="button" class="btn blue">綁定</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-dark sbold "> 
                                        <img src="http://freevector.co/wp-content/uploads/2013/12/37104-bit-bucket-logo.png" width="30px"></img>  
                                        Bitbucket | 當前用戶 {{Auth::User()->name}}
                                    </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <form action="/app-benchmarking-all-now" class="form-horizontal" method="post">
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        @if ( isset($bitbucket_user) ) 
                                                        <button type="submit" class="btn red">解除</button>
                                                        @else
                                                        <button type="button" class="btn blue">綁定</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-dark sbold "> 
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQQAAADCCAMAAACYEEwlAAAAh1BMVEX///8AAADs7Oz19fXW1tby8vLi4uLv7+9dXV36+vrp6emvr6/8/Pxra2vS0tLJyclOTk6YmJhYWFiNjY0qKipjY2Pb29t6enq/v786OjqBgYG3t7cdHR2enp5JSUmqqqoTExM+Pj4yMjJ0dHQkJCSRkZEPDw9+fn5CQkJpaWkZGRkuLi5SUlJlViezAAAKmUlEQVR4nOWdaXuiMBCACygqHtQL8b6vtv//962KugQnJCEkM7bvt320bDKGZO58fGDT8LBHQAA3xB4BAfwu9ggIMD1jj4AA/S/sERBg7ATYQ0AncJwm9hjQaTrOD/YY0Dk5jlPDHgQy/kUGzl8/JEdXITjYo8CldpPBH98aj4kQZtjjwMR37syxR4LIz0MIjos9FDSmTxk4Q+yxYOE6Kf7q3rhIC+GPvhATRgbOoIU9IASaToY/uC2EWRk4zhF7TLbpvMrAcfrYo7ILKIM/JgXgXUgYYY/MHkueDC674185I458GTjO5k94HN11ngwuxNgjNM9UIALn9x+Vbk8sA8c5/OrI3FxGBFfav9aSiHeyMriwb2AP1wThSUEEV+a/7rScfiuK4LYaftNLEe0LSODGOfwdyyHoboqK4Mrh2MGegTbTH/E8RWzm7xync/v6Ekg4v+ty6AzLEsGV7yn2fAoQLsQTU+Nr+WabpLJSICeGd1IdKkZEcGX1LuEJv25KBFd272BpexPxRPRYRNhzFCHhLtBnQtq48j9tyOCyNRB+J7p2RHClTjQt3B/Yk8EFksqTtNeoLIbkFkPN0m6QhporkhtSMssee95pSrMWVfkk80p4pdtKChCxsaMVogwcZ4k9/ysxqgguTLAlgHAyvtLDlsEIWwJXNlVUGUiFFs1z8PFE0MI8FljQzGtvjT31FEhHpacVVCkdFClUVWLMNkCwJBp2DWcZrK+Fxhh7ygAVy0Kgcy6ksXtSEtEPXrCZ/9fGniyPmT3TunDOhXnWtmRgJbZQlLYdGVSw55mPlZrjGvYsRdgIzBiLOJeG+YOShAMhn53pLAbSm+IDw61qXPEIKGA2lYOixQBhcltAC7KoMjYnA04NG0WM1dW1qLlR8jBlVhvPRiqTnRkZEFeXs+hErBtupVMJoGgGLb+qGOCEaLhRpwNOLkV12btHVxf77DMIxNvUyDby8pr1WfLJqc8PU1RZlfiHcVySt5teYbKaPLYkdcHxTb/+1OmsoK2toZfHoZU3OSj/Dc60eC6GIrvi92f93N5u28PeYlbgzy8cxj/19na0PQ976y/1P3/ujR6YUfWyGAKODvBYUmre5U17GbppSbc8fzrvqYhiPWp2qulHNKrRdL84KI2jlj+5jInhch+eSEEhMWt1jHlFbK1oKVUNtOuHvB3cq3QVHBojweQYKeTpgrc3QrqgbyLS1DxRVdRXV2T9uEtpOdxc8DkvUvqNyA0jVKVTcnpynq1al5/lJFns5Euacm3R5P6XmOU0dbhQl9ST2gr2axNeWhP5atBGjiRT+ILJfT6eVxU8KJbZEYaKJvz0dZccqRXENmTUt1FD8IXHzp/b2eLCRpyyu1GPCLcyOfGf6o4QT8LhKSrJWyWPCsRPElGsk6CbFm6xpPWKvkGT5EFqu4tOhcOgz/e1ePmC9ugH16e0CqhiDDpOHD/ZIHWyUrVzy8MSHqJZfHF9Z/W8QLW13gS2H9r+Iu3cuf6Xdjn4WWsGh8sTCto2CTMa9ex6P2Sk5yf4plJuoLU9TrU8hzPcnOI0OmthrxVcpNTyRMPp0wZqGU91yWCb7Yy5fOQ8HqvP1++Ns/lHs8QQDCXS04gVJjbE+s5sedvHo0xF+y6zpWyeO10o8uGQ65AWiWTwX6tjJ73K/DtlxLj5QbeB/VmKEFiV6ZXLmBwr9nU4pZ+Zb1jR2hAScvcyRjVnWgXv2I2RNQNemgqn2FqdnSR5UXO2UIp5dcbsTDO2UI7vhmb/zJztnF25jHbUZqX3yT6Tr4FwFkK1OTdfddCZL3nKes5SYL+Y+enZN7/K/yoDbDbdxtAznDt2y6vmeXS5buhMYJJRFqaZNc8WWnKFcPqAuPsqzW4X99OM44vjjpgVArtiomxiIrOauc5HODvscdqazJp6OIU5Kcx8tyrzrVX2o0xMISUFj/tE2Hh8nFAmq5efLiDO59wihNTv5rFH6XXlehnV8L/TlOtkrsMDeHxsMsX66ZXkfM4PEz2Ph07Gg3L72bOLfpBsvjE/9MbJlXz8gcmV8Jwk7wvcQTv727TCbCusJLnJf/3+4ZTryuacUA9pmqxWfRxmnMX48ZHX7uswBtxo95Wvaop/c/7/uzTNFrHfX3pusCc/6gYI5n6iqyYsc33stwNqYNbtmNQm86M9wLrO5flqKzaJ4iuF0eQ8N94SrNme5AX91Pp6pDSetdIf0vAw81Cr1EvZQKK4NANBT0IapU2BUb+FXpkUxG/jUJlKZmtR8LyTaGfDR2FVv2yvgXQVPEWfUhrpwhTIFH01l2BfK6VoAwSYlvHqiuYkFPisY2YDp+nwVCUygP7WY8CqkjltoP3+Yy0Nth1O1H5hcT6FAGNqx8vk9uv7P3Ztgf+rVomb006y5EFvFfkr3MCfLtFya9FlcmGg5PsCTxviJyRn1MXNe9CoIH91GRgv0YgZQo8j1QgSAvzpNJrOQJE48isBtCM1/J5QMtB77gkaz4NsbEutKooDnQ46Rh/0vLfUE3SWL7TRbkobrSEgW1rL6IOsKjrZWjCQy1TL9ws9ELEBpBTr1yGvtOKj0PtF/LINKG6mp+pDqZ7Ez0jIPaT5uwGhuK9yBmsK6FjXdA1DWy3t60bWrwPOVk2rAr0PVnpaFQU61bV3MSC2t9Ifqjkgv5J2GjoU66bsagVCriWkzgBCIGw+QIp+Cb8ZtL7oOpyBJL4yWjRCaUBkVQVISSilKx/Uh5Oq6gyoNeUYfOXrocaAdvGS2jNCuwKxi3cSoA4Ipbk/gGNnVtazywQqByvtOIfOHYJp7lCsqMRhQjFOcnfUtaD4cYk1i2DMn1q2P5S8V2qdFpQ4vaF1oSt0knOzHYsBvRAl/xd6gLHokgt4wYI7QjYEGIou/RwH4zoE7qFKAJMIDPg9wHoKIlKwl0gBVkSRKBG1mVYEJpCj30nGS980FSMCq0A22Fm+cM2eMTu3BReboV7Z2IBrIQ16ADl3/iC6nytwNxSjv0sLrohBu8WUU6Rg2hPMqQ5DaaYQcDJ4zUeHOM3MevbtKc4ymNnw/fE62VhOaws51XonO/kTvLKKmUUXg8+rerNmz3CL09eWXI81bg9CiweVx+2zOrYghoDfhtGuysK/FGw9NetsifiVXj3b6VQcLeXKrGtuMHFOl1CMuqS83qBDI29FsM/ppTTGiYp18sqmDjmd8wtRze/WXKxDahnkl9bu+qWpr8Eyv1nuEDO5MhD0g5wdY21Lu1HpCgrcNthBwY6wpfhiHxe2r1rRsi7sqUahUDOW6O253jaVXw0/nsjc0ro3XqEux1SusPRw3scVCTurGoXz41rqkWREcCWWHPOVQW/SXcYdPwhqXuOmWLUaXtUN/ChuzvvDsfwVDoculfaodzpFLhg+fM12g+/dbqbW9CDhe0krDnhD9rqBcqhjnwg8WlNbd27vqYXEGdyu9KUghdmiurflqPQN3h12aMeEzoNcIpGOV4zZNnwXCSS4U70O6y8s5rRLDHhEzZIupf/Zv9kSyBDEfam7n3ist0vKSfXyNIJ4XlfQBBMGn/1mhZhKqI0XhMv99iQ0tw7fvf489rGD3WZpuX4UTpfz7r4/2rbP9esteqNJfz9fNsPIDxB++39Xb5253VgMHgAAAABJRU5ErkJggg==" width="30px"></img>  
                                        Coding.net | 當前用戶 {{Auth::User()->name}}
                                    </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <form action="/app-benchmarking-all-now" class="form-horizontal" method="post">
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        @if ( isset($codingnet_user) ) 
                                                        <button type="submit" class="btn red">解除</button>
                                                        @else
                                                        <button type="button" class="btn blue">綁定</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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