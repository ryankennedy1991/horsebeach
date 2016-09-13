<div class="header_wrapper">
    <div class="container-fluid">
        <div class="row-fluid">
            <a class="logo" title="" href="#"><img alt="" src="{{ URL::asset('img/lgooo.png') }}" width="79px"></a>
            <ul class="user_nav">
                <li><span>&nbsp;</span></li>

<li>
                    <a href="#" title="Support" rel="tooltip" data-toggle="dropdown" class="icon_support tips menuDrop">
                        <span class="badge badge-warning">0</span>
                    </a>

                    <ul class="dropdown-menu pull-right gradient user_dropdown">
                      

                        <li class="list ">
                            <div class="list_title hidden">
                                Resolved ticket!
                                <span>Jul 18, 2012 by <a href="#">username</a></span>
                            </div>
                            <div class="list_action">
                                <div class="btn-toolbar">
                                    <div class="btn-group">
                                        <button class="btn btn-mini"><img src="{{ URL::asset('img/icons/gray/glyphicons_027_search.png') }}" class="i_action_view" alt="View"/></button>
                                        <button class="btn btn-mini"><img src="{{ URL::asset('img/icons/gray/glyphicons_016_bin.png') }}" class="i_action_delete" alt="Delete"/></button>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list list_all">
                            <div class="list_expand">
                                <a href="#">Show all notifications</a>
                            </div>
                        </li>

                    </ul>
</li>

                <li>
                    <a href="#" title="Settings" data-toggle="dropdown" rel="tooltip" class="tips icon_settings menuDrop"></a>

                    <ul class="dropdown-menu pull-right gradient user_dropdown">
                        
                        <li><a id="settings" name="settings" href="{{ url('/users/'.Auth::user()->id) }}"><i class="icon-cog"></i>Account settings</a></li>
                        <li><a href="index.html"> <i class="icon-share-alt"></i>Logout</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{url('/logout')}}" title="Logout" rel="tooltip" class="tips icon_logout"></a>
                </li>
                <li><span>&nbsp;</span></li>
            </ul><!-- user_nav end -->
        </div>
    </div>
</div><!-- header_wrapper end -->
