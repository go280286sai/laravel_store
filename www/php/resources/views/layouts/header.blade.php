<header class="fixed-top">
    <div class="header-top py-3">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col">
                    <a href="tel:5551234567">
                        <span class="icon-phone">&#9743;</span> 555 123-45-67
                    </a>
                </div>
                <div class="col text-end icons">
                    <form>
                        <div class="input-group" id="search">
                            <input type="text" class="form-control" placeholder="Search..." name="s">
                            <button class="btn close-search" type="button"><i class="fas fa-times"></i></button>
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <a href="#" class="open-search"><i class="fas fa-search"></i></a>
                    <a href="/cart" class="relative" data-bs-toggle="modal" data-bs-target="#cart-modal">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-danger rounded-pill count-items"><b id="cart-count"></b></span>
                    </a>
                    <a href="#"><i class="far fa-heart"></i></a>
                    <div class="dropdown d-inline-block">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="far fa-user"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/login">Авторизация</a></li>
                            <li><a class="dropdown-item" href="/register">Регистрация</a></li>
                        </ul>
                    </div>

                    <div class="dropdown d-inline-block">
                        <a href="/lang/ {{app()->getLocale()}}" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{env('APP_URL')}}/assets/img/{{app()->getLocale()}}.png" alt="">
                        </a>

                        <ul class="dropdown-menu" id="languages">
                            <li>
                                <a href="/lang/uk">
                                    <img src="{{env('APP_URL')}}/assets/img/uk.png" alt=""> Ukraine
                                  </a>
                            </li>
                            <li>
                                <a href="/lang/en">
                                    <img src="{{env('APP_URL')}}/assets/img/en.png" alt=""> English
                                  </a>
                            </li>
                             <li>
                                <a href="/lang/ru">
                                    <img src="{{env('APP_URL')}}/assets/img/ru.png" alt=""> Russian
                                    </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- header-top -->

    <div class="header-bottom py-2">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid p-0">
                    <a class="navbar-brand" href="/">{{env('APP_NAME')}}</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                             @foreach(\App\Models\Category::getList() as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="category.html">{{$category->title}}</a>
                            </li>
                             @endforeach
                         </ul>

{{--                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="category.html">Компьютеры</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="category.html">Планшеты</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    Ноутбуки--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                    <li><a class="dropdown-item" href="category.html">Mac</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="category.html">Windows</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="category.html">Телефоны</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="category.html">Камеры</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
            </nav>
        </div>
    </div><!-- header-bottom -->
</header>

