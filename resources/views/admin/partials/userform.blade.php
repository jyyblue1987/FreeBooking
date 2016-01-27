<div class="alert alert-danger" ng-show="errors">
    <strong>Whoops! Something went wrong!</strong>

    <br><br>

    <ul ng-repeat="n in errors track by $index">

            <li> @{{n}}</li>

    </ul>
</div>

<form  name="wizard-step-1" class="form-horizontal col-lg-10 ng-pristine ng-valid" style="" ng-submit="push()" enctype="multipart/form-datas">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="col-lg-4 control-label">Gender</label>
        <div class="btn-group col-lg-8">
            <label class="btn btn-default ng-untouched ng-valid ng-dirty" ng-model="person.gender" btn-radio="'m'" data-value="m" uncheckable="">Man</label>
            <label class="btn btn-default ng-untouched ng-valid ng-dirty" ng-model="person.gender" btn-radio="'f'" data-value="f" uncheckable="">Woman</label>

        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-4 control-label">Hotel Type</label>
        <div class="btn-group col-lg-8">
            <label class="btn btn-default ng-untouched ng-valid ng-dirty" ng-model="person.hotel_type" btn-radio="'hotel'" data-value="hotel" uncheckable="">Hotel</label>
            <label class="btn btn-default ng-untouched ng-valid ng-dirty" ng-model="person.hotel_type" btn-radio="'Bed & Breakfast'" data-value="Bed & Breakfast" uncheckable="">Bed & Breakfast</label>

        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4 control-label">Initials</label>
        <div class="col-lg-8">
            <input type="text" placeholder="Must be atleast 4 chars long" ng-minlength="4" ng-model="person.initials" name="initials" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4 control-label">Name</label>
        <div class="col-lg-4">
            <input type="text" placeholder="First Name" ng-model="person.first_name" name="first_name" class="form-control">
        </div>
        <div class="col-lg-4">
            <input type="text" placeholder="Last Name" ng-model="person.last_name" name="last_name"  class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4 control-label">Hotel Name</label>
        <div class="col-lg-8">
            <input type="text" placeholder="Hotel Name" ng-model="person.hotel_name" name="hotel_name" class="form-control">
        </div>

    </div>

    <div class="form-group">
        <label class="col-lg-4 control-label">Website Address</label>
        <div class="col-lg-8">
            <input type="URL" placeholder="http://www.freebookings.nl" ng-model="person.website_url"  name="website_url" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4 control-label">Email</label>
        <div class="col-lg-8">
            <input type="email" placeholder="shams@freebookings.nl" ng-model="person.email"  name="email" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-4 control-label">Address</label>
        <div class="col-lg-8">
            <input type="text" placeholder="Street and unit number" ng-model="person.address" name="address" class="form-control">
        </div>
    </div>




    <div class="form-group">
        <label class="col-lg-4 control-label">Zip</label>
        <div class="col-lg-8">
            <input type="text" placeholder="Post code" ng-model="person.postcode" name="postcode" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-4 control-label">City</label>
        <div class="col-lg-8">
            <input type="text" placeholder="City" ng-model="person.city" name="city" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-4 control-label">State</label>
        <div class="col-lg-8">
            <input type="text" placeholder="State" ng-model="person.state" name="state" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-4 control-label">Country</label>
        <div class="col-lg-8">
            <input type="text" placeholder="Country" ng-model="person.country" name="country" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4 control-label">Phone</label>
        <div class="col-lg-8">
            <input type="text" placeholder="+31 (0) 515 712 465" ng-model="person.phone"  name="phone" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-4 control-label">Fax</label>
        <div class="col-lg-8">
            <input type="text" placeholder="+31 (0) 515 712 465" ng-model="person.fax"  name="fax" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4 control-label">Date of Birth</label>
        <div class="col-lg-8">
            <input type="date" placeholder="yyyy-mm-dd" name="birth_date" ng-model="person.birth_date" class="form-control">
        </div>
    </div>

    <div class="form-group">


            <label class="col-lg-4 control-label">Profile Picture</label>


        <div class="col-lg-8">



            <input type="file"  name="profile_picture" ng-model="person.profile_picture" title="Add profile picutre">



        </div>

    </div>






    <div class="form-group">
        <label class="col-lg-4 control-label">Password</label>
        <div class="col-lg-8">
            <input type="password" name="password" placeholder="Atleast 6 chars long" ng-model="person.password" class="form-control">
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-4 control-label">Confirm Password</label>
        <div class="col-lg-8">
            <input type="password" name="password_confirmation" placeholder="Atleast 6 chars long" ng-model="person.password_confirmation" class="form-control">
        </div>
    </div>



    <div class="clearfix">
        <button  class="btn btn-primary right" type="submit"  >Save</button>
    </div>
</form>