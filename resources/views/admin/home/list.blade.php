@extends('admin.layout.index')
@section('content')
<!-- Sales -->
@include('admin.home.sales')
<!-- Chart -->
@include('admin.home.chart')
<!-- Sales By movie -->
@include('admin.home.revenue')
@endsection