<div class="nav-head">
    <!-- Site logo -->
    <span class="site-logo"><span>App</span>&nbsp;Board</span>
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

            <span class="back-to-main text-bold" ng-click="changeLayout()">
                Back To Main
            </span>

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
        <li class="dropdown" dropdown>
            <a href class="flag dropdown-toggle" dropdown-toggle>                
                Lang
            </a>
            <!-- Profile drop -->
            <div class="panel panel-default dropdown-menu">
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <!--Language flags-->
                        @foreach(Config::get('app.locales') as $key => $val)
                            <li class='{{ $key == App::getLocale() ? 'current' : ''}} flags'>
                                <a href='{{ url() }}/{{$key}}/administrator '><img  src='{{ url('img/flags/'. $key . '.png') }}' /></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </li>
        <!-- /language flags -->
        <!-- profile drop -->
        <li class="dropdown" dropdown>
            <a href class="user-profile dropdown-toggle" dropdown-toggle>                
                <?php 
                    $img = '/images/admin.jpg';
                    $noimg = '/images/no-image.jpg';
                ?>
                @if ($img)
                    <img src="{{ URL::asset($img) }}" alt="user name">
                @else
                    <img src="{{ URL::asset($noimg) }}" alt="user name">
                @endif
            </a>
            <!-- Profile drop -->
            <div class="panel panel-default dropdown-menu">
                <div class="panel-body">
                    <figure class="photo left">
                        @if ($img)
                            <img src="{{ URL::asset($img) }}" alt="user name">
                        @else
                            <img src="{{ URL::asset($noimg) }}" alt="user name">
                        @endif
                        <a href="j:;">Photo</a>
                    </figure>
                    <div class="profile-info right">
                        <p class="user-name">Bryan R.</p>
                        <p>bryan.r@gmail.com</p>
                        <a href="j:;" class="btn btn-success btn-xs">See Profile</a>
                    </div>
                </div>
                <div class="panel-footer clearfix">
                    <a href="j:;" class="btn btn-default btn-sm left">Account</a>
                    <a href="auth/logout" class="btn btn-primary btn-sm right">Sign Out</a>
                </div>
            </div>
        </li>
        <!-- #end profile-drop -->        
    </ul>
</div>


