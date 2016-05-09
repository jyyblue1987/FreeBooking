<div class="row">
<form  name="newroomsForm2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="newroomsForm2.$valid && setMinStay()" ng-init="getMinimumStay({{ Auth::User()->id }})" >
{{ csrf_field() }}

    @include('admin.partials.__changeAvailabilityPriceForm')
    <div class="form-group">
        <label class="col-lg-4 control-label">Nights</label>
        <div class="col-lg-4">
            <input type="number" name="nights" min="1" placeholder="Set Nights" class="form-control" ng-model="price.nights" required>
        </div>
        <span class="text-danger" ng-show="newroomsForm2.nights.required">insert number of nights</span>
        <span class="text-danger" ng-show="newroomsForm2.nights.min">min 1 is required</span>

    </div>
    <div class="col-lg-8 col-lg-offset-4">
        <button  class="btn btn-primary" type="submit">Save</button>
    </div>
    <input type="hidden" name="edit" ng-model="price.edit" ng-init="price.edit = 'new'">
</form>
</div>
<hr class="dashed mb30">
<div class="row">
    <div class="col-lg-12" ng-show= "show">

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>From</th>
                    <th>Till</th>
                    <th>Price</th>
                    <th>Day(s)</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="data in msData track by $index">

                    <td>@{{data.start}}</td>
                    <td>@{{data.end}} </td>

                    <td>@{{data.nights}}</td>
                    <td>@{{data.Days}}</td>
                    <td class="action-td">
                        <div class="btn-group btn-group-sm action-buttons">

                            <button title="Edit" type="button" class="btn btn-default btn-sm" ng-click="editMs(data.uid,  data.ref_id, data.start, data.end , data.format_days, data.nights)"><i class="fa fa-edit"></i></button>

                            <button title="delete" type="button" class="btn btn-default btn-sm" ng-click = "deleteMs('Minimum Stay', 'Minimum Stay set-up deleted!', data.uid, data.ref_id, data.start, data.end, data.format_days)"><i class="fa fa-trash"></i></button>

                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><!-- /table-responsive -->

    </div>
</div>






