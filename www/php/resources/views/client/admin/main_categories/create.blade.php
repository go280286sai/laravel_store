@extends('client.layouts.layout')

@section('content')
    <div class="container">
        <table class="display" style="width:100%">
            <thead>
            <tr>
                <th><img src="{{env('APP_URL')}}/assets/img/en.png" alt="Ukraine"/></th>
                <th><img src="{{env('APP_URL')}}/assets/img/uk.png" alt="Ukraine"/></th>
                <th><img src="{{env('APP_URL')}}/assets/img/ru.png" alt="Ukraine"/></th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <form action="/admin/main_categories" method="post">
                @csrf
                <tr>
                        <td>
                            <input name="main_description_1" type="text">
                        </td> <td>
                            <input name="main_description_2" type="text">
                        </td> <td>
                            <input name="main_description_3" type="text">
                        </td>
                    <td>
                        <input type="submit" class="btn btn-success" value="Добавить">
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
        <br>
        <a href="/admin/main_categories"><div class="btn btn-danger">Назад</div></a>
    </div>

    @section('js')
    @endsection
@endsection

