@extends('admin.layouts.app')

@section('title', 'Add New Purchase')

@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">

    <h1>Create Purchase</h1>
    <form action="{{ route('purchases.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">Select a Course</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount_paid">Amount Paid</label>
            <input type="number" name="amount_paid" id="amount_paid" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="payment_status">Payment Status</label>
            <select name="payment_status" id="payment_status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
                <option value="failed">Failed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
