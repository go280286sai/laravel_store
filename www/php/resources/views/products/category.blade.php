@extends('layouts.layout')

@section('content')
    <?php $lang = \App\Models\Language::getStatus()->id; ?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2">
            <?= $breadcrumbs??'' ?>
        </ol>
    </nav>
</div>
<div class="container">
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Название</th>
            <th>Категория</th>
            <th>Старая цена</th>
            <th>Новая цена</th>
            <th>В наличии</th>
        </tr>
        </thead>
        <tbody>

        @foreach($categories->products as $category)

        <tr>

                @foreach($category->product_descriptions as $product)
            @if($product->language_id == $lang)
                    <td>
                        <a href="/product/{{$product->product_id}}">{{$product->title}}</a>
            </td>
            <td>
                {{$categories->title}}</td>
            <td>{{$category->old_price}}</td>
            <td>{{$category->price}}</td>
            <td>
                @if($category->status == 1)
                <i class="fas fa-check text-success"></i>
                @else
                <i class="fas fa-shipping-fast text-muted"></i>
                @endif
            </td>
        </tr>
        @endif
        @endforeach
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Название</th>
            <th>Категория</th>
            <th>Старая цена</th>
            <th>Новая цена</th>
            <th>В наличии</th>
        </tr>
        </tfoot>
    </table>
</div>

            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script>
                new DataTable('#example');
            </script>

@endsection
