<div class="row">
    <div class="col-lg-8">
        <div class="row">

            <form  name="wizard-step-2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="setDiscountDates()" ng-init="getDiscountDates({{ Auth::User()->id }})">

                {{ csrf_field() }}
                @include('admin.partials.__changeAvailabilityPriceForm')

                <div class="form-group">
                    <label class="col-lg-4 control-label">Type</label>
                    <div class="col-lg-4">
                            <div class="ui-radio ui-radio-success  padding-6">
                                <label class="ui-radio-inline">
                                    <input type="radio" name="korting_type" value="prices" ng-model="price.korting_type">
                                    <span></span>
                                </label>
                            </div>
                    </div>

                </div>

                <div class="form-group">

                    <label class="col-lg-4 control-label">Vroegboek Korting</label>
                    <div class="col-lg-4">
                        <div class="ui-checkbox ui-checkbox-success padding-6">
                            <label>
                                <input type="checkbox" name="earlybooking" ng-true-value="'earlybooking'" ng-model="price.earlybooking">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">From</label>
                    <div class="col-lg-4">
                        <div class="input-group ">
                           <input type="text" placeholder="From" class="form-control" name="start" ng-model="price.start">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Till</label>
                    <div class="col-lg-4">
                        <div class="input-group ">
                            <input type="text" placeholder="Till" class="form-control" name="till" ng-model="price.till">
                        </div>
                    </div>
                </div>
                <div class="clearfix right">

                    <button  class="btn btn-primary right" type="button" ng-show="next" ng-click="discountDatesNext()">Next</button>

                </div>

                <div class="clearfix right">

                    <button  class="btn btn-primary right" type="submit" ng-show="save" >Save</button>

                </div>
                <input type="hidden" name="edit" ng-model="price.edit" ng-init="price.edit = 'new'">
            </form>
</div>
</div>

    <div class="col-lg-4">


        This is the information area!!!
    </div>
</div>
<hr class="dashed mb30">
<div class="row">
    <div class="col-lg-12" ng-if = "show">



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






