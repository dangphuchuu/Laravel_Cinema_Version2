
                        <div style="width: 600px;margin:0 auto">
                            <h2 style="text-align: center">Xin chào {!! $name !!}</h2>
                        </div>
                            <div >
                                <table border="1" cellspacing="0" cellpadding="10" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>Tên phim</th>
                                        <th>Định dạng</th>
                                        <th>Suất chếu</th>
                                        <th>Ngày chiếu</th>
                                        <th>Mã xem phim</th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                        <tr>--}}
{{--                                            <td >--}}
{{--                                                <h2 style="text-align: center">{!! $ticket['schedule']['movie']['name'] !!}</h2>--}}
{{--                                            </td>--}}
{{--                                            <td >--}}
{{--                                                <h2 style="text-align: center">{!! $ticket['schedule']['room']['roomType']['name'] !!}</h2>--}}
{{--                                            </td>--}}
{{--                                            <td >--}}
{{--                                                <h2 style="text-align: center">{!! $ticket['schedule']['startTime'] !!}</h2>--}}
{{--                                            </td>--}}
{{--                                            <td >--}}
{{--                                                <h2 style="text-align: center">{!! $ticket['schedule']['date'] !!}</h2>--}}
{{--                                            </td>--}}
                                            <td>
{{--                                                @php--}}
{{--                                                    $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();--}}
{{--                                                @endphp--}}
                                                <img src="data:image/png;base64,{!! base64_encode($generatorPNG->getBarcode($ticket['code'],$generatorPNG::TYPE_CODE_128)) !!}" />
{{--                                                <span>{!! $ticket['code'] !!}</span>--}}
                                            </td>
{{--                                        </tr>--}}
                                    </tbody>
                                </table>



                            </div>

