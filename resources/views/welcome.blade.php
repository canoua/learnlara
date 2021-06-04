<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset( 'css/welcome.css') }}">

    </head>
    <body class="antialiased">
        <div class="header relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 header-link underline">Домашняя страница</a>
                    @else
                        <a href="{{ route('login') }}" class="header-link text-sm text-gray-700 header-link underline">Войти</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="header-link ml-4 text-sm text-gray-700 header-link underline">Регистрация</a>
                        @endif
                    @endauth
                </div>
            @endif
            <a class="content-link" href="#">
                <img src="img/scale_1200.jpg" alt="">
            </a>
        </div>
        <div class="container content">
           
            <a href="#content__info" class="content-btn">Подробнее</a>
            <p id="content__info" class="content__info">
                <span class="content__info_descr">
                    Ищите нужные адреса или лучшие места поблизости даже без интернета. 
                    Яндекс.Карты расскажут подробности об организациях, помогут добраться до места на транспорте или пешком и покажут, где едет нужный маршрут. 
                </span>
                <div class="content__box-wrapper">
                    <div class="content__box">
                    <div class="content__title">
                        Автомобильная навигация: 
                    </div>
                    <ul class="content__list">
                        <li class="content__list_item">
                            <span>
                                голосовые подсказки, которые предупреждают о камерах, скоростных ограничениях, превышении скорости, авариях и ремонтных работах;
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                уведомления о поворотах и перестроении в нужную полосу; альтернативные маршруты в Навигаторе с учётом пробок и перекрытий; 
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                парковки и заправки с оплатой топлива в приложениях Яндекса;
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                работа Навигатора в фоновом режиме и с выключенным экраном; 
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                офлайн-карты для поездок без интернета.
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="content__box">
                    <div class="content__title">
                        Поиск и выбор мест:
                    </div>
                    <ul class="content__list">
                        <li class="content__list_item">
                            <span>
                                крупнейшая база организаций и фильтры для точного поиска; 
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                подробная информация: контакты, режим работы, список услуг, фото и отзывы;
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                поэтажные схемы крупных торговых центров в Москве;
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                поиск мест и адресов без подключения к интернету (в офлайн-картах);
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                просмотр сохранённых мест на разных устройствах.
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="content__box">
                    <div class="content__title">
                        Маршруты: 
                    </div>
                    <ul class="content__list">
                        <li class="content__list_item">
                            <span>
                                пешком — с учётом проходов между домами и пешеходных дорожек;
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                на общественном транспорте — с информацией о том, когда транспорт приедет на остановку. 
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                на велосипеде — с учётом типов дорог, переходов и с предупреждениями о выезде на автомобильные 	дороги;
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                на автомобиле — навигация с учётом дорожной ситуации и предупреждениями о камерах. 
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="content__box">
                    <div class="content__title">
                        Транспортный режим: 
                    </div>
                    <ul class="content__list">
                        <li class="content__list_item">
                            <span>
                                на карте видно движущиеся метки городского транспорта, которые в реальном времени показывают, где едет автобус, трамвай, троллейбус или маршрутка;
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                выделяются важные транспортные объекты — остановки и станции метро; 
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                можно оставить на карте только избранные маршруты; 
                            </span>
                        </li>
                        <li class="content__list_item">
                            <span>
                                движущиеся метки транспорта видно на карте многих крупных городов, например в Москве, Санкт-Петербурге, Новосибирске, Нижнем Новгороде, Краснодаре, Воронеже, Уфе и Самаре.
                            </span>
                        </li>
                    </ul>
                </div>
                </div>
            </p>
        </div>
    <script src="{{ asset('js/welcome.js') }}"></script>
    </body>
</html>
