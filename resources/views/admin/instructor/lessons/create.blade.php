@extends('admin.layouts.app')

@section('title', 'Add Lesson')

@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">Add Lesson</h1>
        </div>
    </div>

    <div class="container-fluid page__container">
        <form action="{{ route('instructor.lessons.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-form__body card-body">
                            <!-- Course Selection -->
                            <div class="form-group">
                                <label for="course_id">Course:</label>
                                <select id="course_id" name="course_id" class="custom-select">
                                    <option value="">-- Select a Course --</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                            {{ $course->title }} - {{ $course->subcategory ? $course->subcategory->name : 'No Subcategory' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Title -->
                            <div class="form-group">
                                <label for="title">Lesson Title</label>
                                <input id="title" type="text" name="title" class="form-control" placeholder="Enter lesson title" value="{{ old('title') }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" rows="4" class="form-control" placeholder="Enter lesson description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Order -->
                            <div class="form-group">
                                <label for="order">Order</label>
                                <input id="order" type="number" name="order" class="form-control" placeholder="Enter lesson order" value="{{ old('order') }}">
                                @error('order')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Published -->
                            {{-- <div class="form-group">
                                <label for="status">Published</label>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline">
                                    <input type="checkbox" id="status" name="status" class="custom-control-input" value="active" {{ old('status') == 'active' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="status">Yes</label>
                                </div>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-header-large bg-light d-flex align-items-center">
                            <h4 class="card-header__title">Lesson Video</h4>
                        </div>
                        <div class="card-body">
                            <!-- Video Title -->
                            <div class="form-group">
                                <label for="video_title">Video Title</label>
                                <input id="video_title" type="text" name="video_title" class="form-control" placeholder="Enter video title" value="{{ old('video_title') }}">
                                @error('video_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Video URL -->
                            <div class="form-group">
                                <label for="video_url">Video URL</label>
                                <input id="video_url" type="text" name="video_url" class="form-control" placeholder="Enter video URL" value="{{ old('video_url') }}">
                                @error('video_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Thumbnail -->
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <input id="thumbnail" type="file" name="thumbnail" class="form-control">
                                @error('thumbnail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Video Duration -->
                            <div class="form-group">
                                <label for="duration">Video Duration (seconds)</label>
                                <input id="duration" type="number" name="duration" class="form-control" placeholder="Enter video duration" value="{{ old('duration') }}">
                                @error('duration')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Order -->
                            <div class="form-group">
                                <label for="video_order">Video Order</label>
                                <input id="video_order" type="number" name="video_order" class="form-control" placeholder="Enter video order" value="{{ old('video_order') }}">
                                @error('video_order')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
              
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success">Save Lesson</button>
            </div>
        </form>
    </div>
</div>
@endsection
