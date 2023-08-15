@extends('client.layouts.layout')

@section('content')
    <div class="container">
        <a href="/admin/categories/create"><div class="btn btn-success">Добавить</div></a>
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Main category</th>
                <th><img src="{{env('APP_URL')}}/assets/img/{{$lang->code}}.png" alt="{{$lang->title}}"/>&nbsp;Категория</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        @foreach($mains as $main)
                            @if($main->id == $category->main_id)
                                {{$main->title}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        {{$category->title}}
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td><a href="/admin/categories/{{$category->id}}/edit"><div class="btn btn-success">Редактировать</div></a>
                                </td>
                                <td>
                                    <form action="/admin/categories/{{$category->id}}" method="post">
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
