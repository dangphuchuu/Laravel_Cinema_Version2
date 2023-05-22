@extends('admin.layout.index')
@section('content')
    @can('list director')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Combo</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <a style="float:right;padding-right:30px;" class="text-light">
                                    <button class=" btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#combo">Create
                                    </button>
                                </a>
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Name</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Image</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Price</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Detail</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($combo as $value)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{!! $value['name'] !!}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if(strstr($value['image'],"https") == "")
                                                    <img style="width: 300px"
                                                         src="https://res.cloudinary.com/dgk9ztl5h/image/upload/{!! $value['image'] !!}.jpg"
                                                         alt="user1">
                                                @else
                                                    <img style="width: 300px"
                                                         src="{!! $value['image'] !!}" alt="user1">
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{!! number_format($value['price']) !!}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if($value['status'] == 1)
                                                    <a href="#">
                                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                                    </a>
                                                @else
                                                    <a href="#">
                                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                                    Delete
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <a href="#editCombo" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                   data-original-title="Edit director" data-bs-target="#editCombo{!! $value['id'] !!}"
                                                   data-bs-toggle="modal">
                                                    Edit
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:void(0)" data-url="{{ url('admin/combo/delete', $value['id'] ) }}"
                                                   class="text-secondary font-weight-bold text-xs delete-combo" data-toggle="tooltip">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                        @include('admin.combo.edit')
                                    @endforeach
                                    @include('admin.combo.create')
                                    </tbody>

                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $combo->links() !!}
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
@section('scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.delete-combo').on('click', function () {
                var userURL = $(this).data('url');
                var trObj = $(this);
                if (confirm("Are you sure you want to remove it?") === true) {
                    $.ajax({
                        url: userURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {
                            if (data['success']) {
                                // alert(data.success);
                                trObj.parents("tr").remove();
                            } else if (data['error']) {
                                alert(data.error);
                            }
                        }
                    });
                }

            });
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.file-uploader .img_combo').attr('src', e.target.result).removeClass('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".image-combo").change(function () {
            readURL(this);
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#food_combo').multiselect({
                nonSelectedText: 'Select Food',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '400px',
                onChange: function (option, checked) {
                    var selected = this.$select.val();
                    if (selected.length > 0) {
                        $.ajax({
                            url: "admin/combo/create",
                            method: "POST",
                            data: {selected: selected},
                            success: function (data) {
                                $('#food_combo').html(data);
                                $('#food_combo').multiselect('rebuild');
                            }
                        })
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        VirtualSelect.init({
            ele: 'multipleSelect'
        });
    </script>
@endsection
