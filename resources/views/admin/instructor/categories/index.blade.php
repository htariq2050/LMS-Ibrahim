@extends('admin.layouts.app')

@section('title', 'Show Categories')

@section('dashboardcontent')

<div class="mdk-drawer-layout__content page">
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between mb-0">
            <h1>Categories</h1>
            <div class="d-flex align-items-center">
                <a href="{{ route('categories.create') }}" class="btn btn-purple">Create New Category<i
                        class="material-icons">add</i></a>
            </div>

        </div>
    </div>

    <div class="container-fluid page__container mt-2">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-12 card-form__body">
                    <div class="table-responsive border-bottom">
                        <!-- <div class="search-form search-form--light m-3">
                            <input type="text" class="form-control search" placeholder="Search">
                            <button class="btn" type="button" role="button"><i
                                    class="material-icons">search</i></button>
                        </div> -->

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection