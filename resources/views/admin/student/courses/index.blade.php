
{{
    die($courses);
}}
@extends('admin.layouts.app')

@section('title')
Student
@endsection

@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">

    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">Courses</h1>
            <a href="" class="btn btn-success ml-3">Go to Courses <i class="material-icons">arrow_forward</i></a>
        </div>
    </div>

    <div class="container-fluid page__container">
        <form action="#" class="">
            <div class="d-lg-flex">
                <div class="search-form mb-3 mr-3-lg search-form--light">
                    <input type="text" class="form-control" placeholder="Search courses" id="searchSample02">
                    <button class="btn" type="button"><i class="material-icons">search</i></button>
                </div>

                <div class="form-inline  mb-3 ml-auto">
                    <div class="form-group mr-3">
                        <label for="custom-select" class="form-label mr-1">Category</label>
                        <select id="custom-select" class="form-control custom-select" style="width: 200px;">
                            <option selected>All categories</option>
                            <!-- Add dynamic categories if needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="published01" class="form-label mr-1">Status</label>
                        <select id="published01" class="form-control custom-select" style="width: 200px;">
                            <option selected>All</option>
                            <!-- Add dynamic statuses if needed -->
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-3">
                    <div class="card card__course">
                        <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                            <a class="card-header__title justify-content-center align-self-center d-flex flex-column" href="{{ route('student.courses', $course->id) }}">
                                <span><img src="{{ asset('uploads/courses_cover_images/' . $course->cover_image) }}" class="mb-1" style="width:100%; hight:100%" alt="logo"></span>
                                <span class="course__title">{{ $course->title }}</span>
                                <span class="course__subtitle">{{ $course->description }}</span>
                            </a>
                        </div>
                        <div class="p-3">
                            <div class="mb-2">
                                <span class="mr-2">
                                    <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                    <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                    <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                    <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                    <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_half</i></a>
                                </span>
                                <strong>4.7</strong><br />
                                <small class="text-muted">(391 ratings)</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <strong class="h4 m-0">${{ $course->price }}</strong>
                                <a href="#" class="btn btn-primary ml-auto"><i class="material-icons">add_shopping_cart</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
