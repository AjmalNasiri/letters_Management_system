<div class="row">
    <div class="col-12">
        <div class="card mt-2">
            <div class="card-header pb-0">
                <div class="card-tools">
                    <h3 class="card-title"><b>د مکتوب معلومات</b></h3>
                </div>
                @if ($documentArchiveStatus->isEmpty() && $documentStatus)
                    <div class="card-title">
                        <a href="{{ route('document.archive', $document->id) }}" class="btn btn-success">آرشیف</a>
                    </div>
                @endif
            </div>
            @if (!$document)
                <h1 class="text-center text-danger">معلومات پیدا نشول</h1>
            @else
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>د مکتوب نمبر</th>
                                <th>عنوان</th>
                                <th>غوښتونکی مرجع</th>
                                <th>تفصیل</th>
                                @if ($document->attachments)
                                    <th>ضمیمه شوی فایل</th>
                                @endif
                                <th>حالت</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $document->document_no }}</td>
                                <td>{{ $document->title }}</td>
                                <td>{{ $document->source_name }}</td>
                                <td>
                                    {{ $document->details }}
                                </td>
                                @if ($document->attachments)
                                    <td>
                                        <a href="{{ Storage::url($document->attachments) }}"
                                            download="{{ $document->title }}"><span class="fas fa-download"></span></a>
                                    </td>
                                @endif
                                @if ($document->status == App\Models\Document::NEW_DOCUMENT)
                                    <td><i class="badge badge-success">نوی</i></td>
                                @endif
                                @if ($document->status == App\Models\Document::ASSINGED_DOCUMENT)
                                    <td><i class="badge badge-danger">لیږل شوی</i></td>
                                @endif
                                @if ($document->status == App\Models\Document::ARCHIVE_DOCUMENT)
                                    <td><i class="badge badge-warning">آرشیف</i></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</div>
