@extends('admin.layout.index')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
               @lang('lang.scan_ticket')
            </div>

            <div class="card-body pt-2">
                <div class="col">
                    <div class="content-container">
                        <div class="btn barcode-scanner-button">@lang('lang.barcode_scanner')</div>
                        <div class="d-none">
                            <div class="btn document-scanner-button">Document Scanner</div>
                            <div class="btn mrz-scanner-button">MRZ Scanner</div>
                            <div class="btn text-data-scanner-button"> Text Data Scanner </div>
                            <div class="btn" id="pick-document-button">Pick Document Image</div>
                            <div class="btn" id="pick-barcode-button">Pick Barcode Image</div>
                            <div class="btn scanner-results-button">Document Results</div>
                            <div class="btn license-info-button">License Info</div>
                        </div>
                    </div>
                    <div class="controller barcode-scanner-controller">
                        <nav class="navbar navbar-dark">
                            <div class="navbar-brand mb-0 h3">
                                <span class="back-button">&#8249;</span>
                                @lang('lang.barcode_scanner')
                            </div>
                            <div class="spacer"></div>
                            <div class="camera-button-container h3">
                                <span class="camera-swap-button">&#8645;</span>
                                <span class="camera-switch-button">&#8646;</span>
                            </div>
                        </nav>
                        <div id="barcode-scanner-container" class="view-controller-container">
                            <div class="web-sdk-progress-bar"></div>
                        </div>
                        <div class="action-bar">
                            <div class="barcode-result-container"></div>
                        </div>
                    </div>
                    <div class="d-none">
                        <div class="controller scanbot-camera-controller">
                            <nav class="navbar navbar-dark">
                                <div class="navbar-brand mb-0 h3">
                                    <span class="back-button">&#8249;</span>
                                    Document Scanner
                                </div>
                                <div class="spacer"></div>
                                <div class="camera-button-container h3">
                                    <span class="camera-swap-button">&#8645;</span>
                                    <span class="camera-switch-button">&#8646;</span>
                                </div>
                            </nav>
                            <div id="scanbot-camera-container" class="view-controller-container">
                                <div class="web-sdk-progress-bar"></div>
                            </div>
                            <div class="action-bar">
                                <div class="action-bar-button page-count-indicator">0 PAGES</div>
                                <div class="align-right-button">
                                    <button class="action-bar-button detection-done-button">DONE</button>
                                </div>
                            </div>
                        </div>

                        <div class="controller mrz-scanner-controller">
                            <nav class="navbar navbar-dark">
                                <div class="navbar-brand mb-0 h3">
                                    <span class="back-button">&#8249;</span>
                                    MRZ Scanner
                                </div>
                                <div class="spacer"></div>
                                <div class="camera-button-container h3">
                                    <span class="camera-swap-button">&#8645;</span>
                                    <span class="camera-switch-button">&#8646;</span>
                                </div>
                            </nav>
                            <div id="mrz-scanner-container" class="view-controller-container">
                                <div class="web-sdk-progress-bar"></div>
                            </div>
                            <div class="action-bar"></div>
                        </div>

                        <div class="controller text-data-scanner-controller">
                            <nav class="navbar navbar-dark">
                                <div class="navbar-brand mb-0 h3">
                                    <span class="back-button">&#8249;</span>
                                    Text Data Scanner
                                </div>
                                <div class="spacer"></div>
                                <div class="camera-button-container h3">
                                    <span class="camera-swap-button">&#8645;</span>
                                    <span class="camera-switch-button">&#8646;</span>
                                </div>
                            </nav>
                            <div id="text-data-scanner-container" class="view-controller-container">
                                <div class="web-sdk-progress-bar"></div>
                            </div>
                        </div>

                        <div class="controller cropping-controller">
                            <nav class="navbar navbar-dark">
                                <div class="navbar-brand mb-0 h3">
                                    <span class="back-button">&#8249;</span>Cropping View
                                </div>
                            </nav>
                            <div id="cropping-view-container" class="view-controller-container"></div>
                            <div class="action-bar cropping-view-action-bar">
                                <button class="action-bar-button detect-button">DETECT</button>
                                <button class="action-bar-button rotate-button">ROTATE</button>
                                <div class="align-right-button">
                                    <button class="action-bar-button apply-button">APPLY</button>
                                </div>
                            </div>
                        </div>

                        <div class="controller detection-results-controller">
                            <nav class="navbar navbar-dark">
                                <div class="navbar-brand mb-0 h3">
                                    <span class="back-button">&#8249;</span>Detection Results
                                </div>
                            </nav>
                            <div class="view-controller-container detection-results-container"></div>
                            <div class="action-bar detection-results-action-bar">
                                <button class="action-bar-button pdf-button">SAVE PDF</button>
                                <button class="action-bar-button tiff-button">SAVE TIFF</button>
                            </div>
                        </div>

                        <div class="controller detection-result-controller">
                            <nav class="navbar navbar-dark">
                                <div class="navbar-brand mb-0 h3">
                                    <span class="back-button">&#8249;</span>Detection Result
                                </div>
                            </nav>
                            <div class="view-controller-container detection-result-container"></div>
                            <div class="action-bar detection-result-action-bar">
                                <button class="action-bar-button crop-button">CROP</button>
                                <div class="filter-selector-container">
                                    <div class="filter-selector-label">FILTER</div>
                                    <select class="action-bar-filter-select">
                                        <option>none</option>
                                        <option>color</option>
                                        <option>gray</option>
                                        <option>binarized</option>
                                        <option>otsuBinarization</option>
                                        <option>pureBinarized</option>
                                        <option>lowLightBinarization</option>
                                        <option>lowLightBinarization2</option>
                                        <option>deepBinarization</option>
                                        <option>colorDocument</option>
                                        <option>blackAndWhite</option>
                                        <option>edgeHighlight</option>
                                    </select>
                                </div>
                                <div class="align-right-button">
                                    <button class="action-bar-button delete-button">DELETE</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ticket_id" class="form-control-label">@lang('lang.ticket_code')</label>
                        <input id="ticket_id" class="form-control" name="userCode" type="number" value="" readonly>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>@lang('lang.theater')</td>
                            <td>@lang('lang.room')</td>
                            <td>@lang('lang.movies')</td>
                            <td>@lang('lang.showtime_web')</td>
                            <td>@lang('lang.status')</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td id="theater"></td>
                            <td id="room"></td>
                            <td id="movie"></td>
                            <td id="date"></td>
                            <td id="startTime"></td>
                            <td id="status"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        async function onBarcodesDetected(e) {
            let text = "";
            e.barcodes.forEach((barcode) => {
                if (barcode.parsedText) {
                    text += JSON.stringify(barcode.parsedText);
                } else {
                    $('#ticket_id').val(barcode.text);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/admin/scanTicket/handle",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            'code': $('#ticket_id').val(),
                        },
                        statusCode: {
                            200: (data) => {
                                    $('#theater').text(data.theater);
                                    $('#room').text(data.room);
                                    $('#movie').text(data.movie);
                                    $('#date').text(data.date);
                                    $('#startTime').text(data.startTime);
                                if (data.check) {
                                    $('#status').addClass('text-success').text(data.message);
                                } else {
                                    $('#status').addClass('text-danger').text(data.message);
                                }
                            },
                            500: (data) => {
                                // alert('not found');
                                $('#theater').text('');
                                $('#room').text('');
                                $('#movie').text('');
                                $('#date').text('');
                                $('#startTime').text('');
                                $('#status').text('');
                                // $('#theater').text(data.theater);
                                // $('#room').text(data.room);
                                // $('#movie').text(data.movie);
                                // $('#date').text(data.date);
                                // $('#startTime').text(data.startTime);
                                // $('#status').addClass('text-success').text('PASS');
                            }

                        }
                    });
                    text += " " + barcode.text + " (" + barcode.format + "),";
                }
            });

            let result;
            if (e.barcodes[0].barcodeImage) {
                result = await scanbotSDK.toDataUrl(e.barcodes[0].barcodeImage);
            }

            Toastify({ text: text.slice(0, -1), duration: 3000, avatar: result }).showToast();
        }
    </script>
@endsection
