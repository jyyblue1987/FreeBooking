<form  name="wizard-step-2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="changeRoomData()">
{{ csrf_field() }}

    @include('admin.partials.__changeAvailabilityPriceForm')
    <div class="form-group">
        <label class="col-lg-4 control-label">Price</label>
        <div class="col-lg-4">
            <div class="input-group mb0">
                <span class="input-group-addon fa fa-euro"></span>
                <input type="number" min="1" placeholder="Set Price" class="form-control" name="cost" ng-model="price.cost" required>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-lg-offset-4">
        <button  class="btn btn-primary" type="submit">Save</button>
    </div>
    <input type="hidden" name="edit" ng-model="price.edit" ng-init="price.edit = 'price'">
</form>




