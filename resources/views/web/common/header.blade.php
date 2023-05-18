<!-- Header section -->
<nav class="header navbar navbar-expand-lg navbar-dark shadow" style="background-color: #2e292e">
    <div class="container">
        <a class="navbar-brand" href="#">HuuMinh Cinema</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav text-uppercase mx-auto">
                <li class="nav-item">
                    <a class="nav-link @yield('movies')" href="/movies" role="button">Phim</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link @yield('schedules')" href="/schedules">Lịch chiếu phim</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link @yield('events')" href="/events">Tin tức/ Sự kiện</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link @yield('support')" href="#">Hỗ trợ</a>
                </li>

            </ul>
            @if(Auth::check())
                <div class="nav-item dropdown mx-2">
                    <a class="nav-link link-warning font-weight-bold text-decoration-underline dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-id-card me-sm-1"></i>
                        <span class="d-sm-inline d-none">{{ Auth::user()->fullName }}</span>
                    </a>
                    <ul class="dropdown-menu shadow" style="background-color: #2e292e">
                        <li><a class="dropdown-item link-light" href="#">Profile</a></li>
                        <li><a class="dropdown-item link-light" href="/signOut">Sign Out</a></li>
                    </ul>
                </div>
            @else
                <div class="nav-item mx-2 float-end">
                    <a class="nav-link link-warning text-decoration-underline" href="#loginModal" data-bs-toggle="modal" data-bs-target="#loginModal">
                        sign in
                    </a>
                </div>
            @endif
        </div>
    </div>
</nav>
