<!DOCTYPE   html>
<html lang="en">
<head>
    @include("head")
</head>
<body
        ng-app="app"
        id="app"
        class="app theme-zero" custom-page
        ng-class="{'layout-horizontal': isLayoutHorizontal}"
        ng-controller="AppCtrl"
        >


<div class="main-container clearfix">
<div class="page page-auth clearfix">

    <div class="auth-container">
        <!-- site logo -->
        <h1 class="site-logo h2 mb15"><a href="/"><span>App</span>&nbsp;Board</a></h1>
        <h3 class="text-normal h4 text-center">Sign in to your account</h3>

        @include("admin.common.errors")

        <div class="form-container">
            <form class="form-horizontal" action="login" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group form-group-lg">
                    <input class="form-control" name="email" type="text" placeholder="Username">
                </div>

                <div class="form-group form-group-lg">
                    <input class="form-control" name="password"  type="password" placeholder="Password">
                </div>

                <div class="clearfix"><a href="#/pages/forget-pass" class="right small">Forget your password?</a></div>
                <div class="clearfix mb15">
                    <button type="submit" class="btn btn-lg btn-w120 btn-primary text-uppercase">Sign In</button>
                    <div class="ui-checkbox ui-checkbox-primary mt15 right">
                        <label>
                            <input type="checkbox">
                            <span>Remember me</span>
                        </label>
                    </div>
                </div>


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