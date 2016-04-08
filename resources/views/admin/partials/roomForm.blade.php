<form  name="wizard-step-2" class="form-horizontal col-lg-10 col-lg-offset-1 ng-pristine ng-valid" style="" ng-submit="addNewRoom()" ng-show="!showRoom">

    <div class="form-group">
        <label class="col-lg-2 control-label">Name</label>
        <div class="col-lg-4">
            <input type="text" ng-model="newroom.name"/^\w+$/" name="name" class="form-control" placeholder="Room Name" required="please insert name">
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
            <input type="number" ng-model="newroom.number" min="1" name="number" class="form-control" placeholder="Number of Rooms" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Number of persons</label>
        <div class="col-lg-4">
            <input type="number" ng-model="newroom.number_persons" min="1" name="number_persons" placeholder="Number of Persons" class="form-control" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Price from</label>
        <div class="col-lg-4">
            <div class="input-group ">
                <span class="input-group-addon fa fa-euro"></span>
                <input type="number" ng-model="newroom.price" min="1" class="form-control" name="price" placeholder="Room Price" required>
            </div>
        </div>
    </div>
    <input type="hidden" name="language" ng-model="des.language" ng-init="des.language = '{{ Config::get('app.locale') }}'">
    <input type="hidden" name="user_id" ng-model="newroom.user_id" ng-init="newroom.user_id = {{ Auth::User()->id }}">
    <div class="form-group">
        <div class="col-lg-4 col-lg-offset-2">
            <button  class="btn btn-primary" type="submit">Save</button>
        </div>
    </div>

</form>