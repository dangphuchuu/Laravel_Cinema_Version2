@extends('admin.layout.index')
@section('content')
    @can('ticket')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>@lang('lang.ticket')</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.movie_name')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.format')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.room')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.seat')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.rated')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.time')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.date')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.barcode')</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('lang.status')</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ticket as $value)
                                    <tr>
                                        <td class="align-middle text-center">
                                            @isset($value['schedule'])
                                            <h6 class="mb-0 text-sm ">{!! $value['schedule']['movie']['name'] !!}</h6>
                                            @endisset
                                        </td>
                                        <td class="align-middle text-center">
                                            @isset($value['schedule'])
                                            <h6 class="mb-0 text-sm ">{!! $value['schedule']['room']['roomType']['name'] !!}</h6>
                                            @endisset
                                        </td>
                                        <td class="align-middle text-center">
                                            @isset($value['schedule'])
                                            <h6 class="mb-0 text-sm ">{!! $value['schedule']['room']['name'] !!}</h6>
                                            @endisset
                                        </td>
                                        <td class="align-middle text-center">
                                            @isset($value['ticketSeats'])
                                            <span class="text-secondary font-weight-bold">
                                                @foreach($value['ticketSeats'] as $seat)
                                                    @if($loop->first)
                                                {!! $seat['row']."-".$seat['col'] !!}
                                                    @else
                                                        , {!! $seat['row']."-".$seat['col'] !!}
                                                    @endif
                                                @endforeach
                                            </span>
                                            @endisset
                                        </td>
                                        <td class="align-middle text-center">
                                            @isset($value['schedule'])
                                            <span class="text-secondary font-weight-bold">{!! $value['schedule']['movie']['rating']['name'] !!}</span>
                                            @endisset
                                        </td>
                                        <td class="align-middle text-center">
                                            @isset($value['schedule'])
                                            <span class="text-secondary font-weight-bold">{!! $value['schedule']['startTime'] !!}</span>
                                            @endisset
                                        </td>
                                        <td class="align-middle text-center">
                                            @isset($value['schedule'])
                                            <span class="text-secondary font-weight-bold">{!! date("d-m-Y", strtotime($value['schedule']['date'])) !!}</span>
                                            @endisset
                                        </td>
                                        <td class="align-middle text-center">
                                            <button href="#barcode" class="btn btn-link text-danger "
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#barcode{!! $value['id'] !!}"><i style="color:grey" class="fa-sharp fa-regular fa-eye"></i>
                                            </button>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                        </td>
                                    </tr>
                                        @include('admin.ticket.barcode')
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $ticket->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
