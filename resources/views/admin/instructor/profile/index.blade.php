@extends('admin.layouts.app')

@section('title', 'Instructor Profile')

@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">

    <!-- Profile Header -->
    <div class="bg-secondary text-white d-flex justify-content-center align-items-center p-4 mb-4" style="height: 400px">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center text-center text-lg-left">
            <div class="mr-lg-4 mb-4 mb-lg-0">
                <img src="{{ asset($instructor->profile_picture ?? 'assets/images/avatar/default-avatar.jpg') }}" 
                     class="rounded-circle" 
                     width="200" 
                     alt="{{ $instructor->first_name  }}">
            </div>
            <div>
                <h1 class="mb-lg-4">{{ $instructor->first_name . ' ' . $instructor->last_name  }}</h1>
                <p class="mb-lg-4">{{ $instructor->email ?? 'No Email available' }}</p>
                <a href="{{ $instructor->website ?? '#' }}" class="mr-3 text-white text-underline">
                    {{ $instructor->website ?? 'Website not available' }}
                </a>
                <i class="fab fa-twitter"></i>
            </div>
        </div>
    </div>

    <!-- Courses Section -->
    <div class="container-fluid page__container">
        <h4 class="mb-4">{{ $instructor->first_name }}'s Courses</h4>

        <div class="row">
            @forelse ($courses as $course)
                <div class="col-md-3">
                    <div class="card card__course">
                        <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                            <a class="card-header__title justify-content-center align-self-center d-flex flex-column" href="{{ route('instructor.courses.index', $course->id) }}">
                                <span>
                                    <img src="{{ asset('uploads/courses_cover_images/'.$course->cover_image ?? 'assets/images/avatar/default-course.jpg') }}" 
                                         class="mb-1" 
                                         style="width: 100%; hight:100%" 
                                         alt="{{ $course->title }}">
                                </span>
                            </a>
                        </div>
                        <div class="p-3">
                            <div class="mb-2">
                                <span class="course__title">{{ $course->title }}</span>
                                {{-- <span class="course__subtitle">{{ $course->description }}</span> --}}

                                {{-- <span class="mr-2">
                                    @for ($i = 0; $i < 5; $i++)
                                        <a href="#" class="rating-link {{ $i < $course->rating ? 'active' : '' }}">
                                            <i class="material-icons icon-16pt">{{ $i < $course->rating ? 'star' : 'star_border' }}</i>
                                        </a>
                                    @endfor
                                </span>
                                <strong>{{ number_format($course->rating, 1) }}</strong><br />
                                <small class="text-muted">({{ $course->reviews_count }} ratings)</small> --}}
                            </div>
                            <div class="d-flex align-items-center">
                                <strong class="h4 m-0">${{ number_format($course->price, 2) }}</strong>
                                <a href="#" class="btn btn-primary ml-auto">
                                    <i class="material-icons">add_shopping_cart</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No courses available</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
