@extends('admin.layouts.app')

@section('title', 'Add Plan')

@section('dashboardcontent')

<div class="mdk-drawer-layout__content page">

    <div class="container-fluid page__container mt-4">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-12 card-form__body card-body">
                    <h1>Create New Plan</h1>
                    <form action="{{ route('instructor.plans.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="billing_cycle">Billing Cycle</label>
                            <input type="text" name="billing_cycle" id="billing_cycle" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="features">Features</label>
                            <div id="features-list">
                                <input type="text" name="features[]" class="form-control mb-2" placeholder="Feature 1">
                            </div>
                            <button type="button" id="add-feature" class="btn btn-sm btn-success mt-2">Add Feature</button>
                        </div>

                        
                        <script>
                            document.getElementById('add-feature').addEventListener('click', function () {
                                let featureInput = document.createElement('input');
                                featureInput.type = 'text';
                                featureInput.name = 'features[]';
                                featureInput.className = 'form-control mb-2';
                                featureInput.placeholder = 'Feature ' + (document.querySelectorAll('[name="features[]"]').length + 1);
                                document.getElementById('features-list').appendChild(featureInput);
                            });
                        </script>
                        
                        <!-- <div class="form-group">
                            <label for="is_commitment_free">Commitment Free?</label>
                            <input type="checkbox" name="is_commitment_free" id="is_commitment_free" value="1">
                        </div>
                        <div class="form-group">
                            <label for="button_text">Button Text</label>
                            <input type="text" name="button_text" id="button_text" class="form-control" value="I register">
                        </div>
                        <div class="form-group">
                            <label for="button_icon">Button Icon URL</label>
                            <input type="text" name="button_icon" id="button_icon" class="form-control">
                        </div> -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-purple">Create Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection