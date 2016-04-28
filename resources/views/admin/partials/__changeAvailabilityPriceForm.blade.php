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
<div class="form-group">
    <label class="col-lg-4 control-label">Select Dates</label>
    <div class="col-lg-4">
        <div class="input-group">
            <input type="text" placeholder="From" ng-model="price.from" name="from" class="form-control" required="required">
            <span class="input-group-addon fa fa-calendar"></span>
        </div>



        <!-- <datepicker ng-model="dt" min-date="minDate" show-weeks="true" class="datepicker"></datepicker> -->
        <div class="input-group" ng-controller="DatepickerDemoCtrl">
            <input type="text" class="form-control datepicker" datepicker-popup="" ng-model="dt" is-open="opened" min-date="minDate" max-date="'2025-06-22'" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" 
            show-button-bar="false"/>
            <span class="input-group-btn">
                <button type="button" class="btn btn-default fa fa-calendar" ng-click="open($event)"></i></button>
            </span>
        </div>





    </div>
    <div class="col-lg-4">
        <div class="input-group ">
            <input type="text" placeholder="Until" ng-model="price.to" name="to" class="form-control" required="required">
            <span class="input-group-addon fa fa-calendar"></span>
        </div>
    </div>
</div>
<input type="hidden" name="user_id" ng-model="user.user_id" ng-init="user.user_id = {{ Auth::User()->id }}">