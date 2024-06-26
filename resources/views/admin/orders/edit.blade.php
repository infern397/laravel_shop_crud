@extends('layouts.admin')

@section('title', 'Главная')

@section('content')
    <div class="page-heading">
        <h3>Update Order</h3>
    </div>
    <div class="page-content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order: {{ $order->id }}</li>
        </ol>
        <section class="row">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Order: {{ $order->id }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('admin.orders.update', $order) }}" method="POST"
                                  class="form form-horizontal">
                                @csrf
                                @method('PATCH')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Customer FirstName</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control"
                                                   name="customer_firstname" placeholder="FirstName"
                                                   value="{{ $order->customer_firstname }}">
                                        </div>
                                        @error('customer_firstname')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Customer LastName</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control"
                                                   name="customer_lastname" placeholder="LastName"
                                                   value="{{ $order->customer_lastname }}">
                                        </div>
                                        @error('customer_lastname')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Customer Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="email" id="first-name-horizontal" class="form-control"
                                                   name="customer_email" placeholder="Email"
                                                   value="{{ $order->customer_email }}">
                                        </div>
                                        @error('customer_email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Customer Address</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name-horizontal" class="form-control"
                                                   name="customer_address" placeholder="Address"
                                                   value="{{ $order->customer_address }}">
                                        </div>
                                        @error('customer_address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Total price</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control" id="readonlyInput"
                                                   readonly="readonly" value="{{ $order->total }}">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @if($order->products()->exists())
                                <label>Current Products</label>
                                <ul class="list-group">
                                    @foreach($order->products as $product)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $product->name }}
                                            <div class="d-flex gap-4">
                                                <form class="d-flex gap-4" method="POST"
                                                      action="{{ route('admin.orders.products.update', ['order' => $order->id, 'product' => $product->id]) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="">
                                                        <label for="">Price</label>
                                                        <input class="form-control" readonly="readonly" name="quantity"
                                                               type="number"
                                                               value="{{ $product->price }}">
                                                    </div>
                                                    <div class="">
                                                        <label for="">Count</label>
                                                        <input class="form-control" name="quantity" type="number"
                                                               value="{{ $product->pivot->quantity }}">
                                                        @error('quantity_' . $product->id)
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <input type="submit" class="btn btn-success" value="Update">
                                                </form>
                                                <form class="d-flex gap-4" method="POST"
                                                      action="{{ route('admin.orders.products.destroy', ['order' => $order->id, 'product' => $product->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if($availableProducts->count() > 0)
                                <label>Add Products</label>
                                <ul class="list-group">
                                    @foreach($availableProducts as $product)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $product->name }}
                                            <div class="d-flex gap-4">
                                                <div class="">
                                                    <label for="">Price</label>
                                                    <input class="form-control" readonly="readonly" name="quantity"
                                                           type="number"
                                                           value="{{ $product->price }}">
                                                </div>
                                                <form class="d-flex gap-4" method="POST"
                                                      action="{{ route('admin.orders.products.store', ['order' => $order->id, 'product' => $product->id]) }}">
                                                    @csrf
                                                    <div class="">
                                                        <label for="">Count</label>
                                                        <input name="quantity" class="form-control" type="number">
                                                        @error('quantity_' . $product->id)
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <input type="submit" class="btn btn-success" value="Add">
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                    {{--                                @endforeach--}}
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
