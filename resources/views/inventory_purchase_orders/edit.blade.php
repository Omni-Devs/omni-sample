@extends('layouts.app')

@section('content')
    @include('inventory_purchase_orders.form', [
        'purchaseOrder' => $purchaseOrder,
        'isEdit' => true
    ])
@endsection