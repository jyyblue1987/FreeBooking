<form  name="wizard-step-2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="hotelText()" ng-init="loadHotelText()">

<div class="form-group">
    <label class="col-lg-2 control-label">Short description</label>
    <div class="col-lg-10">
        <div text-angular ng-model="text.short_description" class="text-angular-editor"></div>
    </div>
</div>


    <div class="form-group">
        <label class="col-lg-2 control-label">Long description</label>
        <div class="col-lg-10">
            <div text-angular  ng-model="text.long_description" class="text-angular-editor"></div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Locations</label>
        <div class="col-lg-10">
            <div text-angular  ng-model="text.hotel_locations" class="text-angular-editor"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2>Custom Fields</h2>
        </div>
    </div>
    <hr class="dashed mb30">


    <div class="form-group">
       <div class="col-lg-2">
            <input type="text" placeholder="Custom Title 1" ng-model="text.custom_title_1"  name="custom_title_1" class="form-control">
       </div>

        <div class="col-lg-10">
            <div text-angular  ng-model="text.custom_description_1" class="text-angular-editor"></div>
        </div>


    </div>


    <div class="form-group">

        <div class="col-lg-2">
            <input type="text" placeholder="Custom Title 2" ng-model="text.custom_title_2"  name="custom_title_2" class="form-control">
        </div>

        <div class="col-lg-10">
            <div text-angular  ng-model="text.custom_description_2" class="text-angular-editor"></div>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <h2>Events</h2>
            </div>
        </div>
        <hr class="dashed mb30">


        <div class="form-group">

            <div class="col-lg-2">
               Events
            </div>

            <div class="col-lg-10">
                    <div class="ui-checkbox ui-checkbox-success">
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

        <input type="hidden" name="user_id" ng-model="user_id" ng-init="user_id = {{ Auth::User()->id }}">

        <input type="hidden" name="language" ng-model="text.language" ng-init="text.language = '{{ Config::get('app.locale') }}'">
        <div class="clearfix right">

            <button  class="btn btn-primary right" type="submit">Save</button>

        </div>

    </div>
    </form>