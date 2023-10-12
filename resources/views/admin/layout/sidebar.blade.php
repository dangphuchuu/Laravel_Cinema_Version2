<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex dropdown">
        <!-- <div class="image">
            <img src="admin_assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div> -->

        <li class=" dropdown d-flex align-items-center position-relative">
            <a class="text-white font-weight-bold px-0 dropdown active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="d-sm-inline d-none " style="color:black"> @lang('lang.lang'): <img class="rounded ms-1" style="max-width: 30px" src="images/language/@lang('lang.flag').png" alt="vietnamese"></span>
            </a>
            <ul class="dropdown-menu shadow dropdown-menu-end position-absolute " style="background-color: #f5f5f5; z-index: 999;">
                <li>
                    <a class="dropdown-item" href="lang/en">
                        <img class="rounded me-1" style="max-width: 30px" src="images/language/united-states.png" alt="engligh">
                        @lang('lang.en')
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="lang/vi">
                        <img class="rounded me-1" style="max-width: 30px" src="images/language/vietnam.png" alt="vietnamese">
                        @lang('lang.vi')
                    </a>
                </li>
            </ul>
        </li>



    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <!-- Mange movie -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        @lang('lang.manage') @lang('lang.movies')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/movie_genres" class="nav-link">
                            <p>@lang('lang.movie_genre')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/movie" class="nav-link">
                            <p>@lang('lang.movies')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/director" class="nav-link">
                            <p>@lang('lang.directors')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/cast" class="nav-link">
                            <p>@lang('lang.casts')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Mange Theater -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                    @lang('lang.manage') @lang('lang.theater')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/theater" class="nav-link">
                            <p>@lang('lang.theater')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/food" class="nav-link">
                            <p>@lang('lang.food')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/combo" class="nav-link">
                            <p>Combo</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                    @lang('lang.ticket')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/prices" class="nav-link">
                            <p>@lang('lang.prices_ticket')</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/ticket" class="nav-link">
                            <p>
                            @lang('lang.ticket_information')
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Mange ticket -->

            <!-- Mange schedule-->
            <li class="nav-item">
                <a href="admin/schedule" class="nav-link">
                    <p>
                    @lang('lang.schedules')
                    </p>
                </a>
            </li>

            <!-- Mange discount -->
            <li class="nav-item">
                <a href="admin/discount" class="nav-link">
                    <p>
                    @lang('lang.discount')
                    </p>
                </a>
            </li>

            <!-- Mange user -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                    @lang('lang.manage') @lang('lang.user')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/staff" class="nav-link">
                            <p>@lang('lang.staff')</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/user" class="nav-link">
                            <p>@lang('lang.customer')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Mange at the counter -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                    @lang('lang.counter')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/scanTicket" class="nav-link">
                            <p>@lang('lang.scan_ticket')</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/scanCombo" class="nav-link">
                            <p>@lang('lang.scan_combo')</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/buyTicket" class="nav-link">
                            <p>@lang('lang.sell_ticket')</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/buyCombo" class="nav-link">
                            <p>@lang('lang.sell_combo')</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Mange information -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                    @lang('lang.manage') @lang('lang.information')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/banners" class="nav-link">
                            <p>@lang('lang.banners')</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/news" class="nav-link">
                            <p>@lang('lang.news')</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/events" class="nav-link">
                            <p>@lang('lang.events')</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/feedback" class="nav-link">
                            <p>@lang('lang.feedback')/@lang('lang.contact')</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/info" class="nav-link">
                            <p>@lang('lang.information') @lang('lang.theater')</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>