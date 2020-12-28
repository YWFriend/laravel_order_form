@extends('admin.layout')

@section('content')
    <div class="container">
        <h3>Список заявок</h3>
        <div>
            <div class="row border-bottom mb-3">
                <div class="col">Дата добавления</div>
                <div class="col">Заказчик</div>
                <div class="col">Тариф</div>
                <div class="col">Стоимость</div>
                <div class="col">Дата доставки</div>
                <div class="col">Адрес доставки</div>
            </div>

            @foreach ($orders as $order)
                <div class="row">
                    <div class="col">{{$order->created_at}}</div>
                    <div class="col">{{$order->customer->name}}</div>
                    <div class="col">{{$order->tariff->name}}</div>
                    <div class="col">{{$order->tariff->price}}</div>
                    <div class="col">{{$order->order_date}}</div>
                    <div class="col">{{$order->address}}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
