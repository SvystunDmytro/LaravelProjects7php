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
                    @foreach($news as $new)
                        <div class="blog-post">
                            <!-- Title -->
                            <h1><a href="news/{{$new->id}}">{{ $new->title }}</a></h1>
                            <!-- Meta -->
                            <div class="blog-meta">
                                <div class="meta-item">
                                    <div class="meta-title published">Дата:</div>
                                    <a href="#">{{$new->created_at}}</a></div>
                                <div class="meta-item">
                                    <div class="meta-title views">Просмотры:</div>
                                    <a href="#">9</a></div>
                                <div class="meta-item">
                                    <div class="meta-title comments">Комментарии:</div>
                                    <a href="#">2</a></div>
                                <div class="meta-item">
                                    <div class="meta-title tags">Теги</div>
                                    <a href="#">новости</a>, <a href="#">шаблоны</a></div>
                            </div>
                            <!-- Image -->
                            <a href="news/{{$new->id}}" class="media image-link"><img alt="" src="{{$new->img_path}}"
                                                                                      class="fullwidth"></a>
                            <!-- Excerpt -->
                            <div class="blog-content">
                                <p>{{ $new->short_discription}} ...</p>
                                <!-- Read More Button -->
                                <a href="news/{{$new->id}}" class="button accent">Читать далее</a>
                            </div>
                        </div>
                        @endforeach

                                <!-- END Blog Post -->

                        <!-- Navigation -->


                        <div class="blog-nav">
                            <a href="#" class="back">Назад</a>
                            <a href="#" class="next">Вперед</a>
                        </div>


                        <!-- END Navigation -->


                </div>

                <!-- END Main Column -->

                @include('news.sidebarNews')
                        <!-- Sidebar -->


                <!-- END Sidebar -->


            </div>

            <!-- END Main Column / Sidebar -->


        </div>
    </div>
    {{--<ul>--}}
    {{--<li> {{ $text->title  }}  </li>--}}
    {{--</ul>--}}
@endsection

@section('content-width') @stop