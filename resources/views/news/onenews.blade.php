@extends('layouts.layout')

@section('baner')@stop

@section('content')

    <div class="main-content">

        <div class="main-content-inner content-width">


            <!-- Main Column / Sidebar -->

            <div class="column-container">


                <!-- Main Column -->

                <div class="column-three-qtr">


                    <!-- Blog Post -->


                    <div class="blog-post actual-post">

                        <!-- Title -->
                        <h1>{{$newsID->title}}</h1>
                        <!-- Meta -->
                        <div class="blog-meta">
                            <div class="meta-item"><div class="meta-title published">Дата:</div><a href="#">{{$newsID->created_at}}</a></div>
                            <div class="meta-item"><div class="meta-title views">Просмотры:</div><a href="#">9</a></div>
                            <div class="meta-item"><div class="meta-title comments">Комментарии:</div><a href="#">2</a></div>
                            <div class="meta-item"><div class="meta-title tags">Теги:</div><a href="#">новости</a>, <a href="#">шаблоны</a></div>
                        </div>


                        <!-- Content -->

                        <div class="blog-content">
                            <!-- Paragraph -->
                            <p>{{$newsID->short_name}} </p>
                            <div class="media">
                                <div id="portfolio-blog-slider-container">

                                    <div id="portfolio-blog-slider">

                                        <!-- Actual Images -->

                                        <img alt="" src="{{$newsID->img_path}}" class="fullwidth">


                                        <!-- END Actual Images -->

                                    </div>


                                    <!-- Slide Controls -->

                                    <div class="portfolio-blog-slider-controls">
                                        <div id="portfolio-blog-slider-prev"></div>
                                        <div id="portfolio-blog-slider-next"></div>
                                    </div>

                                    <!-- END Slide Controls -->


                                </div>
                            </div>

                            <!-- END Image -->


                            <!-- H3 Title -->
                            <h3>{{$newsID->title}}</h3>
                            <!-- Paragraph -->
                            <p>{{$newsID->content}}</p>
                        </div>

                        <!-- END Content -->


                    </div>

                    <!-- END Blog Post -->



                    <!-- Share Links -->

                    <ul class="post-sharing">
                        <li><a href="#"><i class="fa fa-facebook"></i><div class="tooltip">Поделиться в Facebook</div></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i><div class="tooltip">Поделиться в Twitter</div></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square"></i><div class="tooltip">Поделиться в LinkedIn</div></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i><div class="tooltip">Поделиться в Pinterest</div></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i><div class="tooltip">Поделиться в Google+</div></a></li>
                    </ul>

                    <!-- END Share Links -->



                    <!-- Divider -->

                    <div class="divider"></div>

                    <!-- END Divider -->



                    <!-- Reader Comments -->

                    <div class="comments">
                        <h2>Комментарии к статьи</h2>


                        <!-- Comment -->
@foreach($comment as $comments)
                        <div class="comment">
                            <!-- Username -->
                            <div class="username">
                                <a href="#">{{ $comments->name }}</a> пишет:
                            </div>
                            <!-- Date -->
                            <div class="date">
                                {{ $comments->created_at }}
                            </div>
                            <!-- Message -->
                            <div class="message">
                                <p>{{ $comments->message }}</p>
                            </div>
                            <!-- Reply Link -->
                            {{--<div class="link">--}}
                                {{--<a href="#">Ответить</a>--}}
                            {{--</div>--}}
                        </div>
@endforeach
                        <!-- END Comment -->


                    </div>

                    <!-- END Reader Comments -->



                    <!-- Divider -->

                    <div class="divider"></div>

                    <!-- END Divider -->



                    <!-- Post Comment Form -->
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif
                    <div class="comment-form">
                        <h2>Оставить комментарий</h2>
                        <form id="comment-form" name="addcomment" method="post" action="{{action('NewsController@addcomment')}}">
                            {{csrf_field()}}
                            <!-- Textbox -->
                            <input type="text" name="name" placeholder="Имя *">
                            <!-- Textbox -->
                            <input type="text" name="email" placeholder="Email *">
                            <!-- Textbox -->
                            <input type="text" name="subjects" placeholder="Тема *">
                            <!-- Comment box -->
                            <textarea name="message" placeholder="Сообщение *"></textarea>
                            <input type="hidden" name="news_id" value="{{$newsID->id}}">
                            <!-- Submit Button -->
                            <input type="submit" class="accent" value="Добавить комментарий">
                        </form>
                    </div>

                    <!-- END Post Comment Form -->


                </div>

                <!-- END Main Column -->



                <!-- Sidebar -->
                @include('news.sidebarNews')


                <!-- END Sidebar -->


            </div>

            <!-- END Main Column / Sidebar -->


        </div>
    </div>

@endsection

@section('content-width')
@stop

