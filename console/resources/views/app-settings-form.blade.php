<div class="col-lg-4">
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="/app-settings-save?appid={{ $appid or "" }}" class="form-horizontal" method="post">
            {!! csrf_field() !!}
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">事故通知 Email</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" value={{ $email or "email" }}> </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">SSH 用戶名</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="SSHuser" placeholder="root" value={{ $SSHuser or "login user" }}>
                        <span class="help-block">你的服務器用戶名</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">SSH 密碼</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="password" class="form-control" name="serverpassword" placeholder="Password">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2-single-append" class="control-label col-md-3">自動優化應用</label>
                    <div class="col-md-4 input-group select2-bootstrap-prepend">
                        <span class="input-group-addon">
                            <input type="checkbox" name="select2_appconf_checked" value="checked" {{ $select2_appconf_checked or ""}} >
                        </span>
                        {{ 
                            Form::select(
                                '現支持的應用', 
                                array( 
                                    'Drupal' =>'Drupal', 
                                    'Wordpress' => 'Wordpress',
                                    'ECShop' => 'ECShop',
                                    'Magento' => 'Magento',
                                ), 
                                isset($select2_appconf) ? $select2_appconf : 'Drupal',
                                [
                                    'id' => 'select2-single-append',
                                    'class' => 'form-control select2-allow-clear',
                                    'name' => 'select2_appconf',
                                ]
                            )
                        }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2-single-append" class="control-label col-md-3">自動故障後重起</label>
                    <div class="col-md-4 input-group select2-bootstrap-prepend">
                        <span class="input-group-addon">
                            <input type="checkbox" name="select2_reboot_checked" value="checked" {{ $select2_reboot_checked or ""}}> 
                        </span>
                        {{ 
                            Form::select(
                                '現支持的重起方法', 
                                array( 
                                    'login_reboot' =>'登錄服務器重起並加載應用', 
                                    'cloud_reboot' => '由雲賬號重起並加載應用',
                                    'Chef_reboot' => '用DevOps工具重起',
                                    'protectdb_reboot' => '保護數據並重起',
                                ), 
                                isset($select2_rebootconf) ? $select2_rebootconf : 'login_reboot',
                                [
                                    'id' => 'select2-single-append',
                                    'class' => 'form-control select2-allow-clear',
                                    'name' => 'select2_rebootconf',
                                ]
                            )
                        }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2-single-append" class="control-label col-md-3">自動優化數據庫</label>
                    <div class="col-md-4 input-group select2-bootstrap-prepend">
                        <span class="input-group-addon">
                            <input type="checkbox" name="select2_db_checked" value="checked" {{ $select2_db_checked or ""}}> 
                        </span>
                        {{ 
                            Form::select(
                                '自動優化數據庫', 
                                array( 
                                    'mysql' =>'MySQL', 
                                    'mariadb' => 'MariaDB',
                                    'postgresql' => 'Postgresql',
                                ), 
                                isset($select2_db) ? $select2_db : 'MySQL',
                                [
                                    'id' => 'select2-single-append',
                                    'class' => 'form-control select2-allow-clear',
                                    'name' => 'select2_db',
                                ]
                            )
                        }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2-single-append" class="control-label col-md-3">自動優化對象緩存</label>
                    <div class="col-md-4 input-group select2-bootstrap-prepend">
                        <span class="input-group-addon">
                            <input type="checkbox" name="select2_objectcache_checked" value="checked" {{ $select2_objectcache_checked or ""}}> 
                        </span>
                        {{ 
                            Form::select(
                                '自動優化對象緩存', 
                                array( 
                                    'memcache' =>'Memcache', 
                                    'redis' => 'Redis',
                                ), 
                                isset($select2_objectcache) ? $select2_objectcache : 'MySQL',
                                [
                                    'id' => 'select2-single-append',
                                    'class' => 'form-control select2-allow-clear',
                                    'name' => 'select2_objectcache',
                                ]
                            )
                        }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2-single-append" class="control-label col-md-3">自動優化頁緩存</label>
                    <div class="col-md-4 input-group select2-bootstrap-prepend">
                        <span class="input-group-addon">
                            <input type="checkbox" name="select2_pagecache_checked" value="checked" {{ $select2_pagecache_checked or ""}}> </span>
                        {{ 
                            Form::select(
                                '自動優化頁緩存', 
                                array(  
                                    'microcache' =>'Nginx microcache', 
                                    'varnishserver' => 'Varnish 頁緩存',
                                ), 
                                isset($select2_pagecache) ? $select2_pagecache : 'microcache',
                                [
                                    'id' => 'select2-single-append',
                                    'class' => 'form-control select2-allow-clear',
                                    'name' => 'select2_pagecache',
                                ]
                            )
                        }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2-single-append" class="control-label col-md-3">自動優化緩存頭</label>
                    <div class="col-md-4 input-group select2-bootstrap-prepend">
                        <span class="input-group-addon">
                            <input type="checkbox" name="select2_cacheheader_checked" value="checked" {{ $select2_cacheheader_checked or ""}}> 
                        </span>
                        {{ 
                            Form::select(
                                '自動優化緩存頭', 
                                array(  
                                    'app_cacheheader' =>'應用緩存頭', 
                                    'default_cacheheader' => 'Default 應用緩存頭',
                                ), 
                                isset($select2_cacheheader) ? $select2_cacheheader : 'app_cacheheader',
                                [
                                    'id' => 'select2-single-append',
                                    'class' => 'form-control select2-allow-clear',
                                    'name' => 'select2_cacheheader',
                                ]
                            )
                        }}
                    </div>
                </div>
                <div class="form-group last">
                    <label class="col-md-3 control-label">你的應用 ID</label>
                    <div class="col-md-4">
                        <p class="form-control-static"> {{ $appid or "select an app"}} </p>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">決定</button>
                        <button type="button" class="btn default">取消</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
