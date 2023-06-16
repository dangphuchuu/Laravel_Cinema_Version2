@extends('web.layout.index')
@section('link_css')
    <link rel="stylesheet" type="text/css" href="/web_assets/css/style.css">
@endsection
@section('content')
    @php
        $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
    @endphp
    <section class="py-0 my-0">
        <div class="container">
            <h1 class="mb-5"></h1>
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right">
                    <div class="p-4">
                        <h4 class="text-center">{!! $user['fullName'] !!}</h4>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-tab" href="#account" data-bs-toggle="collapse" data-bs-target="#account"
                           aria-expanded="true"
                           aria-controls="account">
                            <i class="fa fa-home text-center mr-1"></i>
                            @lang('lang.account')
                        </a>
                        <a class="nav-link" id="password-tab" href="#password" data-bs-toggle="collapse" data-bs-target="#password"
                           aria-expanded="false">
                            <i class="fa fa-key text-center mr-1"></i>
                            @lang('lang.password')
                        </a>
                        <a class="nav-link" id="notification-tab" href="#notification" data-bs-toggle="collapse" data-bs-target="#notification"
                           aria-expanded="false">
                            <i class="fa fa-bell text-center mr-1"></i>
                            @lang('lang.notification')
                        </a>
                    </div>
                </div>
                <div class="tab-content p-4 p-md-5">

                    <div id="mainContent">
                        <form action="/editProfile" method="POST">
                            @csrf
                        <div class="collapse show" id="account" data-bs-parent="#mainContent">
                                <div aria-labelledby="account-tab">
                                    <h4 class="text-center">@lang('lang.membership_card')</h4>
                                    <div class="text-center">
                                        <img
                                            src="data:image/png;base64,{!! base64_encode($generatorPNG->getBarcode($user['code'],$generatorPNG::TYPE_CODE_128)) !!}"/>
                                    </div>
                                    <div class="text-center">
                                        {!! $user['code'] !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>@lang('lang.fullname')</label>
                                                <input type="text" class="form-control" name="fullName" value="{!! $user['fullName'] !!}"
                                                       aria-label="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" value="{!! $user['email'] !!}" aria-label="" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('lang.phone')</label>
                                                <input type="text" class="form-control" name="phone" value="{!! $user['phone'] !!}" aria-label="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table table-bordered ">
                                                <thead>
                                                <tr>
                                                    <th class="text-xxs text-center">@lang('lang.card_level')</th>
                                                    <th class="text-xxs text-center">@lang('lang.total_spending')</th>
                                                    <th class="text-xxs text-center">@lang('lang.point')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">Member</td>
                                                    <td class="text-center">{!! number_format($sum,0,",",".") !!} VNĐ</td>
                                                    <td class="text-center">{!! number_format($user['point'],0,",",".") !!} P</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" type="submit">@lang('lang.update')</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                        <form action="/changePassword" method="POST">
                            @csrf
                        <div class="collapse" id="password" data-bs-parent="#mainContent">
                            <div aria-labelledby="password-tab">
                                <h3 class="mb-4"></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('lang.old_password')</label>
                                            <input type="password" name="oldpassword" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('lang.new_password')</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('lang.cofirm_new_password')</label>
                                            <input type="password" name="repassword" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit">@lang('lang.update')</button>
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="collapse" id="notification" data-bs-parent="#mainContent">
                            <div aria-labelledby="notification-tab">
                                <h3 class="mb-4">Notification Settings</h3>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="notification1">
                                        <label class="form-check-label" for="notification1">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate
                                            quis
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="notification2">
                                        <label class="form-check-label" for="notification2">
                                            hic nesciunt repellat perferendis voluptatum totam porro eligendi.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="notification3">
                                        <label class="form-check-label" for="notification3">
                                            commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary">Update</button>
                                    <button class="btn btn-light">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $(".nav .nav-link").on("click", function (e) {
                $(".nav").find(".active").removeClass("active");
                $(e.target).addClass("active");
            });
        });
    </script>
@endsection
