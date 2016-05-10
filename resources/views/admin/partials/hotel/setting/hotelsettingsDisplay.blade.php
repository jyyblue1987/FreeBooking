<form  name="hotelSettingsForm" class="form-horizontal col-lg-12" style="" ng-submit="hotelSettingsForm.$valid && addHotelSettings()" ng-init="loadHotelSettings()">

    <div class="form-block">
        <h3 class="text-uppercase text-bold mb30">Control engine page display setting.</h3>
        <div class="mb30">
            <div class="ui-radio ui-radio-info">
                <label class="ui-radio-block">
                    <input type="radio" name="engine_page_display" value="hotel_info" ng-model="settings.engine_page_display">
                    <span>Set hotel information page to display first.</span>
                </label>
            </div>
            <div class="ui-radio ui-radio-info">
                <label class="ui-radio">
                    <input type="radio" name="engine_page_display" value="arrangement" ng-model="settings.engine_page_display">
                    <span>Set arrangement page to display first.</span>
                </label>
            </div>
            <div class="ui-radio ui-radio-info">
                <label class="ui-radio-block">
                    <input type="radio" name="engine_page_display" value="kamer" ng-model="settings.engine_page_display">
                    <span>Set kamer page to display first.</span>
                </label>
            </div>
            <div class="ui-radio ui-radio-info">
                <label class="ui-radio">
                    <input type="radio" name="engine_page_display" value="hotel_review" ng-model="settings.engine_page_display">
                    <span>Set hotel review page to display first.</span>
                </label>
            </div>
        </div>
        <input type="hidden" name="user_id" ng-model="user_id" ng-init="user_id = {{ Auth::User()->id }}">
        <button  class="btn btn-primary" type="submit"  >Save</button>
    </div><!-- /form-block -->

</form>
