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
@section('title', 'د اړوند ډیپارټمنټ مکتوبونه')

{{-- Page Content --}}
@section('content')
    <section class="content">
        <div class="container-fluid">
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
                            <label for="recieved_date">مکتوب نیټه </label>
                            <input type="date" class="form-control date" name="recieved_date" placeholder="مکتوب نیټه ">
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
                {{-- <x-document-list-component :documents="$documents"></x-document-list-component> --}}
                <x-department-documents-component :documents="$documents"></x-department-documents-component>

            </div>


            {{-- End of Information Table --}}
        </div>
    </section>
    @include('Document.models.department')
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
            $(document).on('click', '#deleteDocument', function(e) {
                e.preventDefault();

                let mainThis = this;
                $.ajax({
                    method: "DELETE",
                    url: $(this).attr('href'),
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $(mainThis).closest('tr').remove();
                        removeLoading();
                    },
                    error: function() {
                        removeLoading();
                    }
                });
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

            $(document).on('click', '#assignDepartments', function(e) {
                e.preventDefault();
                clearErrorMessages();

                $.ajax({
                    method: "GET",
                    url: $(this).attr('href'),
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#departmentList').html(response.success);
                        $('#departmentsModal').modal('show');
                        removeLoading();
                    },
                    error: function(response) {
                        removeLoading();
                    }
                });
            });

            $(document).on('click', '[name="saveDocumentDepartments"]', function(e) {
                e.preventDefault();
                clearErrorMessages();

                $.ajax({
                    method: "POST",
                    url: $(this).attr('href'),
                    data: new FormData($('#documentDepartments')[0]),
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#searchResult').html(response.success);
                        $('#departmentsModal').modal('hide');
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
                    key = key.split('.');
                    console.log(key[0]);
                    $('span[name="' + key[0] + '"').html(error[0]);
                });
            }

            function clearErrorMessages() {
                $('span').html('');
            }
        });
    </script>
@endsection
