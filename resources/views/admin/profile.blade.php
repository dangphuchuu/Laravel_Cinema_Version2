@extends('admin.layout.index')
@section('content')
<form action="admin/postprofile" method="POST">
  @csrf
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
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="text-uppercase text-sm">{!! $user['fullName'] !!}</p>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">@lang('lang.fullname')</label>
                          <input class="form-control" name="fullName" type="text" value="{!! $user['fullName'] !!}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Email</label>
                          <input class="form-control" name="email" type="email" value="{!! $user['email'] !!}">
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
                          <input type="checkbox" id="checkPassword" name="checkPassword">
                          <label for="example-text-input" class=" form-control-label">@lang('lang.click_here_to_change_password')</label>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">
                          <label for="example-text-input" class=" form-control-label">@lang('lang.new_password')</label>
                          <input class="password form-control" type="password" name="password" disabled>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">
                          <label for="example-text-input" class=" form-control-label">@lang('lang.re_password')</label>
                          <input class="password form-control" type="password" name="repassword" disabled>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="float-right btn bg-gradient-primary mt-3 mr-3">@lang('lang.submit')</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
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