<div class="alert alert-danger" ng-show="errors">
    <strong>Whoops! Something went wrong!</strong>
    <br><br>
    <ul ng-repeat="n in errors track by $index">
        <li> @{{n}}</li>
    </ul>
</div>

<form  name="addHotelForm" class="form-horizontal col-lg-12 ng-pristine ng-valid" style="" ng-submit="addHotelForm.$valid && addHotel()" ng-init="loadHotelData()">
    {{ csrf_field() }}

    <div class="form-block">
        <h3 class="text-uppercase text-bold mb30">General Details</h3>
        <div class="form-group">
            <label class="col-lg-2 control-label">Address</label>
            <div class="col-lg-8">
                <input type="text" placeholder="Street and unit number" ng-model="hotel.address" name="address" value="Testing" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Zip</label>
            <div class="col-lg-8">
                <input type="text" pattern="[0-9]{5}" placeholder="Post code" ng-model="hotel.postcode"  name="postcode" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Country</label>
            <div class="col-lg-8">
                <div class="select-box">
                    <select id="country" ng-model="hotel.country" name="country" class="form-control" ng-change="getState()" >
                        <option value=""> Select your Country </option>


                        <option ng-repeat="(key, value) in countries" value="@{{key}}" ng-selected="key == hotel.country"> @{{value}} </option>

                    </select>
                </div><!-- /select-box -->
             </div>
        </div>
        <div ng-show="hotel.country">
            <div class="form-group">
                <label class="col-lg-2 control-label">State</label>
                <div class="col-lg-8">
                    <div class="select-box">
                        <select id="state" ng-model="hotel.state" ng-disabled="!hotel.country" name="state" class="form-control" >
                            <option value=""> Select State </option>

                            <option  ng-repeat="state in hotel.states" value="@{{state}}" ng-selected="state == hotel.state">@{{ state }}</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">City</label>
                <div class="col-lg-8">
                    <input type="text" placeholder="City" ng-model="hotel.city" name="city" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Phone</label>
                <div class="col-lg-8">
                    <input type="tel" placeholder="+99(99)9999-9999" ng-model="hotel.phone" name="phone" ng-pattern="/^\d{4}-\d{3}-\d{4}|^\d{4} \d{3} \d{4}|[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}|^\d{11}|[\+]\d{12}$/" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Fax</label>
                <div class="col-lg-8">
                    <input type="tel" name="fax" placeholder="+99(99)9999-9999" ng-model="hotel.fax" ng-pattern="/^\d{4}-\d{3}-\d{4}|^\d{4} \d{3} \d{4}|[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}|^\d{11}|[\+]\d{12}$/" class="form-control">
                </div>
            </div>
        </div>
    </div><!-- /form-block -->

    <div class="form-block">
        <div class="form-group">
            <label class="col-lg-2 control-label">Check in</label>
            <div class="col-lg-8">
                <div class="timepicker-holder">
                    <input type="time" ng-model="hotel.check_in" timepicker>
                </div><!-- /timepicker-holder -->
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Check out</label>
            <div class="col-lg-8">
                <div class="timepicker-holder">
                    <input type="time" ng-model="hotel.check_out" timepicker>                    
                </div><!-- /timepicker-holder -->
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Stars</label>
            <div class="col-lg-8">
                <div class="star-wrap">
                    <rating ng-model="hotel.overStar" name="overStar" max="5" readonly="isReadonly" on-hover="hoveringOver(value)" on-leave="overStar = null" state-on="'glyphicon glyphicon-star'" state-off="'glyphicon glyphicon-star-empty'"></rating>
                </div>
            </div>
        </div>
        <div class="row">
            <input type="hidden" name="user_id" ng-model="user_id" ng-init="user_id = {{ Auth::User()->id }}">
            <div class="col-lg-8 col-lg-offset-4">
                <button  class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
        
    </div><!-- /form-block -->



</form>