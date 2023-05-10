<!-- Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog container">
        <div class="modal-content">
            <div class="modal-header text-uppercase">
                <h5 class="modal-title" id="loginModalLabel">Đăng nhập</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-4">
                <form method='post' action="/signIn">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" type="email" placeholder="Email..." name="email">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" placeholder="Password..." name="password">
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="rememberme">
                        <label class="form-check-label" for="rememberme">
                            Nhớ mật khẩu
                        </label>
                    </div>

                    <div class="modal-footer justify-content-center text-center">
                        <button type='submit' class="btn btn-warning text-uppercase">Đăng nhập</button>
                        <p class="text-dark w-100">Chưa có tài khoản?
                            <a class="link link-warning" data-bs-target="#registerModal"
                               data-bs-toggle="modal" href="#registerModal">Đăng ký
                            </a>
                        </p>
                        <a href="#" class="link link-secondary col-12 mt-4">Quên mật khẩu?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Register -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true" aria-labelledby="registerModalLabel">
    <div class="modal-dialog container">
        <div class="modal-content">
            <div class="modal-header text-uppercase">
                <h5 class="modal-title" id="registerModalLabel">Đăng ký</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-4">
                <form method='post'>
                    <div class="mb-3">
                        <input class="form-control" type="email" placeholder="Nhập Email..." name="email">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" placeholder="Nhập mật khẩu..." name="password">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" placeholder="Nhập lại mật khẩu..." name="password">
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">
                            Nhớ mật khẩu
                        </label>
                    </div>

                    <div class="modal-footer justify-content-center text-center">
                        <button type='submit' class="btn btn-warning text-uppercase">Đăng ký</button>
                        <p class="text-dark w-100">Chưa có tài khoản?
                            <a class="link link-warning" data-bs-target="#loginModal"
                               data-bs-toggle="modal" href="#loginModal">Đăng nhập
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
