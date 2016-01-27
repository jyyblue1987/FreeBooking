<div class="nav-head">
    <!-- Site logo -->
    <a href="#/dashboard-v1" class="site-logo"><span>App</span>&nbsp;Board</a>
	<span class="nav-trigger fa"
          ng-class="{'fa-navicon': isMobile, 'fa-outdent': !isMobile}"
          toggle-nav-min toggle-off-canvas ng-click="toggleHorizontalNav()">
	</span>
</div>


<div class="head-wrap clearfix">

    <div class="site-nav-horizontal-wrapper" collapse="!isHorizontalCollapsed">
        <!-- site nav (horizontal) -->
        <!-- this nav is visible only with horizonal layout -->
        <nav class="site-nav-horizontal" role="navigation">

            <a href="#/dashboard-v1" class="back-to-main text-bold" ng-click="changeLayout()">
                Back To Main
            </a>

            <ul class="list-unstyled clearfix menus">
                <li class="dropdown" dropdown>
                    <a href="javascript:;" class="dropdown-toggle" dropdown-toggle>
                        Menu<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">Item One</a></li>
                        <li><a href="javascript:;">Item Two</a></li>
                        <li><a href="javascript:;">Item Three</a></li>
                        <li><a href="javascript:;">Item Four</a></li>
                    </ul>
                </li>
                <li class="dropdown" dropdown>
                    <a href="javascript:;" class="dropdown-toggle" dropdown-toggle>
                        Languages<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">English</a></li>
                        <li><a href="javascript:;">Hindi</a></li>
                        <li><a href="javascript:;">French</a></li>
                        <li><a href="javascript:;">Chinese</a></li>
                    </ul>
                </li>
                <li class="dropdown" dropdown>
                    <a href="javascript:;" class="dropdown-toggle" dropdown-toggle>
                        Menu<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">Item One</a></li>
                        <li><a href="javascript:;">Item Two</a></li>
                        <li><a href="javascript:;">Item Three</a></li>
                        <li><a href="javascript:;">Item Four</a></li>
                    </ul>
                </li>
                <li class="dropdown" dropdown>
                    <a href="javascript:;" class="dropdown-toggle" dropdown-toggle>
                        Categories<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:;">Category One</a></li>
                        <li><a href="javascript:;">Category Two</a></li>
                        <li><a href="javascript:;">Category Three</a></li>
                        <li><a href="javascript:;">Category Four</a></li>
                    </ul>
                </li>

            </ul>

            <a href="#/pages/lock-screen" class="log-out">
                <i class="fa fa-power-off"></i> <strong>Log Out</strong>
            </a>

        </nav>
        <!-- #end site nav (horizontal) -->
    </div> <!-- #end site-nav-horizontal wrapper -->


    <!-- navbar right -->
    <ul class="list-unstyled navbar-right">
 <!-- fullscreen -->
        <li ng-click="fullScreen()">
            <a href><i class="fa fa-expand"></i></a>
        </li>
        <!-- #end fullscreen -->





        <!-- profile drop -->
        <li class="dropdown" dropdown>
            <a href class="user-profile dropdown-toggle" dropdown-toggle>
                <img src="images/admin.jpg" alt="admin-pic">
            </a>
            <!-- Profile drop -->
            <div class="panel panel-default dropdown-menu">
                <div class="panel-body">
                    <figure class="photo left">
                        <img src="images/admin.jpg" alt="admin-pic">
                        <a href="j:;">Photo</a>
                    </figure>
                    <div class="profile-info right">
                        <p class="user-name">Bryan R.</p>
                        <p>bryan.r@gmail.com</p>
                        <a href="j:;" class="btn btn-info btn-xs">See Profile</a>
                    </div>
                </div>
                <div class="panel-footer clearfix">
                    <a href="j:;" class="btn btn-default btn-sm left">Account</a>
                    <a href="#/pages/lock-screen" class="btn btn-info btn-sm right">Sign Out</a>
                </div>
            </div>
        </li>
        <!-- #end profile-drop -->

        <!--Language flags-->
        @foreach(Config::get('app.locales') as $key => $val)
            <li class='{{ $key == App::getLocale() ? 'current' : ''}} flags'>
                <a href='{{ url() }}/{{$key}}/administrator '><img  src='{{ url('img/flags/'. $key . '.png') }}' /></a>
            </li>
        @endforeach
    </ul>
</div>


