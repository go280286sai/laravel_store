@extends('client.layouts.layout')

@section('content')
    <div class="container">
        @include('layouts.errors')
        <form action="/admin/products" method="post" enctype="multipart/form-data">
            @csrf
            Язык: <img src="{{env('APP_URL')}}/assets/img/en.png" alt="English"/>
            <br>
            <div class="mb-3">
                <label for="title" class="form-label">Название:</label>
                <input type="text" id="title" class="form-control" name="title_1" placeholder="Название товара" value="{{old('title_1')}}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Описание:</label>
                <textarea id="content" name="content_1" class="form-control" cols="15" rows="5" placeholder="Описание товара">{{old('content_1')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exerpt" class="form-label">Exerpt:</label>
                <textarea id="exerpt" name="exerpt_1" class="form-control" cols="15" rows="5" placeholder="О товаре">{{old('exerpt_1')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="keywords" class="form-label">Keywords:</label>
                <textarea id="keywords" name="keywords_1" class="form-control" cols="15" rows="5" placeholder="Ключевые слова">{{old('keywords_1')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description_1" class="form-control" cols="15" rows="5" placeholder="Описание">{{old('description_1')}}</textarea>
            </div>

            Язык: <img src="{{env('APP_URL')}}/assets/img/uk.png" alt="Ukraine"/>
            <br>
            <div class="mb-3">
                <label for="title" class="form-label">Название:</label>
                <input type="text" id="title" class="form-control" name="title_2" placeholder="Название товара" value="{{old('title_2')}}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Описание:</label>
                <textarea id="content" name="content_2" class="form-control" cols="15" rows="5" placeholder="Описание товара">{{old('content_2')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exerpt" class="form-label">Exerpt:</label>
                <textarea id="exerpt" name="exerpt_2" class="form-control" cols="15" rows="5" placeholder="О товаре">{{old('exerpt_2')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="keywords" class="form-label">Keywords:</label>
                <textarea id="keywords" name="keywords_2" class="form-control" cols="15" rows="5" placeholder="Ключевые слова">{{old('keywords_2')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description_2" class="form-control" cols="15" rows="5" placeholder="Описание">{{old('description_2')}}</textarea>
            </div>

            Язык: <img src="{{env('APP_URL')}}/assets/img/ru.png" alt="Russian"/>
            <br>
            <div class="mb-3">
                <label for="title" class="form-label">Название:</label>
                <input type="text" id="title" class="form-control" name="title_3" placeholder="Название товара" value="{{old('title_3')}}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Описание:</label>
                <textarea id="content" name="content_3" class="form-control" cols="15" rows="5" placeholder="Описание товара">{{old('content_3')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exerpt" class="form-label">Exerpt:</label>
                <textarea id="exerpt" name="exerpt_3" class="form-control" cols="15" rows="5" placeholder="О товаре">{{old('exerpt_3')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="keywords" class="form-label">Keywords:</label>
                <textarea id="keywords" name="keywords_3" class="form-control" cols="15" rows="5" placeholder="Ключевые слова">{{old('keywords_3')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description_3" class="form-control" cols="15" rows="5" placeholder="Описание">{{old('description_3')}}</textarea>
            </div>
            <td> Выбор категории
                <select name="category" class="form-select" aria-label="Default select example">
                    <option selected>Выберети категорию</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </td>
            <div class="mb-3">
                <label for="new_price" class="form-label">Цена:</label>
                <input type="text" id="new_price" class="form-control" name="new_price" placeholder="Цена" value="{{old('new_price')}}">
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Количество:</label>
                <input type="text" id="amount" class="form-control" name="amount" placeholder="Количество" value="{{old('amount')}}">
            </div>
            <div class="mb-3">
                <img src="{{\Illuminate\Support\Facades\Storage::url('uploads/img/no-image.jpg')}}" alt=""
                     width="200px">
            </div>
            <div class="mb-3">
                <input type="file" id="img" class="form-control" name="img">
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Добавить">
            </div>
        </form>
        <br>
        <a href="/admin/products">
            <div class="btn btn-danger">Назад</div>
        </a>
    </div>
@endsection

@section('js')
@endsection
