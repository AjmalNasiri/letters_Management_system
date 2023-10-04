@extends('layouts.app')

@section('style')
    <style>
        a {
            text-decoration: none !important;
        }
    </style>
@endsection

{{-- title --}}
@section('title', 'د مکتوب معلومات')

{{-- Page Content --}}
@section('content')
    <section class="content">
        <div class="container-fluid">

            <div id="wholeInformation">
                <x-department-document-whole-information-component :document="$document">
                </x-department-document-whole-information-component>
            </div>
            @if ($document->status == App\Models\Document::NEW_DOCUMENT ||
                $document->status == App\Models\Document::ON_GOING_DOCUMENT)
                <div id="changeStatusComponent">
                    <x-department-document-submition-component :document="$document">
                    </x-department-document-submition-component>
                </div>
            @endif
            <div class="card col-5">
                <div class="card-header">
                    <div class="card-tools">
                        <h5>نظرونه</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div id="details">
                        <x-comment-histories-component :commentHistories="$commentHistories" :documentAssignedDepartmentId="$departmentId"></x-comment-histories-component>
                    </div>
                </div>
            </div>

            {{-- End of Information Table --}}
        </div>
    </section>
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

            $(document).on('click', '#saveComment', function(e) {
                e.preventDefault();

                $.ajax({
                    method: "POST",
                    url: $(this).attr('href'),
                    data: $('#commentsForm').serialize(),
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#details').html(response.success);
                        removeLoading();
                    },
                    error: function(response) {
                        displayErrorMessages(response.responseJSON.errors);
                        removeLoading();
                    }
                });
            });

            //delete Document
            $(document).on('click', '#submitStatusForm', function(e) {
                e.preventDefault();

                let mainThis = this;
                $.ajax({
                    method: "post",
                    url: $(this).attr('href'),
                    data: $('#statusChangeForm').serialize(),
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#wholeInformation').html(response.success);
                        if ($('#status :selected').val() ==
                            {{ App\Models\Document::REJECTED_DOCUMENT }} || $(
                                '#status :selected').val() ==
                            {{ App\Models\Document::COMPLETED_DOCUMENT }}) {
                            $('#changeStatusComponent').remove();
                        }
                        removeLoading();
                    },
                    error: function() {
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
