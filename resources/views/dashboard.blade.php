@extends('layouts.main-dashboard')

@section('page-content')


<div class="col-12 col-lg-12">
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon green mb-2">
                                <i class="iconly-bi bi-people-fill"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Total User</h6>
                            <h6 class="font-extrabold mb-0">{{ $totalUsers }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon purple mb-2">
                                <i class="iconly-bi bi-car-front-fill"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Cars Units</h6>
                            <h6 class="font-extrabold mb-0">{{ $totalUnit }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-contjent-start ">
                            <div class="stats-icon blue mb-2">
                                <i class="iconly-bi bi-bar-chart-line"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Total Rent</h6>
                            <h6 class="font-extrabold mb-0">{{ $totalRent }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon red mb-2">
                                <i class="iconly-bi bi-currency-dollar"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Revenue</h6>
                            <h6 class="font-extrabold mb-0">Rp. {{ number_format($totalRevenue, 0, ',', '.') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h5 class="card-title">Hello, {{ Auth::user()->name }}! <br> Selamat Datang di Sistem Admin Mengkerent.id.</h5>
                                <p class="card-text">"Rahasia happy dalam bekerja itu terkandung dalam satu kata yakni keunggulan. Mengetahui bagaimana kamu melakukan sesuatu dengan baik, berarti kamu menikmatinya." -Pearl Buck</p>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        
    </div>
</section>

@endsection