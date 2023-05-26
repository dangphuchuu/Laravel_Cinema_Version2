@extends('admin.layout.index')
@section('content')
    @can('list movies')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>List Movie</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <a href="admin/movie/create" style="float:right;padding-right:30px;">
                                    <button class=" btn btn-primary float-right mb-3">Create</button>
                                </a>
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Movie Genres</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ">Image</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Movie Name</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">ShowTime</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">National</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Director</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Release Date</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">End Date</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($movies as $movie)
                                        <tr>
                                            <td class="align-middle text-center">
                                                @foreach($movie->movieGenres as $genre)
                                                    <h6 class="mb-0 text-sm ">{{ $genre->name }}</h6>
                                                @endforeach
                                            </td>
                                            <td class="align-middle text-center">
                                                @if(strstr($movie->image,"https") == "")
                                                    <img style="width: 300px"
                                                         src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{$movie->image}}.jpg"
                                                         alt="user1">
                                                @else
                                                    <img style="width: 300px"
                                                         src="{{ $movie->image }}" alt="user1">
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{{ $movie->name }}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{{ $movie->showTime }} phút</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{{ $movie->national }}</h6>
                                            </td>
                                                <td class="align-middle text-center">
                                                    @foreach($movie->directors as $director)
                                                    <h6 class="mb-0 text-sm ">{{ $director->name }}</h6>
                                                    @endforeach
                                                </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{{ $movie->releaseDate }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{{ $movie->endDate }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if($movie->status == 1)
                                                    <a href="#">
                                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                                    </a>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <a href="admin/movie/edit/{!! $movie['id'] !!}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                   data-original-title="Edit user">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;" data-url="{{ url('admin/movie/delete', $movie['id'] ) }}" class="text-secondary font-weight-bold text-xs delete-movie" data-toggle="tooltip"
                                                   data-original-title="Delete movie">
                                                    <i class="fa-solid fa-trash-can fa-lg"></i>
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
    @else
        <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.delete-movie').on('click', function () {
                var userURL = $(this).data('url');
                var trObj = $(this);
                if (confirm("Are you sure you want to remove it?") === true) {
                    $.ajax({
                        url: userURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {
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
