<div class="row" >
    <div class="col-lg-12">
        <div flow-prevent-drop
              flow-drag-enter="class='panel-success'"
              flow-drag-leave="style={}"
              ng-style="style"
              ng-model="flow"
              flow-init="config"

              flow-file-success="imageSuccess( $file, $message, $flow )"
             >
            <div class="container-fluid">
                <h4>DROP ROOM PHOTOS HERE</h4>
                <hr class="soften"/>
                <p>
                    <a class="btn btn-small btn-primary" ng-click="$flow.resume()">Upload</a>
                    <a class="btn btn-small btn-warning" ng-click="$flow.pause()">Pause</a>
                    <a class="btn btn-small btn-danger" ng-click="$flow.cancel()">Cancel</a>
                    <span class="label label-default">Size: @{{$flow.getSize()}}</span>
                    <span class="label label-default">Is Uploading: @{{$flow.isUploading()}}</span>
                </p>
                <table class="table table-hover table-bordered table-striped" flow-transfers>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>


                        <th>Paused</th>
                        <th>Uploading</th>
                        <th>Completed</th>
                        <th>Settings</th>
                    </tr>
                    </thead>
                    <tr ng-repeat="file in transfers">
                        <td>@{{$index+1}}</td>
                        <td>@{{file.name}}</td>
                        <td>@{{file.paused}}</td>
                        <td>@{{file.isUploading()}}</td>
                        <td>@{{file.isComplete()}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-mini btn-warning" ng-click="file.pause()" ng-hide="file.paused">
                                    Pause
                                </a>
                                <a class="btn btn-mini btn-warning" ng-click="file.resume()" ng-show="file.paused">
                                    Resume
                                </a>
                                <a class="btn btn-mini btn-danger" ng-click="file.cancel()">
                                    Cancel
                                </a>
                                <a class="btn btn-mini btn-info" ng-click="file.retry()" ng-show="file.error">
                                    Retry
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <hr class="soften"/>

                <div class="panel mb30" flow-drop flow-drag-enter="class='drop-active'" flow-drag-leave="class=''" ng-class="class">
                    <div class="panel-body"> Drop images here </div>
                </div>
            </div><!-- /container-fluid -->
        </div><!-- /flow-file -->
    </div><!-- /col -->
</div><!-- /row -->

<div class="row" >
    <div class="col-lg-12">

        <div class="row">
            <spinner name="roomPhoto" on-loaded="getPhotoLoad()" >
                <div class="spinnerEdit">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </spinner>
            <div ng-repeat="photo in roomPhotos" ng-if="roomPhotos.length > 0">
                <div class="clearfix" ng-if="$index % 4 ==0"></div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive"  src="{{ URL::asset('/') }}uploads/@{{photo.hotel_id}}/rooms/@{{photo.room_id}}/size300/@{{photo.image}}" alt="" >
                        <div class="overlay">

                            <a class="info" ng-click="deletePhoto( photo.id,  $index)">Delete</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>