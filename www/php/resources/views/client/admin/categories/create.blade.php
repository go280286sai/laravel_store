@extends('client.layouts.layout')

@section('content')
    <div class="container">
        <form action="/admin/categories" method="post">
            @csrf
            <table class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Язык</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Ключевые слова</th>
                    <th>Сожержание</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><img src="{{env('APP_URL')}}/assets/img/en.png" alt="English"/></td>
                    <td><input type="text" name="title_1" value="" placeholder="Добавьте название"></td>
                    <td><textarea name="description_1" cols="15" rows="5" placeholder="Добавьте описание"></textarea>
                    </td>
                    <td><textarea name="keywords_1" cols="15" rows="5" placeholder="Добавьте ключевые слова"></textarea>
                    </td>
                    <td><textarea name="content_1" cols="15" rows="5" placeholder="Добавьте содержание"></textarea></td>
                </tr>
                <tr>
                    <td><img src="{{env('APP_URL')}}/assets/img/uk.png" alt="Ukraine"/></td>
                    <td><input type="text" name="title_2" value="" placeholder="Добавьте название"></td>
                    <td><textarea name="description_2" cols="15" rows="5" placeholder="Добавьте описание"></textarea>
                    </td>
                    <td><textarea name="keywords_2" cols="15" rows="5" placeholder="Добавьте ключевые слова"></textarea>
                    </td>
                    <td><textarea name="content_2" cols="15" rows="5" placeholder="Добавьте содержание"></textarea></td>
                </tr>
                <tr>
                    <td><img src="{{env('APP_URL')}}/assets/img/ru.png" alt="English"/></td>
                    <td><input type="text" name="title_3" value="" placeholder="Добавьте название"></td>
                    <td><textarea name="description_3" cols="15" rows="5" placeholder="Добавьте описание"></textarea>
                    </td>
                    <td><textarea name="keywords_3" cols="15" rows="5" placeholder="Добавьте ключевые слова"></textarea>
                    </td>
                    <td><textarea name="content_3" cols="15" rows="5" placeholder="Добавьте содержание"></textarea></td>
                </tr>
                <tr><td> Выбор категории
                        <select name="main" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach($mains as $main)
                                <option value="{{$main->id}}">{{$main->title}}</option>
                            @endforeach
                        </select>
                    </td></tr>

                </tbody>
            </table>
            <div>
                <input type="submit" class="btn btn-success" value="Добавить">
            </div>
        </form>
        <br>
        <a href="/admin/categories">
            <div class="btn btn-danger">Назад</div>
        </a>
    </div>

    @section('js')
    @endsection
@endsection

