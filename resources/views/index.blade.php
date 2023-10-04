@extends('layouts.app')

{{-- title --}}
@section('title', 'صفحه اصلی')

{{-- Page Title --}}
@section('pageTitle')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">صفحه اصلی</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Page Content --}}
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">صفحه اصلی</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            {{-- <h3>{{ $totalCarInWorkshop }}</h3> --}}
                            <p>نوی مکتوبونه</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-car-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            {{-- <h3>{{ $totalCarsUnderRepairCars }}</h3> --}}
                            <p>د کار لاندی مکتوبونه</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tools"></i>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            {{-- <h3>{{ $totalCompletedRepairingCars }}</h3> --}}
                            <p>تکمیل شوی مکتوبونه</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-ca
                            r-side"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-4 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            {{-- <h3>{{ $totalAvailableParts }}</h3> --}}
                            <p>ارشیف  ته لیږل شوی مکتوبونه</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            {{-- <h3>{{ $totalFinishingParts }}</h3> --}}
                            <p>رد شوی مکتوبونه</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
