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
            <h1 class="mb-5">@lang('lang.account_setting')</h1>
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right">
                    <div class="p-4">
                        <h4 class="text-center">{!! $user['fullName'] !!}</h4>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-tab" data-bs-toggle="collapse" data-bs-target="#account" aria-expanded="true" >
                            <i class="fa fa-home text-center mr-1"></i>
                            Account
                        </a>
                        <a class="nav-link" id="password-tab" data-bs-toggle="collapse" data-bs-target="#password" aria-expanded="false">
                            <i class="fa fa-key text-center mr-1"></i>
                            Password
                        </a>
                        <a class="nav-link" id="security-tab" data-bs-toggle="collapse" data-bs-target="#security" aria-expanded="false">
                            <i class="fa fa-user text-center mr-1"></i>
                            Security
                        </a>
                        <a class="nav-link" id="application-tab" data-bs-toggle="collapse" data-bs-target="#application" aria-expanded="false">
                            <i class="fa fa-tv text-center mr-1"></i>
                            Application
                        </a>
                        <a class="nav-link" id="notification-tab" data-bs-toggle="collapse" data-bs-target="#notification" aria-expanded="false">
                            <i class="fa fa-bell text-center mr-1"></i>
                            Notification
                        </a>
                    </div>
                </div>
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <div class="collapse show" data-bs-parent="#v-pills-tabContent" >
                    <form action="/editProfile" method="POST">
                        @csrf
                    <div class="tab-pane fade active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <h4 class="text-center">@lang('lang.membership_card')</h4>
                        <div class="text-center">
                            <img src="data:image/png;base64,{!! base64_encode($generatorPNG->getBarcode($user['code'],$generatorPNG::TYPE_CODE_128)) !!}" />
                        </div>
                        <div class="text-center">
                            {!! $user['code'] !!}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('lang.fullname')</label>
                                    <input type="text" class="form-control" name="fullName" value="{!! $user['fullName'] !!}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="{!! $user['email'] !!}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="text" class="form-control" name="phone" value="{!! $user['phone'] !!}">
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
                                           <td class="text-center">{!! number_format(250000,0,",",".") !!} VNĐ</td>
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
                    </form>
                    </div>
                    <div class="collapse" data-bs-parent="#v-pills-tabContent" >
                    <div class="tab-pane fade"  role="tabpanel" id="password" aria-labelledby="password-tab">
                        <h3 class="mb-4">Password Settings</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Old password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>New password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                    </div>
                    </div>
                    <div class="collapse" data-bs-parent="#v-pills-tabContent" >
                    <div class="tab-pane fade" role="tabpanel" id="security" aria-labelledby="security-tab">
                        <h3 class="mb-4">Security Settings</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Login</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Two-factor auth</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="recovery">
                                        <label class="form-check-label" for="recovery">
                                            Recovery
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
                        <h3 class="mb-4">Application Settings</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="app-check">
                                        <label class="form-check-label" for="app-check">
                                            App check
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                                        <label class="form-check-label" for="defaultCheck2">
                                            Lorem ipsum dolor sit.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                        <h3 class="mb-4">Notification Settings</h3>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notification1">
                                <label class="form-check-label" for="notification1">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate quis
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notification2" >
                                <label class="form-check-label" for="notification2">
                                    hic nesciunt repellat perferendis voluptatum totam porro eligendi.
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="notification3" >
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
    </section>
@endsection
