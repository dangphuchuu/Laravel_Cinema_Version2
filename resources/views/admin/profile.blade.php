@extends('admin.layout.index')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="container-fluid py-4">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header pb-0">
                              <div class="d-flex align-items-center">
                                <p class="mb-0">@lang('lang.edit') @lang('lang.profile')</p>
                                <button class="btn btn-primary btn-sm ms-auto">@lang('lang.submit')</button>
                              </div>
                            </div>
                            <div class="card-body">
                              <p class="text-uppercase text-sm">{!! $user['fullName'] !!}</p>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.fullname')</label>
                                    <input class="form-control" type="text" value="{!! $user['fullName'] !!}">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email</label>
                                    <input class="form-control" type="email" value="{!! $user['email'] !!}" disabled>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.phone')</label>
                                    <input class="form-control" type="number" name="phone" value="{!! $user['phone'] !!}">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <input type="checkbox" id="checkPassword">
                                          <label for="example-text-input" class=" form-control-label">@lang('lang.click_here_to_change_password')</label>

                                      </div>
                                  </div>
                                <div class="col-md-7">
                                  <div class="form-group">
                                    <label for="example-text-input" class=" form-control-label">@lang('lang.new_password')</label>
                                    <input class="password form-control" type="password" name="password" value="" disabled>
                                  </div>
                                </div>
                                <div class="col-md-7">
                                  <div class="form-group">
                                    <label for="example-text-input" class=" form-control-label">@lang('lang.re_password')</label>
                                    <input class="password form-control" type="password" name="repassword" value="" disabled>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#checkPassword').change(function() {
                if ($(this).is(":checked")) {
                    $('.password').removeAttr('disabled');
                } else {
                    $('.password').attr('disabled', '');
                }
            });
        });
    </script>
@endsection
