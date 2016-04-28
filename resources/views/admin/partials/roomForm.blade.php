<form  name="newroomsForm" class="form-horizontal col-lg-10 col-lg-offset-1" ng-submit="newroomsForm.$valid && addNewRoom()" ng-show="!showRoom" novalidate>

    <div class="form-group">
        <label class="col-lg-2 control-label">Name</label>
        <div class="col-lg-4">
            <input type="text" ng-model="newroom.name" name="name" class="form-control" placeholder="Room Name" string-validity required>
            <span ng-show="newroomsForm.name.$error.required">Enter Name Please</span>
            <span ng-show="newroomsForm.name.$error.string">Enter strings only</span>
        </div>
        <div class="col-lg-6">
            &nbsp;
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Description</label>
        <div class="col-lg-10">
            <div  ng-model="des.description" class="text-angular-editor" text-angular></div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Available Rooms</label>
        <div class="col-lg-4">
            <input type="number" ng-model="newroom.number" min="1" name="number" class="form-control" placeholder="Number of Rooms" integer-validity required>
            <span ng-show="newroomsForm.number.$error.integer">Insert valid number</span>
            <span ng-show="newroomsForm.number.$error.required">insert number of available rooms</span>
            <span ng-show="newroomsForm.number.$error.min">Negative value not allowed</span>            
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Number of persons</label>
        <div class="col-lg-4">
            <input type="number" ng-model="newroom.number_persons" min="1" name="number_persons" placeholder="Number of Persons" class="form-control" integer-validity required>
            <span ng-show="newroomsForm.number_persons.$error.integer">Insert valid number</span>
            <span ng-show="newroomsForm.number_persons.$error.required">insert number of pursons</span>
            <span ng-show="newroomsForm.number_persons.$error.min">Negative value not allowed</span>

        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Price from</label>
        <div class="col-lg-4">
            <div class="input-group ">
                <span class="input-group-addon fa fa-euro"></span>
                <input type="text" ng-model="newroom.price" min="1" class="form-control" name="price" placeholder="Room Price" numeric-validity required>
            </div>
            <span ng-show="newroomsForm.price.$error.numeric">Insert valid number</span>
            <span ng-show="newroomsForm.price.$error.required">insert price</span>
            <span ng-show="newroomsForm.price.$error.numericmin">Insert positive value</span>
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
