@extends('layouts.frontend')
@section('content')
    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_inner_text">
                <h2>Berita/Informasi</h2>
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
                    <div class="single_blog_inner">
                        <div class="s_blog_main">
                            <div class="blog_img">
                                <img class="img-fluid" src="{{route('berita.file', $data->slug)}}" alt="">
                                <div class="blog_date">
                                    <h4>{{\Carbon\Carbon::parse($data->date)->isoFormat('D')}}</h4>
                                    <h5>{{\Carbon\Carbon::parse($data->date)->isoFormat('MMMM, Y')}}</h5>
                                </div>
                            </div>
                            <div class="blog_text">
                                <div class="blog_author">
                                    <a href="#">Penyunting : {{$data->editor}}</a>
                                    <a href="#">Kategori : {{$data->kategori->category_name}}</a>
                                </div>
                               {!! $data->content !!}
                            </div>
                        </div>
                        <div class="s_blog_social">
                            <a href="{{route('news.index')}}" class="more_btn"><i class="fa fa-arrow-left"></i> Kembali</a>
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>--}}
{{--                            </ul>--}}
                        </div>

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
                                    <li><a href="#">{{$item->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Blog Main Area =================-->

@endsection
