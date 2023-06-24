@extends('admin.layout.index')
@section('content')
    @can('statistical')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>@lang('lang.statistical')</h6>
                        </div>
                        <div class="card-body ms-8">
                            <div class="row">
                                <form action="admin/statistical/filter-by-date">
                                    @csrf
                                <div class="col-md-5">
                                    <label for="start_time" class="form-control-label">@lang('lang.start_time')</label>
                                    <div class="form-group" style="text-align:center">
                                        <input name="start_time" id="start_time" class="form-control" style="width:70%" type="date" value="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="end_time"  class="form-control-label">@lang('lang.end_time')</label>
                                    <div class="form-group" style="text-align:center">
                                        <input name="end_time" id="end_time" class="form-control"  style="width:70%" type="date" value="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                    <button type="submit" id="btn-statistical-filter" class="form-control">@lang('lang.submit')</button>
                                    </div>
                                </div>
                                </form>
                                <div class="col-md-6">
                                    <label for="statistical" class="form-control-label">@lang('lang.type_of_time')</label>
                                    <div class="form-group" style="text-align:center">
                                        <select id="statistical" style="width: 70%" class="statistical-filter form-control">
                                            <option selected>Selected</option>
                                            <option value="week" >@lang('lang.sort_by_week')</option>
                                            <option value="month">@lang('lang.sort_by_month')</option>
                                            <option value="year">@lang('lang.sort_by_year')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="theater" class="form-control-label">@lang('lang.theater')</label>
                                    <div class="form-group" style="text-align:center">
                                        <select id="theater" style="width: 70%" class="statistical-theater form-control">
                                            <option value="volvo" selected>Movie Cinema quận 1</option>
                                            <option value="saab">Movie Cinema Nguyễn trãi</option>
                                            <option value="vw">Movie Cinema Quận 8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.time')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.theater')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.ticket')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.total_ticket')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Combo</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.total_combo')</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('lang.total_revenue')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm ">1/2023</h6>
                                        </td>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm ">Rạp movie cinema quận 1</h6>
                                        </td>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm ">10.000</h6>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">1.200.000 Vnđ</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">1000</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">12.000.000 Vnđ</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">1.212.000.000 Vnđ</span>
                                        </td>
                                    </tr>
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
<script type="text/javascript">


    $(document).ready(function (){
        // $('#btn-statistical-filter').click(function (){
        //    var from_date = $('#start_time').val();
        //    var to_date = $('#end_time').val();
        //    $.ajax({
        //        url:"admin/statistical/filter-by-date",
        //        method:"POST",
        //        datatype: "JSON",
        //        data:{
        //            from_date:from_date,
        //            to_date:to_date
        //        },
        //        success:function (data)
        //        {
        //            alert(data.success);
        //        }
        //    })
        // });
        $('.statistical-filter').change(function (){
            var statistical_value = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"admin/statistical/statistical-filter",
                method:"POST",
                datatype: "JSON",
                data: {
                    'statistical_value' : statistical_value,
                },

                success:function (data)
                {
                    alert(data.success);
                }
            });
        });
    });
</script>
@endsection
