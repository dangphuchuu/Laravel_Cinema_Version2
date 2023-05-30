<form action="admin/combo/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="combo" tabindex="-1" aria-labelledby="combo_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="combo_title">Combo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name-input" class="form-control-label">@lang('lang.name')</label>
                                    <input class="form-control" type="text" value="" name="name" id="name-input"
                                           placeholder="@lang('lang.type') @lang('lang.name')">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price" class="form-control-label">@lang('lang.price')</label>
                                    <input class="form-control" type="number" name="price" id="price"
                                           placeholder="@lang('lang.type') @lang('lang.price')">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group file-uploader">
                                    <label for="image-input" class="form-control-label">@lang('lang.image')</label>
                                    <input type='file' name='Image' class="form-control image-combo" id="image-input">
                                    <img style="width: 300px" src="" class="img_combo d-none" alt="user1">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                    <button type="submit" class="btn btn-primary">@lang('lang.save')</button>
                </div>

            </div>
        </div>
    </div>
</form>


