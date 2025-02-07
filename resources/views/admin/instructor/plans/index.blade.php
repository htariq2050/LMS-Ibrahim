@extends('admin.layouts.app')

@section('title', 'Show Plan')

@section('dashboardcontent')

<div class="mdk-drawer-layout__content page">
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between mb-0">
            <h1 class="m-0">PLANS</h1>
            <div class="d-flex align-items-center">
                <a href="{{ route('instructor.plans.create') }}" class="btn btn-purple">Add New Plan <i class="material-icons">add</i></a>
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

                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Billing Cycle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach($plans as $plan)
                                    <tr>
                                        <td>
                                            <span class="title">{{ $plan->title }}</span>
                                        </td>
                                        <td>{{ $plan->price }}€</td>
                                        <td>{{ $plan->billing_cycle }}</td>
                                        <td>
                                            <a href="{{ route('instructor.plans.edit', $plan->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('instructor.plans.destroy', $plan->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
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