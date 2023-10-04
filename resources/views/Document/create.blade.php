@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('Plugins/persiandtpicker/bootstrap-datepicker.min.css') }}">
@endsection

{{-- title --}}
@section('title', 'د نوی مکتوب ثپتول')

{{-- Page Content --}}
@section('content')
    <section class="content">
        <div class="container-fluid pt-3">
            <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="card-title text-center"><b>د مکتوب عمومی معلومات</b></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- @if (Session::has('errors'))
                                {{ Session::all() }}
                            @endif --}}
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="document_no">د مکتوب نمبر<span class="text-danger">*</span></label>
                                    <input class="form-control" value="{{ old('document_no') }}" name="document_no"
                                        type="text" placeholder="د مکتوب نمبر">
                                    @error('document_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="title">د مکتوب عنوان <span class="text-danger">*</span></label>
                                    <input class="form-control" value="{{ old('title') }}" name="title" type="text"
                                        placeholder="د مکتوب عنوان">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="source">غوښتونکی مرجع<span class="text-danger">*</span></label>
                                    <select name="requested_from_to_source" class="form-control" id="requested_from_to_source">
                                        <option >انتخاب کړی</option>
                                        @foreach ($documentRequestedToFromSources as $documentRequestedToFromSource)
                                            <option value="{{ $documentRequestedToFromSource->id }}">{{ $documentRequestedToFromSource->source_name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input class="form-control" value="{{ old('source') }}" name="source" type="text"
                                        placeholder="غوښتونکی مرجع"> --}}
                                    @error('requested_from_to_source')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="startup_department">مربوطه مرجع</label>
                                    <input class="form-control" value="{{ old('startup_department') }}"
                                        name="startup_department" type="text" placeholder="مربوطه مرجع">
                                    @error('startup_department')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="attachments">د مکتوب ضمیمه<span class="text-danger">*</span></label>
                                    <input class="form-control" value="{{ old('attachments') }}" name="attachments"
                                        type="file" placeholder="د مکتوب ضمیمه">
                                    @error('attachments')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="received_date">ثبت نیټه <span class="text-danger">*</span></label>
                                    <input class="form-control" value="{{ old('received_date') }}" name="received_date"
                                        type="date" placeholder="ثبت نیټه">
                                    @error('received_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="details">د مکتوب تفصیل <span class="text-danger">*</span></label>
                                    <textarea class="form-control" value="{{ old('details') }}" name="details"
                                        rows="5" cols="10">
                                    </textarea>
                                    @error('details')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer pb-0">
                        <div class="card-title">
                            <button class="btn btn-success" type="submit">ثپت <i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </div>
            </form>
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
                e.preventDefault();
            });

            $("[type='date']").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
@endsection
