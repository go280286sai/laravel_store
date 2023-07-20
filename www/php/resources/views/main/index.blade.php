@extends('layouts.layout')

@section('content')
    @include('layouts.slide')
    <section class="featured-products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="section-title">Рекомендуемые товары</h3>
                </div>
                @foreach($products as $product)
                    <div class="col-lg-4 col-sm-6 mb-3">
                        <div class="product-card">
                            <div class="product-tumb">
                                <a href="/product/{{$product->product_id}}"><img src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}"
                                                            alt=""></a>
                            </div>
                            <div class="product-details">
                                <h4><a href="/product/{{$product->product_id}}">{{$product->title}}</a></h4>
                                <p>{{$product->exerpt}}</p>
                                <div class="product-bottom-details d-flex justify-content-between">
                                    <div class="product-price"><small>{{$product->old_price>0?$product->old_price:''}}</small>{{$product->price}}</div>
                                    <input type="hidden" id="input-quantity" value="1">
                                    <div class="product-links">
                                        <a href="/cart/add?id={{$product->product_id}}&qty=1" class="add-to-cart" data-id="{{$product->product_id}}"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="#"><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="section-title">Наши преимущества</h3>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <p class="text-center"><i class="fas fa-shipping-fast"></i></p>
                        <p>Прямые поставки от производителей</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <p class="text-center"><i class="fas fa-cubes"></i></p>
                        <p>Широкий ассортимент товара</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <p class="text-center"><i class="fas fa-hand-holding-usd"></i></p>
                        <p>Приятные и конкуретные цены</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <p class="text-center"><i class="fas fa-user-cog"></i></p>
                        <p>Профессиональная консультация и сервис</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $('.add-to-cart').on('click', function (e) {
            e.preventDefault();
            const $this = $(this);
            const id = $this.data('id');
            const qty = $('#input-quantity').val();
            console.log(id, qty);

            $.ajax({
                url: '/cart/add',
                type: 'GET',
                data: {
                    id: id,
                    qty: qty
                },
                success: function (data) {
                    $('#cart-count').text({{count(\Illuminate\Support\Facades\Session::get('cart')??[])}});
                    window.location.reload();
                    console.log(data);
                },
                error: function (data) {
                    console.log(data);
                }
            })
        })
    </script>
@endsection

