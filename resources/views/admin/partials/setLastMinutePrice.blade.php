<div class="row">
    <form  name="wizard-step-2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="setlastMinute()" ng-init="getLastMinutePrices({{ Auth::User()->id }})">
    {{ csrf_field() }}

        @include('admin.partials.__changeAvailabilityPriceForm')
        <div class="form-group mb0">
            <label class="col-lg-4 control-label">Price</label>
            <div class="col-lg-4">
                <div class="input-group ">
                    <span class="input-group-addon fa fa-euro"></span>
                    <input type="number" min="1" placeholder="Set Price" class="form-control" name="cost" ng-model="price.cost" required>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-lg-offset-4">
            <button class="btn btn-primary" type="submit">Save</button>
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
                    Day(s)
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="data in lmData track by $index">
                <td>@{{data.start}}</td>
                <td>@{{data.end}} </td>

                <td>@{{data.price}}</td>
                <td>@{{data.Days}}</td>
                <td> <div class="btn-group mr5">

                        <button title="Edit" type="button" class="btn btn-default fa fa-edit" ng-click="edit(data.uid,  data.ref_id, data.start, data.end , data.format_days, data.price)"></button>

                        <button title="delete" type="button" class="btn btn-default fa fa-trash" ng-click = "delete('Last Minute', 'Price set-up deleted!', data.uid, data.ref_id, data.start, data.end, data.format_days)"></button>

                    </div>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>






