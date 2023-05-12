@extends('admin.layout.index')
@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Movie Genres</h6>
        </div>
        @if(count($errors)>0)
        <div class="alert alert-danger">
          @foreach($errors->all() as $arr)
          {{$arr}}<br>
          @endforeach
        </div>
        @endif
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <button style="float:right;padding-right:30px;" type="button" class="me-5 text-light btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#movie_genre">
              Create
            </button>
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Genres</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($movieGenres as $value)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{!! $value['name'] !!}</h6>
                        <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                      </div>
                    </div>
                  </td>
                  <td></td>
                  <td class="align-middle text-center text-sm">
                    @if($value['status'] == 1)
                    <span class="badge badge-sm bg-gradient-success">Online</span>
                    @else
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                    @endif
                  </td>
                  <td class="align-middle">
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                      Edit
                    </a>
                  </td>
                  <td class="align-middle">
                    <a href="javascript:void(0)" data-url="{{ url('admin/ajax/delete_movie_genres', $value['id'] ) }}" class="text-secondary font-weight-bold text-xs delete-genres" data-toggle="tooltip">
                      Delete
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<form action="admin/movie_genres/create" method="POST">
  @csrf
  <div class="modal fade" id="movie_genre" tabindex="-1" aria-labelledby="movie_title" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="movie_title">Movie Genres</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Genres</label>
                  <input class="form-control" type="text" value="" name="name" placeholder="type genres">
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
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('.delete-genres').on('click', function() {
      var userURL = $(this).data('url');
      var trObj = $(this);
      if (confirm("Are you sure you want to remove it?") == true) {
        $.ajax({
          url: userURL,
          type: 'DELETE',
          dataType: 'json',
          success: function(data) {
            if (data['success']) {
              // alert(data.success);
              trObj.parents("tr").remove();
            } else if (data['error']) {
              alert(data.error);
            }
          }
        });
      }

    });
  });
</script>
@endsection
@endsection