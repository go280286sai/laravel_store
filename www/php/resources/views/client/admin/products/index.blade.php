@extends('client.layouts.layout')

@section('content')
    <div class="container">
        <div class="btn_create">
            <a href="{{env('APP_URL')}}/admin/products/create"><div class="btn btn-primary">Добавить</div></a>
        </div>
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th><img src="{{env('APP_URL')}}/assets/img/{{$lang->code}}.png" alt="{{$lang->title}}"/>&nbsp;{{__('messages.product')}}</th>
                <th>{{__('messages.price')}}</th>
                <th>{{__('messages.quantity')}}</th>
                <th>Image</th>
                <th>Hit</th>
                <th>{{__('messages.status')}}</th>
                <th>{{__('messages.action')}}</th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
                <tr>
                    <td>
                                {{$product->title}}
                    </td><td>
                                {{$product->price}}
                    </td><td>
                                {{$product->amount}}
                    </td><td>
                        <img src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}" alt="" width="50px">
                    </td>
                    <td>
                        {{$product->hit}}
                    </td>
                    <td>
                        @if($product->status == 1)
                            <a href="{{env('APP_URL')}}/admin/products/status/{{$product->id}}"><div class="btn btn-success">{{__('messages.active')}}</div></a>
                        @else
                            <a href="{{env('APP_URL')}}/admin/products/status/{{$product->id}}"><div class="btn btn-danger">{{__('messages.deactivate')}}</div></a>
                        @endif
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td><a href="{{env('APP_URL')}}/admin/products/{{$product->id}}/edit"><div class="btn btn-success">{{__('messages.edit')}}</div></a>
                                </td>
                                <td>
                                    <form action="{{env('APP_URL')}}/admin/products/{{$product->id}}" method="post">
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
