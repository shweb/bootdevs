<div class="portlet light portlet-fit bordered">
    <div class="portlet-title">
        <div class="caption">
            <img src="{{ $apm_logo }}" width="50px"> </img>
            <span class="caption-subject font-red sbold uppercase">{{ $apm_vendor or 'select vendor'}}</span>
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
            <a href="javascript:;" class="reload"> </a>
            <a href="javascript:;" class="fullscreen"> </a>
            <a href="javascript:;" class="remove"> </a>
        </div>
    </div>
    <div class="portlet-body">
        <!-- BEGIN FORM-->
        <form action="/monitor-manager-save?vendor={{ $apm_vendor }}&appid={{ $appid }}" method="post">
            {!! csrf_field() !!}
            <div class="form-body">
                <div class="form-group form-md-line-input form-md-floating-label has-warning">
                    <input type="text" class="form-control" id="form_control_1" name="apm_license_key" value={{ $apm_license_key or "" }}>
                    <label for="form_control_1">對應 {{ $appname }} 的授权编号 License Key</label>
                    <span class="help-block">在 New Relic 中 添加应用會顯示</span>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label has-success">
                    <input type="text" class="form-control" id="form_control_1" name="apm_app_secret" value={{ $apm_app_secret or "" }}>
                    <label for="form_control_1">App Secret (如適用)</label>
                    <span class="help-block">非必要</span>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label has-error">
                    <input type="text" class="form-control" id="form_control_1" name="apm_email" value={{ $apm_email or "" }}>
                    <label for="form_control_1">EMAIL </label>
                    <span class="help-block">非必要</span>
                </div>
                <div class="form-group form-md-line-input form-md-floating-label">
                    <input type="text" class="form-control" id="form_control_1" name="apm_user" value={{ $apm_user or "" }}>
                    <label for="form_control_1">用戶名</label>
                    <span class="help-block">非必要</span>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn dark">提交</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>