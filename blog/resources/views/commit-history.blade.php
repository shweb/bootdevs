<div class="col-lg-4">
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject font-green bold uppercase">這應用綁定了 {{ $select2_codedeploy_git or "先綁定代碼庫" }}</span>
                <div class="caption-desc font-grey-cascade"> Get Data from Git repo <pre class="mt-code">.list-simple</pre> class to the <pre class="mt-code">ul</pre> element. </div>
            </div>
        </div>
        <div class="portlet-body">
            <div class="mt-element-list">
                <div class="mt-list-head list-simple font-white bg-red">
                    <div class="list-head-title-container">
                        <div class="list-date"></div>
                        <h3 class="list-title">{{$appname or "Please choose a repo for the app"}}</h3>
                    </div>
                </div>
                <div class="mt-list-container list-simple">
                    <ul>
                    @foreach ( $codedeploy_list as $deploy_history )
                        <li class="mt-list-item">
                            <div class="list-icon-container done">
                                <i class="icon-check"></i>
                            </div>
                            <div class="list-datetime"> {{ $deploy_history->created_at }}</div>
                            <div class="list-item-content">
                                <h3 class="uppercase">
                                    <a href="javascript:;"> 進行了 {{ $deploy_history->action_type }} 標簽：sodfgho </a>
                                </h3>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>