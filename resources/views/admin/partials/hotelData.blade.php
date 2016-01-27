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


                            <div ng-controller="addHotelController">

                                @include('admin.partials.hotelform')

                            </div>
                        </div>
                    </tab>
                    <tab heading="Photos"><p>Some content here...</p></tab>
                    <tab heading="Texts">

                        <div class="clearfix">
                            <div ng-controller="addHotelController">

                                @include('admin.partials.hoteltext')

                            </div>
                        </div>

                    </tab>
                    <tab heading="Options">

                        <div class="clearfix">
                            <div ng-controller="addHotelController">

                                @include('admin.partials.hoteloptions')

                            </div>
                        </div>



                    </tab>
                    <tab heading="Settings">


                        <div class="clearfix">
                            <div ng-controller="addHotelController">

                                @include('admin.partials.hotelsettings')

                            </div>
                        </div>



                    </tab>
                    <tab heading="Extras"><p>Some content here...</p></tab>
                    <tab heading="Advertisement"><p>Some content here...</p></tab>
                    <tab heading="Own Price"><p>Some content here...</p></tab>
                    <tab heading="Corprate Price"><p>Some content here...</p></tab>

                </tabset>








            </div>

        </div>

    </div>
</div>

