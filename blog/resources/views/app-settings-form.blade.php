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
                                                                    <input type="email" name="email" class="form-control" placeholder="Email Address"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">SSH 用戶名</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="SSHuser"placeholder="root">
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
                                                                    <input type="checkbox" name="select2_appconf_checked" value="checked" {{ $select2_appconf_checked or ""}}> 
                                                                </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_appconf">
                                                                    <option></option>
                                                                    <optgroup label="現支持的應用">
                                                                        <option value="Wordpress">Wordpress</option>
                                                                        <option value="Drupal" selected="selected">Drupal</option>
                                                                        <option value="ECShop" disabled="disabled">ECShop</option>
                                                                        <option value="Magento" disabled="disabled">Magento</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">自動故障後重起</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_appconf_checked" value="checked" {{ $select2_appconf_checked or ""}}> 
                                                                </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_appconf">
                                                                    <option></option>
                                                                    <optgroup label="現支持的應用">
                                                                        <option value="login_reboot">登錄服務器重起並加載應用</option>
                                                                        <option value="cloud_reboot" selected="selected">由雲賬號重起並加載應用</option>
                                                                        <option value="Chef_reboot" disabled="disabled">用DevOps工具重起</option>
                                                                        <option value="protectdb_reboot" disabled="disabled">保護數據並重起</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">自動優化數據庫</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_db_checked" value="checked" {{ $select2_db_checked or ""}}> </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_db">
                                                                    <option></option>
                                                                    <optgroup label="Available db handler">
                                                                        <option value="mysql" selected="selected">MySQL</option>
                                                                        <option value="mariadb">MariaDB</option>
                                                                        <option value="postgresql" disabled="disabled">Postgresql</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">自動優化對象緩存</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_objectcache_checked" value="checked" {{ $select2_objectcache_checked or ""}}> </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_objectcache">
                                                                    <option></option>
                                                                    <optgroup label="Available Object caches">
                                                                        <option value="memcache">Memcache</option>
                                                                        <option value="redis" disabled="disabled">Redis</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">自動優化頁緩存</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_pagecache_checked" value="checked" {{ $select2_pagecache_checked or ""}}> </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_pagecache">
                                                                    <option></option>
                                                                    <optgroup label="Available page caches">
                                                                        <option value="microcache" selected="selected">Nginx microcache</option>
                                                                        <option value="varnishserver" disabled="disabled">Varnish 頁緩存</option>
                                                                        <option value="CDN" disabled="disabled">CDN</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">自動優化頁緩存</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_cacheheader_checked" value="checked" {{ $select2_cacheheader_checked or ""}}> </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_cacheheader">
                                                                    <option></option>
                                                                    <optgroup label="Available page caches">
                                                                        <option value="app_cacheheader">應用緩存頭</option>
                                                                        <option value="default_cacheheader" disabled="disabled">Default 緩存頭</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--
                                                        <div class="form-group">
                                                            <label for="multiple" class="col-md-3 control-label">備署</label>
                                                            <div class="col-md-4">
                                                                <select id="multiple" class="form-control select2-multiple" multiple>
                                                                    <optgroup label="Alaskan">
                                                                        <option value="AK">Alaska</option>
                                                                        <option value="HI" disabled="disabled">Hawaii</option>
                                                                    </optgroup>
                                                                    <optgroup label="Pacific Time Zone">
                                                                        <option value="CA">California</option>
                                                                        <option value="NV">Nevada</option>
                                                                        <option value="OR">Oregon</option>
                                                                        <option value="WA">Washington</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        -->
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
