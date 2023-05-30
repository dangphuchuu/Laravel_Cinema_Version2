<form action="admin/combo/detail/{!! $value['id'] !!}" method="POST" >
    @csrf
    <div class="modal fade" id="detailCombo{!! $value['id'] !!}" tabindex="-1" aria-labelledby="combo_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="combo_title">{!! $value['name'] !!}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body ">
                        <div class="d-flex ">
                            <button type="button" class="btn btn-link p-0" id="btn_detail">
                                <i class="fa-solid fa-circle-plus fa-xl"></i>
                            </button>
                        </div>
                        <div class="row form_detail">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.food')</label>
                                    <select id="select_combo" name="addmore[0][food]" class="form-select" >
                                        @foreach($food as $f)
                                        <option value="{!! $f['id'] !!}">
                                            {!! $f['name'] !!}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">@lang('lang.quantity')</label>
                                    <input class="form-control" type="number" name="addmore[0][quantity]" min="0" max="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                    <button type="submit" class="btn btn-primary " id="btn_submit">@lang('lang.save')</button>
                </div>
            </div>
        </div>
    </div>
</form>
