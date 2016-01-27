<!-- Search box -->
{{--<div class="form-search">--}}
    {{--<form id="site-search" action="dashboard-v1">--}}
        {{--<input type="search" class="form-control" placeholder="Enter your query...">--}}
        {{--<button type="submit" class="fa fa-search"></button>--}}
    {{--</form>--}}
{{--</div>--}}


<!-- Site nav (vertical) -->

<nav class="site-nav clearfix" role="navigation" collapse-nav-accordion highlight-active>

    <ul class="list-unstyled nav-list">
        <li>

                <a href="#/home"><i class="fa fa-desktop icon"></i>
                <span class="text">Dashboard</span></a>



        </li>

    </ul>
    @if( Auth::user()->type == "admin" )
    <div class="nav-title panel-heading"><i>Hotels</i></div>
    <ul class="list-unstyled nav-list">
            <li>
            <li><a href="#/hotels">All Hotels</a></li>
            <li><a href="#/newhotel">Register Hotel</a></li>
            <li><a href="#/ui/icons">Invoices</a></li>

            </li>

    </ul>
        @endif


    <div class="nav-title panel-heading"><i>Your Hotel</i></div>

    <ul class="list-unstyled nav-list" data-ng-controller="roomsController">
        <li>
        <li><a href="#/hotelData"> {{ Auth::user()->hotel_name }}</a></li>
        </li>


        <li>
            <a href="javascript:;">
                <i class="fa fa-desktop icon"></i>
                <span class="text">Rooms</span>
                <i class="arrow fa fa-angle-right right"></i>
            </a>


                <ul class="inner-drop list-unstyled"  ng-init="loadRooms()">
                    <li><a href="#/addnewroom">Add new room<span class="badge badge-xs badge-success right">new</span></a></li>
                    <li ng-repeat="room in regRooms" ng-model="regRooms" ><a href="#/getRoom/@{{ room.name }}/@{{ room.id }}">@{{ room.name }}</a></li>
                </ul>



        </li>
        </ul>


    <div class="nav-title panel-heading"><i>Arrangements</i></div>
</nav>

