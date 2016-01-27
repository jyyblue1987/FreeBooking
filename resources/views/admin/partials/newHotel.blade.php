<div class="page page-form-wizard clearfix ng-scope">



    <ol class="breadcrumb breadcrumb-small">
        <li>Hotels</li>
        <li class="active"><a href="#/hotels">All Hotels</a></li>
    </ol>

    <div class="page-wrap panel panel-body">

        <div class="row">
            <div class="col-lg-12">
                <h2>{{trans('hotelregister.heading_title')}}</h2>
            </div>
        </div>

        <hr class="dashed mb30">

        <div class="row">

            <div class="col-lg-12">

                 <div ng-controller="hotelController">

                     @include('admin.partials.userform')

                 </div>





            </div>

        </div>

    </div>
</div>