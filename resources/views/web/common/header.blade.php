<!-- Header section -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow align-items-center">
    <div class="container-fluid px-0 align-items-center">
      <div class="row w-100 align-items-center">
        <div class="col-6 col-lg-4 d-flex align-items-center">
          <div class="nav-item dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
              <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="dropdown-menu justify-content-start dropdown-menu-dark text-uppercase text-start pe-5 py-2" style="width: 300px">
              <li class="ms-1 my-2 my-lg-0">
                <a class="btn btn-outline-danger dropdown-item text-decoration-none text-nowrap @yield('home')" href="/" role="button">@lang('lang.homepage')</a>
              </li>
              <li class="ms-1 my-2 my-lg-0">
                  <a class="btn btn-outline-danger dropdown-item text-decoration-none text-nowrap @yield('movies')" href="/movies" role="button">@lang('lang.movies')</a>
              </li>
              <li class="ms-1 my-2 my-lg-0">
                  <a class="btn btn-outline-danger dropdown-item text-decoration-none text-nowrap @yield('schedules')" href="/schedulesByMovie">@lang('lang.schedules')</a>
              </li>
              <li class="ms-1 my-2 my-lg-0">
                  <a class="btn btn-outline-danger dropdown-item text-decoration-none text-nowrap @yield('news')" href="/news">@lang('lang.news')</a>
              </li>
              <li class="ms-1 my-2 my-lg-0">
                <a class="btn btn-outline-danger dropdown-item text-decoration-none text-nowrap @yield('events')" href="/events">@lang('lang.events')</a>
              </li>
              <li class="ms-1 my-2 my-lg-0">
                  <a class="btn btn-outline-danger dropdown-item text-decoration-none text-nowrap @yield('support')" href="/contact">@lang('lang.contact') / @lang('lang.support')</a>
              </li>
            </ul>
          </div>
        </div>

     
        <div class="nav-item col-6 col-lg-4 d-flex align-items-center justify-content-end justify-content-lg-center">
          <a class="navbar-brand">
              <img src="images/favicon/cinema.png" height="40px" width="auto" alt="Logo" class="d-block">
          </a>
        </div>

      
        <div class="col-12 col-lg-4 align-items-center">
          @if(Auth::check())
            <div class="nav-item dropdown d-flex align-items-center flex-nowrap justify-content-center justify-content-lg-end">
              <a class="nav-link link-light dropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-circle-user fa-2xl mx-2"></i>
                    <span class="text-nowrap">{{ Auth::user()->fullName }}</span>
                    <i class="fa-regular fa-chevron-down mx-2 fa-sm"></i>
              </a>
              <ul class="dropdown-menu shadow border border-dark mt-3 px-4 text-center" style="background-color: #020817">
                  <li>
                    <a class="link link-light dropdown-item link-underline-opacity-100-hover" href="/profile">@lang('lang.profile')</a>
                  </li>
                  <li>
                    <a class="link link-light dropdown-item link-underline-opacity-100-hover" href="/signOut">@lang('lang.signout')</a>
                  </li>
              </ul>
            </div>
          @else
            <div class="nav-item d-flex align-items-center flex-nowrap justify-content-center justify-content-lg-end">
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
    </div>
  </nav>
