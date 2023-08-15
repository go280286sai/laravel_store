@extends('client.layouts.layout')

@section('content')
    <?php $lang = \App\Models\Language::getStatus()->id; ?>
    <div class="container">
        <form action="/admin/categories/{{$categories[0]->id}}" method="post">
            @csrf
            @method('PUT')
        <table class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Язык</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Ключевые слова</th>
                    <th>Содержание</th>

                </tr>
            </thead>
                @foreach($categories as $category)
                <tbody>
                <tr>
                    @foreach($langs as $lang)
                    @if($category->language_id == $lang->id)
                    <td><img src="{{env('APP_URL')}}/assets/img/{{$lang->code}}.png" alt="{{$lang->title}}"/></td>
                    @endif
                    @endforeach
                        <input type="hidden" name="id_{{$category->language_id}}" value="{{$category->id}}">
                    <td><input type="text" name="title_{{$category->language_id}}" value="{{$category->title}}"></td>
                    <td><textarea name="description_{{$category->language_id}}" cols="15" rows="5">{{$category->description}}</textarea> </td>
                    <td><textarea name="keywords_{{$category->language_id}}" cols="15" rows="5">{{$category->keywords}}</textarea> </td>
                    <td><textarea name="content_{{$category->language_id}}" cols="15" rows="5">{{$category->content}}</textarea> </td>
                </tr>
                </tbody>

            @endforeach
            <td> Выбор категории
                <select name="main" class="form-select" aria-label="Default select example">
                    @foreach($mains as $main)
                        @if($category->main_id == $main->id)
                            <option  selected value="{{$main->id}}">{{$main->title}}</option>
                        @endif
                        <option value="{{$main->id}}">{{$main->title}}</option>
                    @endforeach
                </select>
            </td>
        </table>
            <div>
                <input type="submit" class="btn btn-success" value="Update">
            </div>
        </form>
        <br>
        <a href="/admin/categories"><div class="btn btn-danger">Назад</div></a>
    </div>

    @section('js')
    @endsection
@endsection

