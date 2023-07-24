<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{env('APP_URL')}}/assets/bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{env('APP_URL')}}/assets/css/magnific-popup.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
          integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/assets/css/main.css">
    <link rel="icon" href="{{env('APP_URL')}}/assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    @section('css')
    @show
    <meta name="keywords" content="{{isset($keywords)?env('APP_NAME').'::'.$keywords:env('APP_NAME').'::'.__('messages.keywords')}}">
    <meta name="description" content="{{isset($description)?env('APP_NAME').'::'.$description:env('APP_NAME').'::'.__('messages.description')}}">
    <title>{{isset($title)?env('APP_NAME').'::'.$title:env('APP_NAME').'::'.__('messages.main')}}</title>
</head>
<body>
@include('layouts.header')

@section('content')
@show



<button id="top">
    <i class="fas fa-angle-double-up"></i>
</button>

@include('layouts.footer')
<script src="{{env('APP_URL')}}/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script>
<script src="{{env('APP_URL')}}/assets/js/main.js"></script>
<script src="{{env('APP_URL')}}/assets/js/jquery.magnific-popup.min.js"></script>
<script>
    $(document).ready(function () {
        update_cart()
    });

    function update_cart() {
        let total_price = 0;
        let total_qty = 0;
        $.ajax({
            url: '/cart/get',
            type: 'GET',
            success: function (data) {
                const carts = data;
                let body = `<table class="table table-hover">
                          <tr class="table-dark">
                          <th>{{__('messages.title')}}</th>
                          <th>{{__('messages.price')}}</th>
                          <th>{{__('messages.quantity')}}</th>
                          <th colspan="2">{{__('messages.sum')}}</th>
                          </tr>`;
                for (let cart in carts) {
                    total_qty += carts[cart].qty;
                    total_price += carts[cart].price * carts[cart].qty;
                    body += ` <tr class="table-light">
                         <td>${carts[cart].title}</td>
                         <td>${carts[cart].price}</td>
                         <td>
                         <input type="number" style="width: 50px"  id="update_${carts[cart].id}" value="${carts[cart].qty}" />
                       <img src="{{env('APP_URL')}}/assets/img/update.png" alt="" class="cart_removed" onclick="update(${carts[cart].id})" title="{{__('messages.update')}}">
                         </td>
                         <td>${carts[cart].price * carts[cart].qty}</td>
                         <td>
                             <img src="{{env('APP_URL')}}/assets/img/cart.png" alt="" class="cart_removed" onclick="remove(${carts[cart].id})" title="{{__('messages.remove')}}">
                         </td>
                         </tr>`
                }
                body += `</table>`;
                $('#cart').html(body);
                $('#get_sum').text(total_price + ` {{env('APP_MONEY')}}`);
                $('#get_count').text(total_qty + ` {{env('APP_COUNT')}}`);
                $('#cart-count').text({{count(\Illuminate\Support\Facades\Session::get('cart')??[])}});
            },
        })
    }

    function remove(id) {
        $.ajax({
            url: '/cart/remove',
            type: 'GET',
            data: {
                id: id
            },
            success: function () {
                update_cart()
            },
            error: function (data) {
                console.log(data);
            }
        })
    }

    function update(id) {
        const qty = $(`#update_${id}`).val();
        console.log(qty);
        $.ajax({
            url: '/cart/update',
            type: 'GET',
            data: {
                id: id,
                qty: qty
            },
            success: function () {
                update_cart()
            },
            error: function (data) {
                console.log(data);
            }
        })
    }
</script>

@section('js')
@show
</body>
</html>
