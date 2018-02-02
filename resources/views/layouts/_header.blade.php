<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                LOGO
            </a>
        </div>


        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->

             <ul class="nav navbar-nav">
                        <li class="{{ active_class(if_route('notices.index')) }}"><a href="{{ route('notices.index') }}">公告列表</a></li>
             			<li class="dropdown">
             				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
             					部室
             					<b class="caret"></b>
             				</a>
             				<ul class="dropdown-menu">
                                <li class="{{ active_class((if_route('departments.show') && if_route_param('department', 1))) }}"><a href="{{ route('departments.show', 1) }}">总经理办公室</a></li>
                                <li class="{{ active_class((if_route('departments.show') && if_route_param('department', 2))) }}"><a href="{{ route('departments.show', 2) }}">人力资源</a></li>
                                <li class="{{ active_class((if_route('departments.show') && if_route_param('department', 4))) }}"><a href="{{ route('departments.show', 4) }}">信息管理</a></li>
             				</ul>
             			</li>
             			<li class="dropdown">
             				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
             				    门店
             					<b class="caret"></b>
             				</a>
             				<ul class="dropdown-menu">
                                <li class="{{ active_class((if_route('departments.show') && if_route_param('department', 3))) }}"><a href="{{ route('departments.show', 3) }}">朝阳店</a></li>
                                <li class="{{ active_class((if_route('departments.show') && if_route_param('department', 5))) }}"><a href="{{ route('departments.show', 5) }}">新世界店</a></li>
                                <li class="{{ active_class((if_route('departments.show') && if_route_param('department', 6))) }}"><a href="{{ route('departments.show', 6) }}">贺州店</a></li>
                                <li class="{{ active_class((if_route('departments.show') && if_route_param('department', 7))) }}"><a href="{{ route('departments.show', 7) }}">贵港店</a></li>
             				</ul>
             			</li>

                        <li class="dropdown">
             				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
             					话题
             					<b class="caret"></b>
             				</a>
             				<ul class="dropdown-menu">
                                <li class="{{ active_class(if_route('topics.index')) }}"><a href="{{ route('topics.index') }}">综合</a></li>
                                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}"><a href="{{ route('categories.show', 1) }}">分享</a></li>
                                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}"><a href="{{ route('categories.show', 2) }}">知识</a></li>
                                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}"><a href="{{ route('categories.show', 3) }}">问答</a></li>
                                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}"><a href="{{ route('categories.show', 4) }}">技术</a></li>
             				</ul>
             			</li>

             		</ul>

            <!-- <ul class="nav navbar-nav">
                <li class="{{ active_class(if_route('topics.index')) }}"><a href="{{ route('topics.index') }}">综合</a></li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}"><a href="{{ route('categories.show', 1) }}">分享</a></li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}"><a href="{{ route('categories.show', 2) }}">教程</a></li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}"><a href="{{ route('categories.show', 3) }}">问答</a></li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}"><a href="{{ route('categories.show', 4) }}">公告</a></li>
            </ul> -->

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">登录</a></li>
                    <li><a href="{{ route('register') }}">注册</a></li>
                @else
                @if(Auth::user()->is_admin)
                <li>
                    <a href="{{ route('notices.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </li>
                @endif
                {{-- 消息通知标记 --}}
                <li>
                    <a href="{{ route('notifications.index') }}" class="notifications-badge" style="margin-top: -2px;">
                        <span class="badge badge-{{ Auth::user()->notification_count > 0 ? 'hint' : 'fade' }} " title="消息提醒">
                            {{ Auth::user()->notification_count }}
                        </span>
                    </a>
                </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @can('manage_contents')
                                <li>
                                    <a href="{{ url(config('administrator.uri')) }}">
                                        <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                                        管理后台
                                    </a>
                                </li>
                            @endcan

                            <li>
                                <a href="{{ route('users.show', Auth::id()) }}">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    个人中心
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.edit', Auth::id()) }}">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    编辑资料
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                    退出登录
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
