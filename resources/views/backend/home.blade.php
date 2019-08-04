@extends('layouts.backend.main')
@section('title','Infinite | Dashboard')
@section('content')
<div class="container-fluid p-4">
    <!-- Content Header (Page header) -->
    @if (session('message'))
    <div class="alert alert-info mt-4">
        {{ session('message')}}
    </div>
    @endif
    <section class="content-header my-4 dash">
        <div class="row">
            <div class="col-md-6">
                <h1 class="dash-header">
                    <i class="lni-dashboard"></i> Dashboard...
                    <h2 class="font-weight-bold text-center" style="font-size:40px;margin-top:12%;">
                        Welcome {{Auth::user()->firstName()}}
                    </h2>
                </h1>
                <h1 class="mt-4 font-weight-bold text-center">Check Now The Statistics <small><i
                            class="ml-2 lni-angle-double-down"></i></small></h1>
            </div>
            <div class="col-md-6">
                <img src="/img/dashboard.svg" class="mt-4" style="width:100%;">
            </div>
        </div>
    </section>
    <hr>
    <!-- Static-->
    <section class="content-header my-4 dash">
        <h1 class="font-weight-bold dash-header">
            <i class="lni-pulse"></i> Statistics...
        </h1>
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="/img/chart.svg" class="mt-4" style="width:80%;">
            </div>
            <div class="col-md-6">
                <div class="statics">
                    <ul>
                        <li class="my-4 p-3 shadow">User <i class="lni-angle-double-right mx-2"></i> {{$users->count()}}
                        </li>
                        <li class="my-4 p-3 shadow">Posts <i class="lni-angle-double-right mx-2"></i>
                            {{$posts->count()}}</li>
                        <li class="my-4 p-3 shadow">Tags <i class="lni-angle-double-right mx-2"></i> {{$tags->count()}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection