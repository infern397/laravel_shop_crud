@extends('layouts.client')

@section('content')
    <section>
        <div class="alert alert-warning text-center" role="alert">
            Пожалуйста, заполните адрес электронной почты.
        </div>
        <div class="container">
            <div class="py-5 text-center">
                <h1>Оформление заказа</h1>
            </div>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Корзина</span>
                        <span class="badge badge-primary badge-pill text-white">{{ sizeof($products) }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach($products as $id => $product)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $product['name'] }}</h6>
                                    <small class="text-muted">{{ $product['quantity'] }} шт.</small>
                                </div>
                                <span class="text-muted">{{ $product['quantity'] * $product['price'] }} руб.</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Сумма к оплате</span>
                            <strong>{{ $total }} руб.</strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Адрес доставки</h4>
                    <form action="{{ route('client.order.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Имя</label>
                                <input name="customer_firstname" type="text" class="form-control" id="firstName" placeholder="Иван" value="" required>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Фамилия</label>
                                <input name="customer_lastname" type="text" class="form-control" id="lastName" placeholder="Иванов" value=""
                                       required>
                            </div>

                            <div class="col-12 mt-3">
                                <label for="email" class="form-label">Адрес электронной почты</label>
                                <input name="customer_email" type="email" class="form-control" id="email" placeholder="you@example.com">
                            </div>

                            <div class="col-12 mt-3">
                                <label for="address" class="form-label">Адрес</label>
                                <input name="customer_address" type="text" class="form-control" id="address"
                                       placeholder="Россия, Москва, ул. Мира, дом 6" required>
                            </div>

                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Продолжить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
