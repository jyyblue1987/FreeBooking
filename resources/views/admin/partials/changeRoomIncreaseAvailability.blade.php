<div class="row">
<form  name="newroomsFormStep2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="newroomsFormStep2.$valid && changeRoomData()" ng-init = "loadRoomSpecs()">
{{ csrf_field() }}

    @include('admin.partials.__changeAvailabilityPriceForm')
    <div class="form-group">
        <label class="col-lg-4 control-label">Rooms</label>
        <div class="col-lg-4">
            <div class="input-group mb0">
                <span class="input-group-addon fa fa-home"></span>
                <input type="number" name="number" min="1" placeholder="Set Available" class="form-control" ng-model="price.available" numeric-validity required>
            </div>
        </div>
        <div class="col-lg-8 col-lg-push-4">
            <span class="text-danger" ng-show="newroomsFormStep2.number.required">insert number of available rooms</span>
            <span class="text-danger" ng-show="newroomsFormStep2.number.min">min 1 is required</span>            
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-4 control-label pt0">For</label>
        <div class="col-lg-8">
            <div class="ui-radio ui-radio-primary mb0">
                <label class="ui-radio-inline">
                    <input type="radio" name="rooms" value="thisroom" ng-model="price.rooms">
                    <span>Only this room ({{ $name }})</span>
                </label>
                <label class="ui-radio-inline">
                    <input type="radio" name="rooms" value="all" ng-model="price.rooms">
                    <span>  All @{{ count }} Rooms </span>
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-4">
            <button  class="btn btn-primary" type="submit">Save</button>
        </div>
        <input type="hidden" name="edit" ng-model="price.edit" ng-init="price.edit = 'increase'">
    </div>
</form>
</div>