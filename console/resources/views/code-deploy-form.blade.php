                                        <div class="col-lg-4">
                                            <div class="portlet light portlet-fit bordered form">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i>Form Actions On Top & Bottom </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                        <a href="javascript:;" class="reload"> </a>
                                                        <a href="javascript:;" class="remove"> </a>
                                                    </div>
                                                </div>
                                                <!-- BEGIN FORM-->
                                                <form action="/app-settings-save?appid={{ $appid }}" class="form-horizontal" method="post">
                                                    {!! csrf_field() !!}
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">Git 庫</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_gitrepo_checked" value="checked" {{ $select2_gitrepo_checked or ""}}> 
                                                                </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_appconf">
                                                                    <option></option>
                                                                    <optgroup label="Available App handler">
                                                                        <option value="codingnet">Coding.net</option>
                                                                        <option value="github">github</option>
                                                                        <option value="Bitbucket">Bitbucket</option>
                                                                        <option value="gitlab" disabled="disabled">Gitlab</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">備份數據庫</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_db_checked" checked> </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_db">
                                                                    <option></option>
                                                                    <optgroup label="Available db handler">
                                                                        <option value="mysql">MySQL</option>
                                                                        <option value="mariadb">MariaDB</option>
                                                                        <option value="postgresql" disabled="disabled">Postgresql</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">清理緩存</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_objectcacheclear_checked" checked> </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_objectcacheclear">
                                                                    <option></option>
                                                                    <optgroup label="緩存類">
                                                                        <option value="memcache">Memcache</option>
                                                                        <option value="redis" disabled="disabled">Redis</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">清理頁面緩存</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_pagecacheclear_checked" checked> </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_pagecacheclear">
                                                                    <option></option>
                                                                    <optgroup label="頁緩存類">
                                                                        <option value="microcache">Nginx microcache</option>
                                                                        <option value="varnishserver" disabled="disabled">Varnish server</option>
                                                                    </optgroup>
                                                                </select>
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
