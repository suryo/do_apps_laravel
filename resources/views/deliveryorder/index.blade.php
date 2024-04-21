@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Delivery Orders</h1>
        <div class="mb-3">
            <a href="{{ route('deliveryorders.index') }}" class="btn btn-primary">All Orders</a>
            <a href="{{ route('deliveryorders.index', ['status' => 'draft']) }}" class="btn btn-info">Draft Orders</a>
            <a href="{{ route('deliveryorders.index', ['status' => 'needapproval']) }}" class="btn btn-warning">Need Approval Orders</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->nomerorder }}</td>
                        <td>Rp. {{ number_format($order->ordertotal, 0, ',', '.') }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('deliveryorders.show', $order->id) }}" class="btn btn-primary">View</a>
                            @if ($order->status === 'needapproval')
                                <form action="{{ route('deliveryorders.approve', $order->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
