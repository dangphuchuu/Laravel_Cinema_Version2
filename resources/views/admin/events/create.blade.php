<form action="admin/events/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="events" tabindex="-1" aria-labelledby="events_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="events_title">Events</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Title</label>
                                    <input class="form-control" type="text" value="" name="title"
                                           placeholder="type name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group file-uploader">
                                    <label for="example-text-input" class="form-control-label">Image</label>
                                    <input type='file' name='Image' class="form-control image-event">
                                    <img style="width: 300px" src="" class="img_event d-none" alt="user1">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Content</label>
                                    <textarea class="form-control" name="contents" id="editor"
                                              placeholder="Content"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Conditions</label>
                                    <textarea class="form-control" name="conditions" id="condition"
                                              placeholder="Content"></textarea>
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
