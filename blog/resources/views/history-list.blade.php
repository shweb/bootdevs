                        <div class="col-lg-4">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">歷史記錄</span>
                                        <div class="caption-desc font-grey-cascade"> 代碼／服務器修復／數據庫等記錄 
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <i class="fa fa-briefcase"></i> 應用名 </th>
                                                    <th class="hidden-xs">
                                                        <i class="fa fa-question"></i> 行動 </th>
                                                    <th>
                                                        <i class="fa fa-bookmark"></i> 時間 </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($history_list as $key => $history)
                                                <tr>
                                                    <td>
                                                        <a href="javascript:;"> {{ $history->action_appname }} </a>
                                                        <span class="label label-sm label-success label-mini"> 有效 </span>
                                                    </td>
                                                    <td class="hidden-xs"> {{ $history->action_type }} </td>
                                                    <td> {{ $history->created_at }}
                                                    </td>
                                                    <td>
                                                        <a href="#/monitor-unbind" class="btn dark btn-sm btn-outline sbold uppercase">
                                                            <i class="fa fa-share"></i> 回滾 </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>