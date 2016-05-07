<form  name="wizard-step-2" class="form-horizontal col-lg-12 ng-pristine ng-valid" style="" ng-submit="addHotelSettings()" ng-init="loadHotelSettings()">

    <div class="form-block">
        <h3 class="text-uppercase text-bold mb30">Inclusive prices</h3>
        <div class="ui-radio ui-radio-primary">
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
            <div class="col-lg-3">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="creditcards[0]"  ng-true-value="'american'"  ng-model="settings.creditcards[0]">
                        <span>American Express</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="creditcards_text_checked[0]" ng-true-value="'creditcards_text_checked_0'"  ng-model="settings.creditcards_text_checked[0]">
                        <span><input type="text" placeholder="Credit card text" ng-model="settings.creditcards_text[0]"  name="creditcards_text[0]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-3">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="creditcards[1]"  ng-true-value="'diners'"  ng-model="settings.creditcards[1]">
                        <span>Diners</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="creditcards_text_checked[1]" ng-true-value="'creditcards_text_checked_1'" ng-model="settings.creditcards_text_checked[1]">
                        <span><input type="text" placeholder="Credit card text" ng-model="settings.creditcards_text[1]"  name="creditcards_text[1]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-3">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="creditcards[2]" ng-true-value="'jcbcard'" ng-model="settings.creditcards[2]">
                        <span>JCB Card</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="creditcards_text_checked[2]" ng-true-value="'creditcards_text_checked_2'" ng-model="settings.creditcards_text_checked[2]">
                        <span><input type="text" placeholder="Credit card text" ng-model="settings.creditcards_text[2]"  name="creditcards_text[2]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-3">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="creditcards[3]"  ng-true-value="'mastercard'" ng-model="settings.creditcards[3]">
                        <span>Master Card</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="creditcards_text_checked[3]" ng-true-value="'creditcards_text_checked_3'" ng-model="settings.creditcards_text_checked[3]">
                        <span><input type="text" placeholder="Credit card text" ng-model="settings.creditcards_text[3]"  name="creditcards_text[3]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-3">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="creditcards[4]"  ng-true-value="'visacard'" ng-model="settings.creditcards[4]">
                        <span>Visa Card</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="creditcards_text_checked[4]" ng-true-value="'creditcards_text_checked_4'" ng-model="settings.creditcards_text_checked[4]">
                        <span><input type="text" placeholder="Credit card text" ng-model="settings.creditcards_text[4]"  name="creditcards_text[4]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
        </div>
    </div><!-- /form-block -->

    <div class="form-block">
        <h3 class="text-uppercase text-bold mb30">Payment options in the hotel</h3>
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="payment_option_text_checked[0]" ng-true-value="'payment_option_checked_0'"  ng-model="settings.payment_option_text_checked[0]">
                        <span><input type="text" placeholder="Hotel Payment Options" ng-model="settings.payment_option_text[0]"  name="payment_option_text[0]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="payment_option_text_checked[1]" ng-true-value="'payment_option_checked_1'" ng-model="settings.payment_option_text_checked[1]">
                        <span><input type="text" placeholder="Hotel Payment Options" ng-model="settings.payment_option_text[1]"  name="payment_option_text[1]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="payment_option_text_checked[2]" ng-true-value="'payment_option_checked_2'" ng-model="settings.payment_option_text_checked[2]">
                        <span><input type="text" placeholder="Hotel Payment Options" ng-model="settings.payment_option_text[2]"  name="payment_option_text[2]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="payment_option_text_checked[3]" ng-true-value="'payment_option_checked_3'" ng-model="settings.payment_option_text_checked[3]">
                        <span><input type="text" placeholder="Hotel Payment Options" ng-model="settings.payment_option_text[3]"  name="payment_option_text[3]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="payment_option_text_checked[4]" ng-true-value="'payment_option_checked_4'" ng-model="settings.payment_option_text_checked[4]">
                        <span><input type="text" placeholder="Hotel Payment Options" ng-model="settings.payment_option_text[4]"  name="payment_option_text[4]" class="form-control inline"></span>
                    </label>
                </div>
            </div>
        </div>
    </div><!-- /form-block -->

    <div class="form-block">
        <div class="form-group">
            <label class="col-lg-4"><b>Reserve without credit card</b></label>
            <div class="col-lg-8">
                <div class="ui-radio ui-radio-primary">
                    <label class="ui-radio-block">
                        <input type="radio" name="reserve_without_credit_card" value="1"  ng-model="settings.reserve_without_credit_card">
                        <span>Yes, Guests may reserve without a credit card</span>
                    </label>
                </div>
                <div class="ui-radio ui-radio-primary">
                    <label class="ui-radio-block">
                        <input type="radio" name="reserve_without_credit_card" value="0" ng-model="settings.reserve_without_credit_card">
                        <span>No, guests may not reserve without a credit card</span>
                    </label>
                </div>
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="booking_without_credit_card_email" ng-true-value="'true'" ng-false-value="'false'"  ng-model="settings.booking_without_credit_card_email">
                        <span>Please send an e-mail on the guest arrival day.</span>
                    </label>
                </div>
            </div>
        </div>
    </div><!-- /form-block -->
    <div class="form-block">
        <div class="form-group">
            <label class="col-lg-4"><b>Check-in form</b></label>
            <div class="col-lg-8">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="guest_check_in_form" ng-model="settings.guest_check_in_form" ng-true-value="'true'" ng-false-value="'false'">
                        <span>Yes, guests who book via Freebookings.nl may send their check-in form via fax</span>
                    </label>
                </div>
            </div>
        </div>
    </div><!-- /form-block -->

    <div class="form-block">
        <div class="form-group">
            <label class="col-lg-4"><b>Tourist tax</b></label>
            <div class="col-lg-3">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="tourist_tax_checkbox" ng-model="settings.tourist_tax_checkbox" ng-true-value="'true'" ng-false-value="'false'">
                        <span>Yes, tourist tax</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ui-radio ui-radio-primary">
                    <label class="ui-radio-block">
                        <input type="radio" name="tax_amt" value="per room" ng-model="settings.tax_amt">
                        <span>Per room, Per night</span>
                    </label>
                    <label class="ui-radio-block">
                        <input type="radio" name="tax_amt" value="per person" ng-model="settings.tax_amt">
                        <span>Per person, Per night</span>
                    </label>

                    <label class="ui-radio">
                        <input type="radio" name="tax_amt" value="percentage" ng-model="settings.tax_amt">
                        <span>Percentage</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-4 col-lg-offset-4">
                <div class="input-group ">
                    <div class="input-group-btn">
                        <button class="btn btn-success fa fa-euro" type="button"></button>
                    </div>
                    <input type="text" placeholder="Tax amount" class="form-control" name="tax_amt_val" ng-model="settings.tax_amt_val">
                </div>
            </div>
        </div>
    </div><!-- /form-block -->
    <div class="form-block">
        <div class="form-group">
            <label class="col-lg-4"><b>Received invoices by Freebookings.nl</b></label>
            <div class="col-lg-2">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="invoice_by_freebookings[0]" ng-true-value="'1'" ng-model="settings.invoice_by_freebookings[0]">
                        <span>Via E-Mail</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="invoice_by_freebookings[1]" ng-true-value="'1'" ng-model="settings.invoice_by_freebookings[1]">
                        <span>Via Fax</span>
                    </label>
                </div>
            </div>
        </div>
    </div><!-- /form-block -->
    <div class="form-block">
        <div class="form-group">
            <label class="col-lg-4"><b>Receive reservations by Freebookings.nl</b></label>
            <div class="col-lg-2">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="reservations_by_freebookings[0]"  ng-true-value="'1'" ng-model="settings.reservations_by_freebookings[0]">
                        <span>Via E-Mail</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="reservations_by_freebookings[1]"  ng-true-value="'1'" ng-model="settings.reservations_by_freebookings[1]">
                        <span>Via Fax</span>
                    </label>
                </div>
            </div>
        </div>
    </div><!-- /form-block -->
    <div class="form-block">
        <div class="form-group">
            <label class="col-lg-4"><b>Would you like to receive a message, when no rooms/arrangements are available anymore?</b></label>
            <div class="col-lg-2">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="no_rooms_freebookings[0]"  ng-true-value="'1'" ng-model="settings.no_rooms_freebookings[0]">
                        <span>Via E-Mail</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="no_rooms_freebookings[1]"  ng-true-value="'1'" ng-model="settings.no_rooms_freebookings[1]">
                        <span>Via Fax</span>
                    </label>
                </div>
            </div>
        </div>
    </div><!-- /form-block -->
    <div class="form-block">
        <div class="form-group">
            <label class="col-lg-4"><b>Would you like to receive a message with a guest list (arrivals this morning)?</b></label>
            <div class="col-lg-2">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="guest_arrival[0]"  ng-true-value="'1'" ng-model="settings.guest_arrival[0]">
                        <span>Via E-Mail</span>
                    </label>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label>
                        <input type="checkbox" name="guest_arrival[1]"   ng-true-value="'1'" ng-model="settings.guest_arrival[1]">
                        <span>Via Fax</span>
                    </label>
                </div>
            </div>
        </div>
    </div><!-- /form-block -->
    <div class="form-block">
        <h3 class="text-uppercase text-bold mb30">Control engine page display setting.</h3>
        <div class="mb30">
            <div class="ui-radio ui-radio-primary">
                <label class="ui-radio-block">
                    <input type="radio" name="engine_page_display" value="hotel_info" ng-model="settings.engine_page_display">
                    <span>Set hotel information page to display first.</span>
                </label>
            </div>
            <div class="ui-radio ui-radio-primary">
                <label class="ui-radio">
                    <input type="radio" name="engine_page_display" value="arrangement" ng-model="settings.engine_page_display">
                    <span>Set arrangement page to display first.</span>
                </label>
            </div>
            <div class="ui-radio ui-radio-primary">
                <label class="ui-radio-block">
                    <input type="radio" name="engine_page_display" value="kamer" ng-model="settings.engine_page_display">
                    <span>Set kamer page to display first.</span>
                </label>
            </div>
            <div class="ui-radio ui-radio-primary">
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
