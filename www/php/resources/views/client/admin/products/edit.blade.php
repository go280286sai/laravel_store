@extends('client.layouts.layout')

@section('content')
    <?php $lang = \App\Models\Language::getStatus()->id; ?>
    <div class="container">
        <form action="/admin/products/{{$products[0]->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                @foreach($products as $product)
                    @foreach($langs as $lang)
                    @if($product->language_id == $lang->id)
                    Язык: <img src="{{env('APP_URL')}}/assets/img/{{$lang->code}}.png" alt="{{$lang->title}}"/>
                    @endif
                    @endforeach  <br>
                        <div class="mb-3">
                            <label for="title_{{$product->language_id}}" class="form-label">Название:</label>
                            <input type="text" id="title_{{$product->language_id}}" class="form-control" name="title_{{$product->language_id}}" value="{{$product->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Описание:</label>
                            <textarea id="content" name="content_{{$product->language_id}}" class="form-control" cols="15" rows="5">{{$product->content}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exerpt" class="form-label">Exerpt:</label>
                            <textarea id="exerpt" name="exerpt_{{$product->language_id}}" class="form-control" cols="15" rows="5">{{$product->exerpt}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="keywords" class="form-label">Keywords:</label>
                            <textarea id="keywords" name="keywords_{{$product->language_id}}" class="form-control" cols="15" rows="5">{{$product->keywords}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea id="description" name="description_{{$product->language_id}}" class="form-control" cols="15" rows="5">{{$product->description}}</textarea>
                        </div>
            @endforeach
            <td> Выбор категории
                <select name="category" class="form-select" aria-label="Default select example">
                    @foreach($categories as $category)
                        @if($product->category_id == $category->id)
                            <option  selected value="{{$category->id}}">{{$category->title}}</option>
                        @endif
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </td>
            <div class="mb-3">
                <label for="old_price" class="form-label">Старая цена:</label>
                <input type="text" id="old_price" class="form-control" name="old_price" value="{{$product->old_price}}">
            </div>
            <div class="mb-3">
                <label for="new_price" class="form-label">Новая цена:</label>
                <input type="text" id="new_price" class="form-control" name="new_price" value="{{$product->price}}">
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Количество:</label>
                <input type="text" id="amount" class="form-control" name="amount" value="{{$product->amount}}">
            </div>
            <div class="mb-3">
                <img src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}" alt="" width="200px">
            </div>
            <div class="mb-3">
                <input type="file" id="img" class="form-control" name="img" value="{{$product->img}}">
            </div>
<input type="hidden" name="product_id" value="{{$product->id}}">
            <div>
                <input type="submit" class="btn btn-success" value="Update">
            </div>
        </form>
        <br>
        <a href="/admin/products"><div class="btn btn-danger">Назад</div></a>
    </div>
    <form action="/admin/gallery" method="post" enctype="multipart/form-data">
@csrf

    <table>
    @foreach($galleries as $gallery)
            <tr>
                <td><img src="{{\Illuminate\Support\Facades\Storage::url($gallery->img)}}" alt="" width="200px"></td>
                <td><input type="file" name="gallery[{{$gallery->id}}]"></td>
                <td><a href="/admin/gallery/{{$gallery->id}}/delete"><div class="btn btn-danger">Удалить</div></a></td>
            </tr>

    @endforeach
    </table>
        <div>
            <input type="submit" class="btn btn-success" value="Update">
        </div>
    </form>

    <form action="/admin/add_gallery" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$products[0]->id}}">
        <input type="file" name="img"><input type="submit" class="btn btn-success">
    </form>
@endsection

@section('js')
@endsection
