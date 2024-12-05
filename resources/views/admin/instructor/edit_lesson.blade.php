@extends('admin.layouts.app')

@section('title', 'Instructor')

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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-form__body card-body">
                            <!-- Course Selection -->
                            <div class="form-group">
                                <label for="course_id">Course11:</label>
                                <select id="course_id" name="course_id" class="custom-select w-auto">
                                    <option value="">-- Select a Course --</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Title -->
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" type="text" name="title" class="form-control" placeholder="Enter lesson title" value="{{ old('title') }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" rows="4" class="form-control" placeholder="Enter a description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Published -->
                            <div class="form-group mb-0">
                                <label for="status">Published</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input type="checkbox" id="status" name="status" class="custom-control-input" value="active" {{ old('status') == 'active' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="status">Yes</label>
                                </div>
                                <label for="status" class="mb-0">Yes</label>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-success">Save Lesson</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <!-- Lesson Video -->
                        <div class="card-header card-header-large bg-light d-flex align-items-center">
                            <h4 class="card-header__title">Lesson Video</h4>
                        </div>
                        <div class="card-body">
                            <!-- Video Upload -->
                            <div class="form-group">
                                <label for="video">Video File</label>
                                <input type="file" id="video" name="video" class="form-control">
                                @error('video')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Thumbnail Upload -->
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                                @error('thumbnail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="button" class="btn btn-primary btn-block">Preview Video</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
