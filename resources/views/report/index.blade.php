@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('Plugins/persiandtpicker/bootstrap-datepicker.min.css') }}">
@endsection

{{-- title --}}
@section('title', 'راپورها')

{{-- Page Content --}}
@section('content')
    <section class="content">
        <div class="container-fluid">
            {{-- <div class="card card-info"> --}}
            {{-- <div class="card-body"> --}}
            <form id="qataaSearchForm" action="{{ route('report.print') }}" method="GET">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-2 col-6">
                        <div class="form-group">
                            <label for="documentStatus">د مکتوب حالات : </label>
                            <select class="form-control" id="documentStatus" name="documentStatus">
                                <option>انتخاب کړی </option>
                                <option value="{{ App\Models\Document::NEW_DOCUMENT }}">نوی</option>
                                <option value="{{ App\Models\Document::ON_GOING_DOCUMENT }}">جریان کی</option>
                                <option value="{{ App\Models\Document::COMPLETED_DOCUMENT }}">تکمیل شوی</option>
                                <option value="{{ App\Models\Document::REJECTED_DOCUMENT }}">رد شوی</option>
                                <option value="{{ App\Models\Document::ARCHIVE_DOCUMENT }}">آرشیف</option>
                            </select>
                            <span name="documentStatus" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <div class="form-group">
                            <label for="reportType">د راپور نوعیت : </label>
                            <select class="form-control" id="reportType" name="reportType">
                                <option>انتخاب کړی </option>
                                <option value="1">ورځنی</option>
                                <option value="2">اونیز</option>
                                <option value="3">ربع وار</option>
                                <option value="4">میاشتنی</option>
                                <option value="5">کلنی</option>
                            </select>
                            <span name="reportType" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="form-group">
                            <label for="startDate"> شروع نیټه: </label>
                            <input type="date" class="form-control" id="startDate" name="startDate">
                            <span name="startDate" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="form-group">
                            <label for="endDate">ختم نیټه: </label>
                            <input type="date" class="form-control" id="endDate" name="endDate">
                            <span name="endDate" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-12">
                        <div class="form-group">
                            <br>
                            <a href="{{ route('report.show') }}" class="btn btn-primary w-100" id="showReports" style="margin-top: 7px;">
                                <strong>لیدل</strong>
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="searchResult">
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('Plugins/persiandtpicker/bootstrap-datepicker.fa.min.js') }}"></script>
    <script src="{{ asset('Plugins/persiandtpicker/bootstrap-datepicker.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', "[type='date']", function(e) {
                e.preventDefault();
            });

            $("[type='date']").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: "yy-mm-dd"
            });

            $(document).on('click', '#showReports', function(e) {
                e.preventDefault();

                clearErrorMessages();

                let printSearchFormData = $(this).closest('form').serialize();

                $.ajax({
                    type: 'GET',
                    url: $(this).closest('a').attr('href'),
                    data: printSearchFormData,
                    beforeSend: function(){
                        displayLoading();
                    },
                    success: function(response) {
                        $('#searchResult').html(response.success);
                        // window.open(response.success, '_blank');
                        removeLoading();
                    },
                    error: function(response, error) {
                        displayErrorMessages(response.responseJSON.errors);
                        removeLoading();
                    }
                });
            });

            // $(document).on('click', '#printReport', function(e) {
            //     e.preventDefault();

            //     let printSearchFormData = $(this).closest('form').serialize();

            //     $.ajax({
            //         type: 'GET',
            //         url: $(this).attr('href'),
            //         data: printSearchFormData,
            //         beforeSend: function(){
            //             displayLoading();
            //         },
            //         success: function(response) {
            //             window.open(response.success, '_blank');
            //             removeLoading();
            //         },
            //         error: function(response, error) {
            //             removeLoading();
            //         }
            //     });
            // });

            function displayErrorMessages(errors) {
                $.each(errors, function(key, value) {
                    $('span[name="' + key + '"]').html(value[0]);
                });
            }

            function clearErrorMessages() {
                $('span').html('');
            }
        });
    </script>
@endsection
