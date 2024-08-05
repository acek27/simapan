@extends('layouts.frontend')
@section('content')
    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_inner_text">
                @if(Session::has('kategori'))
                    <h2>{{ Session::get('kategori') }}</h2>
                @else
                    <h2>Berita/Informasi</h2>
                @endif
                <p>Baca berita dan Informasi lebih lengkap</p>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Blog Main Area =================-->
    <section class="blog_main_area p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog_main_inner">
                        @if(Session::has('status'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
                        @endif
                        @foreach($data as $datum)
                            <div class="blog_main_item">
                                <div class="blog_img">
                                    <img class="img-fluid" src="{{route('berita.file', $datum->slug)}}" alt="">
                                    <div class="blog_date">
                                        <h4>{{\Carbon\Carbon::parse($datum->date)->isoFormat('D')}}</h4>
                                        <h5>{{\Carbon\Carbon::parse($datum->date)->isoFormat('MMMM, Y')}}</h5>
                                    </div>
                                </div>
                                <div class="blog_text">
                                    <a href="#"><h4>{{$datum->title}}</h4></a>
                                    <div class="blog_author">
                                        <a href="#">Penyunting : {{$datum->editor}}</a>
                                        <a href="#">Kategori : {{$datum->kategori->category_name}}</a>
                                    </div>
                                    <p>{!! $datum->view !!}</p>
                                    <a class="more_btn" href="{{route('news.show', $datum->slug)}}">Baca
                                        Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="blog_right_sidebar">
                        <aside class="r_widget search_widget">
                            {{ html()->form('get')->action(route('news.index'))->acceptsFiles()->open() }}
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari disini..." name="keyword"
                                       aria-label="Search">
                                <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="submit"><i
                                                class="fa fa-search"></i></button>
                                    </span>
                            </div>
                            {{ html()->form()->close() }}
                        </aside>
                        <aside class="r_widget categories_widget">
                            <div class="r_w_title">
                                <h3>Kategori</h3>
                            </div>
                            <ul>
                                @foreach($kategori as $item)
                                    <li>
                                        <a href="{{route('news.index', ['kategori' => $item->id])}}">{{$item->category_name}}
                                            (<span>{{$data->where('category_id', $item->id)->count()}}</span>)</a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example" class="pagination_area">
                <ul class="pagination">
                    <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                    <li class="page-item"><a class="page-link" href="#">02.</a></li>
                    <li class="page-item"><a class="page-link" href="#">03.</a></li>
                    <li class="page-item"><a class="page-link" href="#">04.</a></li>
                </ul>
            </nav>
        </div>
    </section>
    <!--================End Blog Main Area =================-->

@endsection
