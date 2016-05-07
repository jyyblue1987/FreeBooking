<div class="alert alert-danger" ng-show="errors">
    <strong>Whoops! Something went wrong!</strong>
    <br><br>
    <ul ng-repeat="n in errors track by $index">
        <li> @{{n}}</li>
    </ul>
</div>

<form  name="wizard-step-2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="addHotel()" ng-init="loadHotelData()">
    {{ csrf_field() }}

    <div class="form-block">
        <div class="form-group">
            <label class="col-lg-4 control-label">Address</label>
            <div class="col-lg-8">
                <input type="text" placeholder="Street and unit number" ng-model="hotel.address" name="address" value="Testing" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">Zip</label>
            <div class="col-lg-8">
                <input type="text" placeholder="Post code" ng-model="hotel.postcode"  name="postcode" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">Country</label>
            <div class="col-lg-8">
                <select id="country" ng-model="hotel.country" name="country" class="form-control" ng-change="getState()" >
                    <option value=""> Select your Country </option>


                    <option ng-repeat="(key, value) in countries" value="@{{key}}" ng-selected="key == hotel.country"> @{{value}} </option>

                </select>
             </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">State</label>
            <div class="col-lg-8">
                <select id="state" ng-model="hotel.state" ng-disabled="!hotel.country" name="state" class="form-control" >
                    <option value=""> Select State </option>


                    <option  ng-repeat="state in hotel.states" value="@{{state}}" ng-selected="state == hotel.state">@{{ state }}</option>

                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">City</label>
            <div class="col-lg-8">
                <input type="text" placeholder="City" ng-model="hotel.city" name="city" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">Phone</label>
            <div class="col-lg-8">
                <input type="text" placeholder="+31 (0) 515 712 465" ng-model="hotel.phone"  name="phone" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">Fax</label>
            <div class="col-lg-8">
                <input type="text" placeholder="+31 (0) 515 712 465" ng-model="hotel.fax"  name="fax" class="form-control">
            </div>
        </div>
    </div><!-- /form-block -->

    <div class="form-block">
        <div class="form-group">
            <label class="col-lg-4 control-label">Check in</label>
            <div class="col-lg-8">
                <input type="text" placeholder="Select Check in time (Dirty)" ng-model="hotel.check_in"  name="check_in" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">Check out</label>
            <div class="col-lg-8">
                <input type="text" placeholder="Select Check out time (Dirty)" ng-model="hotel.check_out"  name="check_out" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">Stars</label>
            <div class="col-lg-8">
                <div class="star-wrap">
                    <rating ng-model="hotel.overStar" name="overStar" max="5" readonly="isReadonly" on-hover="hoveringOver(value)" on-leave="overStar = null" state-on="'glyphicon glyphicon-star'" state-off="'glyphicon glyphicon-star-empty'"></rating>
                </div>
            </div>
        </div>
    </div><!-- /form-block -->


    <div class="form-block">
        <h3 class="text-uppercase text-bold mb30">Bank Details</h3>

        <div class="form-group">
            <label class="col-lg-4 control-label">Bank account number</label>
            <div class="col-lg-8">
                <input type="text" placeholder="Bank account number" ng-model="hotel.account_number"  name="account_number" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">Giro account number</label>
            <div class="col-lg-8">
                <input type="text" placeholder="Giro account number" ng-model="hotel.giro_account_number"  name="giro_account_number" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">International bank account number</label>
            <div class="col-lg-8">
                <div class="mb15">
                    <input type="text" placeholder="Enter I-BAN" ng-model="hotel.iban_number"  name="iban_number" class="form-control">
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <select id="swift_ibc" ng-model="hotel.swift_ibc" name="swift_ibc" class="form-control" >
                            <option></option>
                            <option value="swift">SWIFT</option>
                            <option value="ibc">IBC</option>
                        </select>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" placeholder="Enter Swift code or Ibc Number" ng-model="hotel.swift_ibc_number"  name="swift_ibc_number" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">IHK number</label>
            <div class="col-lg-8">
                <input type="text" placeholder="IHK number" ng-model="hotel.ihk_number"  name="ihk_number" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label">Tax number</label>
            <div class="col-lg-8">
                <input type="text" placeholder="Tax number" ng-model="hotel.tax_number"  name="tax_number" class="form-control">
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