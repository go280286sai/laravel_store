@extends('client.layouts.layout')

@section('content')
    <div class="container">
        <a href="/admin/main_categories/create"><div class="btn btn-success">Добавить</div></a>
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>id</th>
                <th><img src="{{env('APP_URL')}}/assets/img/en.png" alt="Ukraine"/></th>
                <th><img src="{{env('APP_URL')}}/assets/img/uk.png" alt="Ukraine"/></th>
                <th><img src="{{env('APP_URL')}}/assets/img/ru.png" alt="Ukraine"/></th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mains as $main)
                <tr>
                    <td>
                        {{$main->id}}
                    </td>
                    @foreach($main->main_descriptions as $main_description)
                        <td>{{$main_description->title}}</td>
                    @endforeach
                    <td>
                        <table>
                            <tr>
                                <td><a href="/admin/main_categories/{{$main->id}}/edit"><div class="btn btn-success">Редактировать</div></a>
                                </td>
                                <td>
                                    <form action="/admin/main_categories/{{$main->id}}" method="post">
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
    @section('js')
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
            new DataTable('#example');
        </script>
    @endsection
@endsection

