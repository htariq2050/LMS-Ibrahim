@extends('admin.layouts.app')
@section('title')
Instructor
@endsection
@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">



    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">Edit Course</h1>
        </div>
    </div>





    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-form__body card-body">
                        <div class="form-group">
                            <label for="fname">Slug (URL)</label>
                            <div class="help-block my-1 p-1 text-muted bg-light border rounded">/course-title-is-editable-here</div>
                        </div>

                        <div class="form-group">
                            <label for="fname">Title</label>
                            <input id="fname" type="text" class="form-control" placeholder="Title goes here" value="Course title is editable here">
                        </div>

                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea id="desc" rows="4" class="form-control" placeholder="Please enter a description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label><br />
                            <select id="category" class="custom-select w-auto">
                                <option disabled selected>Select Category</option>
                            </select>


                        </div>
                        <div class="form-group">
                            <label for="subscribe">Published</label><br>
                            <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                <input checked="" type="checkbox" id="subscribe" class="custom-control-input">
                                <label class="custom-control-label" for="subscribe">Yes</label>
                            </div>
                            <label for="subscribe" class="mb-0">Yes</label>
                        </div>

                        <div class="form-group">
                            <label>Course Preview</label>
                            <div class="dz-clickable media align-items-center" 
                            data-toggle="dropzone" 
                            {{-- data-dropzone-url="{{ route('upload_url') }}"  --}}
                            data-dropzone-clickable=".dz-clickable" 
                            data-dropzone-files='["{{ asset('assets/images/account-add-photo.svg') }}"]'>
                           
                           <div class="dz-preview dz-file-preview dz-clickable mr-3">
                               <div class="avatar avatar-lg">
                                   <img src="{{ asset('assets/images/account-add-photo.svg') }}" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                               </div>
                           </div>
                           
                           <div class="media-body">
                               <button class="btn btn-sm btn-light dz-clickable">Choose photo</button>
                           </div>
                       </div>
                       
                        </div>
                    </div>
                    <div class="card-body text-center">

                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>

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


                    <ul class="list-group list-group-fit">
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
                    </ul>
                </div>
            </div>
        </div>

    </div>


</div>


<script>  
 
 window.onload = async function() {
        try {
           
            const response = await fetch('{{ route('categories.index') }}');
            const categories = await response.json();
            
            
            const categorySelect = document.getElementById('category');
            
           
            const options = categories.map(category => 
                `<option value="${category.id}">${category.name}</option>`
            ).join('');

           
            categorySelect.innerHTML += options;
        } catch (error) {
            console.error('Error fetching categories:', error);
        }
    }
</script>
@endsection