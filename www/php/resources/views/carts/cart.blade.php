@extends('layouts.layout')

@section('content')
    <?php
    /**
     * @var int $total_price ;
     * @var int $total_qty ;
     */
    $total_qty = 0;
    $total_price = 0;
    ?>
    <div>
        <table class="table table-hover">
            <tr class="table-dark">
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
                <th colspan="2">Сумма</th>
            </tr>
            @foreach($carts as $cart)
                    <?php $total_qty += $cart->qty;
                    $total_price += $cart->price * $cart->qty
                    ?>
                <tr class="table-light">
                    <td>{{$cart->title}}</td>
                    <td>{{$cart->price}}</td>
                    <td>
                        <form action="/cart/update">
                            <input type="number" name="qty" style="width: 50px" value="{{$cart->qty}}"/>
                            <input type="hidden" name="id" value="{{$cart->id}}">
                            @csrf
                            <input type="submit" value="Обновить" class="btn btn-success">
                        </form>
                    </td>
                    <td>{{$cart->price * $cart->qty}}</td>
                    <td>
                        <a href="/cart/remove?{{'id='.$cart->id}}"><div class="btn btn-danger">Удалить</div></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>

        <table class="table">
            <tr class="table-dark">
                <td>Всего количество товара:</td>
                <td>{{$total_qty.' шт.'}}</td>
            </tr>
            <tr class="table-dark">
                <td>На общую сумму: </td>
                <td>{{$total_price.' грн.'}}</td>
        </table>
    </div>
@endsection

