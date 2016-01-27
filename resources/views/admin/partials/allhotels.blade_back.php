<div class="page page-form-wizard clearfix ng-scope">


    <ol class="breadcrumb breadcrumb-small">
        <li>Hotels</li>
        <li class="active"><a href="#/hotels">All Hotels</a></li>
    </ol>

    <div class="page-wrap">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form wizard -->
                <div ng-controller="FormWizardCtrl" class="panel panel-lined mb30 ng-scope">
                    <div class="panel-body">


                        <ul class="list-unstyled wizard-tabs mb30">
                            <li ng-class="{active: steps[0]}" class="active">
                                <span class="text">Personal Info</span>
                                <i class="fa fa-long-arrow-right"></i>
                            </li>
                            <li ng-class="{active: steps[1]}" class="">
                                <span class="text">Hotel info</span>
                                <i class="fa fa-long-arrow-right"></i>
                            </li>
                            <li ng-class="{active: steps[2]}">
                                <span class="text">Plans</span>
                            </li>
                        </ul>
                        <hr class="dashed mb30">

                        <!-- step 1 Hotel Owner Data -->
                            @include('partials.userform')
                        <!-- #end step 1 -->


                        <!-- step 2  Hotel Data-->
                       // @include("partials.hotelform")
                        <!-- #end step 2 -->



                        <!-- step 2 Hotel Packages-->
                       @include("partials.packagesform")
                        <!-- #end step 3 -->


                    </div>
                </div>
                <!-- #end form wizard -->
            </div>
        </div>
        <!-- #end row -->
    </div>
    <!-- #end page-wrap -->
</div>