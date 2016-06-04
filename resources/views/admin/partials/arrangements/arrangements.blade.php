
<div class="page page-form-wizard clearfix ng-scope">

    <ol class="breadcrumb breadcrumb-small">
        <li>Your Hotel</li>
        <li class="active"><a href="#/hotels"> Add New Arrangements</a></li>
    </ol>

    <div class="page-wrap panel" ng-controller="FormWizardCtrl">
    	<div class="panel-heading"><i>Add New Arrangements</i></div>
    	<div class="panel-body">

			<ul class="list-unstyled wizard-tabs mb30">
				<li ng-class="{active: steps[0]}">
					<span class="text" ng-click="stepNext(0)">Basic Info</span>
					<i class="fa fa-long-arrow-right"></i>
				</li>
				<li ng-class="{active: steps[1]}">
					<span class="text" ng-click="stepNext(1)">Price</span>
					<i class="fa fa-long-arrow-right"></i>
				</li>
				<li ng-class="{active: steps[2]}">
					<span class="text" ng-click="stepNext(2)">Room Availability</span>
					<i class="fa fa-long-arrow-right"></i>
				</li>
				<li ng-class="{active: steps[3]}">
					<span class="text" ng-click="stepNext(3)">Validity</span>
					<i class="fa fa-long-arrow-right"></i>
				</li>
				<li ng-class="{active: steps[4]}">
					<span class="text" ng-click="stepNext(4)">Upload Image</span>
				</li>
			</ul>

			
			@include( 'admin.partials.arrangements.parts.form-basic' )
			
			@include( 'admin.partials.arrangements.parts.form-price' )

			@include( 'admin.partials.arrangements.parts.form-rooms' )

			@include( 'admin.partials.arrangements.parts.form-validity' )

			@include( 'admin.partials.arrangements.parts.form-upload' )


    	</div><!-- /panel-body -->

    </div>

</div>
