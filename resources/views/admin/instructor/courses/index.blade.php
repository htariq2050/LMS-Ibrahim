@extends('admin.layouts.app')

@section('title')
Instructor
@endsection

@section('dashboardcontent')

<div class="mdk-drawer-layout__content page">

    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <h1 class="m-lg-0">Instructor Courses</h1>
            <a href="{{ route('instructor.courses.create') }}" class="btn btn-purple ml-lg-3">New Course <i class="material-icons">add</i></a>
        </div>
    </div>

    <div class="container-fluid page__container">
        {{--<form action="#" class="mb-2">
            <div class="d-flex">
                <div class="search-form mr-3 search-form--light">
                    <input type="text" class="form-control" placeholder="Filter by name" id="searchSample02">
                    <button class="btn" type="button"><i class="material-icons">search</i></button>
                </div>

                <div class="form-inline ml-auto">
                    <div class="form-group mr-3">
                        <label for="custom-select" class="form-label mr-1">Sort</label>
                        <select id="custom-select" class="form-control custom-select" style="width: 200px;">
                            <option selected>Name</option>
                            <option value="2">Created Date</option>
                            <option value="1">Earnings</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="published01" class="form-label mr-1">Status</label>
                        <select id="published01" class="form-control custom-select" style="width: 200px;">
                            <option selected>Published</option>
                            <option value="1">Draft</option>
                            <option value="3">All</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>--}}

        <div class="row">
            @foreach($courses as $course)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-sm-row">
                            <!-- Link to the course show page on image -->
                            <a href="{{ route('instructor.courses.show', $course->id) }}" class="avatar mb-3 w-xs-plus-down-100 mr-sm-3">
                                <img src="{{ asset('uploads/courses_cover_images/' . $course->cover_image) }}" alt="{{$course->title}}" class="avatar-course-img">
                            </a>
                            <div class="flex" style="min-width: 200px;">
                                <div class="d-flex">
                                    <div>
                                        <!-- Link to the course show page on title -->
                                        <h4 class="card-title mb-1">
                                            <a href="{{ route('instructor.courses.show', $course->id) }}">{{ $course->title }}</a>
                                        </h4>
                                        <p class="text-muted">{{ Str::limit($course->description, 100) }}</p>
                                    </div>
                                    <div class="dropdown ml-auto">
                                        <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('instructor.courses.edit', $course->id) }}">Edit Course</a>
                                            <a class="dropdown-item" href="#">Statistics</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('instructor.courses.destroy', $course->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"
                                                    onclick="return confirm('Are you sure?')">Archive</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end">
                                    <div class="d-flex flex flex-column mr-3">
                                        <div class="d-flex align-items-center py-2 border-bottom">
                                            <span class="mr-2">${{ number_format($course->plan->price, 2) }}/mo</span>
                                            <small class="text-muted ml-auto">{{ $course->sales_count }} SALES</small>
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                            <span class="badge badge-vuejs mr-2">{{ $course->category->name }}</span>
                                            <span class="badge badge-soft-secondary">{{ optional($course->subcategory)->name }}</span>
                                            <span class="badge badge-soft-secondary">{{ optional($course->plan)->title }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        

    </div>

</div>

@endsection
