                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> 
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="m-heading-1 border-green m-bordered">
                                <h3>這功能是給在跑在營運中的服務器進行優化，</h3>
                                <p>系統會被刷新，優化過程中 SLA 不能給保證！</p>
                                <p> </p>
                            </div>
                            <div class="portlet light bordered" id="form_wizard_1">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red bold uppercase"> 優化新應用 -
                                            <span class="step-title"> Step 1 </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="#/app-optimzie-save" id="submit_form" method="POST">
                                        {!! csrf_field() !!}
                                        <div class="form-wizard">
                                            <div class="form-body">
                                                <ul class="nav nav-pills nav-justified steps">
                                                    <li>
                                                        <a href="#tab1" data-toggle="tab" class="step">
                                                            <span class="number"> 1 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> 服務器地址 </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab2" data-toggle="tab" class="step">
                                                            <span class="number"> 2 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> 代碼設置 </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab3" data-toggle="tab" class="step active">
                                                            <span class="number"> 3 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> 第三方接入 </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab4" data-toggle="tab" class="step">
                                                            <span class="number"> 4 </span>
                                                            <span class="desc">
                                                                <i class="fa fa-check"></i> 決定 </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="bar" class="progress progress-striped" role="progressbar">
                                                    <div class="progress-bar progress-bar-success"> </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="alert alert-danger display-none">
                                                        <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                                    <div class="alert alert-success display-none">
                                                        <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                                    <div class="tab-pane active" id="tab1">
                                                        <h3 class="block">提供服務器地址</h3>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">IP / 域名
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="domainname" />
                                                                <span class="help-block"> www.yourdomain.com </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">高權限用戶名
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="username" />
                                                                <span class="help-block"> root (不建議) </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">密碼
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="password" class="form-control" name="password" id="submit_form_password" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-md-checkboxes has-error">
                                                            <label class="col-md-3 control-label" for="form_control_1"> 已有下例安裝？</label>
                                                            <div class="col-md-9">
                                                                <div class="md-checkbox-inline">
                                                                    <div class="md-checkbox">
                                                                        <input type="checkbox" id="checkbox1_3" class="md-check" name="docker">
                                                                        <label for="checkbox1_3">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Docker </label>
                                                                    </div>
                                                                    <div class="md-checkbox">
                                                                        <input type="checkbox" id="checkbox1_4" class="md-check">
                                                                        <label for="checkbox1_4">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Apache HTTP </label>
                                                                    </div>
                                                                    <div class="md-checkbox">
                                                                        <input type="checkbox" id="checkbox1_5" class="md-check">
                                                                        <label for="checkbox1_5">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> FTP </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Email
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="email" />
                                                                <span class="help-block"> 用作消息提醒 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab2">
                                                        <h3 class="block">代碼管理設置</h3>
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">應用類別</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_applang_checked" value="checked" checked> 
                                                                </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_applang">
                                                                    <option></option>
                                                                    <optgroup label="現支持之程序語言">
                                                                        <option value="PHP">PHP</option>
                                                                        <option value="NodeJs" disabled="disabled">NodeJs</option>
                                                                        <option value="Python" disabled="disabled">Python</option>
                                                                    </optgroup>
                                                                    <optgroup label="現支持之應用">
                                                                        <option value="Wordpress">Wordpress</option>
                                                                        <option value="Drupal">Drupal</option>
                                                                        <option value="ECShop" disabled="disabled">ECShop</option>
                                                                        <option value="Magento" disabled="disabled">Magento</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">代碼路徑</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="codepath" />
                                                                <span class="help-block"> 不指名路徑，系統會自動查找 </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">Git 庫</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_gitrepo_checked" placeholder="" value="checked" checked> 
                                                                </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_gitrepo">
                                                                    <option></option>
                                                                    <optgroup label="現支持的 git 庫">
                                                                        <option value="codingnet">Coding.net</option>
                                                                        <option value="github" selected="selected">github</option>
                                                                        <option value="Bitbucket">Bitbucket</option>
                                                                        <option value="gitlab" disabled="disabled">Gitlab</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">用戶名
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="gitusername" />
                                                                <span class="help-block"> 第三方 Git 庫 用戶名 </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">密碼
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="password" class="form-control" name="gitpassword" id="submit_form_password" />
                                                                <span class="help-block"> 第三方 Git 庫 密碼 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab3">
                                                        <!--<h3 class="block">第三方接入</h3> -->
                                                        <div class="form-group">
                                                            <label for="select2-single-append" class="control-label col-md-3">第三方監控</label>
                                                            <div class="col-md-4 input-group select2-bootstrap-prepend">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" name="select2_appmonitor_checked" value="checked" checked> 
                                                                </span>
                                                                <select id="select2-single-append" class="form-control select2-allow-clear" name="select2_appmonitor_checked">
                                                                    <option></option>
                                                                    <optgroup label="現支持之監控">
                                                                        <option value="newrelic">newrelic</option>
                                                                        <option value="oneapm">OneApm</option>
                                                                        <option value="聽雲" disabled="disabled">聽雲</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">監控 App key</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="key" />
                                                                <span class="help-block"> 第三方監控之 Key </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">第三方監控之 secret (如有）</label>
                                                            <div class="col-md-4">
                                                                <textarea class="form-control" rows="3" name="remarks"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> 需要打包式備份 ？ 提供 DockerHub 用戶／密碼 </label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="key" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">密碼
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="password" class="form-control" name="gitpassword" id="submit_form_password" />
                                                                <span class="help-block"> DockerHub 密碼 </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab4">
                                                        <h3 class="block">決定部署</h3>
                                                        <h4 class="form-section">服務器</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">用戶名:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="username"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Email:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="email"> </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="form-section">代碼設置</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Git:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="select2_gitrepo"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">代碼路徑:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="codepath"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">應用類:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="select2_applang"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">IP / 域名:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="domainname"> </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="form-section">支付</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">支付方法:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="card_name"> 支付寶 </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous">
                                                            <i class="fa fa-angle-left"></i> Back </a>
                                                        <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <!--
                                                        <a href="javascript:;" class="btn green button-submit"> Submit
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        -->
                                                        <button type="submit" class="btn green button-submit">決定</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
