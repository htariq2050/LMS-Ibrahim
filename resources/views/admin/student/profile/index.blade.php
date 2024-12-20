@extends('admin.layouts.app')
@section('title')
Student
@endsection

@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <div>
                <h1 class="m-0">{{ $student->first_name }}</h1>
                <p class="text-muted m-0">LEMA Student</p>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="border-bottom">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <img src="{{ $student->profile_picture ?? asset('assets/images/avatar/default-avatar.jpg') }}" 
                                     alt="About {{ $student->first_name }}" 
                                     width="100" 
                                     class="rounded-circle">
                            </div>
                            <p>{{ $student->bio ?? 'Short bio about this student is coming soon.' }}</p>
                            <a href="{{ $student->facebook_url }}" class="btn btn-facebook btn-sm"><i class="fab fa-facebook"></i></a>
                            <a href="{{ $student->twitter_url }}" class="btn btn-twitter btn-sm"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $student->github_url }}" class="btn btn-light btn-sm"><i class="fab fa-github"></i></a>
                        </div>
                    </div>

                    <div class="border-bottom">
                        <div class="card-header bg-light">
                            <h4 class="card-header__title text-center">Achievements</h4>
                        </div>
                        <div class="card-body text-center">
                            <div class="avatar avatar-xs mr-1" title="Senior Developer">
                                <span class="avatar-title rounded-circle bg-primary">SD</span>
                            </div>
                            <div class="avatar avatar-xs mr-1" title="100 Lessons Learned">
                                <span class="avatar-title rounded-circle bg-warning">100+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dynamic Courses Section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-header__title">Purchased Courses</h4>
                    </div>
                    <div class="card-body">
                        @if($purchased->isEmpty())
                            <p class="text-muted">No courses purchased yet.</p>
                        @else
                            <div class="list-group">
                                @foreach($purchased as $purchase)
                                    {{-- <a href="{{ route('courses.show', $purchase->course->id) }}" class="list-group-item list-group-item-action"> --}}
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="mb-1">{{ $purchase->course->title }}</h5>
                                                <p class="mb-1 text-muted">{{ $purchase->course->description }}</p>
                                                <small class="text-muted">Purchased on {{ $purchase->created_at->format('F j, Y') }}</small>
                                            </div>
                                            <img src="{{ '/uploads/courses_cover_images/'.$purchase->course->cover_image ?? asset('assets/images/default-course.jpg') }}" 
                                                 alt="{{ $purchase->course->title }}" 
                                                 class="rounded" 
                                                 width="100">
                                        </div>
                                    {{-- </a> --}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
