@extends('admin.layout.index')
@section('content')
    @can('list user')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>User Account</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Id</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Full Name</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Email</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Phone</th>
                                        @role('admin')
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        @endrole
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Created_At</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated_At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $value)
                                        @foreach($value['roles'] as $role)
                                            @if($role['name'] == 'user')
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <h6 class="mb-0 text-sm ">{!! $value['id'] !!}</h6>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <h6 class="mb-0 text-sm ">{!! $value['fullName'] !!}</h6>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary font-weight-bold">{!! $value['email'] !!}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary font-weight-bold">{!! $value['phone'] !!}</span>
                                                    </td>
                                                    @role('admin')
                                                    <td id="status{!! $value['id'] !!}" class="align-middle text-center text-sm ">
                                                        @if($value['status'] == 1)
                                                            <a href="javascript:void(0)" class="btn_active"  onclick="changestatus({!! $value['id'] !!},0)">
                                                                <span class="badge badge-sm bg-gradient-success">Online</span>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)" class="btn_active"  onclick="changestatus({!! $value['id'] !!},1)">
                                                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    @endrole
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary font-weight-bold">{!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary font-weight-bold">{!! date("d-m-Y H:m:s", strtotime($value['updated_at'])) !!}</span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $users->links() !!}
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
    function changestatus(user_id,active){
        if(active === 1){
            $("#status" + user_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changestatus('+ user_id +',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
        }else{
            $("#status" + user_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changestatus('+ user_id +',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/user/status",
            type: 'GET',
            dataType: 'json',
            data: {
                'active': active,
                'user_id': user_id
            },
            success: function (data) {
                if (data['success']) {
                    // alert(data.success);
                } else if (data['error']) {
                    alert(data.error);
                }
            }
        });
    }

</script>
@endsection
