<table class="table align-items-center mb-0 ">
    <thead>
    <tr>
        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
            @lang('lang.name')
        </th>
        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
            @lang('lang.room_type')
        </th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            @lang('lang.status')
        </th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="5">
            <button class="btn w-100" data-bs-toggle="modal" data-bs-target="#RoomCreateModal_Theater_{{ $theater->id }}">
                <i class="fa-light fa-circle-plus pe-1"></i>@lang('lang.add') @lang('lang.room')
            </button>
        </td>
    </tr>
    @foreach($theater->rooms as $room)
        <tr>
            <td class="align-middle text-center">
                <h6 class="mb-0 text-sm ">{{ $room->name }}</h6>
            </td>
            <td class="align-middle text-center">
                <h6 class="mb-0 text-sm ">{{ $room->roomType->name }}</h6>
            </td>
            <td class="align-middle text-center text-sm">
                @if($room->status == 1)
                    <button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#RoomsModal">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                    </button>
                @else
                    <span
                        class="badge badge-sm bg-gradient-secondary">Offline</span>
                @endif
            </td>
            <td class="align-middle">
                <a class="btn btn-icon btn-warning" href="admin/seat/{{ $room->id }}">
                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                </a>

            </td>
            <td class="align-middle">
                <a href="javascript:;" class="btn btn-icon btn-danger">
                    <i class="fa-solid fa-trash-can fa-lg"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
