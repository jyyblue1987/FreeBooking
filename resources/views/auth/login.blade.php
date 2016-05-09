<!DOCTYPE   html>
<html lang="en">
<head>
    @include("head")
</head>
<body
        ng-app="app"
        id="app"
        class="app theme-zero body-fullscreen" custom-page
        ng-controller="AppCtrl"
        >


<div class="main-container clearfix">
<div class="page page-auth clearfix">

    <div class="auth-container">
        <!-- site logo -->


        @include("admin.common.errors")

        <div class="form-container login-container">

            <div class="login-logo">
                <img src="{{ URL::asset('/images/freebooking-logo.png') }}" alt="">
            </div>

            <h4 class="text-normal">please sign in to get access</h4>

            <form class="form-horizontal" action="login" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group form-group-lg">
                    <input class="form-control" name="email" type="text" placeholder="Username">
                </div>

                <div class="form-group form-group-lg">
                    <input class="form-control" name="password"  type="password" placeholder="Password">
                </div>

                <div class="clearfix mb15">

                    <div class="ui-checkbox ui-checkbox-primary mb15">
                        <label>
                            <input type="checkbox">
                            <span>Remember me</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-lg btn-block btn-primary">SINGIN</button>
                </div>
                <a href="#/pages/forget-pass" class="small">Forget your password?</a>


            </form>
        </div>

    </div>
    <!-- #end auth-wrap -->
</div>


</div>

@include("footer")

@include("scripts.headScripts")
</body>

</html>