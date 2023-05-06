<!-- open/close -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog container">
        <div class="modal-content">
            <div class="modal-header text-uppercase">
                <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-4">
                <form method='get'>
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

                    <div class="modal-footer justify-content-center">
                        <div class="row text-center">
                            <button type='submit' class="btn btn-warning col-12 text-uppercase">Đăng nhập</button>
                            <a href="#" class="link link-secondary col-12 mt-4">Quên mật khẩu?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
