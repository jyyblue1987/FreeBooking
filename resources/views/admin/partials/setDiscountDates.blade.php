<div class="row">
    <div class="col-lg-8">
        <div class="row">

            <form  name="wizard-step-2" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="setDiscountDates({{ Auth::User()->id }})" ng-init="getDiscountDates({{ Auth::User()->id }}, true)">

                {{ csrf_field() }}
                @include('admin.partials.__changeAvailabilityPriceForm')

                <div class="form-group" ng-show="next">
                    <label class="col-lg-4 control-label">Type</label>
                    <div class="col-lg-4">
                            <div class="ui-radio ui-radio-success  padding-6">
                                <label class="ui-radio-inline">
                                    <input type="radio" name="discount_compare" value="dailyprice" ng-model="price.discount_compare">
                                    <span>Price Discount</span>
                                </label>
                            </div>
                    </div>

                </div>

                <div class="form-group">

                    <label class="col-lg-4 control-label">Vroegboek Korting</label>
                    <div class="col-lg-4">
                        <div class="ui-checkbox ui-checkbox-success padding-6">
                            <label>
                                <input type="checkbox" name="discount_type" ng-true-value="'earlybooking'" value="earlybooking" ng-model="price.discount_type">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group" ng-show="next">
                    <label class="col-lg-4 control-label">From</label>
                    <div class="col-lg-4">
                        <div class="input-group ">
                           <input type="text" placeholder="From" class="form-control" name="start" ng-model="price.start">
                        </div>
                    </div>
                </div>
                <div class="form-group" ng-show="next">
                    <label class="col-lg-4 control-label">Till</label>
                    <div class="col-lg-4">
                        <div class="input-group ">
                            <input type="text" placeholder="Till" class="form-control" name="till" ng-model="price.till">
                        </div>
                    </div>
                </div>


                <div class="form-group" ng-show="save">
                    <label class="col-lg-4 control-label">Price</label>
                    <div class="col-lg-4">
                        <div class="row" ng-repeat="normalPrice in priceVanaf track by $index">
                            <div class="input-group" >
                                &euro; @{{ normalPrice }}
                            </div>
                         </div>
                        <div class="row" ng-repeat="enterDiscount in discountPrice">
                            <div class="input-group" >
                                <input type="text" placeholder="Discount" class="form-control" ng-model="price.discount_price[enterDiscount]"  name="discount_price[enterDiscount]">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix right">

                    <button  class="btn btn-primary right" type="button" ng-show="next" ng-click="discountDatesNext({{ Auth::User()->id }})">Next</button>

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

<div class="row" ng-show="showTable">
    <div class="col-lg-12" >



        <table class="table table-bordered table-striped" >
            <thead>
            <tr>

                <th>
                    From

                </th>
                <th>
                    To

                </th>
                <th>
                    Type

                </th>
                <th>
                    Price

                </th>
                <th>
                    Start

                </th>
                <th>
                    Till

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
            <tr ng-repeat="data in disCountData track by $index">


                <td>@{{data.start}}</td>
                <td>@{{data.end}} </td>

                <td>@{{data.discount_type}}</td>
                <td>
                    <span ng-repeat="price in data.discount_price track by $index">

                        @{{ price }}

                        <span ng-show="$index < data.discount_price.length - 1"> en </span>

                    </span></td>

                <td>@{{data.from}}<sup>e</sup> Nights</td>
                <td>@{{data.till}}<sup>e</sup> Nights</td>

                <td>@{{data.Days}}</td>
                <td> <div class="btn-group mr5">

                        <button title="Edit" type="button" class="btn btn-default fa fa-edit" ng-click="discountDateEdit(data.uid,  data.ref_id, data.start, data.end , data.format_days, data.discount_type, data.discount_compare, data.from, data.till)"></button>

                        <button title="delete" type="button" class="btn btn-default fa fa-trash" ng-click = "discountDateDelete('Discount Dates', 'Price set-up deleted!', data.uid, data.ref_id, data.start, data.end, data.format_days)"></button>

                    </div>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>






