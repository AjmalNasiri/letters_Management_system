@extends('layouts.app')

@section('title', 'ورود به سیستم')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-bold text-center">letter Management System</div>

                    <form method="POST" action="{{ route('login') }}">
                        <div class="card-body">
                            @error('message')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                        style="text-align: left;">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <div class="alert alert-danger alert-dismissible fade show d-none" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                    style="text-align: left;">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="form-group">
                                <label for="email">ایمیل<i class="text-danger">*</i></label>
                                <input id="email" type="email" class="form-control" name="email"
                                    placeholder="example@moi.com" autofocus>

                                <span class="text-danger" name="email"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">رمز <i class="text-danger">*</i></label>
                                <input id="password" type="password" class="form-control" placeholder="رمز عبور"
                                    name="password">

                                <span class="text-danger" name="password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">
                                    ورود به سیستم
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '[type="submit"]', function(e) {
                e.preventDefault();

                clearErrorMessages();

                $.ajax({
                    url: $(this).closest('form').attr('action'),
                    method: $(this).closest('form').attr('method'),
                    data: $(this).closest('form').serialize(),
                    beforeSend: function() {
                        displayLoading();
                    },
                    success: function(response) {
                        window.location.replace(response.success);
                        // removeLoading();
                    },
                    error: function(response, error) {
                        if (response.status === 500) $('.alert').removeClass('d-none').append(
                            '<strong>' + response.message + '</strong>');
                        else displayLoginErrors(response.responseJSON.errors);
                        removeLoading();
                    }
                });
            });

            function displayLoginErrors(errors) {
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
