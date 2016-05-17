<!-- Search box -->
{{--<div class="form-search">--}}
    {{--<form id="site-search" action="dashboard-v1">--}}
        {{--<input type="search" class="form-control" placeholder="Enter your query...">--}}
        {{--<button type="submit" class="fa fa-search"></button>--}}
    {{--</form>--}}
{{--</div>--}}


<!-- Site nav (vertical) -->

<nav class="site-nav clearfix" role="navigation" collapse-nav-accordion highlight-active>
    <ul class="nav-list">
        <li>
            <a href="#/home"><i class="fa fa-desktop icon"></i>
            <span class="text">Dashboard</span></a>
        </li>
    </ul>
    @if( Auth::user()->type == "admin" )
    <div class="nav-title panel-heading"><i>Hotels</i></div>
    <ul class="nav-list">
        <li>
            <li><a href="#/hotels">All Hotels</a></li>
            <li><a href="#/newhotel">Register Hotel</a></li>
            <li><a href="#/ui/icons">Invoices</a></li>
        </li>
    </ul>
    @endif

    <div class="nav-title panel-heading"><i>Your Hotel</i></div>

    <ul class="nav-list" data-ng-controller="roomsController">
        <li>
        <li><a href="#/hotelData"><i class="fa fa-university"></i> {{ Auth::user()->hotel_name }}</a></li>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-desktop icon"></i>
                <span class="text">Rooms</span>
                <i class="arrow fa fa-angle-right right"></i>
            </a>
            <ul class="inner-drop" ng-init="loadRooms()">
                <li><a href="#/addnewroom">Add new room<span class="badge badge-xs badge-primary right">new</span></a></li>
                <li ng-repeat="room in regRooms" ng-model="regRooms" ><a href="#/getRoom/@{{ room.name }}/@{{ room.id }}">@{{ room.name }}</a></li>
            </ul>
        </li>
    </ul>
    <ul class="nav-list" data-ng-controller="arrangementsController">
        <li>
            <a href="javascript:;">
                <i class="fa fa-desktop icon"></i>
                <span>Arrangements</span>
                <i class="arrow fa fa-angle-right right"></i>
            </a>
            <ul class="inner-drop">
                <li><a href="#/arrangements">Add a new arrangement</a></li>
            </ul>
        </li>
    </ul>
    <ul class="nav-list">
        <li>
            <a href="javascript:;">
                <i class="fa fa-desktop icon"></i>
                <span>Guests</span>
                <i class="arrow fa fa-angle-right right"></i>
            </a>
            <ul class="inner-drop">
                <li><a href="#">Guests & reservations</a></li>
                <li><a href="#">Business Guests</a></li>
            </ul>
        </li>
    </ul>
    <ul class="nav-list">
        <li>
            <a href="javascript:;">
                <i class="fa fa-desktop icon"></i>
                <span>information</span>
                <i class="arrow fa fa-angle-right right"></i>
            </a>
            <ul class="inner-drop">
                <li><a href="#">Rent</a></li>
                <li><a href="#">Cost overview</a></li>
                <li><a href="#">invoice overview</a></li>
            </ul>
        </li>
    </ul>
    <ul class="nav-list">
        <li>
            <a href="javascript:;">
                <i class="fa fa-desktop icon"></i>
                <span>Mailings</span>
                <i class="arrow fa fa-angle-right right"></i>
            </a>
            <ul class="inner-drop">
                <li><a href="#">Administer</a></li>
                <li><a href="#">E-mail addresses</a></li>
            </ul>
        </li>
    </ul>
    <ul class="nav-list">
        <li>
            <a href="javascript:;">
                <i class="fa fa-desktop icon"></i>
                <span>Blacklist</span>
                <i class="arrow fa fa-angle-right right"></i>
            </a>
            <ul class="inner-drop">
                <li><a href="#/addblacklist">add to blacklist</a></li>
                <li><a href="#/blacklist">view black list</a></li>
            </ul>
        </li>
    </ul>
    <ul class="nav-list">
        <li>
            <a href="javascript:;">
                <i class="fa fa-desktop icon"></i>
                <span>Informatioon about the city</span>
                <i class="arrow fa fa-angle-right right"></i>
            </a>
            <ul class="inner-drop">
                <li><a href="#">add to blacklist</a></li>
                <li><a href="#">Acitivities</a></li>
            </ul>
        </li>
    </ul>
    <ul class="nav-list">
        <li>
            <a href="../en/auth/logout">Log out</a>
        </li>
    </ul>
    

</nav>