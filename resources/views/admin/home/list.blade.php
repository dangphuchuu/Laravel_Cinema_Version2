@extends('admin.layout.index')
@section('content')
    @can('statistical')
    <div class="container-fluid py-4">
    <!-- Sales -->
    @include('admin.home.sales')
    <!-- Chart -->
    @include('admin.home.chart')
    <!-- Sales By movie -->
{{--    @include('admin.home.revenue')--}}
    </div>
    @endcan
@endsection
@section('scripts')
<script type="text/javascript">
    var chart =  new Morris.Bar({
        element: 'admin_chart',
        barColors: ['#819C79','#fc8710','#FF6541','#A4ADD3','#766B56'],
        parseTime: false,
        hideHover: 'auto',
        data:[
                {
                    date:null,total:null,seat_count:null
                }
            ],
        xkey: 'date',
        ykeys: ['total','seat_count'],
        labels: ['total','seat_count']
    });

    $(document).ready(function (){
        $('#btn-statistical-filter').click(function (){
            var from_date = $('#start_time').val();
            var to_date = $('#end_time').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"admin/filter-by-date",
                method:"GET",
                datatype: "JSON",
                data:{
                    from_date:from_date,
                    to_date:to_date
                },
                success:function (data)
                {
                    if(data['success'])
                    {
                        chart.setData(data.chart_data);
                    }
                    else if(data['error']){
                        alert(data.error);
                    }
                },

            })
        });
        $('.statistical-filter').change(function (){
            var statistical_value = $(this).val();
            if(statistical_value === "null"){
                chart.setData([{date:null,total:null,seat_count:null}]);
                return ;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"admin/statistical-filter",
                method:"GET",
                datatype: "JSON",
                data: {
                    'statistical_value' : statistical_value,
                },
                success:function (data)
                {
                    if(data['success'])
                    {
                        chart.setData(data.chart_data);
                    }
                    else if(data['error']){
                        alert(data.error);
                    }
                }
            });
        });
    });
</script>
@endsection
