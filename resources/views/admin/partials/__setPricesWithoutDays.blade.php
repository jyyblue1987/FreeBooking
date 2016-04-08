<div class="form-group">
    <label class="col-lg-4 control-label">Select Dates</label>
    <div class="col-lg-4">
        <input type="text" placeholder="From" ng-model="price.from" name="from" class="form-control" required="required">
    </div>
    <div class="col-lg-4">
        <input type="text" placeholder="Until" ng-model="price.to" name="to" class="form-control" required="required">
    </div>
</div>
<input type="hidden" name="user_id" ng-model="user.user_id" ng-init="user.user_id = {{ Auth::User()->id }}">