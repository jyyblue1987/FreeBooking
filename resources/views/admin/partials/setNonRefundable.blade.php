<div class="row">
<form  name="newroomsForm2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="newroomsForm2.$valid && setNonRefundable()" ng-init="getNonRefundable({{ Auth::User()->id }})">
{{ csrf_field() }}

    @include('admin.partials.__setPricesWithoutDays')
    <div class="form-group">
        <label class="col-lg-4 control-label">Price</label>
        <div class="col-lg-4">
            <div class="input-group mb0">
                <span class="input-group-addon fa fa-euro"></span>
                <input type="text" min="1" placeholder="Set Price" class="form-control" name="cost" ng-model="price.cost" numeric-validity required>
            </div>
            <span class="text-warning" ng-show="newroomsForm2.cost.$error.numeric">Insert valid number</span>
            <span class="text-warning" ng-show="newroomsForm2.cost.required">insert price</span>
            <span class="text-warning" ng-show="newroomsForm2.cost.$error.numericmin">Insert positive value</span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-8 col-lg-offset-4">
            <button  class="btn btn-primary" type="submit">Save</button>
        </div>
    </div>
    <input type="hidden" name="edit" ng-model="price.edit" ng-init="price.edit = 'new'">
</form>
</div>
<hr class="dashed mb30">
<div class="row">
    <div class="col-lg-12" ng-show = "show">

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>From</th>
                    <th>Till</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="data in nfData track by $index">


                        <td>@{{data.start}}</td>
                        <td>@{{data.end}} </td>
                        <td>@{{data.price}}</td>
                        <td class="action-td">
                            <div class="btn-group  btn-group-sm action-buttons">

                                <button title="Edit" type="button" class="btn btn-default btn-sm" ng-click="editNf(data.uid,  data.ref_id, data.start, data.end, data.price)"><i class="fa fa-edit"></i></button>

                                <button title="delete" type="button" class="btn btn-default btn-sm" ng-click = "deleteNf('Single-Use', 'Price set-up deleted!', data.uid, data.ref_id, data.start, data.end)"><i class="fa fa-trash"></i></button>

                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><!-- /table-responsive -->

    </div>
</div>






