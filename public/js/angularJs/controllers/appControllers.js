
/*** App Controllers
------------------------------------------------ ****/

/*** App Controller ***/
ctrls.controller("AppCtrl", ["$rootScope", "$scope","spinnerService", function ($rs, $scope,spinnerService) {

$scope.getLoaded1 =  function() {

var mm = window.matchMedia("(max-width: 767px)");
    $rs.isMobile = mm.matches ? !0 : !1, $rs.safeApply = function (fn) {
        var phase = this.$root.$$phase;
        "$apply" == phase || "$digest" == phase ? fn && "function" == typeof fn && fn() : this.$apply(fn)
    }, mm.addListener(function (m) {
        $rs.safeApply(function () {
            $rs.isMobile = m.matches ? !0 : !1
        })
    }), $scope.themeActive = "theme-zero", $scope.onThemeChange = function (theme) {
        $scope.themeActive = theme
    }, $rs.changeLayout = function () {
        $rs.isLayoutHorizontal = !$rs.isLayoutHorizontal
    }

}
}]);

/*** Head Controller ***/
ctrls.controller("HeadCtrl", ["$scope", "Fullscreen", "$rootScope", function ($scope, Fullscreen) {
    $scope.toggleSidebar = function () {
        $scope.sidebarOpen = $scope.sidebarOpen ? !1 : !0
    }, $scope.fullScreen = function () {
        Fullscreen.isEnabled() ? Fullscreen.cancel() : Fullscreen.all()
    }, $scope.toggleHorizontalNav = function () {
        $scope.isHorizontalCollapsed = !$scope.isHorizontalCollapsed
    }
}]);

/*** nav Controller ***/
ctrls.controller("NavCtrl", ["$scope", "$rootScope", function ($scope) {
    $scope.isCollapsed = !1
}]);

/*** Dashboard Conroller ***/
ctrls.controller("DashboardCtrl", ["$scope", "$rootScope", function ($scope) {
    $scope.linedata = {
        labels: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        series: [{name: "Earnings", data: [100, 150, 90, 40, 30, 50, 40]}, {
            name: "Downloads",
            data: [50, 100, 40, 25, 20, 35, 30]
        }]
    }, $scope.lineopts = {
        axisY: {offset: 25, labelOffset: {y: 5}},
        axisX: {showGrid: !1},
        showArea: !0,
        showLine: !1,
        showPoint: !0,
        fullWidth: !0
    }, $scope.serverpieoptions = {barColor: "#5974d9"}, $scope.serverpiepercent = 80, $scope.bouncepiepercent = 40, $scope.weathertoday = {
        icon: Skycons.PARTLY_CLOUDY_DAY,
        size: 48,
        color: "#38B4EE"
    }, $scope.forecastDetails = [{type: "Wind:", value: "7mph"}, {
        type: "Humidity:",
        value: "46%"
    }, {type: "Dew Pt:", value: "44"}, {type: "Visibility:", value: "1mi"}, {
        type: "Pressure:",
        value: "1015 mb"
    }, {type: "Precipitation", value: "55%"}], $scope.weatherweeks = [{
        icon: Skycons.PARTLY_CLOUDY_DAY,
        size: 32,
        color: "#fff",
        day: "Tue",
        temp: "34"
    }, {icon: Skycons.RAIN, size: 32, color: "#fff", day: "Wed", temp: "28"}, {
        icon: Skycons.SNOW,
        size: 32,
        color: "#fff",
        day: "Thu",
        temp: "4"
    }, {icon: Skycons.CLEAR_NIGHT, size: 32, color: "#fff", day: "Fri", temp: "40"}, {
        icon: Skycons.FOG,
        size: 28,
        color: "#fff",
        day: "Sat",
        temp: "-3"
    }, {
        icon: Skycons.SLEET,
        size: 28,
        color: "#fff",
        day: "Sun",
        temp: "18"
    }], $scope.donutdata = {
        series: [48, 17, 19, 16],
        labels: ["Chrome: 48%", "Firefox: 17%", "IE: 19%", "Other: 16%"]
    }, $scope.donutopts = {
        donut: !0,
        donutWidth: 40,
        startAngle: 320,
        total: 0,
        showLabel: !0,
        chartPadding: 25,
        labelOffset: 30,
        labelDirection: "explode"
    }, $scope.donutdraw = function (data) {
        var colors = ["#EC407A", "#7E57C2", "#A1887F", "#90A4AE"], elem = data.element._node;
        "label" == data.type && (elem.style.fill = colors[data.index]), "slice" == data.type && (elem.style.stroke = colors[data.index], elem.style["-webkit-transition"] = ".2s ease-in", elem.style.transition = ".2s ease-in", elem.addEventListener("mouseover", function () {
            elem.style["stroke-width"] = "48px"
        }), elem.addEventListener("mouseout", function () {
            elem.style["stroke-width"] = "40px"
        }))
    }, $scope.storedEmails = ["Jkae@gmail.com", "Rks@gmail.com", "dino13@yahoo.com", "streeks_sam@outlook.com", "Kangle@msn.com", "RoniScrew@gmail.com"], $scope.storedEmailsDemo = ["Rks@gmail.com", "dino13@yahoo.com"]
}]);

/*** Page Profile Controller ***/
ctrls.controller("PageProfileCtrl", ["$scope", function ($scope) {
    $scope.linedata = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Nov", "Dec"],
        series: [{data: [50, 80, 100, 90, 120, 50, 80, 56, 135, 75, 148]}]
    }, $scope.lineopts = {axisY: {offset: 25, labelOffset: {y: 5}}, axisX: {showGrid: !1, labelOffset: {x: 10}}}
}]);


ctrls.controller('OptionalEventEndDatesCtrl', function(moment) {

var vm = this;

vm.events = [{
    title: 'No event end date',
    startsAt: moment().hours(3).minutes(0).toDate(),
    type: 'info',
    draggable: true
    },
    {
    title: 'No event end date',
    startsAt: moment().hours(5).minutes(0).toDate(),
    type: 'warning',
    draggable: true
}];

vm.calendarView = 'month';
vm.viewDate = new Date();

});


