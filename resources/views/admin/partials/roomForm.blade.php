<form  name="wizard-step-2" class="form-horizontal col-lg-10 col-lg-offset-1 ng-pristine ng-valid" style="" ng-submit="addNewRoom()" ng-show="!showRoom">

    <div class="form-group">
        <label class="col-lg-2 control-label">Name</label>
        <div class="col-lg-4">
            <input type="text" placeholder="Room Name" ng-model="newroom.name"  name="name" class="form-control">
        </div>
        <div class="col-lg-6">
            &nbsp;
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Description</label>
        <div class="col-lg-10">
            <div text-angular  ng-model="des.description" class="text-angular-editor"></div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Available Rooms</label>
        <div class="col-lg-4">
            <input type="number" placeholder="Number of Rooms" ng-model="newroom.number"  name="number" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Number of persons</label>
        <div class="col-lg-4">
            <input type="number" placeholder="Number of Persons" ng-model="newroom.number_persons"  name="number_persons" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Price from</label>
        <div class="col-lg-4">
            <div class="input-group ">
                <div class="input-group-btn">
                    <button class="btn btn-success fa fa-euro" type="button"></button>
                </div>
                <input type="text" placeholder="Room Price" class="form-control" name="price" ng-model="newroom.price">
            </div>
        </div>
    </div>
    <input type="hidden" name="language" ng-model="des.language" ng-init="des.language = '{{ Config::get('app.locale') }}'">
    <input type="hidden" name="user_id" ng-model="newroom.user_id" ng-init="newroom.user_id = {{ Auth::User()->id }}">
    <div class="form-group">
        <div class="col-lg-12">
            <div class="clearfix">
                <button  class="btn btn-primary right" type="submit"  >Save</button>
            </div>
        </div>
    </div>




</form>