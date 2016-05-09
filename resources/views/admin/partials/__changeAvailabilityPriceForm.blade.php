@inject('dayList','App\Http\Utilities\Utility')
<div class="form-group">
    <label class="col-lg-4 control-label">Select Days</label>
    <div class="btn-group col-lg-8">
        <select id="priceDay" ng-model="price.days" name="days" class="form-control">
            <option value=""> Select Days </option>
            @foreach($dayList::get_day_list() as $dayname => $dayval)
                <option value="{{ $dayname }}"> {{ $dayval }} </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group mb0" ng-controller="DatepickerCtrl">
    <label class="col-lg-4 control-label">Select Dates</label>
    <div class="col-lg-4">
        <div class="input-group">
            <input type="text" class="form-control" ng-model="price.from" name="from" datepicker-popup is-open="fromOpened" min-date="minDate" max-date="maxDate" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" show-button-bar="false" placeholder="From">
            <span class="input-group-btn">
                <button type="button" class="btn btn-sm fa fa-calendar" ng-click="fromOpen($event)"></button>
            </span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="input-group mb0">
            <input type="text" class="form-control" ng-model="price.to" name="to" datepicker-popup is-open="toOpened" min-date="minDate" max-date="maxDate" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" show-button-bar="false" placeholder="Until">
            <span class="input-group-btn">
                <button type="button" class="btn btn-sm fa fa-calendar" ng-click="toOpen($event)"></button>
            </span>
        </div>
    </div>
</div>
<input type="hidden" name="user_id" ng-model="user.user_id" ng-init="user.user_id = {{ Auth::User()->id }}">