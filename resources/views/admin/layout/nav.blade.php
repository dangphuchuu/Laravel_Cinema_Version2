<style>
    .dropdown .dropdown-menu.show:before {
        top: -11px !important;
        position: absolute!important;
    }
</style>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                @if(Auth::check())
                <li class="nav-item dropdown d-flex align-items-center">
                    <a class="nav-link text-white font-weight-bold px-0 dropdown active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-id-card me-sm-1"></i>
                        <span class="d-sm-inline d-none">{{ Auth::user()->fullName }}</span>
                    </a>
                    <ul class="dropdown-menu" style="top: -0.5rem!important;left: -25px;">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="/admin/sign_out">Sign Out</a></li>
                        <li><a class="dropdown-item" href="lang/en">@lang('lang.en')</a></li>
                        <li><a class="dropdown-item" href="lang/vi">@lang('lang.vi')</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
