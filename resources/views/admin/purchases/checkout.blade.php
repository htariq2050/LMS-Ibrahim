@extends('admin.layouts.app')

@section('title', 'Checkout')

@section('dashboardcontent')
<div class="container mt-5">
    <h2>Checkout</h2>
    <form action="{{ route('purchases.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" id="course_name" class="form-control" value="{{ $course->title }}" readonly>
        </div>
        <div class="form-group">
            <label for="course_price">Price</label>
            <input type="text" id="course_price" class="form-control" value="{{ $course->price }}" readonly>
        </div>
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <div class="form-group">
            <label for="payment_status">Payment Status</label>
            <select name="payment_status" id="payment_status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
                <option value="failed">Failed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="amount_paid">Amount Paid</label>
            <input type="number" name="amount_paid" id="amount_paid" class="form-control" value="{{ $course->price }}" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Complete Purchase</button>
    </form>
</div>
@endsection
