<!-- Modal -->
<div class="modal fade modal-lg" id="TheaterEditModal{{ $theater->id }}" tabindex="-1" aria-labelledby="TheaterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="TheaterModalLabel">Edit Theater</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Theater name</label>
                                <input class="form-control" id="name" type="text" value="{{ $theater->name }}" name="name" placeholder="type name...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="address" class="form-control-label">Theater address</label>
                                <input class="form-control" id="address" type="text" value="{{ $theater->address }}" name="address"
                                       placeholder="type address...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="city" class="form-control-label">Theater city</label>
                                <input class="form-control" id="city" type="text" value="{{ $theater->city }}" name="city" placeholder="type city...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="location" class="form-control-label">Theater location</label>
                                <input class="form-control" id="location" type="text" value="{{ $theater->location }}" name="location"
                                       placeholder="type location...">
                            </div>
                        </div>
                    </div>
                </form>
                @include('admin.room.list')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
