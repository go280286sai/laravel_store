<div class="left_profile col-3 ">
    <ul class="ul_profile">
        <li><a href="{{env('APP_URL')}}/client/dashboard">
                <div class="btn btn_profile">Dashboard</div>
            </a></li>
        @if(\App\Models\User::is_admin())
            <li><a href="{{env('APP_URL')}}/admin/main_categories">
                    <div class="btn btn_profile">Главные категории</div>
                </a></li>

            <li><a href="{{env('APP_URL')}}/admin/categories">
                    <div class="btn btn_profile">Категории</div>
                </a></li>

            <li><a href="{{env('APP_URL')}}/admin/products">
                    <div class="btn btn_profile">Товары</div>
                </a></li>
            <li><a href="{{env('APP_URL')}}/admin/orders">
                    <div class="btn btn_profile">Заказы</div>
                </a></li>
            <li><a href="{{env('APP_URL')}}/admin/users">
                    <div class="btn btn_profile">Пользователи</div>
                </a></li>
        @else
            <li><a href="{{env('APP_URL')}}/client/orders">
                    <div class="btn btn_profile">{{__('messages.orders')}}</div>
                </a></li>

            <li><a href="{{env('APP_URL')}}/client/index">
                    <div class="btn btn_profile">{{__('messages.profile')}}</div>
                </a></li>
            <li><a href="{{env('APP_URL')}}/client/callback">
                    <div class="btn btn_profile">{{__('messages.callback')}}</div>
                </a></li>
            <li><a href="{{env('APP_URL')}}/logout">
                    <div class="btn btn_profile">{{__('messages.logout')}}</div>
                </a></li>
        @endif

    </ul>
</div>
