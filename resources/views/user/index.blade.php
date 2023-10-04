@extends('layouts.app')

{{-- title --}}
@section('title', 'لیست یوزر ها')

{{-- Page Content --}}
@section('content')
    <section class="content">
        <div class="container-fluid">
            {{-- Users Table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <h3 class="card-title"><b>لیست یوزر ها</b></h3>
                            </div>
                            <div class="card-title">
                                <a class="btn btn-primary" href="{{ route('register') }}">جدید</a>
                            </div>
                        </div>
                        <div id="tbody">
                            <x-user-update-tbody-component :users="$users"></x-user-update-tbody-component>
                        </div>
                    </div>
                </div>
            </div>

            {{-- End of Users Table --}}
        </div>
    </section>
    @include('user.modals.userUpdate')
    @include('user.modals.permissions')
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            // Headers for Ajax Request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '[data-target="#userUpdateModal"]', function(e) {
                e.preventDefault();

                $.ajax({
                    method: 'GET',
                    url: $(this).attr('href'),
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#userUpdateInfo').html(response.success);
                        removeLoading();
                    },
                    error: function(response, error) {
                        removeLoading();
                    }
                });
            });

            $(document).on('click', '[name="updateUser"]', function(e) {
                e.preventDefault();

                $.ajax({
                    method: 'PUT',
                    url: $(this).attr('href'),
                    data: $(this).closest('form').serialize(),
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#userUpdateModal').hide();
                        $('[data-dismiss="modal"]').click();

                        $('#tbody').html(response.success);
                        hideModal();
                        removeLoading();
                    },
                    error: function(response, error) {
                        displayErrorMessages(response);
                        removeLoading();
                    }
                });
            });

            $(document).on('click', '#lockUnlockAccount', function(e) {
                e.preventDefault();
                let mainThis = this;

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'DELETE',
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#tbody').html(response.success);
                        removeLoading();
                    },
                    error: function() {
                        removeLoading();
                    }
                });
            });

            $(document).on('click', '[data-target="#userPermissionsModal"]', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'GET',
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#userPermissionsInfo').html(response.success);
                        removeLoading();
                    },
                    error: function(response, error) {
                        removeLoading();
                    }
                });
            });

            $(document).on('click', '[name="grantPermissionToUser"]', function(e) {
                e.preventDefault();
                clearErrorMessage();

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'POST',
                    data: $('#permissionForm').serialize(),
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $('#userPermissionsModal').hide();
                        $('[data-dismiss="modal"]').click();
                        hideModal();
                        removeLoading();
                    },
                    error: function(response, error) {
                        displayErrorMessages(response);
                        removeLoading();
                    }
                });
            });

            $(document).on('click', '[class="btn btn-danger m-2"]', function(e) {
                e.preventDefault();
                let mainThis = this;

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'DELETE',
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        $(mainThis).closest('a').remove();
                        removeLoading();
                    },
                    error: function(response) {
                        removeLoading();
                    }
                });
            });

            function displayErrorMessages(response) {
                if (response.status === 403 || response.status === 404) $().html(response.message);
                else {
                    $.each(response.responseJSON.errors, function(key, error) {
                        $('span#' + key).html(error[0]);
                    });
                }
            }

            function clearErrorMessage() {
                $('span').html('');
            }
        });
    </script>
@endsection
