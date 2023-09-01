@extends('client.layouts.layout')

@section('content')
    <div class="container">

        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>id</th>
                <th>User</th>
                <th>Status</th>
                <th>Notes</th>
                <th>Total</th>
                <th>Qty</th>
                <th>Created</th>
                <th>{{__('messages.action')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>
                        {{$order->id}}
                    </td>
                        <td><a href="{{env('APP_URL')}}/admin/users/{{$order->user->id}}">{{$order->user->name}}</a></td>
                        <td>{{\App\Models\Order_status_description::where('order_status_id', $order->status_id)->first()->title}}</td>
                        <td>{{substr($order->notes, 0, 50) }}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->qty}}</td>
                        <td>{{$order->created_at}}</td>

                    <td>
                        <table>
                            <tr>
                                <td><a href="/admin/orders/{{$order->id}}/edit"><div class="btn btn-success">Просмотр</div></a>
                                </td>
                                <td>
                                    <form action="/admin/orders/{{$order->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="{{__('messages.delete')}}" />
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
@endsection
