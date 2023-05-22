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
                                    <label for="name-input" class="form-control-label">Name</label>
                                    <input class="form-control" type="text" value="" name="name" id="name-input"
                                           placeholder="type name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price" class="form-control-label">Price</label>
                                    <input class="form-control" type="number" value="" name="price" id="price"
                                           placeholder="type national">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="food-input" class="form-control-label">Food</label>
                                <select class="form-control food-input" name="food[]" multiple="multiple">
                                    <option selected="selected" value="1">orange</option>
                                    <option value="2">white</option>
                                    <option value="3">purple</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="quantity-input" class="form-control-label">Quantity</label>
                                    <input class="form-control" type="number" value="" name="quantity" id="quantity-input"
                                           placeholder="type quantity">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group file-uploader">
                                    <label for="image-input" class="form-control-label">Image</label>
                                    <input type='file' name='Image' class="form-control image-food" id="image-input">
                                    <img style="width: 300px" src="" class="img_food d-none" alt="user1">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </div>
        </div>
    </div>
</form>

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.food-input').select2({
                tags: true
            });
        });
    </script>
@endsection
