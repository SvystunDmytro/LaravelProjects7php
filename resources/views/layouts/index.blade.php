@extends('layouts.layout')

@section('content')

    <div class="main-content">
        <div class="main-content-inner content-width">

            <div class="column-container">

                <div class="column-one-third">
                    <div class="icons-column">
                        <!-- Icon Backing -->
                        <div class="icon-backing" style="background-color: #916C6C;">
                            <!-- Icon -->
                            <i class="fa fa-heart"></i>
                        </div>
                    </div>
                    <div class="content-column">
                        <!-- Title -->
                        <h3>Дизайн</h3>
                        <!-- Text -->
                        <p>Интересно отметить, что каждая сфера рынка притягивает план размещения. </p>
                    </div>
                </div>

                <div class="column-one-third">
                    <div class="icons-column">
                        <!-- Icon Backing -->
                        <div class="icon-backing" style="background-color: #7089AD;">
                            <!-- Icon -->
                            <i class="fa fa-font"></i>
                        </div>
                    </div>
                    <div class="content-column">
                        <!-- Title -->
                        <h3>Верстка</h3>
                        <!-- Text -->
                        <p>Интересно отметить, что каждая сфера рынка притягивает план размещения. </p>
                    </div>
                </div>

                <div class="column-one-third">
                    <div class="icons-column">
                        <!-- Icon Backing -->
                        <div class="icon-backing" style="background-color: #63885F;">
                            <!-- Icon -->
                            <i class="fa fa-fullscreen"></i>
                        </div>
                    </div>
                    <div class="content-column">
                        <!-- Title -->
                        <h3>Разработка</h3>
                        <!-- Text -->
                        <p>Интересно отметить, что каждая сфера рынка притягивает план размещения. </p>
                    </div>
                </div>

            </div>


            <div class="column-container">
                <div class="column-three-qtr">
                    <div class="divider"></div>
                    <h3 class="section-title">Последние новости</h3>
                    <div id="blog-nav" class="carousel-nav">
                        <div class="back"></div>
                        <div class="next"></div>
                    </div>
                    <div class="carousel">
                        <ul id="blog-carousel" class="slider-container">

                            @foreach($news as $new)
                                <li class="column-one-fourth">
                                    <!-- Image -->
                                    <a href="news/{{$new->id}}" class="image-link"><img alt="" src="{{$new->img_path}}" class="fullwidth">
                                    </a>
                                    <!-- Title -->
                                    <h3><a href="news/{{$new->id}}"> {{ $new->title }} </a></h3>
                                    <!-- Date -->
                                    <div class="date">{{ $new->created_at }}</div>
                                    <!-- Excerpt -->
                                    <p>{{ $new->short_discription }} </p>
                                    <!-- Read More Link -->
                                    <a href="news/{{$new->id}}}">Подробнее</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </div>

                <div class="column-one-fourth">

                    <div class="divider"></div>

                    <h3 class="section-title">Комментарии</h3>

                    <div id="testimonials-nav" class="carousel-nav">
                        <div class="back"></div>
                        <div class="next"></div>
                    </div>

                    <div class="carousel">
                        <ul id="testimonials-carousel" class="slider-container">


                            <!-- Testimonial 1 -->

                            <li class="column-one-fourth">
                                <!-- Text -->
                                <div class="testimonial-text">
                                    <p>Тактика выстраивания отношений с коммерсчекими агентами стремительно развивает стратегический нестандартный подход.</p>
                                </div>
                                <!-- Name -->
                                <div class="testimonial-name">
                                    Джон Доу
                                </div>
                                <!-- Company URL -->
                                <div class="testimonial-link">
                                    <a href="#">Посетитель</a>
                                </div>
                            </li>

                            <!-- END Testimonial 1 -->



                            <!-- Testimonial 2 -->

                            <li class="column-one-fourth">
                                <!-- Text -->
                                <div class="testimonial-text">
                                    <p>Тактика выстраивания отношений с коммерсчекими агентами стремительно развивает стратегический нестандартный подход.</p>
                                </div>
                                <!-- Name -->
                                <div class="testimonial-name">
                                    Джон Доу
                                </div>
                                <!-- Company URL -->
                                <div class="testimonial-link">
                                    <a href="#">Посетитель</a>
                                </div>
                            </li>

                            <!-- END Testimonial 2 -->


                        </ul>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
