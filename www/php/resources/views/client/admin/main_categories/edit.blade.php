@extends('client.layouts.layout')

@section('content')
    <div class="container">
        @include('layouts.errors')
        <form action="/admin/main_categories/{{$main[0]->id}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label"><img src="{{env('APP_URL')}}/assets/img/en.png" alt="English"/></label>
            </div>
            <div class="mb-3">
                <label for="main_description_1" class="form-label">Title</label>
                <input type="text" name="main_description_1" placeholder="Title" class="form-control"
                       id="main_description_1" aria-describedby="emailHelp" value="{{$main[0]->title}}">
                <div id="emailHelp" class="form-text">Name of category</div>
            </div>
            <div class="mb-3">
                <label class="form-label"><img src="{{env('APP_URL')}}/assets/img/uk.png" alt="Ukraine"/></label>
            </div>
            <div class="mb-3">
                <label for="main_description_2" class="form-label">Назва</label>
                <input type="text" name="main_description_2" placeholder="Назва" class="form-control"
                       id="main_description_2" aria-describedby="emailHelp" value="{{$main[1]->title}}">
                <div id="emailHelp" class="form-text">Назва категорії</div>
            </div>
            <div class="mb-3">
                <label class="form-label"><img src="{{env('APP_URL')}}/assets/img/ru.png" alt="Russian"/></label>
            </div>
            <div class="mb-3">
                <label for="main_description_3" class="form-label">Название</label>
                <input type="text" name="main_description_3" placeholder="Название" class="form-control"
                       id="main_description_3" aria-describedby="emailHelp" value="{{$main[2]->title}}">
                <div id="emailHelp" class="form-text">Название категории</div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('messages.update')}}</button>
        </form>

        <br>
        <a href="{{env('APP_URL')}}/admin/main_categories">
            <div class="btn btn-danger">{{__('messages.to_back')}}</div>
        </a>
    </div>

@endsection

@section('js')
@endsection
