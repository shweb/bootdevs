<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-blue-hoki"></i>
            <span class="caption-subject font-blue-hoki bold uppercase">部署代碼到服務器</span>
            <span class="caption-helper">同時刷新緩存</span>
        </div>
        <div class="tools">
            <a href="" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
            <a href="" class="reload"> </a>
            <a href="" class="remove"> </a>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="/app-codesettings-save?appid={{ $appid or "" }}" class="form-horizontal" method="post">
            {!! csrf_field() !!}
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">代碼路徑</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="codepath" placeholder="/var/www/html" value={{ $codepath or "" }}>
                        <span class="help-block">代碼路徑 如 /var/www/html </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2-single-append" class="control-label col-md-3">使用已綁定這應用的 Git 庫</label>
                    <div class="col-md-4 input-group select2-bootstrap-prepend">
                        <span class="input-group-addon">
                            <input type="checkbox" name="select2_codedeploy_git_checked" value="checked" {{ $select2_codedeploy_git_checked or ""}}>
                        </span>
                        {{ 
                            Form::select(
                                'code deploy list', 
                                array( 
                                    'codingnet' =>'Coding.net', 
                                    'github' => 'github',
                                    'Bitbucket' => 'Bitbucket',
                                    'gitlab' => 'gitlab',
                                ), 
                                isset($select2_codedeploy_git) ? $select2_codedeploy_git : 'github',
                                [
                                    'id' => 'select2-single-append',
                                    'class' => 'form-control select2-allow-clear',
                                    'name' => 'select2_codedeploy_git',
                                    'disabled' => 'disabled'
                                ]
                            )
                        }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2-single-append" class="control-label col-md-3">備份數據庫</label>
                    <div class="col-md-4 input-group select2-bootstrap-prepend">
                        <span class="input-group-addon">
                            <input type="checkbox" name="select2_db_backup_checked" value="checked" {{ $select2_db_backup_checked or ""}}> </span>
                        {{ 
                            Form::select(
                                '備份數據庫', 
                                array( 
                                    'mysql' =>'MySQL', 
                                    'mariadb' => 'MariaDB',
                                    'postgresql' => 'Postgresql',
                                ), 
                                isset($select2_db_backup) ? $select2_db_backup : 'MySQL',
                                [
                                    'id' => 'select2-single-append',
                                    'class' => 'form-control select2-allow-clear',
                                    'name' => 'select2_db_backup',
                                ]
                            )
                        }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2-single-append" class="control-label col-md-3">清理緩存</label>
                    <div class="col-md-4 input-group select2-bootstrap-prepend">
                        <span class="input-group-addon">
                            <input type="checkbox" name="select2_objectcacheclear_checked" value="checked" {{ $select2_objectcacheclear_checked or "" }}> </span>
                        {{ 
                            Form::select(
                                '清理緩存', 
                                array( 
                                    'memcache' =>'memcache', 
                                    'redis' => 'Redis',
                                ), 
                                isset($select2_objectcacheclear) ? $select2_objectcacheclear : 'memcache',
                                [
                                    'id' => 'select2-single-append',
                                    'class' => 'form-control select2-allow-clear',
                                    'name' => 'select2_objectcacheclear',
                                ]
                            )
                        }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2-single-append" class="control-label col-md-3">清理頁面緩存</label>
                    <div class="col-md-4 input-group select2-bootstrap-prepend">
                        <span class="input-group-addon">
                            <input type="checkbox" name="select2_pagecacheclear_checked" value="checked" {{ $select2_pagecacheclear_checked or "" }}> 
                        </span>
                        {{ 
                            Form::select(
                                '頁緩存類', 
                                array( 
                                    'microcache' =>'Nginx microcache', 
                                    'varnishserver' => 'Varnish',
                                ), 
                                isset($select2_pagecacheclear) ? $select2_pagecacheclear : 'MySQL',
                                [
                                    'id' => 'select2-single-append',
                                    'class' => 'form-control select2-allow-clear',
                                    'name' => 'select2_pagecacheclear',
                                ]
                            )
                        }}
                    </div>
                </div>
                <div class="form-group last">
                    <label class="col-md-3 control-label">應用 ID</label>
                    <div class="col-md-4">
                        <p class="form-control-static"> {{ $appid or "select an app"}} </p>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">部署最新代碼到服務器</button>
                        <button type="button" class="btn default">取消</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>