@extends('admin.layouts.app')

@section('title', 'Edit Purchase')

@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">

    <div class="container">
        <h1>Purchase Details</h1>
        <p><strong>Course:</strong> {{ $purchase->course->title }}</p>
        <p><strong>Purchase Date:</strong> {{ $purchase->purchase_date }}</p>
        <p><strong>Amount Paid:</strong> ${{ $purchase->amount_paid }}</p>
        <p><strong>Payment Status:</strong> {{ ucfirst($purchase->payment_status) }}</p>
        <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Back</a>
    </div>

</div>
@endsection