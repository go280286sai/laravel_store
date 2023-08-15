@extends('client.layouts.layout')

@section('content')
    <?php $lang = \App\Models\Language::getStatus()->id; ?>
    <div class="container">
        <table class="display" style="width:100%">
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
            <form action="/admin/main_categories/{{$main->id}}" method="post">
                @method('PUT')
                @csrf
                <tr>
                    <td>
                        {{$main->id}}
                    </td>
                    @foreach($main->main_descriptions as $main_description)
                        <td>
                            <input name="main_description_{{$main_description->language_id}}" type="text" value="{{$main_description->title}}">
                        </td>
                    @endforeach
                    <td>
                        <input type="submit" class="btn btn-success" value="Обновить">
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

