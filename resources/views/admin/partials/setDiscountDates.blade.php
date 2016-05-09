<div class="row">
    <form  name="newroomsForm2" class="form-horizontal col-lg-10" ng-submit="newroomsForm2.$valid && setDiscountDates({{ Auth::User()->id }})" ng-init="getDiscountDates({{ Auth::User()->id }}, true)">

        {{ csrf_field() }}
        @include('admin.partials.__changeAvailabilityPriceForm')

        <div class="form-group mb0" ng-show="next">
            <label class="col-lg-4 control-label pt0">Type</label>
            <div class="col-lg-4">
                <div class="ui-radio ui-radio-primary">
                    <label class="ui-radio-inline">
                        <input type="radio" name="discount_compare" value="dailyprice" ng-model="price.discount_compare">
                        <span>Price Discount</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group mb0">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="ui-checkbox ui-checkbox-primary">
                    <label class="ui-checkbox-inline">
                        <input type="checkbox" name="discount_type" ng-true-value="'earlybooking'" value="earlybooking" ng-model="price.discount_type">
                        <span>Vroegboek Korting</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group" ng-show="price.discount_type" ng-controller="DatepickerCtrl">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="input-group">
                    <input type="text" class="form-control" ng-model="price.start" name="start" datepicker-popup is-open="eDFromOpened" min-date="minDate" max-date="maxDate" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" show-button-bar="false" placeholder="Start">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-sm fa fa-calendar" ng-click="eDFOpen($event)"></button>
                    </span>           
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group ">
                    <input type="text" class="form-control" ng-model="price.till" name="till" datepicker-popup is-open="eDTillOpened" min-date="minDate" max-date="maxDate" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" show-button-bar="false"  placeholder="Till">

                    <span class="input-group-btn">
                        <button type="button" class="btn btn-sm fa fa-calendar" ng-click="eDTOpen($event)"></button>
                    </span>           
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

        <div class="form-group">
            <div class="col-lg-8 col-lg-offset-4">
                <button  class="btn btn-primary" type="button" ng-show="next" ng-click="discountDatesNext({{ Auth::User()->id }})">Next</button>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8 col-lg-offset-4">
                <button  class="btn btn-primary" type="submit" ng-show="save">Save</button>
            </div>
            <input type="hidden" name="edit" ng-model="price.edit" ng-init="price.edit = 'new'">
        </div>
    </form>
</div>
<hr class="dashed mb30">
<div class="info-box">
    This is the information area!!!
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






