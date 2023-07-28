@extends('layouts.layout')

@section('content')
    <?php $lang = \App\Models\Language::getStatus()->id; ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-2">
                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{env('APP_URL').'/parent/'.$path['main_id']}}">
                                {{$path['title_main']}}
                            </a></li>

                <li class="breadcrumb-item"><a href="{{env('APP_URL').'/category/'.$path['category_id']}}">
                       {{$path['title_category']}}
                    </a></li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>{{__('messages.title')}}</th>
                <th>{{__('messages.category')}}</th>
                <th>{{__('messages.old_price')}}</th>
                <th>{{__('messages.new_price')}}</th>
                <th>{{__('messages.is_set')}}</th>
            </tr>
            </thead>
            <tbody>

            @foreach($categories->category_descriptions as $category)
                @foreach($categories->products as $product)
                   @foreach($product->product_descriptions as $product_description)
                       @if($category->language_id == $lang && $product_description->language_id==$lang)
                           <td>
                               <a href="/product/{{$product->slug}}">{{$product_description->title}}</a>
                           </td>
                           <td>
                               {{$category->title}}</td>
                           <td>{{$product->old_price}}</td>
                           <td>{{$product->price}}</td>
                           <td>
                               @if($product->status == 1)
                                   <i class="fas fa-check text-success"></i>
                               @else
                                   <i class="fas fa-shipping-fast text-muted"></i>
                               @endif
                           </td>
                           </tr>
                       @endif
                   @endforeach
                @endforeach
                <tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>{{__('messages.title')}}</th>
                <th>{{__('messages.category')}}</th>
                <th>{{__('messages.old_price')}}</th>
                <th>{{__('messages.new_price')}}</th>
                <th>{{__('messages.is_set')}}</th>
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
