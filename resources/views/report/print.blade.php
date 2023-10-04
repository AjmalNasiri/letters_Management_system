@extends('layouts.app')

{{-- title --}}
@section('title', $reportType)

{{-- Page Content --}}
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <b>مکتوبونه</b>
                            </div>
                            @if ($documents->isNotEmpty())
                                <div class="card-title">
                                    <a href="{{ route('report.print') }}" class="btn btn-success" id="printReport" ><i class="fas fa-print"></i></a>
                                </div>
                            @endif
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
