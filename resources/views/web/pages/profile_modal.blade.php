 <div class="modal fade  modal-lg" id="profileModal{!! $user['id'] !!}" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="profileModalLabel">@lang('lang.ticket_code') : {!! $value['code'] !!}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="text-center">
                                <img style="width: 300px"
                                    src="data:image/png;base64,{!! base64_encode($generatorPNG->getBarcode($value['code'],$generatorPNG::TYPE_CODE_128)) !!}"/>
                            </div>
                            <div class="text-center">
                                {!! $value['code'] !!}
                            </div>
                            <p>@lang('lang.purchase_date') : {!! date("d/m/Y",strtotime($value['created_at']))!!}</p>
                            <span>@lang('lang.payment_methods'):@lang('lang.vnpay_wallet') </span>
                            <div class="d-flex justify-content-end ">
                            <button  class="btn btn-danger m-2" style="width: 130px;">@lang('lang.print_bill')</button>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xxs">@lang('lang.movie_name')</th>
                                        <th class="text-center text-uppercase text-xxs">@lang('lang.showtime_web')</th>
                                        <th class="text-center text-uppercase text-xxs">@lang('lang.ticket')</th>
                                        <th class="text-center text-uppercase text-xxs">@lang('lang.total_price')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-center">
                                            {!! $value['schedule']['movie']['name'] !!}
                                        </td>
                                        <td class="align-middle text-center">
                                            <strong>{!! $value['schedule']['room']['theater']['name'] !!}</strong>
                                            <p>{!! $value['schedule']['room']['name'] !!}</p>
                                            <p>{!! date("d/m/Y",strtotime($value['schedule']['date'] )) !!}</p>
                                            <p>@lang('lang.from') {!! date("H:i A",strtotime($value['schedule']['startTime'] )) !!} ~ @lang('lang.to') {!! date("H:i A",strtotime($value['schedule']['endTime'] )) !!}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                           <p> {!! $value['schedule']['room']['roomType']['name'] !!}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p>{!! number_format($value['totalPrice'],0,",",".") !!}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="text-uppercase text-center link link-dark text-decoration-none text-xl text-dark">@lang('lang.refund_ticket')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

