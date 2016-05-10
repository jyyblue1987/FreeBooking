<div class="page page-form-wizard clearfix ng-scope">



    <ol class="breadcrumb breadcrumb-small">
        <li>Your Hotel</li>
        <li class="active"><a href="#/hotels">Hotel Data</a></li>
    </ol>

    <div class="page-wrap panel panel-body">

       {{-- <div class="row">
            <div class="col-lg-12">
                <h2>{{Auth::User()->hotel_name}}</h2>
            </div>
        </div>--}}

        <hr class="dashed mb30">

        <div class="row">

            <div class="col-lg-12">


                <tabset>
                    <tab heading="{{Auth::User()->hotel_name}}">
                        <div class="clearfix">

                            <tabset class="tabs-side">
                                <tab heading="General Details">
                                    <div ng-controller="addHotelController" class="clearfix">
                                        @include('admin.partials.hotel.addEditForm.hotelform')
                                    </div>
                                </tab>
                                <tab heading="Bank Details">
                                    <div ng-controller="addHotelController" class="clearfix">
                                        @include('admin.partials.hotel.addEditForm.hotelformBank')
                                    </div>
                                </tab>
                            </tabset>

                        </div>
                    </tab>

                    <tab heading="Photos">

                        @include('admin.partials.hotel.hotelPhotos')

                    </tab><!-- /photo tab -->

                    <tab heading="Texts">

                        <div class="clearfix">
                            <tabset class="tabs-side">
                                <tab heading="General Text">
                                    <div ng-controller="addHotelController" class="clearfix">
                                        @include('admin.partials.hotel.text.hoteltext')
                                    </div>
                                </tab>
                                <tab heading="Custom Fields">
                                    <div ng-controller="addHotelController" class="clearfix">
                                        @include('admin.partials.hotel.text.hoteltextCustom')
                                    </div>
                                </tab>
                                <tab heading="Events">
                                    <div ng-controller="addHotelController" class="clearfix">
                                        @include('admin.partials.hotel.text.hoteltextEvents')
                                    </div>
                                </tab>
                            </tabset>                            
                        </div>

                    </tab>
                    <tab heading="Options">
                        <div class="clearfix">
                            <div ng-controller="addHotelController">

                                @include('admin.partials.hotel.hoteloptions')

                            </div>
                        </div>
                    </tab>
                    <tab heading="Settings">

                        <div class="clearfix">
                            <tabset class="tabs-side">
                                <tab heading="Pricing & Credit Card">
                                    <div ng-controller="addHotelController" class="clearfix">
                                        @include('admin.partials.hotel.setting.hotelsettingsPricingCard')
                                    </div>
                                </tab>
                                <tab heading="Payment Options">
                                    <div ng-controller="addHotelController" class="clearfix">
                                        @include('admin.partials.hotel.setting.hotelsettingsPayment')
                                    </div>
                                </tab>
                                <tab heading="Control Engine Display">
                                    <div ng-controller="addHotelController" class="clearfix">
                                        @include('admin.partials.hotel.setting.hotelsettingsDisplay')
                                    </div>
                                </tab>
                            </tabset>                            
                        </div>

                    </tab>
                    <tab heading="Extras"><p>Some content for Extras here...</p></tab>
                    <tab heading="Advertisement"><p>Some content for Advertisement here...</p></tab>
                    <tab heading="Own Price"><p>Some content Own Price here...</p></tab>
                    <tab heading="Corporate Price"><p>Some content Corporate Price here...</p></tab>

                </tabset>

            </div>

        </div>

    </div>
</div>

