<link rel="stylesheet" href="{{env('APP_URL')}}/assets/bootstrap/css/bootstrap.min.css">
<style>
    /* Стили для печати */
    @media print {
        /* Скрыть все элементы, кроме блока с id "printableArea" */
        .no_print {
            display: none;
        }

        #printableArea {
            display: block;
        }
    }
</style>
<body>
<div id="printableArea">
    <div class="container">
        <div class="row">
            <h2>Заявка от {{$order->created_at}}</h2>
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
        <div class="mb3">
            <table class="table">
                <tr>
                    <td>Директор: Иванов Иван Михайлович</td>
                    <td>_____________________ <small>Подпись</small></td>
                </tr>
            </table>
        </div>
        <div class="mb-3">
            <div class="no_print btn btn-primary" id="printButton" onclick=" window.print()">Распечатать</div>
            <a href="{{env('APP_URL').'/admin/orders/'.$order->id.'/edit'}}">
                <div class="no_print btn btn-danger">{{__('messages.to_back')}}</div>
            </a>        </div>
    </div>

</div>


</body>




