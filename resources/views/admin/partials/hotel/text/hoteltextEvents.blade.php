<form  name="hotelTextForm" class="form-horizontal col-lg-12" style="" ng-submit="hotelTextForm.$valid && hotelText()" ng-init="loadHotelText()">

    <div class="form-block">
        <h3 class="text-uppercase text-bold mb30">Events</h3>
        <div class="form-group">
            <div class="col-lg-2 text-right">Events</div>
            <div class="col-lg-10">
                <div class="ui-checkbox ui-checkbox-info">
                    <label>
                        <input type="checkbox" name="event" value="1" ng-model="text.event" class="form-control"  ng-true-value="'1'" ng-false-value="'0'">
                        <span>Show the fields events</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Details about event</label>
            <div class="col-lg-10">
                <div text-angular  ng-model="text.event_description" class="text-angular-editor"></div>
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