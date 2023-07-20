@extends('layouts.layout')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2">
            <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="/">{{$product->main_title}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{$product->category_title}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
        </ol>
    </nav>
</div>


<div class="container py-3">
    <div class="row">

        <div class="col-md-4 order-md-2">

            <h1>{{$product->title}}</h1>

            <ul class="list-unstyled">
                @if($product->status == 1)
                <li><i class="fas fa-check text-success"></i> В наличии</li>
                @else
                <li><i class="fas fa-shipping-fast text-muted"></i> Ожидается</li>
                @endif
                <li><i class="fas fa-hand-holding-usd"></i> <span class="product-price"><small>{{$product->old_price}}</small>{{$product->price}}</li>
            </ul>

            <div id="product">
                <div class="input-group mb-3">
                    <input id="input-quantity" type="number" class="form-control" name="quantity" value="1">
                    <button class="btn btn-danger add-to-cart"  type="button" data-id="{{$product->product_id}}">Купить</button>
                </div>
            </div>
        </div>
        <div class="col-md-8 order-md-1">
            <ul class="thumbnails list-unstyled clearfix">
                <li class="thumb-main text-center"><a class="thumbnail" href="{{\Illuminate\Support\Facades\Storage::url($product->img)}}" data-effect="mfp-zoom-in"><img src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}" alt=""></a></li>

                @foreach($images as $image)
                <li class="thumb-additional"><a class="thumbnail" href="{{\Illuminate\Support\Facades\Storage::url($image->img)}}" data-effect="mfp-zoom-in"><img src="{{\Illuminate\Support\Facades\Storage::url($image->img)}}" alt=""></a></li>
                @endforeach
            </ul>

           <p>{{$product->content}}</p>


        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();
        const $this = $(this);
        const id = $this.data('id');
        console.log(id)
        const qty = $('#input-quantity').val();
        $.ajax({
            url: '/cart/add',
            type: 'GET',
            data: {
                id: id,
                qty: qty
            },
            success: function (data) {
                $('#cart-count').text({{count(\Illuminate\Support\Facades\Session::get('cart')??[])}});
                // window.location.reload();
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        })
    })
</script>
@endsection
