<form action="admin/banners/edit/{!! $value['id'] !!}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="editBanner{!! $value['id'] !!}" tabindex="-1" aria-labelledby="banner_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banner_title">Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group file-uploader">
                                    <label for="example-text-input" class="form-control-label">Image</label>
                                    <input type='file' name='Image' class="form-control image-director">
                                    <img style="width: 300px" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg" class="img_direc" alt="user1">
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
