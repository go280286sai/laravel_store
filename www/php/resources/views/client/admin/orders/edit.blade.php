@extends('client.layouts.layout')

@section('content')
    <div class="container">
        @include('layouts.errors')
        <form action="/admin/orders/{{$order->id}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label">Дата создания заказа: {{$order->created_at}}</label>
            </div>
            <div class="mb-3">
                <table class="table table-bordered">
                    <tr>
                        <td>Фамилия и имя покупателя</td>
                        <td>{{$client->name. ' '. $client->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Номер телефона покупателя</td>
                        <td>{{$client->phone}}</td>
                    </tr>
                    <tr>
                        <td>Служба доставки</td>
                        <td>{{$service->title}}</td>
                    </tr>
                    <tr>
                        <td>Адресс доставки</td>
                        <td>{{$client->city.', '. $client->street}}</td>
                    </tr>
                    @if(isset($client->delivery_number))
                         <tr>
                        <td>Номер накладной от {{\Illuminate\Support\Carbon::make($order->updated_at)->format('d.m.Y')}}</td>
                        <td>{{$client->delivery_number}}</td>
                    </tr>
                    @endif
                </table>
            </div>
            <div class="mb-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            Product
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            Qty
                        </th>
                        <th>
                            Sum
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->qty}}</td>
                            <td>{{$product->price*$product->qty}}</td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>

            <div class="mb-3">
                <label for="qty" class="form-label">Qty</label>
                <input type="text" name="qty" class="form-control"
                       id="qty" aria-describedby="emailHelp" value="{{$order->qty}}" disabled="disabled">
            </div>

            <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="text" name="total" class="form-control"
                       id="notes" aria-describedby="emailHelp" value="{{$order->total}}" disabled="disabled">
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Изменить статус заявки</label>
                <select name="status" id="select_category" class="form-select mb-3" aria-label="Default select example">
                    @foreach($statuses as $status)
                        @if($status->order_status_id == $order->status_id)
                            <option selected value="{{$status->order_status_id}}">{{$status->title}}</option>
                        @endif
                        <option value="{{$status->order_status_id}}">{{$status->title}}</option>
                    @endforeach
                </select></div>
            @if($order->status_id == 2)
                <label for="delivery_number" class="form-label">Введите номер накладной</label>
                <input type="text" name="delivery_number" id="delivery_number" class="form-control mb-3">
            @endif
            <table>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary">{{__('messages.update')}}</button>
                    </td>
                    <td><a href="{{env('APP_URL')}}/admin/orders/{{$order->id}}">
                            <div class="btn btn-success">Сформировать ведомость</div>
                        </a></td>
                </tr>
            </table>
        </form>
        <br>
        <a href="{{env('APP_URL').'/admin/users/'.$order->user->id}}">
            <div class="btn btn-danger">Просмотр клиента</div>
        </a>
        <a href="{{env('APP_URL')}}/admin/orders">
            <div class="btn btn-danger">{{__('messages.to_back')}}</div>
        </a>
    </div>

@endsection

@section('js')
@endsection
