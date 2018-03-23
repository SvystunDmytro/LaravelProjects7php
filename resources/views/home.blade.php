@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div>
                        <h2>News =>  <b>Просмотр всех новостей на сайте</b></h2>

                    </div>

                    {{--<a href="{{action('Admin\NewsController@index')}}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Все новости</span></a>--}}

                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Название</th>
                    {{--<th>Краткое название</th>--}}
                    <th>Текст новости</th>
                    <th>Краткое описание</th>
                    {{--<th>Путь картинки</th>--}}
                    <th>Категория</th>
                    {{--<th>Date Created</th>--}}
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                @endif
                @foreach($news as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->content}}</td>
                        <td>{{$item->short_discription}}</td>
                        <td>{{$item->category_id}}</td>
                        <td>{{$item->img_path}}</td>
                        <td>
                            <a href="{{url("admin/news/{$item->id}/edit")}}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="" class="comment" title="comment" data-toggle="tooltip"><i class="fa">&#xf086;</i></a>
                            <form  action="{{URL('admin/'.$item->id)}}"  method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div class="clearfix">
                {{--<div class="hint-text">Showing <b>X</b> out of <b>XX</b> entries</div>--}}
                <ul class="pagination">
                    {{--{{ $paginate->links() }}--}}
                </ul>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
        </div>
    </div>
@endsection
