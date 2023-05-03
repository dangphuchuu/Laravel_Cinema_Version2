<!-- Header section -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2e292e;">
    <div class="container">
        <a class="navbar-brand" href="#">HuuMinh Cinema</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav  text-uppercase">
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="#">Phim</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Rạp/ Giá vé</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Tin tức/ Sự kiện</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Hỗ trợ</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-warning text-decoration-underline" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        sign in
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <button type="button" class="btn btn-warning">
                        MUA VÉ
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{--<header class="header-wrapper header-wrapper--home">--}}
{{--    <div class="container">--}}
{{--        <!-- Logo link-->--}}
{{--        <a href='#' class="logo">--}}
{{--            <p style="font-size: 17px; color: white" >HuuMinh Cinema</p>--}}
{{--            <img alt='logo' src="user_assets/images/logo.png">--}}
{{--        </a>--}}

{{--        <!-- Main website navigation-->--}}
{{--        <nav id="navigation-box">--}}
{{--            <!-- Toggle for mobile menu mode -->--}}
{{--            <a href="#" id="navigation-toggle">--}}
{{--                        <span class="menu-icon">--}}
{{--                            <span class="icon-toggle" role="button" aria-label="Toggle Navigation">--}}
{{--                              <span class="lines"></span>--}}
{{--                            </span>--}}
{{--                        </span>--}}
{{--            </a>--}}

{{--            <!-- Link navigation -->--}}
{{--            <ul id="navigation">--}}
{{--                <li>--}}
{{--                    <span class="sub-nav-toggle plus"></span>--}}
{{--                    <a href="#">Phim</a>--}}
{{--                    <ul>--}}
{{--                        <li class="menu__nav-item"><a href="movie-page-left.html">Single movie (rigth sidebar)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="movie-page-right.html">Single movie (left sidebar)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="movie-page-full.html">Single movie (full widht)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="movie-list-left.html">Movies list (rigth sidebar)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="movie-list-right.html">Movies list (left sidebar)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="movie-list-full.html">Movies list (full widht)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="single-cinema.html">Single cinema</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="cinema-list.html">Cinemas list</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="trailer.html">Trailers</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="rates-left.html">Rates (rigth sidebar)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="rates-right.html">Rates (left sidebar)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="rates-full.html">Rates (full widht)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="offers.html">Offers</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="contact.html">Contact us</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="404.html">404 error</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="coming-soon.html">Coming soon</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="login.html">Login/Registration</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <span class="sub-nav-toggle plus"></span>--}}
{{--                    <a href="page-elements.html">Sự kiện</a>--}}
{{--                    <ul>--}}
{{--                        <li class="menu__nav-item"><a href="typography.html">Typography</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="page-elements.html">Shortcodes</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="column.html">Columns</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="icon-font.html">Icons</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <span class="sub-nav-toggle plus"></span>--}}
{{--                    <a href="page-elements.html">Rạp/Giá vé</a>--}}
{{--                    <ul>--}}
{{--                        <li class="menu__nav-item"><a href="book1.html">Booking step 1</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="book2.html">Booking step 2</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="book3-buy.html">Booking step 3 (buy)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="book3-reserve.html">Booking step 3 (reserve)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="book-final.html">Final ticket view</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <span class="sub-nav-toggle plus"></span>--}}
{{--                    <a href="gallery-four.html">Góc điện ảnh</a>--}}
{{--                    <ul>--}}
{{--                        <li class="menu__nav-item"><a href="gallery-four.html">4 col gallery</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="gallery-three.html">3 col gallery</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="gallery-two.html">2 col gallery</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <span class="sub-nav-toggle plus"></span>--}}
{{--                    <a href="news-left.html">Hỗ trợ</a>--}}
{{--                    <ul>--}}
{{--                        <li class="menu__nav-item"><a href="news-left.html">News (rigth sidebar)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="news-right.html">News (left sidebar)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="news-full.html">News (full widht)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="single-page-left.html">Single post (rigth sidebar)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="single-page-right.html">Single post (left sidebar)</a></li>--}}
{{--                        <li class="menu__nav-item"><a href="single-page-full.html">Single post (full widht)</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </nav>--}}

{{--        <!-- Additional header buttons / Auth and direct link to booking-->--}}
{{--        <div class="control-panel">--}}
{{--            <div class="auth auth--home">--}}
{{--                <div class="auth__show">--}}
{{--                        <span class="auth__image">--}}
{{--                          <img alt="" src="user_assets/images/client-photo/auth.png">--}}
{{--                        </span>--}}
{{--                </div>--}}
{{--                <a href="#" class="btn btn--sign btn--singin">--}}
{{--                    me--}}
{{--                </a>--}}
{{--                <ul class="auth__function">--}}
{{--                    <li><a href="#" class="auth__function-item">Watchlist</a></li>--}}
{{--                    <li><a href="#" class="auth__function-item">Booked tickets</a></li>--}}
{{--                    <li><a href="#" class="auth__function-item">Discussion</a></li>--}}
{{--                    <li><a href="#" class="auth__function-item">Settings</a></li>--}}
{{--                </ul>--}}

{{--            </div>--}}
{{--            <a href="#" class="btn btn--sign login-window">Sign in</a>--}}
{{--            <a href="#" class="btn btn-md btn--warning btn--book btn-control--home login-window">Book a ticket</a>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</header>--}}
