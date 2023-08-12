@extends('layouts.layout')
@section('css')

@endsection
@section('content')
    @if(!\Illuminate\Support\Facades\Auth::check())
        @include('auth.login_form')
    @else
        <div class="container">
            <div class="row">
                <div class="create_cart">
                    <h3>Заказ товаров:</h3>
                    <table class="table table-hover" style="width:100%">
                        <thead>
                        <tr class="table-dark">
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Сумма</th>
                        </tr>
                        </thead>
                        <tbody>
                       <?php $total_count=0; $total_sum=0; ?>
                        @foreach($carts as $cart)
                            <tr class="table-light">
                                <?php $total_count+=$cart->qty; $total_sum+=$cart->price * $cart->qty;?>
                                <td>{{$cart->title}}</td>
                                <td>{{$cart->price}}</td>
                                <td>{{$cart->qty}}</td>
                                <td>{{$cart->price * $cart->qty}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <table class="table">
                        <tr class="table-dark">
                            <td>Итого количество: </td>
                            <td>{{$total_count}}</td>
                        </tr>
                        <tr class="table-dark">
                            <td>Итого сумма: </td>
                            <td>{{$total_sum}}</td>
                    </table>
                </div>
            </div>
        </div>
        <h3>Выбор доставки:</h3>

        <h3>Выбор оплаты:</h3>
    @endif
@endsection
@section('js')
@endsection
