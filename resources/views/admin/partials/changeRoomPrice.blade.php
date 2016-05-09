<div class="row">
<form  name="newroomsFormStep2" class="form-horizontal col-lg-10" ng-submit="newroomsFormStep2.$valid && changeRoomData()">
{{ csrf_field() }}

    @include('admin.partials.__changeAvailabilityPriceForm')
    <div class="form-group">
        <label class="col-lg-4 control-label">Price</label>
        <div class="col-lg-4">
            <div class="input-group mb0">
                <span class="input-group-addon fa fa-euro"></span>
                <input type="text" name="cost" placeholder="Set Price" class="form-control" ng-model="price.cost" numeric-validity required>
            </div>
        </div>
        <div class="col-lg-8 col-lg-push-4">
            <span ng-show="newroomsFormStep2.cost.$error.numeric">Insert valid number</span>
            <span ng-show="newroomsFormStep2.cost.required">insert price</span>
            <span ng-show="newroomsFormStep2.cost.$error.numericmin">Insert positive value</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-4">
            <button  class="btn btn-primary" type="submit">Save</button>
        </div>
        <input type="hidden" name="edit" ng-model="price.edit" ng-init="price.edit = 'price'">
    </div>
</form>
</div>