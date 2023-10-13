<!-- Header section -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow" style="backdrop-filter: blur(50px); height: 80px;">
  <div class="container-fluid px-0 container-lg">
    <a class="navbar-brand ms-4" href="#">
      <img src="images/favicon/cinema.png" height="40" width="auto" alt="Logo" class="d-inline-block align-text-top">
      {{isset($info['name']) ? $info['name'] : ''}}
    </a>

    <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center bg-dark" id="navbarSupportedContent">
      <ul class="navbar-nav text-uppercase mx-auto text-center">
        <li class="nav-item mx-2 my-2 my-lg-0">
          <a class="nav-link text-nowrap @yield('home')" href="/" role="button">@lang('lang.homepage')</a>
      </li>
        <li class="nav-item mx-2 my-2 my-lg-0">
            <a class="nav-link text-nowrap @yield('movies')" href="/movies" role="button">@lang('lang.movies')</a>
        </li>
        <li class="nav-item mx-2 my-2 my-lg-0">
            <a class="nav-link text-nowrap @yield('schedules')" href="/schedulesByMovie">@lang('lang.schedules')</a>
        </li>
        <li class="nav-item mx-2 my-2 my-lg-0">
            <a class="nav-link text-nowrap @yield('news')" href="/news">@lang('lang.news')</a>
        </li>
        <li class="nav-item mx-2 my-2 my-lg-0">
          <a class="nav-link text-nowrap @yield('events')" href="/events">@lang('lang.events')</a>
        </li>
        <li class="nav-item mx-2 my-2 my-lg-0">
            <a class="nav-link text-nowrap @yield('support')" href="/contact">@lang('lang.contact') / @lang('lang.support')</a>
        </li>
      </ul>

      <div class="d-lg-none text-white my-2">
        <hr>
      </div>

      @if(Auth::check())
        <div class="nav-item dropdown d-flex justify-content-center float-lg-end mx-2 my-2 my-lg-0">
          <a class="nav-link link-light dropdown" href="#" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-circle-user fa-2xl mx-2"></i>
                <span class="text-nowrap">{{ Auth::user()->fullName }}</span>
                <i class="fa-regular fa-chevron-down mx-2 fa-sm"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end shadow border border-dark mt-3 px-4 text-center">
              <li>
                <a class="link link-light dropdown-item link-underline-opacity-100-hover" href="/profile">@lang('lang.profile')</a>
              </li>
              <li>
                <a class="link link-light dropdown-item link-underline-opacity-100-hover" href="/signOut">@lang('lang.signout')</a>
              </li>
          </ul>
        </div>
      @else
        <div class="d-flex justify-content-center float-lg-end my-2 my-lg-0">
          <button class="btn btn-outline-light rounded-pill px-4 m-2 text-nowrap"
                  type="button"
                  href="#registerModal" data-bs-toggle="modal" data-bs-target="#registerModal">
            @lang("lang.signup")
          </button>
          <button class="btn btn-danger rounded-pill ms-2 px-4 m-2 text-nowrap" 
                  type="button"
                  href="#loginModal" data-bs-toggle="modal" data-bs-target="#loginModal">
            @lang("lang.signin")
          </button>
        </div>
      @endif
    </div>

    
  </div>
</nav>