<form  name="hotelSettingsForm" class="form-horizontal col-lg-12 ng-pristine ng-valid" style="" ng-submit="hotelSettingsForm.$valid && addHotelSettings()" ng-init="loadHotelSettings()">

    <div class="form-block">
        <h3 class="text-uppercase text-bold mb30">Inclusive prices</h3>
        <div class="ui-radio ui-radio-info">
            <label class="ui-radio-inline">
                <input type="radio" name="tax_excluding" value="excluding" ng-model="settings.tax_excluding">
                <span>The prices are exclusive of taxes</span>
            </label>
            <label class="ui-radio-inline">
                <input type="radio" name="tax_excluding" value="including" ng-model="settings.tax_excluding">
                <span>	The prices are inclusive of taxes</span>
            </label>
        </div>
    </div><!-- /form-block -->

    <div class="form-block">
        <h3 class="text-uppercase text-bold mb30">Credit cards</h3>
        <div class="form-group">
            <div class="col-lg-4">
                <div class="ui-checkbox ui-checkbox-info">
                    <label>
                        <input type="checkbox" name="creditcards[0]"  ng-true-value="'american'"  ng-model="settings.creditcards[0]">
                        <span>American Express</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ui-checkbox ui-checkbox-info">
                    <label>
                        <input type="checkbox" name="creditcards_text_checked[0]" ng-true-value="'creditcards_text_checked_0'"  ng-model="settings.creditcards_text_checked[0]">
                        <span><input type="text" placeholder="Credit card text" ng-model="settings.creditcards_text[0]"  name="creditcards_text[0]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-4">
                <div class="ui-checkbox ui-checkbox-info">
                    <label>
                        <input type="checkbox" name="creditcards[1]"  ng-true-value="'diners'"  ng-model="settings.creditcards[1]">
                        <span>Diners</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ui-checkbox ui-checkbox-info">
                    <label>
                        <input type="checkbox" name="creditcards_text_checked[1]" ng-true-value="'creditcards_text_checked_1'" ng-model="settings.creditcards_text_checked[1]">
                        <span><input type="text" placeholder="Credit card text" ng-model="settings.creditcards_text[1]"  name="creditcards_text[1]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-4">
                <div class="ui-checkbox ui-checkbox-info">
                    <label>
                        <input type="checkbox" name="creditcards[2]" ng-true-value="'jcbcard'" ng-model="settings.creditcards[2]">
                        <span>JCB Card</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ui-checkbox ui-checkbox-info">
                    <label>
                        <input type="checkbox" name="creditcards_text_checked[2]" ng-true-value="'creditcards_text_checked_2'" ng-model="settings.creditcards_text_checked[2]">
                        <span><input type="text" placeholder="Credit card text" ng-model="settings.creditcards_text[2]"  name="creditcards_text[2]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-4">
                <div class="ui-checkbox ui-checkbox-info">
                    <label>
                        <input type="checkbox" name="creditcards[3]"  ng-true-value="'mastercard'" ng-model="settings.creditcards[3]">
                        <span>Master Card</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ui-checkbox ui-checkbox-info">
                    <label>
                        <input type="checkbox" name="creditcards_text_checked[3]" ng-true-value="'creditcards_text_checked_3'" ng-model="settings.creditcards_text_checked[3]">
                        <span><input type="text" placeholder="Credit card text" ng-model="settings.creditcards_text[3]"  name="creditcards_text[3]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-4">
                <div class="ui-checkbox ui-checkbox-info">
                    <label>
                        <input type="checkbox" name="creditcards[4]"  ng-true-value="'visacard'" ng-model="settings.creditcards[4]">
                        <span>Visa Card</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ui-checkbox ui-checkbox-info">
                    <label>
                        <input type="checkbox" name="creditcards_text_checked[4]" ng-true-value="'creditcards_text_checked_4'" ng-model="settings.creditcards_text_checked[4]">
                        <span><input type="text" placeholder="Credit card text" ng-model="settings.creditcards_text[4]"  name="creditcards_text[4]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
        </div>

        <input type="hidden" name="user_id" ng-model="user_id" ng-init="user_id = {{ Auth::User()->id }}">
        <button  class="btn btn-primary" type="submit"  >Save</button>

    </div><!-- /form-block -->

</form>
