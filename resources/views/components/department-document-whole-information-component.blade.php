<div class="row">
    <div class="col-12">
        <div class="card mt-2">
            <div class="card-header">
                <div class="card-tools">
                    <h3 class="card-title"><b>د مکتوب معلومات</b></h3>
                </div>
            </div>
            @if (!$document)
                <h1 class="text-center text-danger">معلومات پیدا نشول</h1>
            @else
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap text-center">
                        <tbody>
                            <tr>
                                <td><b>د مکتوب نمبر : </b>{{ $document->document_no }}</td>
                                <td><b>عنوان : </b>{{ $document->title }}</td>
                                <td><b>غوښتونکی مرجع : </b>{{ $document->source }}</td>
                            </tr>
                            <tr>
                                <td><b>تفصیل : </b>{{ $document->details }}</td>
                                <td>
                                    <b>حالت : </b>
                                    @if ($document->status == App\Models\Document::NEW_DOCUMENT)
                                        <b class="badge badge-info">نوی</b>
                                    @endif
                                    @if ($document->status == App\Models\Document::COMPLETED_DOCUMENT)
                                        <b class="badge badge-success">تکمیل شوی</b>
                                    @endif
                                    @if ($document->status == App\Models\Document::ON_GOING_DOCUMENT)
                                        <b class="badge badge-warning">په جریان کی</b>
                                    @endif
                                    @if ($document->status == App\Models\Document::REJECTED_DOCUMENT)
                                        <b class="badge badge-danger">رد شوی</b>
                                    @endif
                                </td>
                                <td>
                                    <b>پایلی نیټه : </b>
                                    {{ $document->deadline }}
                                </td>
                            </tr>
                            <tr>
                                @if ($document->primary_attachments || $document->secondry_attachments)
                                    <td colspan="3">
                                        <b>ضمیمه شوی فایل : </b>
                                        @if ($document->primary_attachments)
                                            <a href="{{ Storage::url($document->primary_attachments) }}"
                                                title="لمړی ضمیمه شوی فایل" download="{{ $document->title }}"><span
                                                    class="fas fa-download text-success ml-3"></span>
                                            </a>
                                        @endif
                                        @if ($document->secondry_attachments)
                                            <a href="{{ Storage::url($document->secondry_attachments) }}"
                                                title="دویم ضمیمه شوی فایل" download="{{ $document->title }}"><span
                                                    class="fas fa-download text-danger"></span>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</div>
