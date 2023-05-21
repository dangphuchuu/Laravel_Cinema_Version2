@extends('admin.layout.index')
@section('content')
    @can('list theater')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Cinema</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <a
                                    style="float:right;padding-right:30px;"
                                    class="text-light">
                                    <button
                                        class=" btn btn-primary float-right mb-3">
                                        Create
                                    </button>
                                </a>
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            Address
                                        </th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            Room
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($theaters as $theater)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{{ $theater->name }}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{{ $theater->address }}
                                                    , {{ $theater->city }}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{{ count($theater->rooms) }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if($theater->status == 1)
                                                    <button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#RoomsModal">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">Online</span>
                                                    </button>
                                                @else
                                                    <span
                                                        class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn" data-bs-toggle="modal" data-bs-target="#TheaterEditModal">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </button>

                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;"
                                                   class="text-secondary font-weight-bold text-xs"
                                                   data-toggle="tooltip"
                                                   data-original-title="Edit user">
                                                    <i class="fa-solid fa-trash-can fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @include('admin.theater.edit')
                                        @include('admin.theater.room.edit')
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

