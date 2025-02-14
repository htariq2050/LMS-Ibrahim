@extends('admin.layouts.app')
@section('title')
Instructor
@endsection
@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">



    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">Earnings</h1>
        </div>
    </div>





    <div class="container-fluid page__container">

        <div class="row card-group-row">
            <div class="col-lg-4 col-md-5 card-group-row__col">
                <div class="card card-group-row__card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Current Balance</h4>
                            <div class="card-subtitle text-muted">This billing cycle</div>
                        </div>
                        <div class="dropdown ml-auto">
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-dark-gray"><i class="material-icons">more_horiz</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item">Go to Report</a>
                                <a href="javascript:void(0)" class="dropdown-item">Next Cycle</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center h-250">
                        <div class="chart z-0 dashboard-chart">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="text-muted mb-1">Next payout</div>
                                <div class="card-header__title">15.09.2019</div>
                            </div>
                            <canvas class="position-relative chartjs-render-monitor" id="billingChart" width="420" height="420" style="display: block; height: 210px; width: 210px;"></canvas>
                        </div>
                    </div>
                    <div class="card-body pt-0 text-center">
                        <div class="text-amount mb-1">$37,290</div>
                        <div class="text-muted">Current balance this billing cycle</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 card-group-row__col">
                <div class="card card-group-row__card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Purchases</h4>
                            <div class="card-subtitle text-muted">This billing cycle</div>
                        </div>
                        <div class="dropdown ml-auto">
                            <a href="#" data-toggle="dropdown" data-caret="false" class="text-dark-gray"><i class="material-icons">more_horiz</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item">Action</a>
                                <a href="javascript:void(0)" class="dropdown-item">Other Action</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item">Some Other Action</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <div class="chart w-100" style="height: calc(328px - 1.25rem * 2);">
                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="transactionsChart" width="1402" height="576" class="chartjs-render-monitor" style="display: block; height: 288px; width: 701px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header card-header-large bg-white">
                <h4 class="card-header__title">Current Students</h4>
            </div>
            <div class="card-header">
                <form class="form-inline">
                    <label class="mr-sm-2" for="inlineFormFilterBy">Filter by:</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormFilterBy" placeholder="Type a name">

                    <label class="sr-only" for="inlineFormRole">Course</label>
                    <select id="inlineFormRole" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                        <option value="Courses">All Courses</option>
                        <option value="Courses">Angular</option>
                    </select>

                </form>
            </div>

        </div>
    </div>




</div>

@endsection