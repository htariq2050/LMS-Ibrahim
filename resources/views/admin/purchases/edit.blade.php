@extends('admin.layouts.app')

@section('title', 'Edit Purchase')

@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">

    <h1>Edit Purchase</h1>
    <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id" class="form-control" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $purchase->course_id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount_paid">Amount Paid</label>
            <input type="number" name="amount_paid" id="amount_paid" class="form-control" value="{{ $purchase->amount_paid }}" required>
        </div>
        <div class="form-group">
            <label for="payment_status">Payment Status</label>
            <select name="payment_status" id="payment_status" class="form-control" required>
                <option value="pending" {{ $purchase->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $purchase->payment_status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="failed" {{ $purchase->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
