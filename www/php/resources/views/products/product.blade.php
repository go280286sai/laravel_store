@extends('layouts.layout')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-4 order-md-2">
                @foreach($product->product_descriptions as $description)
                    @if($description->language_id == $lang)
                        <h1>{{$description->title}}</h1>
                        <ul class="list-unstyled">
                            @if($product->status == 1)
                                <li><i class="fas fa-check text-success"></i>{{__('messages.is_set')}}</li>
                            @else
                                <li><i class="fas fa-shipping-fast text-muted"></i>{{__('messages.to_wait')}}</li>
                            @endif
                            <li><i class="fas fa-hand-holding-usd"></i> <span
                                    class="product-price"><small>{{$product->old_price}}</small>{{$product->price}}</li>
                        </ul>
                        <div id="product">
                            <div class="input-group mb-3">
                                <input id="input-quantity" type="number" class="form-control" name="quantity" value="1">
                                <button class="btn btn-danger add-to-cart" type="button"
                                        data-id="{{$product->id}}">{{__('messages.to_buy')}}</button>
                            </div>
                        </div>
            </div>
            <div class="col-md-8 order-md-1">
                <ul class="thumbnails list-unstyled clearfix">
                    <li class="thumb-main text-center"><a class="thumbnail"
                                                          href="{{\Illuminate\Support\Facades\Storage::url($product->img)}}"
                                                          data-effect="mfp-zoom-in"><img
                                src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}" alt=""></a></li>

                    @foreach($product->product_gallery as $image)
                        <li class="thumb-additional"><a class="thumbnail"
                                                        href="{{\Illuminate\Support\Facades\Storage::url($image->img)}}"
                                                        data-effect="mfp-zoom-in"><img
                                    src="{{\Illuminate\Support\Facades\Storage::url($image->img)}}" alt=""></a></li>
                    @endforeach
                </ul>
                <p>{{$description->content}}</p>
            </div>
        </div>
    </div>
    @endif
    @endforeach
@endsection
