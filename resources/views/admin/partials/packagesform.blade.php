<form nng-show="steps[1]" name="wizard-step-2" class="form-horizontal col-lg-10 ng-pristine ng-valid ng-hide" style="" ng-submit="stepNext(1, 'saveData')">


    {{ csrf_field() }}

    <button ng-click="stepNext(1, '')" class="btn btn-primary mr5" type="button">Previous</button>
    <button  class="btn btn-primary right" type="submit">Save</button>
</form>

