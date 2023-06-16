 <div class="modal fade  modal-lg" id="profileModal{!! $user['id'] !!}" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="profileModalLabel">Mã đặt vé : {!! $value['code'] !!}</h5>
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
                            <p>Ngày mua vé : {!! date("d/m/Y",strtotime($value['created_at']))!!}</p>
                            <span>Phương thức thanh toán: Ví VNPAY </span>
                            <button  class="  btn btn-danger float-end " style="width: 130px;">In hóa đơn</button>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xxs">Tên phim</th>
                                        <th class="text-center text-uppercase text-xxs">Suất chiếu</th>
                                        <th class="text-center text-uppercase text-xxs">Vé</th>
                                        <th class="text-center text-uppercase text-xxs">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-center">
                                            {!! $value['schedule']['movie']['name'] !!}
                                        </td>
                                        <td class="align-middle text-center">
                                            <strong>cgv su van hanh cinema</strong>
                                            <p>{!! $value['schedule']['room']['name'] !!}</p>
                                            <p>{!! date("d/m/Y",strtotime($value['schedule']['date'] )) !!}</p>
                                            <p>From {!! date("H:i A",strtotime($value['schedule']['startTime'] )) !!} ~ To {!! date("H:i A",strtotime($value['schedule']['endTime'] )) !!}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                           <p> {!! $value['schedule']['room']['roomType']['name'] !!}</p>
{{--                                            <p>{!! $value['schedule']['room']['seats']['seatType']['name'] !!}</p>--}}
                                        </td>
                                        <td class="align-middle text-center">
                                            <p>{!! number_format($value['totalPrice'],0,",",".") !!}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="text-uppercase text-center link link-dark text-decoration-none text-xl text-dark">Yêu cầu hoàn vé</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

