<form  name="hotelTextForm" class="form-horizontal col-lg-12" style="" ng-submit="hotelTextForm.$valid && hotelText()" ng-init="loadHotelText()">

    <div class="form-block">
        <h3 class="text-uppercase text-bold mb30">Custom Fields</h3>

        <div class="form-group">
           <div class="col-lg-4 mb20 col-lg-offset-2">
                <input type="text" placeholder="Custom Title 1" ng-model="text.custom_title_1"  name="custom_title_1" class="form-control">
           </div>

            <div class="col-lg-10 col-lg-offset-2">
                <div text-angular  ng-model="text.custom_description_1" class="text-angular-editor"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-4 mb20 col-lg-offset-2">
                <input type="text" placeholder="Custom Title 2" ng-model="text.custom_title_2"  name="custom_title_2" class="form-control">
            </div>
            <div class="col-lg-10 col-lg-offset-2">
                <div text-angular  ng-model="text.custom_description_2" class="text-angular-editor"></div>
            </div>
        </div>
        <div class="row">
            <input type="hidden" name="user_id" ng-model="user_id" ng-init="user_id = {{ Auth::User()->id }}">
            <input type="hidden" name="language" ng-model="text.language" ng-init="text.language = '{{ Config::get('app.locale') }}'">
            <div class="col-lg-8 col-lg-offset-2">
                <button  class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </div><!-- /form-block -->


</form>