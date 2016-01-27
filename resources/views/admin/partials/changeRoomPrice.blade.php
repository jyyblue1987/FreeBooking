<form  name="wizard-step-2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="changeRoomData()">
{{ csrf_field() }}

    @include('admin.partials.__changeAvailabilityPriceForm');
    <div class="form-group">
        <label class="col-lg-4 control-label">Price</label>
        <div class="col-lg-4">
            <div class="input-group ">
                <div class="input-group-btn">
                    <button class="btn btn-success fa fa-euro" type="button"></button>
                </div>
                <input type="text" placeholder="Set Price" class="form-control" name="cost" ng-model="price.cost">
            </div>
        </div>
    </div>
    <div class="clearfix right">

        <button  class="btn btn-primary right" type="submit">Save</button>

    </div>
    <input type="hidden" name="edit" ng-model="price.edit" ng-init="price.edit = 'price'">
</form>




