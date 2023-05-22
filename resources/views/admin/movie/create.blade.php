@extends('admin.layout.index')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <form action="admin/movie/create" method="POST">
                <div class="col-md-12">
                    <div class="card">
                        <form method="post" action="/admin/movie/create">
                            @csrf
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">List Movie</p>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Submit</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-uppercase text-sm">Create</p>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="movieName" class="form-control-label">Movie Name</label>
                                            <input class="form-control" name="movieName" id="movieName" type="text" value="" placeholder="Movie Name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="showTime" class="form-control-label">Time</label>
                                            <input id="showTime" class="form-control" type="number" name="showTime" value="" placeholder="Time">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="national" class="form-control-label">National</label>
                                            <input class="form-control" name="national" id="national" type="text" value="" placeholder="National">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Movie Genres</label>
                                            <a class="form-control  btn btn-danger float-right mb-3" data-bs-toggle="modal"
                                               data-bs-target="#movie_genre">
                                                Select
                                            </a>
                                        </div>
                                    </div>
                                    @include('admin.movie.modal_movie_genres')
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="director" class="form-control-label">Director</label>
                                            <select id="director" class="form-control director-input" name="direactor[]" multiple>
                                                @foreach($director as $direct)
                                                    <option value="{!! $direct['id'] !!}">{!! $direct['name'] !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="releaseDate" class="form-control-label">Release Date</label>
                                            <input id="releaseDate" class="form-control" name="releaseDate" type="date" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="endDate" class="form-control-label">End Date</label>
                                            <input id="endDate" name="endDate" class="form-control" type="date" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="rating" class="form-control-label">Rating</label>
                                            <select id="rating" class="form-select">
                                                <option value="1">C13</option>
                                                <option value="2">C16</option>
                                                <option value="3">C18</option>
                                                <option value="4">P</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="movieImage" class="form-control-label">Image</label>
                                            <input id="movieImage" type='file' name='Image' class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="trailer" class="form-control-label">Trailer</label>
                                            <input id="trailer" name="trailer" class="form-control" type="text" value="" placeholder="Trailer">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cast" class="form-control-label">Casts</label>
                                            <select id="cast" class="form-control cast-input" name="cast[]" multiple>
                                                @foreach($cast as $c)
                                                    <option value="{!! $c['id'] !!}">{!! $c['name'] !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="editor" class="form-control-label">Content</label>
                                            <textarea class="form-control" name="content" id="editor"
                                                      placeholder="Content"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.director-input').select2({
                tags: true
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.cast-input').select2({
                tags: true
            });
        });
    </script>
@endsection
