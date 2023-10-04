@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('Plugins/persiandtpicker/bootstrap-datepicker.min.css') }}">
    <style>
        /* .ui-datepicker {
            z-index: 999999999999;
        } */

        .ui-widget.ui-widget-content {
            z-index: 1000000 !important;
        }

        a {
            text-decoration: none !important;
        }
    </style>
@endsection

{{-- title --}}
@section('title', 'د آرشیف شوی مکتوبونو لیست')

{{-- Page Content --}}
@section('content')
    <section class="content">
        <div class="container-fluid">
            {{-- <div class="card card-info"> --}}
            {{-- <div class="card-body"> --}}
            <form id="searchForm">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="form-group">
                            <label for="document_no">مکتوب نمبر: </label>
                            <input type="text" class="form-control" name="document_no" placeholder="مکتوب نمبر.....">
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <div class="form-group">
                            <label for="source">درخواست کونکی :</label>
                            <input type="text" class="form-control" name="source" placeholder=" درخواست کونکی">
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="form-group">
                            <label for="title">موضوع </label>
                            <input type="text" class="form-control" name="title" placeholder="موضوع ">
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="form-group">
                            <label for="recieved_date">تاریخ مکتوب </label>
                            <input type="date" class="form-control date" name="recieved_date" placeholder="تاریخ مکتوب ">
                        </div>
                    </div>
                    <div class="col-lg-1 col-12">
                        <div class="form-group">
                            <br>
                            <a href="{{ route('document.search') }}" id="DocSearch" class="btn btn-success mt-2">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>


            <div id="searchResult">
                <x-archived-document-component :documents="$documents"></x-archived-document-component>
            </div>


            {{-- End of Information Table --}}
        </div>
    </section>
    @include('archive.modals.addressModal')
@endsection
@section('script')
    <script src="{{ asset('Plugins/persiandtpicker/bootstrap-datepicker.fa.min.js') }}"></script>
    <script src="{{ asset('Plugins/persiandtpicker/bootstrap-datepicker.js') }}"></script>
    <script>
        $(document).ready(function() {

            $(document).on('click', "[type='date']", function(e) {
                // e.preventDefault();
            });
            $(".date").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: "yy-mm-dd"
            });
            $("[type='date']").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: "yy-mm-dd"
            });
            // Headers for Ajax Request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //delete Document
            $(document).on('click', '#showLocationModalButton', function(e) {
                e.preventDefault();

                $('#updateArchiveAddress').attr('href',$(this).attr('href'));
                $('#updateArvhiceModal').modal('show');
            });

            // Submiting Form
            $(document).on('click', '#DocSearch, .page-link', function(e) {
                e.preventDefault();

                let searchFormData = $('#searchForm').serialize();


                $.ajax({
                    url: $(this).attr('href'),
                    method: "GET",
                    data: searchFormData,
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#searchResult').html(response.success);
                        removeLoading();
                    },
                    error: function() {
                        removeLoading();
                    }
                });
            });

            $(document).on('click', '#updateArchiveAddress', function(e) {
                e.preventDefault();
                clearErrorMessages();

                $.ajax({
                    method: "PUT",
                    url: $(this).attr('href'),
                    data: $('#updateLocationForm').serialize(),
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#searchResult').html(response.success);
                        $('#updateArvhiceModal').modal('hide');
                        removeLoading();
                    },
                    error: function(response) {
                        displayErrorMessages(response.responseJSON.errors);
                        removeLoading();
                    }
                });
            });

            function displayErrorMessages(errors) {
                $.each(errors, function(key, error) {
                    $('span[name="' + key + '"').html(error[0]);
                });
            }

            function clearErrorMessages() {
                $('span[name]').html('');
            }
        });
    </script>
@endsection
