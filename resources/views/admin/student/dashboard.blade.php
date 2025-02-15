@extends('admin.layouts.app')
@section('title')
Student
@endsection
@section('dashboardcontent')

<div class="mdk-drawer-layout__content page">



    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <h1 class="m-lg-0">Student Dashboard</h1>
            <div>
                <a href="student-edit-account.html" class="btn btn-light ml-3"><i class="material-icons">edit</i> Edit</a>
                <a href="student-profile.html" class="btn btn-success ml-1">View Profile <i class="material-icons">account_circle</i></a>
            </div>
        </div>
    </div>





    <div class="container-fluid page__container">

        <div class="alert alert-soft-warning d-flex align-items-center card-margin p-2" role="alert">
            <i class="material-icons mr-3">error_outline</i>
            <div class="text-body">You have <strong>5 days left</strong> on your subscription</div>
            <a href="" class="btn btn-warning ml-auto">Upgrade</a>
        </div>

        <h4 class="card-header__title mb-3">Featured Courses</h4>

        <div class="row card-group-row">
            <div class="col-lg-3 col-md-4 card-group-row__col">
                <div class="card card-group-row__card ">
                    <div class="card-body d-flex flex-column">
                        <div class="avatar mb-2">
                            <span class="bg-soft-purple avatar-title rounded-circle text-center text-purple">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="22" height="22">
                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                        <path d="M11.75,4.5C11.888,4.5,12,4.612,12,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1V4.75c0-0.138,0.112-0.25,0.25-0.25h1 c0.138,0,0.25,0.112,0.25,0.25v4.7c0,0.135,0.11,0.245,0.246,0.244c0.018,0,0.036-0.002,0.054-0.006 c0.48-0.108,0.969-0.171,1.46-0.188c0.133-0.002,0.239-0.11,0.24-0.243V4.5c0-1.105-0.895-2-2-2h-1.25C14.112,2.5,14,2.388,14,2.25 V1c0-0.552-0.448-1-1-1s-1,0.448-1,1v1.25c0,0.138-0.112,0.25-0.25,0.25h-1.5C10.112,2.5,10,2.388,10,2.25V1c0-0.552-0.448-1-1-1 S8,0.448,8,1v1.25C8,2.388,7.888,2.5,7.75,2.5h-1.5C6.112,2.5,6,2.388,6,2.25V1c0-0.552-0.448-1-1-1S4,0.448,4,1v1.25 C4,2.388,3.888,2.5,3.75,2.5H2c-1.105,0-2,0.895-2,2v13c0,1.105,0.895,2,2,2h7.453c0.135,0,0.244-0.109,0.245-0.243 c0-0.019-0.002-0.038-0.007-0.057c-0.109-0.48-0.173-0.968-0.191-1.46c-0.002-0.133-0.11-0.239-0.243-0.24H2.25 C2.112,17.5,2,17.388,2,17.25V4.75C2,4.612,2.112,4.5,2.25,4.5h1.5C3.888,4.5,4,4.612,4,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1 V4.75C6,4.612,6.112,4.5,6.25,4.5h1.5C7.888,4.5,8,4.612,8,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1V4.75 c0-0.138,0.112-0.25,0.25-0.25H11.75z M17.5,11c-3.59,0-6.5,2.91-6.5,6.5s2.91,6.5,6.5,6.5s6.5-2.91,6.5-6.5 C23.996,13.912,21.088,11.004,17.5,11z M17.5,22.5c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S18.052,22.5,17.5,22.5z M18.439,18.327c-0.118,0.037-0.196,0.15-0.189,0.273v0.15c0,0.414-0.336,0.75-0.75,0.75s-0.75-0.336-0.75-0.75V18.2 c0.003-0.588,0.413-1.096,0.988-1.222c0.607-0.131,0.993-0.73,0.862-1.338c-0.131-0.607-0.73-0.993-1.338-0.862 c-0.517,0.112-0.887,0.57-0.887,1.099c0,0.414-0.336,0.75-0.75,0.75s-0.75-0.336-0.75-0.75c0-1.45,1.176-2.625,2.626-2.624 c1.45,0,2.625,1.176,2.624,2.626c0,1.087-0.671,2.062-1.686,2.451V18.327z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <a href="#" class="text-dark mb-2">
                            <strong>Learn Scheduling</strong>
                        </a>
                        <p class="text-muted">Become a SCRUM master in scheduling tasks.</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge badge-pill badge-soft-secondary">
                                    2 days left
                                </span>
                            </div>
                            <div class="h4 text-primary">$49</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 card-group-row__col">
                <div class="card card-group-row__card ">
                    <div class="card-body d-flex flex-column">
                        <div class="avatar mb-2">
                            <span class="bg-soft-warning avatar-title rounded-circle text-center text-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="22" height="22">
                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                        <path d="M23,14.5H1c-0.552,0-1,0.448-1,1V16c0,0.684,0.462,1.282,1.125,1.453C1.346,17.51,1.5,17.709,1.5,17.937V23 c0,0.552,0.448,1,1,1s1-0.448,1-1v-1c0-0.276,0.224-0.5,0.5-0.5h16c0.276,0,0.5,0.224,0.5,0.5v1c0,0.552,0.448,1,1,1s1-0.448,1-1 v-5.063c0-0.228,0.154-0.427,0.375-0.484C23.538,17.282,24,16.684,24,16v-0.5C24,14.948,23.552,14.5,23,14.5z M20.5,19 c0,0.276-0.224,0.5-0.5,0.5H4c-0.276,0-0.5-0.224-0.5-0.5v-1c0-0.276,0.224-0.5,0.5-0.5h16c0.276,0,0.5,0.224,0.5,0.5V19z M7.522,5.717l0.75,0.385c0.143,0.073,0.313,0.073,0.456,0l0.75-0.385C9.645,5.631,9.75,5.46,9.75,5.272V4.334 c0-0.189-0.107-0.362-0.276-0.447l-0.75-0.375c-0.141-0.071-0.307-0.071-0.448,0l-0.75,0.375C7.357,3.972,7.25,4.145,7.25,4.334 v0.938C7.25,5.46,7.355,5.631,7.522,5.717z M14.522,9.217l0.75,0.385c0.143,0.073,0.313,0.073,0.456,0l0.75-0.385 c0.167-0.086,0.272-0.257,0.272-0.445V7.834c0-0.189-0.107-0.362-0.276-0.447l-0.75-0.375c-0.141-0.071-0.307-0.071-0.448,0 l-0.75,0.375c-0.169,0.085-0.276,0.258-0.276,0.447v0.938C14.25,8.96,14.355,9.131,14.522,9.217z M2.5,13h19 c0.276,0,0.5-0.224,0.5-0.5v-11C22,0.672,21.328,0,20.5,0h-17C2.672,0,2,0.672,2,1.5v11C2,12.776,2.224,13,2.5,13z M5.75,3.871 C5.749,3.397,6.017,2.964,6.441,2.753L7.941,2c0.352-0.175,0.766-0.175,1.118,0l1.5,0.75c0.424,0.211,0.692,0.644,0.691,1.118v1.4 c0,0.188,0.106,0.36,0.273,0.445l1.275,0.649c0.162,0.082,0.355,0.07,0.505-0.031c0.107-0.071,0.118-0.068,1.171-0.6 c0.169-0.085,0.276-0.258,0.276-0.447V3.5c0-0.414,0.336-0.75,0.75-0.75c0.414,0,0.75,0.336,0.75,0.75v1.79 c0,0.189,0.107,0.362,0.276,0.447l1.033,0.516c0.424,0.211,0.692,0.644,0.691,1.118V9.23c0.001,0.469-0.262,0.899-0.68,1.112 l-1.5,0.77c-0.358,0.184-0.784,0.184-1.142,0l-1.5-0.77c-0.417-0.213-0.68-0.643-0.678-1.112v-0.9c0-0.188-0.106-0.36-0.273-0.445 l-1.748-0.889c-0.143-0.073-0.312-0.073-0.455,0L9.522,7.383C9.355,7.468,9.25,7.64,9.25,7.827v2.237c0,0.414-0.336,0.75-0.75,0.75 s-0.75-0.336-0.75-0.75V7.825c0-0.187-0.105-0.359-0.272-0.444L6.429,6.842C6.011,6.629,5.749,6.199,5.75,5.73V3.871z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <a href="#" class="text-dark mb-2">
                            <strong>React for Beginners</strong>
                        </a>
                        <p class="text-muted">Become a SCRUM master in scheduling tasks.</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge badge-pill badge-soft-secondary">
                                    2 days left
                                </span>
                            </div>
                            <div class="h4 text-primary">$49</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 card-group-row__col">
                <div class="card card-group-row__card ">
                    <div class="card-body d-flex flex-column">
                        <div class="avatar mb-2">
                            <span class="bg-soft-primary avatar-title rounded-circle text-center text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="22" height="22">
                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                        <path d="M11.979,17.125c4.052,0,6.875-5.1,6.875-9.67c-0.001-0.95-0.136-1.895-0.4-2.808l0,0c-0.828-2.841-3.522-4.723-6.475-4.522 C9.029-0.063,6.342,1.818,5.51,4.654v0.009c-0.26,0.911-0.395,1.853-0.4,2.8C5.105,12.035,7.929,17.125,11.979,17.125z M16.617,11.281c-0.048,0.125-0.185,0.19-0.312,0.148c-1.395-0.412-2.846-0.599-4.3-0.554c-1.469-0.045-2.936,0.144-4.346,0.559 c-0.127,0.043-0.265-0.022-0.312-0.147c-0.42-1.088-0.664-2.235-0.722-3.4C6.619,7.818,6.642,7.751,6.689,7.7 c0.047-0.049,0.112-0.077,0.18-0.077H17.09c0.138,0,0.25,0.112,0.25,0.25c0,0.004,0,0.008,0,0.012 C17.28,9.048,17.036,10.194,16.617,11.281z M21.632,18.127c0.123,0.065,0.274,0.018,0.339-0.105C21.99,17.986,22,17.946,22,17.906 v-1.531c0-0.138,0.112-0.25,0.25-0.25H23c0.414,0,0.75-0.336,0.75-0.75s-0.336-0.75-0.75-0.75h-0.75c-0.138,0-0.25-0.112-0.25-0.25 v-3c0-0.828-0.672-1.5-1.5-1.5s-1.5,0.672-1.5,1.5v3c0,0.138-0.112,0.25-0.25,0.25H18c-0.414,0-0.75,0.336-0.75,0.75 s0.336,0.75,0.75,0.75h0.75c0.138,0,0.25,0.112,0.25,0.25v0.2c0,0.092,0.051,0.177,0.132,0.22L21.632,18.127z M23.033,19.792 c-0.759-0.561-1.581-1.031-2.45-1.4c-0.119-0.052-0.258-0.005-0.32,0.109l-1.181,1.667l-2.367,3.338 c-0.066,0.121-0.022,0.273,0.099,0.339c0.037,0.02,0.078,0.031,0.12,0.031H23.5c0.276,0,0.5-0.224,0.5-0.5V21.77 C24.007,20.995,23.648,20.263,23.033,19.792z M11.079,21.4l-3.527-3.968c-0.117-0.132-0.294-0.193-0.467-0.16 c-2.206,0.358-4.3,1.221-6.118,2.52C0.351,20.262-0.007,20.995,0,21.77v1.605c0,0.276,0.224,0.5,0.5,0.5h7.326 c0.073,0,0.142-0.032,0.19-0.087l3.066-2.06C11.162,21.633,11.161,21.493,11.079,21.4z M18.31,17.837 c-0.029-0.07-0.088-0.123-0.161-0.145c-0.244-0.069-0.5-0.136-0.76-0.2c-0.091-0.022-0.187,0.009-0.249,0.08l-0.633,0.586 l-5.731,5.305c-0.09,0.105-0.078,0.263,0.027,0.353c0.045,0.039,0.103,0.06,0.162,0.06h3.191c0.092,0,0.176-0.05,0.22-0.13 l3.068-4.452l0.855-1.24C18.335,17.987,18.339,17.907,18.31,17.837z M8.489,8.826C8.185,9.108,8.168,9.583,8.45,9.887 c0.282,0.304,0.757,0.321,1.061,0.039l0,0c0.173-0.097,0.384-0.097,0.557,0c0.304,0.282,0.779,0.265,1.061-0.039 c0.282-0.304,0.265-0.779-0.039-1.061C10.339,8.192,9.24,8.192,8.489,8.826z M13.421,10.125c0.19,0.001,0.372-0.071,0.511-0.2 c0.173-0.097,0.384-0.097,0.557,0c0.304,0.282,0.779,0.265,1.061-0.039c0.282-0.304,0.265-0.779-0.039-1.061 c-0.751-0.633-1.849-0.633-2.6,0c-0.304,0.282-0.322,0.756-0.04,1.06C13.013,10.038,13.213,10.125,13.421,10.125L13.421,10.125z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <a href="#" class="text-dark mb-2">
                            <strong>Build a Resume</strong>
                        </a>
                        <p class="text-muted">Become a SCRUM master in scheduling tasks.</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge badge-pill badge-soft-secondary">
                                    2 days left
                                </span>
                            </div>
                            <div class="h4 text-primary">$49</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-4 card-group-row__col">
                <div class="card card-group-row__card ">
                    <div class="card-body d-flex flex-column">
                        <div class="avatar mb-2">
                            <span class="bg-soft-success avatar-title rounded-circle text-center text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="22" height="22">
                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                        <path d="M12,0C5.373,0,0,5.373,0,12s5.373,12,12,12s12-5.373,12-12C23.993,5.376,18.624,0.007,12,0z M21.428,8.666 c0.046,0.13-0.021,0.273-0.151,0.319C21.25,8.995,21.221,9,21.193,9h-3.856c-0.087,0-0.168-0.046-0.214-0.12 c-0.499-0.815-1.185-1.501-2-2C15.047,6.834,15,6.753,15,6.664V2.808c0-0.139,0.113-0.251,0.252-0.25 c0.028,0,0.056,0.005,0.082,0.014C18.178,3.585,20.415,5.823,21.428,8.666L21.428,8.666z M12,16c-2.209,0-4-1.791-4-4s1.791-4,4-4 s4,1.791,4,4S14.209,16,12,16z M8.666,2.572c0.131-0.046,0.274,0.023,0.32,0.154C8.995,2.752,9,2.78,9,2.808v3.856 c0,0.087-0.045,0.168-0.12,0.214c-0.815,0.499-1.501,1.185-2,2C6.834,8.954,6.752,9,6.663,9H2.807C2.726,9.002,2.649,8.965,2.6,8.9 C2.553,8.834,2.541,8.748,2.569,8.672C3.581,5.826,5.82,3.586,8.666,2.572z M2.572,15.334c-0.047-0.129,0.02-0.272,0.149-0.319 C2.749,15.005,2.778,15,2.807,15h3.856c0.087,0,0.168,0.045,0.214,0.12c0.499,0.815,1.185,1.501,2,2 c0.074,0.046,0.12,0.127,0.12,0.214v3.856c0,0.138-0.112,0.25-0.25,0.25c-0.028,0-0.057-0.005-0.084-0.015 C5.821,20.412,3.585,18.176,2.572,15.334z M15.334,21.429c-0.13,0.046-0.273-0.021-0.319-0.151C15.005,21.251,15,21.222,15,21.194 v-3.856c0-0.087,0.045-0.168,0.12-0.214c0.815-0.499,1.501-1.185,2-2c0.046-0.075,0.127-0.12,0.214-0.12h3.856 c0.08,0.001,0.154,0.041,0.2,0.106c0.047,0.066,0.059,0.151,0.031,0.227C20.409,18.178,18.174,20.414,15.334,21.429z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <a href="#" class="text-dark mb-2">
                            <strong>Customer Support</strong>
                        </a>
                        <p class="text-muted">Become a SCRUM master in scheduling tasks.</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge badge-pill badge-soft-secondary">
                                    2 days left
                                </span>
                            </div>
                            <div class="h4 text-primary">$49</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">In Progress</h4>
                            <div class="card-subtitle text-muted">Recent Courses</div>
                        </div>
                        <div class="ml-auto">
                            <a href="student-courses.html" class="btn btn-light">Browse All</a>
                        </div>
                    </div>




                    <ul class="list-group list-group-flush mb-0" style="z-index: initial;">

                        <li class="list-group-item" style="z-index: initial;">
                            <div class="d-flex align-items-center">
                                <a href="#" class="mr-3">
                                    <img src="https://images.unsplash.com/photo-1562577309-4932fdd64cd1?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=clamp&amp;w=35&amp;h=35" alt="course" class="">

                                </a>
                                <div class="flex">
                                    <a href="#" class="text-body"><strong>Basics of Social Media</strong></a>
                                    <div class="d-flex align-items-center">
                                        <div class="progress" style="width: 100px; height:4px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-muted ml-2">60%</small>
                                    </div>
                                </div>
                                <div class="dropdown ml-3">
                                    <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">View Stats</a>
                                        <a class="dropdown-item" href="#">Proceed</a>
                                        <a class="dropdown-item" href="#">Close</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item" style="z-index: initial;">
                            <div class="d-flex align-items-center">
                                <a href="#" class="mr-3">
                                    <img src="assets/images/logos/vuejs.svg" alt="course" class="">

                                </a>
                                <div class="flex">
                                    <a href="#" class="text-body"><strong>Learn Vue.js Fundamentals</strong></a>
                                    <div class="d-flex align-items-center">
                                        <div class="progress" style="width: 100px; height:4px;">
                                            <div class="progress-bar bg-vuejs" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-muted ml-2">25%</small>
                                    </div>
                                </div>
                                <div class="dropdown ml-3">
                                    <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">View Stats</a>
                                        <a class="dropdown-item" href="#">Proceed</a>
                                        <a class="dropdown-item" href="#">Close</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item" style="z-index: initial;">
                            <div class="d-flex align-items-center">
                                <a href="#" class="mr-3">
                                    <img src="assets/images/logos/angular.svg" alt="course" class="">

                                </a>
                                <div class="flex">
                                    <a href="#" class="text-body"><strong>Angular in Steps</strong></a>
                                    <div class="d-flex align-items-center">
                                        <div class="progress" style="width: 100px; height:4px;">
                                            <div class="progress-bar bg-angular" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-muted ml-2">100%</small>
                                    </div>
                                </div>
                                <div class="dropdown ml-3">
                                    <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">View Stats</a>
                                        <a class="dropdown-item" href="#">Proceed</a>
                                        <a class="dropdown-item" href="#">Close</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item" style="z-index: initial;">
                            <div class="d-flex align-items-center">
                                <a href="#" class="mr-3">
                                    <img src="assets/images/logos/javascript.svg" alt="course" class="">

                                </a>
                                <div class="flex">
                                    <a href="#" class="text-body"><strong>ES6 Foundations</strong></a>
                                    <div class="d-flex align-items-center">
                                        <div class="progress" style="width: 100px; height:4px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-muted ml-2">80%</small>
                                    </div>
                                </div>
                                <div class="dropdown ml-3">
                                    <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">View Stats</a>
                                        <a class="dropdown-item" href="#">Proceed</a>
                                        <a class="dropdown-item" href="#">Close</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>

                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">My Quizes</h4>
                            <div class="card-subtitle text-muted">Score</div>
                        </div>
                        <div class="dropdown ml-auto">
                            <a class="btn btn-sm btn-light" href="#">View all</a>
                        </div>
                    </div>



                    <ul class="list-group list-group-flush mb-0">

                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <div class="media-left text-light-gray mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="30" height="30">
                                        <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                            <path d="M11.75,4.5C11.888,4.5,12,4.612,12,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1V4.75c0-0.138,0.112-0.25,0.25-0.25h1 c0.138,0,0.25,0.112,0.25,0.25v4.7c0,0.135,0.11,0.245,0.246,0.244c0.018,0,0.036-0.002,0.054-0.006 c0.48-0.108,0.969-0.171,1.46-0.188c0.133-0.002,0.239-0.11,0.24-0.243V4.5c0-1.105-0.895-2-2-2h-1.25C14.112,2.5,14,2.388,14,2.25 V1c0-0.552-0.448-1-1-1s-1,0.448-1,1v1.25c0,0.138-0.112,0.25-0.25,0.25h-1.5C10.112,2.5,10,2.388,10,2.25V1c0-0.552-0.448-1-1-1 S8,0.448,8,1v1.25C8,2.388,7.888,2.5,7.75,2.5h-1.5C6.112,2.5,6,2.388,6,2.25V1c0-0.552-0.448-1-1-1S4,0.448,4,1v1.25 C4,2.388,3.888,2.5,3.75,2.5H2c-1.105,0-2,0.895-2,2v13c0,1.105,0.895,2,2,2h7.453c0.135,0,0.244-0.109,0.245-0.243 c0-0.019-0.002-0.038-0.007-0.057c-0.109-0.48-0.173-0.968-0.191-1.46c-0.002-0.133-0.11-0.239-0.243-0.24H2.25 C2.112,17.5,2,17.388,2,17.25V4.75C2,4.612,2.112,4.5,2.25,4.5h1.5C3.888,4.5,4,4.612,4,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1 V4.75C6,4.612,6.112,4.5,6.25,4.5h1.5C7.888,4.5,8,4.612,8,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1V4.75 c0-0.138,0.112-0.25,0.25-0.25H11.75z M17.5,11c-3.59,0-6.5,2.91-6.5,6.5s2.91,6.5,6.5,6.5s6.5-2.91,6.5-6.5 C23.996,13.912,21.088,11.004,17.5,11z M17.5,22.5c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S18.052,22.5,17.5,22.5z M18.439,18.327c-0.118,0.037-0.196,0.15-0.189,0.273v0.15c0,0.414-0.336,0.75-0.75,0.75s-0.75-0.336-0.75-0.75V18.2 c0.003-0.588,0.413-1.096,0.988-1.222c0.607-0.131,0.993-0.73,0.862-1.338c-0.131-0.607-0.73-0.993-1.338-0.862 c-0.517,0.112-0.887,0.57-0.887,1.099c0,0.414-0.336,0.75-0.75,0.75s-0.75-0.336-0.75-0.75c0-1.45,1.176-2.625,2.626-2.624 c1.45,0,2.625,1.176,2.624,2.626c0,1.087-0.671,2.062-1.686,2.451V18.327z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="media-body">
                                    <a class="text-body mb-1" href="#"><strong>Level 1 HTML</strong></a><br>
                                    <div class="d-flex align-items-center">
                                        <span class="text-blue mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="16" height="16" style="position:relative; top:-2px">
                                                <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                    <path d="M2.5,16C2.224,16,2,15.776,2,15.5v-11C2,4.224,2.224,4,2.5,4h14.625c0.276,0,0.5,0.224,0.5,0.5V8c0,0.552,0.448,1,1,1 s1-0.448,1-1V4c0-1.105-0.895-2-2-2H2C0.895,2,0,2.895,0,4v12c0,1.105,0.895,2,2,2h5.375c0.138,0,0.25,0.112,0.25,0.25v1.5 c0,0.138-0.112,0.25-0.25,0.25H5c-0.552,0-1,0.448-1,1s0.448,1,1,1h7.625c0.552,0,1-0.448,1-1s-0.448-1-1-1h-2.75 c-0.138,0-0.25-0.112-0.25-0.25v-1.524c0-0.119,0.084-0.221,0.2-0.245c0.541-0.11,0.891-0.638,0.781-1.179 c-0.095-0.466-0.505-0.801-0.981-0.801L2.5,16z M3.47,9.971c-0.303,0.282-0.32,0.757-0.037,1.06c0.282,0.303,0.757,0.32,1.06,0.037 c0.013-0.012,0.025-0.025,0.037-0.037l2-2c0.293-0.292,0.293-0.767,0.001-1.059c0,0-0.001-0.001-0.001-0.001l-2-2 c-0.282-0.303-0.757-0.32-1.06-0.037s-0.32,0.757-0.037,1.06C3.445,7.006,3.457,7.019,3.47,7.031l1.293,1.293 c0.097,0.098,0.097,0.256,0,0.354L3.47,9.971z M7,11.751h2.125c0.414,0,0.75-0.336,0.75-0.75s-0.336-0.75-0.75-0.75H7 c-0.414,0-0.75,0.336-0.75,0.75S6.586,11.751,7,11.751z M18.25,16.5c0,0.276-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5v-5.226 c0-0.174-0.091-0.335-0.239-0.426c-1.282-0.702-2.716-1.08-4.177-1.1c-0.662-0.029-1.223,0.484-1.252,1.146 c-0.001,0.018-0.001,0.036-0.001,0.054v7.279c0,0.646,0.511,1.176,1.156,1.2c1.647-0.011,3.246,0.552,4.523,1.593 c0.14,0.14,0.33,0.219,0.528,0.218c0.198,0.001,0.388-0.076,0.529-0.215c1.277-1.044,2.878-1.61,4.527-1.6 c0.641-0.023,1.15-0.547,1.156-1.188v-7.279c-0.001-0.327-0.134-0.64-0.369-0.867c-0.236-0.231-0.557-0.353-0.886-0.337 c-1.496,0.016-2.963,0.411-4.265,1.148c-0.143,0.092-0.23,0.251-0.23,0.421V16.5z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <a href="take-course.html" class="small">Basics of HTML</a>
                                    </div>
                                </div>
                                <div class="media-right text-center d-flex align-items-center">
                                    <span class="badge badge-warning mr-2">
                                        Good
                                    </span>
                                    <h4 class="mb-0 text-warning">5.8</h4>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <div class="media-left text-light-gray mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="30" height="30">
                                        <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                            <path d="M11.75,4.5C11.888,4.5,12,4.612,12,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1V4.75c0-0.138,0.112-0.25,0.25-0.25h1 c0.138,0,0.25,0.112,0.25,0.25v4.7c0,0.135,0.11,0.245,0.246,0.244c0.018,0,0.036-0.002,0.054-0.006 c0.48-0.108,0.969-0.171,1.46-0.188c0.133-0.002,0.239-0.11,0.24-0.243V4.5c0-1.105-0.895-2-2-2h-1.25C14.112,2.5,14,2.388,14,2.25 V1c0-0.552-0.448-1-1-1s-1,0.448-1,1v1.25c0,0.138-0.112,0.25-0.25,0.25h-1.5C10.112,2.5,10,2.388,10,2.25V1c0-0.552-0.448-1-1-1 S8,0.448,8,1v1.25C8,2.388,7.888,2.5,7.75,2.5h-1.5C6.112,2.5,6,2.388,6,2.25V1c0-0.552-0.448-1-1-1S4,0.448,4,1v1.25 C4,2.388,3.888,2.5,3.75,2.5H2c-1.105,0-2,0.895-2,2v13c0,1.105,0.895,2,2,2h7.453c0.135,0,0.244-0.109,0.245-0.243 c0-0.019-0.002-0.038-0.007-0.057c-0.109-0.48-0.173-0.968-0.191-1.46c-0.002-0.133-0.11-0.239-0.243-0.24H2.25 C2.112,17.5,2,17.388,2,17.25V4.75C2,4.612,2.112,4.5,2.25,4.5h1.5C3.888,4.5,4,4.612,4,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1 V4.75C6,4.612,6.112,4.5,6.25,4.5h1.5C7.888,4.5,8,4.612,8,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1V4.75 c0-0.138,0.112-0.25,0.25-0.25H11.75z M17.5,11c-3.59,0-6.5,2.91-6.5,6.5s2.91,6.5,6.5,6.5s6.5-2.91,6.5-6.5 C23.996,13.912,21.088,11.004,17.5,11z M17.5,22.5c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S18.052,22.5,17.5,22.5z M18.439,18.327c-0.118,0.037-0.196,0.15-0.189,0.273v0.15c0,0.414-0.336,0.75-0.75,0.75s-0.75-0.336-0.75-0.75V18.2 c0.003-0.588,0.413-1.096,0.988-1.222c0.607-0.131,0.993-0.73,0.862-1.338c-0.131-0.607-0.73-0.993-1.338-0.862 c-0.517,0.112-0.887,0.57-0.887,1.099c0,0.414-0.336,0.75-0.75,0.75s-0.75-0.336-0.75-0.75c0-1.45,1.176-2.625,2.626-2.624 c1.45,0,2.625,1.176,2.624,2.626c0,1.087-0.671,2.062-1.686,2.451V18.327z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="media-body">
                                    <a class="text-body mb-1" href="#"><strong>Level 2 Angular</strong></a><br>
                                    <div class="d-flex align-items-center">
                                        <span class="text-blue mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="16" height="16" style="position:relative; top:-2px">
                                                <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                    <path d="M2.5,16C2.224,16,2,15.776,2,15.5v-11C2,4.224,2.224,4,2.5,4h14.625c0.276,0,0.5,0.224,0.5,0.5V8c0,0.552,0.448,1,1,1 s1-0.448,1-1V4c0-1.105-0.895-2-2-2H2C0.895,2,0,2.895,0,4v12c0,1.105,0.895,2,2,2h5.375c0.138,0,0.25,0.112,0.25,0.25v1.5 c0,0.138-0.112,0.25-0.25,0.25H5c-0.552,0-1,0.448-1,1s0.448,1,1,1h7.625c0.552,0,1-0.448,1-1s-0.448-1-1-1h-2.75 c-0.138,0-0.25-0.112-0.25-0.25v-1.524c0-0.119,0.084-0.221,0.2-0.245c0.541-0.11,0.891-0.638,0.781-1.179 c-0.095-0.466-0.505-0.801-0.981-0.801L2.5,16z M3.47,9.971c-0.303,0.282-0.32,0.757-0.037,1.06c0.282,0.303,0.757,0.32,1.06,0.037 c0.013-0.012,0.025-0.025,0.037-0.037l2-2c0.293-0.292,0.293-0.767,0.001-1.059c0,0-0.001-0.001-0.001-0.001l-2-2 c-0.282-0.303-0.757-0.32-1.06-0.037s-0.32,0.757-0.037,1.06C3.445,7.006,3.457,7.019,3.47,7.031l1.293,1.293 c0.097,0.098,0.097,0.256,0,0.354L3.47,9.971z M7,11.751h2.125c0.414,0,0.75-0.336,0.75-0.75s-0.336-0.75-0.75-0.75H7 c-0.414,0-0.75,0.336-0.75,0.75S6.586,11.751,7,11.751z M18.25,16.5c0,0.276-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5v-5.226 c0-0.174-0.091-0.335-0.239-0.426c-1.282-0.702-2.716-1.08-4.177-1.1c-0.662-0.029-1.223,0.484-1.252,1.146 c-0.001,0.018-0.001,0.036-0.001,0.054v7.279c0,0.646,0.511,1.176,1.156,1.2c1.647-0.011,3.246,0.552,4.523,1.593 c0.14,0.14,0.33,0.219,0.528,0.218c0.198,0.001,0.388-0.076,0.529-0.215c1.277-1.044,2.878-1.61,4.527-1.6 c0.641-0.023,1.15-0.547,1.156-1.188v-7.279c-0.001-0.327-0.134-0.64-0.369-0.867c-0.236-0.231-0.557-0.353-0.886-0.337 c-1.496,0.016-2.963,0.411-4.265,1.148c-0.143,0.092-0.23,0.251-0.23,0.421V16.5z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <a href="take-course.html" class="small">Angular in Steps</a>
                                    </div>
                                </div>
                                <div class="media-right text-center d-flex align-items-center">
                                    <span class="badge badge-success mr-2">
                                        Great
                                    </span>
                                    <h4 class="mb-0 text-success">9.8</h4>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <div class="media-left text-light-gray mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="30" height="30">
                                        <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                            <path d="M11.75,4.5C11.888,4.5,12,4.612,12,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1V4.75c0-0.138,0.112-0.25,0.25-0.25h1 c0.138,0,0.25,0.112,0.25,0.25v4.7c0,0.135,0.11,0.245,0.246,0.244c0.018,0,0.036-0.002,0.054-0.006 c0.48-0.108,0.969-0.171,1.46-0.188c0.133-0.002,0.239-0.11,0.24-0.243V4.5c0-1.105-0.895-2-2-2h-1.25C14.112,2.5,14,2.388,14,2.25 V1c0-0.552-0.448-1-1-1s-1,0.448-1,1v1.25c0,0.138-0.112,0.25-0.25,0.25h-1.5C10.112,2.5,10,2.388,10,2.25V1c0-0.552-0.448-1-1-1 S8,0.448,8,1v1.25C8,2.388,7.888,2.5,7.75,2.5h-1.5C6.112,2.5,6,2.388,6,2.25V1c0-0.552-0.448-1-1-1S4,0.448,4,1v1.25 C4,2.388,3.888,2.5,3.75,2.5H2c-1.105,0-2,0.895-2,2v13c0,1.105,0.895,2,2,2h7.453c0.135,0,0.244-0.109,0.245-0.243 c0-0.019-0.002-0.038-0.007-0.057c-0.109-0.48-0.173-0.968-0.191-1.46c-0.002-0.133-0.11-0.239-0.243-0.24H2.25 C2.112,17.5,2,17.388,2,17.25V4.75C2,4.612,2.112,4.5,2.25,4.5h1.5C3.888,4.5,4,4.612,4,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1 V4.75C6,4.612,6.112,4.5,6.25,4.5h1.5C7.888,4.5,8,4.612,8,4.75V5c0,0.552,0.448,1,1,1s1-0.448,1-1V4.75 c0-0.138,0.112-0.25,0.25-0.25H11.75z M17.5,11c-3.59,0-6.5,2.91-6.5,6.5s2.91,6.5,6.5,6.5s6.5-2.91,6.5-6.5 C23.996,13.912,21.088,11.004,17.5,11z M17.5,22.5c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S18.052,22.5,17.5,22.5z M18.439,18.327c-0.118,0.037-0.196,0.15-0.189,0.273v0.15c0,0.414-0.336,0.75-0.75,0.75s-0.75-0.336-0.75-0.75V18.2 c0.003-0.588,0.413-1.096,0.988-1.222c0.607-0.131,0.993-0.73,0.862-1.338c-0.131-0.607-0.73-0.993-1.338-0.862 c-0.517,0.112-0.887,0.57-0.887,1.099c0,0.414-0.336,0.75-0.75,0.75s-0.75-0.336-0.75-0.75c0-1.45,1.176-2.625,2.626-2.624 c1.45,0,2.625,1.176,2.624,2.626c0,1.087-0.671,2.062-1.686,2.451V18.327z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="media-body">
                                    <a class="text-body mb-1" href="#"><strong>Graduation</strong></a><br>
                                    <div class="d-flex align-items-center">
                                        <span class="text-blue mr-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="16" height="16" style="position:relative; top:-2px">
                                                <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                    <path d="M2.5,16C2.224,16,2,15.776,2,15.5v-11C2,4.224,2.224,4,2.5,4h14.625c0.276,0,0.5,0.224,0.5,0.5V8c0,0.552,0.448,1,1,1 s1-0.448,1-1V4c0-1.105-0.895-2-2-2H2C0.895,2,0,2.895,0,4v12c0,1.105,0.895,2,2,2h5.375c0.138,0,0.25,0.112,0.25,0.25v1.5 c0,0.138-0.112,0.25-0.25,0.25H5c-0.552,0-1,0.448-1,1s0.448,1,1,1h7.625c0.552,0,1-0.448,1-1s-0.448-1-1-1h-2.75 c-0.138,0-0.25-0.112-0.25-0.25v-1.524c0-0.119,0.084-0.221,0.2-0.245c0.541-0.11,0.891-0.638,0.781-1.179 c-0.095-0.466-0.505-0.801-0.981-0.801L2.5,16z M3.47,9.971c-0.303,0.282-0.32,0.757-0.037,1.06c0.282,0.303,0.757,0.32,1.06,0.037 c0.013-0.012,0.025-0.025,0.037-0.037l2-2c0.293-0.292,0.293-0.767,0.001-1.059c0,0-0.001-0.001-0.001-0.001l-2-2 c-0.282-0.303-0.757-0.32-1.06-0.037s-0.32,0.757-0.037,1.06C3.445,7.006,3.457,7.019,3.47,7.031l1.293,1.293 c0.097,0.098,0.097,0.256,0,0.354L3.47,9.971z M7,11.751h2.125c0.414,0,0.75-0.336,0.75-0.75s-0.336-0.75-0.75-0.75H7 c-0.414,0-0.75,0.336-0.75,0.75S6.586,11.751,7,11.751z M18.25,16.5c0,0.276-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5v-5.226 c0-0.174-0.091-0.335-0.239-0.426c-1.282-0.702-2.716-1.08-4.177-1.1c-0.662-0.029-1.223,0.484-1.252,1.146 c-0.001,0.018-0.001,0.036-0.001,0.054v7.279c0,0.646,0.511,1.176,1.156,1.2c1.647-0.011,3.246,0.552,4.523,1.593 c0.14,0.14,0.33,0.219,0.528,0.218c0.198,0.001,0.388-0.076,0.529-0.215c1.277-1.044,2.878-1.61,4.527-1.6 c0.641-0.023,1.15-0.547,1.156-1.188v-7.279c-0.001-0.327-0.134-0.64-0.369-0.867c-0.236-0.231-0.557-0.353-0.886-0.337 c-1.496,0.016-2.963,0.411-4.265,1.148c-0.143,0.092-0.23,0.251-0.23,0.421V16.5z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <a href="take-course.html" class="small">Bootstrap Foundations</a>
                                    </div>
                                </div>
                                <div class="media-right text-center d-flex align-items-center">
                                    <span class="badge badge-danger mr-2">
                                        Failed
                                    </span>
                                    <h4 class="mb-0 text-danger">2.8</h4>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="card card__course">
                    <div class=" d-flex justify-content-center">
                        <a class="" href="#">

                            <!-- <img src="assets/images/logos/vuejs.svg" class="mb-1" style="width:80px;" alt="logo" class="rounded"> -->
                            <img src="https://images.unsplash.com/photo-1562577309-4932fdd64cd1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=clamp&w=800&h=250" style="width:100%" alt="Social Media">


                        </a>

                    </div>
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <div>
                                <a class="text-body mb-1" href="#"><strong>Basics of Social Media</strong></a><br>
                                <div class="d-flex align-items-center">
                                    <span class="text-blue mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="16" height="16" style="position:relative; top:-2px">
                                            <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                <path d="M2.5,16C2.224,16,2,15.776,2,15.5v-11C2,4.224,2.224,4,2.5,4h14.625c0.276,0,0.5,0.224,0.5,0.5V8c0,0.552,0.448,1,1,1 s1-0.448,1-1V4c0-1.105-0.895-2-2-2H2C0.895,2,0,2.895,0,4v12c0,1.105,0.895,2,2,2h5.375c0.138,0,0.25,0.112,0.25,0.25v1.5 c0,0.138-0.112,0.25-0.25,0.25H5c-0.552,0-1,0.448-1,1s0.448,1,1,1h7.625c0.552,0,1-0.448,1-1s-0.448-1-1-1h-2.75 c-0.138,0-0.25-0.112-0.25-0.25v-1.524c0-0.119,0.084-0.221,0.2-0.245c0.541-0.11,0.891-0.638,0.781-1.179 c-0.095-0.466-0.505-0.801-0.981-0.801L2.5,16z M3.47,9.971c-0.303,0.282-0.32,0.757-0.037,1.06c0.282,0.303,0.757,0.32,1.06,0.037 c0.013-0.012,0.025-0.025,0.037-0.037l2-2c0.293-0.292,0.293-0.767,0.001-1.059c0,0-0.001-0.001-0.001-0.001l-2-2 c-0.282-0.303-0.757-0.32-1.06-0.037s-0.32,0.757-0.037,1.06C3.445,7.006,3.457,7.019,3.47,7.031l1.293,1.293 c0.097,0.098,0.097,0.256,0,0.354L3.47,9.971z M7,11.751h2.125c0.414,0,0.75-0.336,0.75-0.75s-0.336-0.75-0.75-0.75H7 c-0.414,0-0.75,0.336-0.75,0.75S6.586,11.751,7,11.751z M18.25,16.5c0,0.276-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5v-5.226 c0-0.174-0.091-0.335-0.239-0.426c-1.282-0.702-2.716-1.08-4.177-1.1c-0.662-0.029-1.223,0.484-1.252,1.146 c-0.001,0.018-0.001,0.036-0.001,0.054v7.279c0,0.646,0.511,1.176,1.156,1.2c1.647-0.011,3.246,0.552,4.523,1.593 c0.14,0.14,0.33,0.219,0.528,0.218c0.198,0.001,0.388-0.076,0.529-0.215c1.277-1.044,2.878-1.61,4.527-1.6 c0.641-0.023,1.15-0.547,1.156-1.188v-7.279c-0.001-0.327-0.134-0.64-0.369-0.867c-0.236-0.231-0.557-0.353-0.886-0.337 c-1.496,0.016-2.963,0.411-4.265,1.148c-0.143,0.092-0.23,0.251-0.23,0.421V16.5z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <a href="take-course.html" class="small">Social Media</a>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary ml-auto">Resume <i class="material-icons">arrow_forward</i></a>
                        </div>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <!-- START ACTIVITY -->
                <div class="card">
                    <div class="card-header card-header-large bg-white d-flex align-items-center">
                        <h4 class="card-header__title flex m-0">Recent Activity</h4>
                        <div class=" flatpickr-wrapper flatpickr-calendar-right d-flex ml-auto">
                            <div data-toggle="flatpickr" data-flatpickr-wrap="true" data-flatpickr-static="true" data-flatpickr-mode="range" data-flatpickr-alt-format="d/m/Y" data-flatpickr-date-format="d/m/Y">
                                <a href="javascript:void(0)" class="link-date" data-toggle>13/03/2018 <span class="text-muted mx-1">to</span> 20/03/2018</a>
                                <input class="d-none" type="hidden" value="13/03/2018 to 20/03/2018" data-input>
                            </div>
                        </div>
                    </div>
                    <div class="card-header card-header-tabs-basic nav" role="tablist">
                        <a href="#activity_all" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">All</a>
                        <a href="#activity_purchases" data-toggle="tab" role="tab" aria-controls="activity_purchases" aria-selected="false">Purchases</a>
                        <a href="#activity_emails" data-toggle="tab" role="tab" aria-controls="activity_emails" aria-selected="false">Emails</a>
                        <a href="#activity_quotes" data-toggle="tab" role="tab" aria-controls="activity_quotes" aria-selected="false">Quotes</a>
                    </div>
                    <div class="list-group tab-content list-group-flush">
                        <div class="tab-pane active show fade" id="activity_all">


                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <img src="assets/images/logo.svg" width="20" alt="avatar">
                                    </span>
                                </div>


                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>


                                        <strong class="text-15pt mr-1">Jenell D. Matney</strong>
                                    </div>
                                    <small class="text-muted">4 days ago</small>
                                </div>
                                <div>$573</div>


                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <img src="assets/images/logo.svg" width="20" alt="avatar">
                                    </span>
                                </div>


                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>


                                        <strong class="text-15pt mr-1">Sherri J. Cardenas</strong>
                                    </div>
                                    <small>Improve spacings on Projects page</small>
                                </div>
                                <small class="text-muted">3 days ago</small>


                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <img src="assets/images/logo.svg" width="20" alt="avatar">
                                    </span>
                                </div>


                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>


                                        <strong class="text-15pt mr-1">Joseph S. Ferland</strong>
                                    </div>
                                    <small class="text-muted">2 days ago</small>
                                </div>
                                <div>$244</div>


                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <img src="assets/images/logo.svg" width="20" alt="avatar">
                                    </span>
                                </div>


                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_joao-silas-636453-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>


                                        <strong class="text-15pt mr-1">Bryan K. Davis</strong>
                                    </div>
                                    <small class="text-muted">1 day ago</small>
                                </div>
                                <div>$664</div>


                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <img src="assets/images/logo.svg" width="20" alt="avatar">
                                    </span>
                                </div>


                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_michael-dam-258165-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>


                                        <strong class="text-15pt mr-1">Kaci M. Langston</strong>
                                    </div>
                                    <small class="text-muted">just now</small>
                                </div>
                                <div>$631</div>


                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                            <div class="card-footer text-center border-0">
                                <a class="text-muted" href="">View All (54)</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="activity_purchases">

                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-success">
                                        <i class="material-icons">monetization_on</i>
                                    </span>
                                </div>

                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <strong class="text-15pt mr-1">Sherri J. Cardenas</strong>

                                    </div>
                                    <small class="text-muted">4 days ago</small>
                                </div>
                                <div>$573</div>
                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-success">
                                        <i class="material-icons">monetization_on</i>
                                    </span>
                                </div>

                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <strong class="text-15pt mr-1">Joseph S. Ferland</strong>

                                    </div>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <div>$612</div>
                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-success">
                                        <i class="material-icons">monetization_on</i>
                                    </span>
                                </div>

                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <strong class="text-15pt mr-1">Bryan K. Davis</strong>

                                    </div>
                                    <small class="text-muted">2 days ago</small>
                                </div>
                                <div>$244</div>
                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-success">
                                        <i class="material-icons">monetization_on</i>
                                    </span>
                                </div>

                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_joao-silas-636453-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <strong class="text-15pt mr-1">Kaci M. Langston</strong>

                                    </div>
                                    <small class="text-muted">1 day ago</small>
                                </div>
                                <div>$664</div>
                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-center  bg-light ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-success">
                                        <i class="material-icons">monetization_on</i>
                                    </span>
                                </div>

                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_michael-dam-258165-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <strong class="text-15pt mr-1"></strong>

                                    </div>
                                    <small class="text-muted">just now</small>
                                </div>
                                <div>$631</div>
                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                        </div>
                        <div class="tab-pane" id="activity_emails">

                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-secondary">
                                        <i class="material-icons">email</i>
                                    </span>
                                </div>

                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <strong class="text-15pt mr-1">Jenell D. Matney</strong>

                                    </div>
                                    <small>Confirmation required for design</small>
                                </div>
                                <small class="text-muted">4 days ago</small>
                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-secondary">
                                        <i class="material-icons">email</i>
                                    </span>
                                </div>

                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <strong class="text-15pt mr-1">Sherri J. Cardenas</strong>

                                    </div>
                                    <small>Improve spacings on Projects page</small>
                                </div>
                                <small class="text-muted">3 days ago</small>
                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                            <div class="list-group-item list-group-item-action d-flex align-items-center ">
                                <div class="avatar avatar-xs mr-3">
                                    <span class="avatar-title rounded-circle bg-secondary">
                                        <i class="material-icons">email</i>
                                    </span>
                                </div>

                                <div class="flex">
                                    <div class="d-flex align-items-middle">
                                        <div class="avatar avatar-xxs mr-1">
                                            <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <strong class="text-15pt mr-1">Joseph S. Ferland</strong>

                                    </div>
                                    <small>You unlocked a new Badge</small>
                                </div>
                                <small class="text-muted">2 days ago</small>
                                <i class="material-icons icon-muted ml-3">arrow_forward</i>
                            </div>

                        </div>
                        <div class="tab-pane" id="activity_quotes"></div>
                    </div>
                </div>
                <!-- END ACTIVITY -->
            </div>
        </div>

    </div>



</div>
@endsection