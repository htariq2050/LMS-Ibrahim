@extends('admin.layouts.app')
@section('title')
Instructor
@endsection
@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">
<h1>Quizzes</h1>
<a href="{{ route('instructor.quizzes.create') }}" class="btn btn-primary">Create Quiz</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($quizzes as $quiz)
        <tr>
            <td>{{ $quiz->title }}</td>
            <td>
                <a href="{{ route('instructor.quizzes.edit', $quiz->id) }}">Edit</a>
                <form action="{{ route('instructor.quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection