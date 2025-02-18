@extends('admin.layouts.app')
@section('title')
Instructor
@endsection
@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">

   
    
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center justify-content-between mb-0">
                <h1 class="m-0">QUIZZES</h1>
                <div class="d-flex align-items-center">
                    <a href="{{ route('instructor.quizzes.create') }}" class="btn btn-purple">
                        Add New Quiz <i class="material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
    
        <div class="container-fluid page__container mt-2">
            <div class="card card-form">
                <div class="row no-gutters">
                    <div class="col-lg-12 card-form__body">
                        <div class="table-responsive border-bottom">

                            @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <table class="table mb-0 thead-border-top-0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($quizzes as $quiz)
                                        <tr>
                                            <td>
                                                <span class="title">{{ $quiz->title }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('instructor.quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-warning">
                                                    Edit
                                                </a>
                                                <form action="{{ route('instructor.quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
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
    
    
    

</div>
@endsection
