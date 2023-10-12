<footer class="mt-5 pt-5 pb-3 shadow bg-dark text-white">
    <div class="container" style="max-width: 600px;">
        <div class="d-inline-block text-center mb-5">
            <a class="link link-light mx-3 text-decoration-none text-nowrap" href="#">@lang('lang.Policy')</a>
            <a class="link link-light mx-3 text-decoration-none text-nowrap" href="#">@lang('lang.schedules')</a>
            <a class="link link-light mx-3 text-decoration-none text-nowrap" href="#">@lang('lang.news')</a>
            <a class="link link-light mx-3 text-decoration-none text-nowrap" href="#">@lang('lang.prices_ticket')</a>
            <a class="link link-light mx-3 text-decoration-none text-nowrap" href="#">@lang('lang.Questions')</a>
            <a class="link link-light mx-3 text-decoration-none text-nowrap" href="#">@lang('lang.contact')</a>
        </div>
        <div class="d-flex justify-content-between mb-4">
            <div class="socials">
                <a class="link text-decoration-none" href="{{isset($info['facebook']) ? $info['facebook'] : ''}}">
                    <img style="max-width: 40px; max-height: 40" class="me-2" src="{{ asset('images/icon/facebook.256x256.png') }}" alt="facebook">
                </a>
                <a class="link text-decoration-none" href="{{isset($info['youtube']) ? $info['youtube'] : ''}}">
                    <img style="max-width: 40px; max-height: 40px" class="me-2" src="{{ asset('images/icon/youtube.256x256.png') }}" alt="facebook">
                </a>
            </div>
            <div>
                <img style="max-height: 40px" class="me-2" src="{{ asset('images/icon/dathongbao.png') }}" alt="facebook">
            </div>
        </div>
        <div class="d-block text-center">
            <p>Bản quyền thuộc {{isset($info['name']) ? $info['name'] : ''}}.</p>
            <p>Email: {{isset($info['email']) ? $info['email'] : ''}} - Hotline {{isset($info['phone']) ? $info['phone'] : ''}}</p>
        </div>
        <div class="d-block text-center mt-3">
        {{isset($info['copyright']) ? $info['copyright'] : ''}}
        </div>
    </div>
</footer>