@extends('admin.layouts.app')
@section('title')
Instructor
@endsection
@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">



    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">Add Course</h1>
        </div>
    </div>





    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ route('instructor.courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-form__body card-body">
                            
                            <!-- General Validation Errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            {{-- <div class="form-group">
                                <label for="slug">Slug (URL)</label>
                                <div class="help-block my-1 p-1 text-muted bg-light border rounded">
                                    /course-title-is-editable-here
                                </div>
                            </div> --}}
                    
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" type="text" name="title" class="form-control" placeholder="Title goes here" value="{{ old('title', '') }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" rows="4" class="form-control" placeholder="Please enter a description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                    
                            <div class="form-group">
                                <label for="category">Category</label><br />
                                <select id="category" name="category_id" class="custom-select w-auto">
                                    <option disabled selected>Select Category</option>
                                    <!-- Categories populated by JavaScript -->
                                </select>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="subcategory">SubCategory</label><br />
                                <select id="subcategory" name="subcategory_id" class="custom-select w-auto">
                                    <option disabled selected>Select subcategory</option>
                                </select>
                                @error('subcategory_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" type="number" name="price" class="form-control" placeholder="price goes here" value="{{ old('price', '0') }}">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    
                            <div class="form-group">
                                <label for="status">Published</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input type="checkbox" id="status" name="status" class="custom-control-input" value="1" {{ old('status', 1) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="status">Yes</label>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label>Course Preview</label>
                                <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-clickable=".dz-clickable">
                                    <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                        <div class="avatar avatar-lg">
                                            <img src="{{ asset('assets/images/account-add-photo.svg') }}" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <input type="file" name="cover_image" class="form-control-file">
                                        @error('cover_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                        
                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="col-md-4">

                <!-- Lessons -->
                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Lessons</h4>
                            <div class="card-subtitle text-muted">Manage Lessons</div>
                        </div>
                        <div class="ml-auto">
                            <a href="student-courses.html" class="btn btn-primary">New <i class="material-icons">add</i></a>
                        </div>
                    </div>


                    {{-- <ul class="list-group list-group-fit">
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i class="material-icons text-light-gray">list</i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#">Overview</a>
                                </div>
                                <div class="media-right">
                                    <small class="text-muted">3:33</small>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i class="material-icons text-light-gray">list</i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#">Asset Pipeline</a>
                                </div>
                                <div class="media-right">
                                    <small>18:43</small>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i class="material-icons text-light-gray">list</i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#">Getting Started</a>
                                    <small class="badge badge-soft-success ">FREE</small>
                                </div>
                                <div class="media-right">
                                    <small class="text-muted">5:21</small>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i class="material-icons text-light-gray">list</i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#">Advanced Workflows</a>
                                    <small class="badge badge-soft-warning ">PRO</small>
                                </div>
                                <div class="media-right">
                                    <small class="text-muted">5:24</small>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i class="material-icons text-light-gray">list</i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#">Tips & Tricks</a>
                                    <small class="badge badge-soft-warning ">PRO</small>
                                </div>
                                <div class="media-right">
                                    <small class="text-muted">11:38</small>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i class="material-icons text-light-gray">list</i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#">Final Quiz</a>
                                </div>
                                <div class="media-right">
                                    <small class="badge badge-soft-primary ">QUIZ</small>
                                </div>
                            </div>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>

    </div>


</div>


<script>
    window.onload = async function() {
        try {
            // Fetch categories on page load
            const categoryResponse = await fetch('{{ route('categories.index') }}');
            const categories = await categoryResponse.json();

            const categorySelect = document.getElementById('category');
            categorySelect.innerHTML += categories.map(category => 
                `<option value="${category.id}">${category.name}</option>`
            ).join('');

            // Add event listener to category dropdown
            categorySelect.addEventListener('change', async function() {
                const selectedCategoryId = this.value;
                const subcategorySelect = document.getElementById('subcategory');

                // Clear previous subcategories
                subcategorySelect.innerHTML = '<option disabled selected>Select subcategory</option>';

                try {
                    // Fetch subcategories for selected category
                    const subcategoryResponse = await fetch(`{{ route('subcategories.index') }}?category_id=${selectedCategoryId}`);
                    const subcategories = await subcategoryResponse.json();

                    subcategorySelect.innerHTML += subcategories.map(subcategory =>
                        `<option value="${subcategory.id}">${subcategory.name}</option>`
                    ).join('');
                } catch (error) {
                    console.error('Error fetching subcategories:', error);
                }
            });
        } catch (error) {
            console.error('Error fetching categories:', error);
        }
    }
</script>
@endsection