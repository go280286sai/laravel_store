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
                <th>{{__('messages.title')}}</th>
                <th>{{__('messages.price')}}</th>
                <th>{{__('messages.quantity')}}</th>
                <th colspan="2">{{__('messages.sum')}}</th>
            </tr>
            @foreach($carts as $cart)
                    <?php $total_qty += $cart->qty;
                    $total_price += $cart->price * $cart->qty
                    ?>
                <tr class="table-light">
                    <td>{{$cart->title}}</td>
                    <td>{{$cart->price}}</td>
                    <td>
                        <form action="{{env('APP_URL')}}/cart/update">
                            <input type="number" name="qty" style="width: 50px" value="{{$cart->qty}}"/>
                            <input type="hidden" name="id" value="{{$cart->id}}">
                            @csrf
                            <input type="submit" value="{{__('messages.update')}}" class="btn btn-success">
                        </form>
                    </td>
                    <td>{{$cart->price * $cart->qty}}</td>
                    <td>
                        <a href="{{env('APP_URL')}}/cart/remove?{{'id='.$cart->id}}"><div class="btn btn-danger">{{__('messages.remove')}}</div></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        <table class="table">
            <tr class="table-dark">
                <td>{{__('messages.all_products')}}</td>
                <td>{{$total_qty.' шт.'}}</td>
            </tr>
            <tr class="table-dark">
                <td>{{__('messages.total')}}</td>
                <td>{{$total_price.' '.env('APP_MONEY')}}</td>
        </table>
    </div>
@endsection

