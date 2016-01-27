<form  name="wizard-step-2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="changeRoomData()" ng-init = "loadRoomSpecs()">
{{ csrf_field() }}

    @include('admin.partials.__changeAvailabilityPriceForm');
    <div class="form-group">
        <label class="col-lg-4 control-label">Rooms</label>
        <div class="col-lg-4">
            <div class="input-group ">
                <div class="input-group-btn">
                    <button class="btn btn-success fa fa-home" type="button"></button>
                </div>
                <input type="text" placeholder="Set Available" class="form-control" name="cost" ng-model="price.available">
            </div>
        </div>
    </div>
    <div class="form-group">


        <label class="col-lg-4 control-label">For</label>



            <div class="ui-radio ui-radio-success col-lg-8">
                <label class="ui-radio-inline">
                    <input type="radio" name="rooms" value="thisroom" ng-model="price.rooms">
                    <span>Only this room ({{ $name }})</span>
                </label>
            </div>
    </div>

        <div class="ui-radio ui-radio-success col-lg-8 col-lg-offset-4">
                <label class="ui-radio-inline">
                    <input type="radio" name="rooms" value="all" ng-model="price.rooms">
                    <span>	All @{{ count }} Rooms </span>
                </label>
        </div>






    <input type="hidden" name="edit" ng-model="price.edit" ng-init="price.edit = 'available'">



    <div class="clearfix right">

        <button  class="btn btn-primary right" type="submit">Save</button>

    </div>
</form>




