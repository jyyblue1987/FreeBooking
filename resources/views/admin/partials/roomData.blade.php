

<div class="page page-form-wizard clearfix ng-scope">


    <ol class="breadcrumb breadcrumb-small">
        <li>Your Hotel</li>
        <li class="active"><a href="#/hotels"> {{ $name }}</a></li>
    </ol>

    <div class="page-wrap">

        <div class="row">
            <div class="col-lg-12">
                <tabset>
                    <tab heading="Room Data">
                        <div class="clearfix">
                            <div ng-controller="roomsEditController" ng-init="loadData( {{$id}} )" >
                                <spinner name="roomData" on-loaded="getloadspinner();">
                                    <div class="spinnerEdit">
                                        <div class="bounce1"></div>
                                        <div class="bounce2"></div>
                                        <div class="bounce3"></div>
                                    </div>
                                </spinner>
                                @include('admin.partials.roomForm')
                            </div>
                        </div>
                    </tab>
                    <tab heading="photos">
                        <div class="clearfix">
                            <div ng-controller="roomsEditController"   ng-init="loadRoomPhotos()">
                                @include('admin.partials.roomPhotos')
                            </div>
                        </div>
                    </tab>
                    <tab heading="Options">
                        <div class="clearfix">
                            <div ng-controller="roomsEditController" ng-init="loadRoomOptions()" >
                                <spinner name="roomOptions" on-loaded="loadOptionspinner();">
                                    <div class="spinnerEdit">
                                        <div class="bounce1"></div>
                                        <div class="bounce2"></div>
                                        <div class="bounce3"></div>
                                    </div>
                                </spinner>
                                @include('admin.partials.roomOptions')
                            </div>
                        </div>
                    </tab>
                    <tab heading="Price / Availability Management">
                        <div class="clearfix">
                            <tabset class="tabs-side">
                                <tab heading="Room Prices">
                                    <div ng-controller="roomsEditController" class="clearfix" >
                                        @include('admin.partials.changeRoomPrice')
                                    </div>
                                </tab>
                                <tab heading="Room Availability">
                                    <div ng-controller="roomsEditController" class="clearfix" >
                                        @include('admin.partials.changeRoomAvailability')
                                    </div>
                                </tab>
                                <tab heading="Room Open">
                                    <div ng-controller="roomsEditController" class="clearfix" >
                                        @include('admin.partials.changeRoomOpen')
                                    </div>
                                </tab>
                                <tab heading="Room Close">
                                    <div ng-controller="roomsEditController" class="clearfix" >
                                        @include('admin.partials.changeRoomClose')
                                    </div>
                                </tab>
                                <tab heading="Increase Available">
                                    <div ng-controller="roomsEditController" class="clearfix" >
                                        @include('admin.partials.changeRoomIncreaseAvailability')
                                    </div>
                                </tab>
                            </tabset>
                        </div>
                    </tab>
                    <tab heading="Price Module">
                        <div class="clearfix">
                            <tabset class="tabs-side">
                                <tab heading="Last Minute">
                                    <div ng-controller="roomsEditController" class="clearfix" >
                                        @include('admin.partials.setLastMinutePrice')
                                    </div>
                                </tab>
                                <tab heading="Manage Discount Dates">
                                    <div ng-controller="roomsEditController" class="clearfix" >
                                        @include('admin.partials.setDiscountDates')
                                    </div>
                                </tab>
                                <tab heading="Exclusive Break-Fast">
                                    <div ng-controller="roomsEditController" class="clearfix" >
                                        @include('admin.partials.setExclusiveBreakfast')
                                    </div>
                                </tab>
                                <tab heading="Single Use">
                                    <div ng-controller="roomsEditController" class="clearfix" >
                                        @include('admin.partials.setSingleUse')
                                    </div>
                                </tab>
                                <tab heading="Non-Refundable">
                                    <div ng-controller="roomsEditController" class="clearfix" >
                                        @include('admin.partials.setNonRefundable')
                                    </div>
                                </tab>
                            </tabset>
                        </div>
                    </tab>

                    <tab heading="Minimum Stay">
                        <div class="clearfix">
                            <div ng-controller="roomsEditController"  >
                                @include('admin.partials.minStay')
                            </div>
                        </div>
                    </tab>


                </tabset>

                </div>
            </div>


    </div>

</div>
