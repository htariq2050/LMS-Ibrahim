@extends('admin.layouts.app')

@section('title', 'Your Purchases')

@section('dashboardcontent')
<div class="mdk-drawer-layout__content page">

  
        <h1>Your Purchases</h1>
        <div class="container"> 
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Purchase Date</th>
                    <th>Amount Paid</th>
                    <th>Payment Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->course->title }}</td>
                        <td>{{ $purchase->purchase_date }}</td>
                        <td>${{ $purchase->amount_paid }}</td>
                        <td>{{ ucfirst($purchase->payment_status) }}</td>
                        <td>
                            <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</div>
@endsection
