<div class="row">
<form  name="wizard-step-2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="setNonRefundable()" ng-init="getNonRefundable({{ Auth::User()->id }})">
{{ csrf_field() }}

    @include('admin.partials.__setPricesWithoutDays')
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
    <input type="hidden" name="edit" ng-model="price.edit" ng-init="price.edit = 'new'">
</form>
</div>
<hr class="dashed mb30">
<div class="row">
    <div class="col-lg-12" ng-show = "show">



        <table class="table table-bordered table-striped" >
            <thead>
            <tr>

                <th>
                    From

                </th>
                <th>
                    Till

                </th>
                <th>
                    Price

                </th>

                <th>
                    Action

                </th>

            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="data in nfData track by $index">


                <td>@{{data.start}}</td>
                <td>@{{data.end}} </td>

                <td>@{{data.price}}</td>

                <td> <div class="btn-group mr5">

                        <button title="Edit" type="button" class="btn btn-default fa fa-edit" ng-click="editNf(data.uid,  data.ref_id, data.start, data.end, data.price)"></button>

                        <button title="delete" type="button" class="btn btn-default fa fa-trash" ng-click = "deleteNf('Single-Use', 'Price set-up deleted!', data.uid, data.ref_id, data.start, data.end)"></button>

                    </div>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>






