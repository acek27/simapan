<!--================Header Menu Area =================-->
<header class="main_menu_area">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="{{asset('website/img/logo.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('news.index')}}">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('legalitas.index')}}">Legalitas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Data Kemiskinan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('program.index')}}">Program Intervensi Kemiskinan</a></li>
                {{--                <li class="nav-item dropdown submenu">--}}
                {{--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"--}}
                {{--                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--                        Blog--}}
                {{--                    </a>--}}
                {{--                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                {{--                        <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>--}}
                {{--                        <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>--}}
                {{--                        <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
            </ul>
        </div>
    </nav>
</header>
<!--================End Header Menu Area =================-->
