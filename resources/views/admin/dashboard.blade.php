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

<header class="site-head clearfix"
        id="site-head"
        ng-controller="HeadCtrl"
        ng-include=" 'administrator/header' ">
    <!-- linked header (static) view -->
</header>


<div class="main-container clearfix">
    <spinner name="html5spinner" register="true" on-loaded="getLoaded();">
        <div class="overlay"></div>
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
        <div class="please-wait">Please wait while we are working on your request...</div>
    </spinner>
    <aside class="nav-wrap"
           id="site-nav"
           ng-controller="NavCtrl"
           ng-include=" 'administrator/navigation' " custom-scrollbar>

    </aside>




    <div class="content-container" ng-class="{container: isLayoutHorizontal}" id="content" ng-view>
        <!-- content using routing -->

    </div>


    @include("footer")


</div>


@include("scripts.headScripts")

</body>

</html>