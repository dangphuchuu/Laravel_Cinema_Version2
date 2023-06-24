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
                        <div id="barcode-scanner-button" class="btn">@lang('lang.barcode_scanner')</div>
                    </div>
                    <div id="barcode-scanner-controller" class="controller">
                        <nav class="navbar navbar-dark">
                            <div class="navbar-brand mb-0 h3">
                                <span id="back-button">&#8249;</span>
                                @lang('lang.barcode_scanner')
                            </div>
                            <div class="spacer"></div>
                            <div class="camera-button-container h3">
                                <span id="camera-swap-button">&#8645;</span>
                                <span id="camera-switch-button">&#8646;</span>
                            </div>
                        </nav>
                        <div id="barcode-scanner-container" class="view-controller-container">
                            <div class="web-sdk-progress-bar"></div>
                        </div>
                        <div class="action-bar">
                            <div class="barcode-result-container"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ticket_id" class="form-control-label">@lang('lang.ticket_code')</label>
                        <input id="ticket_id" class="form-control" name="userCode" type="number" value="" readonly>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>Tên</td>
                            <td>Số lượng</td>
                            <td>Chi tiết</td>
                            <td id="status">@lang('lang.status')</td>
                        </tr>
                        </thead>
                        <tbody id="listFood">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let results = [];
        let scanbotSDK, barcodeScanner;

        class Config {
            static license() {
                return "";
            }
            static barcodeScannerContainerId() {
                return "barcode-scanner-container";
            }
        }

        window.onresize = () => {
            this.resizeContent();
        };

        window.onload = async () => {
            this.resizeContent();

            scanbotSDK = await ScanbotSDK.initialize({ licenseKey: Config.license() });

            $("#barcode-scanner-button").on('click', async (e) => {
                $("#barcode-scanner-controller").addClass('d-block');

                const barcodeFormats = [
                    "QR_CODE",
                ];

                const config = {
                    containerId: Config.barcodeScannerContainerId(),
                    style: {
                        window: {
                            borderColor: "blue"
                        },
                        text: {
                            color: "red",
                            weight: 500
                        }
                    },
                    onBarcodesDetected: onBarcodesDetected,
                    returnBarcodeImage: true,
                    onError: onScannerError,
                    barcodeFormats: barcodeFormats,
                    preferredCamera: 'camera2 0, facing back'
                };

                try {
                    barcodeScanner = await scanbotSDK.createBarcodeScanner(config);
                } catch (e) {
                    console.log(e.name + ': ' + e.message);
                    alert(e.name + ': ' + e.message);
                    $("#barcode-scanner-controller").addClass("d-none");
                }
            });

            $('#back-button').on('click', async (e) => {
                const controller =
                    e.target.parentElement.parentElement.parentElement.className;
                document.getElementByClassName(controller).style.display = "none";
                barcodeScanner.dispose();
                barcodeScanner = undefined;
            })

            $("#camera-swap-button").on('click', async (e) => {
                barcodeScanner.swapCameraFacing(true);
            });

            $("#camera-switch-button").on('click' ,async (e) => {
                onCameraSwitch(barcodeScanner);
            });
        }

        async function onBarcodesDetected(e) {
            let text = "";
            const $ticketElement = $('#ticket_id');
            e.barcodes.forEach((barcode) => {
                $ticketElement.val(barcode.text);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/admin/scanCombo/handle",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'code': $ticketElement.val(),
                    },
                    statusCode: {
                        200: (data) => {
                            $('#listFood').append($(data.htmlFoods));
                            if (data.check) {
                                $('#status').addClass('text-success').text(data.message);
                            } else {
                                $('#status').addClass('text-danger').text(data.message);
                            }
                        },
                        500: (data) => {
                            $('#listFood tr').remove();
                        }
                    }
                });
            });

            let result;
            if (e.barcodes[0].barcodeImage) {
                result = await scanbotSDK.toDataUrl(e.barcodes[0].barcodeImage);
            }

            // Toastify({ text: text.slice(0, -1), duration: 10000, avatar: result }).showToast();
        }

        async function onCameraSwitch(scanner) {
            const cameras = await scanner?.fetchAvailableCameras()
            if (cameras) {
                const currentCameraInfo = scanner?.getActiveCameraInfo();
                if (currentCameraInfo) {
                    const cameraIndex = cameras.findIndex((cameraInfo) => { return cameraInfo.deviceId == currentCameraInfo.deviceId });
                    const newCameraIndex = (cameraIndex + 1) % (cameras.length);
                    alert(`Current camera: ${currentCameraInfo.label}.\nSwitching to: ${cameras[newCameraIndex].label}`)
                    scanner?.switchCamera(cameras[newCameraIndex].deviceId);
                }
            }
        }

        async function onScannerError(e) {
            console.log("Error:", e);
            alert(e.name + ': ' + e.message);
        }

        async function addAllPagesTo(generator) {
            for (let i = 0; i < results.length; i++) {
                const result = results[i];
                await generator.addPage(Utils.imageToDisplay(result));
            }
        }

        function resizeContent() {
            const height = document.body.offsetHeight - (50 + 59);
            const controllers = document.getElementsByClassName("controller");

            for (let i = 0; i < controllers.length; i++) {
                const controller = controllers[i];
                controller.style.height = height;
            }
        }


    </script>
@endsection
