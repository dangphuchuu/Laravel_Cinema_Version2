<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{!! number_format($sum_today,0,",",".") !!} Vnđ</h3>

                    <p>@lang('lang.today_money')</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{!! $ticket_seat !!}</h3>

                    <p>@lang('lang.total_ticket')</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3> {!! count($user) !!}</h3>

                    <p>@lang('lang.new_clients')</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3> {!! number_format($sum,0,",",".") !!} Vnđ</h3>

                    <p>@lang('lang.total_revenue')</p>
                </div>
                <div class="icon">

                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
<!-- <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">@lang('lang.today_money')</p>
                            <h5 class="font-weight-bolder">
                                {!! number_format($sum_today,0,",",".") !!} Vnđ
                            </h5>
                            <p class="mb-0">
                                <span class="text-info text-sm font-weight-bolder">{!! date("d-m-Y",strtotime($now)) !!}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">@lang('lang.new_clients')</p>
                            <h5 class="font-weight-bolder">
                                {!! count($user) !!}
                            </h5>
                            <p class="mb-0">
                                <span class="text-success text-sm font-weight-bolder">{!! date("d-m-Y",strtotime($now)) !!}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">@lang('lang.total_ticket')</p>
                            <h5 class="font-weight-bolder">
                                {!! $ticket_seat !!}
                            </h5>
                            <span class="text-danger text-sm font-weight-bolder">{!! date("d-m-Y",strtotime($year)) !!}
                                | {!! date("d-m-Y",strtotime($now)) !!}</span>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">@lang('lang.total_revenue')</p>
                            <h5 class="font-weight-bolder">
                                {!! number_format($sum,0,",",".") !!} Vnđ
                            </h5>
                            <p class="mb-0">
                                <span class="text-warning text-sm font-weight-bolder">{!! date("d-m-Y",strtotime($year)) !!}
                                    | {!! date("d-m-Y",strtotime($now)) !!}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->