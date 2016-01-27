<div class="panel-body">
        <div class="small text-bold left mt5">
            Show&nbsp;
            <select data-ng-model="numPerPage"
                    data-ng-options="num for num in numPerPageOpts"
                    data-ng-change="onNumPerPageChange()">
            </select>
            &nbsp;entries
        </div>

        <form class="form-horizontal right col-lg-4">
            <input type="text" class="form-control input-sm" placeholder="Type keyword" data-ng-model="searchKeywords" data-ng-keyup="search()">
        </form>
    </div>
    <!-- data table -->
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>
                ID
                <div class="th">
                    <i class="fa fa-caret-up icon-up"
                       ng-click=" order('id') "
                       ng-class="{active: row == 'id'}"></i>
                    <i class="fa fa-caret-down icon-down"
                       ng-click=" order('-id') "
                       ng-class="{active: row == '-id'}"></i>
                </div>
            </th>
            <th>
                Action

            </th>
            <th>
                Hotel(s)
                <div class="th">
                    <i class="fa fa-caret-up icon-up"
                       ng-click=" order('hotel_name') "
                       ng-class="{active: row == 'hotel_name'}"></i>
                    <i class="fa fa-caret-down icon-down"
                       ng-click=" order('-hotel_name') "
                       ng-class="{active: row == '-hotel_name'}"></i>
                </div>
            </th>
            <th>
               Owner
                <div class="th">
                    <i class="fa fa-caret-up icon-up"
                       ng-click=" order('first_name') "
                       ng-class="{active: row == 'first_name'}"></i>
                    <i class="fa fa-caret-down icon-down"
                       ng-click=" order('-first_name') "
                       ng-class="{active: row == '-first_name'}"></i>
                </div>
            </th>
            <th>
                FB Name
                <div class="th">
                    <i class="fa fa-caret-up icon-up"
                       ng-click=" order('grade') "
                       ng-class="{active: row == 'grade'}"></i>
                    <i class="fa fa-caret-down icon-down"
                       ng-click=" order('-grade') "
                       ng-class="{active: row == '-grade'}"></i>
                </div>
            </th>
            <th>
               REGISTERED
                <div class="th">
                    <i class="fa fa-caret-up icon-up"
                       ng-click=" order('created_at') "
                       ng-class="{active: row == 'created_at'}"></i>
                    <i class="fa fa-caret-down icon-down"
                       ng-click=" order('-created_at') "
                       ng-class="{active: row == '-created_at'}"></i>
                </div>
            </th>
            <th>
                STATUS
                <div class="th">
                    <i class="fa fa-caret-up icon-up"
                       ng-click=" order('status') "
                       ng-class="{active: row == 'status'}"></i>
                    <i class="fa fa-caret-down icon-down"
                       ng-click=" order('-status') "
                       ng-class="{active: row == '-status'}"></i>
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="data in currentPageStores track by $index">
            <td>@{{data.id}}</td>
            <td></td>
            <td>@{{data.hotel_name}}</td>
            <td>@{{data.first_name}} @{{data.last_name}}</td>
            <td></td>
            <td>@{{data.created_at}}</td>
            <td>@{{data.status}}</td>
        </tr>
        </tbody>
    </table>
    <!-- #end data table -->

    <div class="panel-footer clearfix">
        <p class="left mt15 small">
            Showing @{{currentPageStores.length*(currentPage - 1) + 1}} to @{{currentPageStores.length*currentPage}} of @{{datas.length}} entries
        </p>
        <pagination boundary-links="true" total-items="filteredData.length" ng-model="currentPage" class="pagination-sm right"
                    max-size="5" ng-change="select(currentPage)" items-per-page="numPerPage" rotate="false"
                    previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"></pagination>
    </div>
