@extends('client.layouts.layout')

@section('content')
    <div class="container">
        <a href="/admin/products/create"><div class="btn btn-success">Добавить</div></a>
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th><img src="{{env('APP_URL')}}/assets/img/{{$lang->code}}.png" alt="{{$lang->title}}"/>&nbsp;Product</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Image</th>
                <th>HIT</th>
                <th>Status</th>
                <th>Action</th>
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
                            <a href="/admin/products/status/{{$product->id}}"><div class="btn btn-success">Deactivate</div></a>
                        @else
                            <a href="/admin/products/status/{{$product->id}}"><div class="btn btn-danger">Active</div></a>
                        @endif
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td><a href="/admin/products/{{$product->id}}/edit"><div class="btn btn-success">Редактировать</div></a>
                                </td>
                                <td>
                                    <form action="/admin/products/{{$product->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="Удалить" />
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
