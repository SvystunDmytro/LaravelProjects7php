
@section('categories-sidebar')

    <div class="column-one-fourth sidebar">


    <!-- Categories -->
    <div class="sidebar-widget categories">
        <!-- Title -->
        <h3 id="showNewsByCat">Категории новостей</h3>
        <!-- Category Links -->
        <a href="/news">Все новости</a>
    @foreach($cat as $category)
            <a href="/news/category/{{$category->id}}" cat-id="{{$category->id}}">{{$category->title}}</a>
        @endforeach
    </div>

            <!-- END Categories -->


    <!-- Search -->

    <div class="sidebar-widget search">
        <!-- Title -->
        <h3>Поиск по сайту</h3>
        <!-- Search Form -->
        <form name="blog-search" method="get" action="#">
            <div class="container">
                <!-- Textbox -->
                <input type="text" id="blog-search" name="blog-search" placeholder="Искать">
                <!-- Search Button -->
                <input type="submit" id="go" class="go" value="&#xf002;">
            </div>
        </form>
    </div>

    <!-- END Search -->


    <!-- Latest Project -->

    {{--<div class="sidebar-widget project">--}}
    {{--<!-- Title -->--}}
    {{--<h3>Новость дня</h3>--}}
    {{--<!-- Image -->--}}
    {{--<a href="#" class="image-link"><img alt="" src="images\placeholders\preview4.jpg" class="fullwidth"></a>--}}
    {{--<!-- Project Title -->--}}
    {{--<h3 class="sub-title"><a href="#">Заголовок новости</a></h3>--}}
    {{--<!-- Tags -->--}}
    {{--<div class="tags">Категория</div>--}}
    {{--</div>--}}

            <!-- END Latest Project -->


    <!-- Popular Posts -->

    <div class="sidebar-widget posts">
        <!-- Title -->
        <h3>Последнее</h3>


        <!-- Post -->
        @foreach($news as $new)
        <div class="post">
            <!-- Image Column -->
            <div class="img-column">
                <a href="/news/{{$new->id}}" class="image-link mini"><img alt=""
                                                                      src="{{$new->img_path}}"
                                                                      class="fullwidth"></a>
            </div>
            <!-- Content Column -->
            <div class="content-column">
                <!-- Post Title -->
                <h3 class="sub-title"><a href="{{$new->id}}">{{$new->title}}</a></h3>
                <!-- Date -->
                <div class="date">{{$new->id}}</div>
            </div>
        </div>
        @endforeach
        <!-- END Post -->


    </div>

    <!-- END Popular Posts -->


</div>

    @show