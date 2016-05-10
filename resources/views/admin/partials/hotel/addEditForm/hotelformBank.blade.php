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
                    <div class="col-lg-4">
                        <div class="select-box">
                            <select id="swift_ibc" ng-model="hotel.swift_ibc" name="swift_ibc" class="form-control" >
                                <option></option>
                                <option value="swift">SWIFT</option>
                                <option value="ibc">IBC</option>
                            </select>
                        </div><!-- /select-box -->
                    </div>
                    <div class="col-lg-8">
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