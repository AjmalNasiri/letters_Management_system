<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <h3 class="card-title"><b>مکتوبونه</b></h3>
                </div>
            </div>
            @if ($documents->isEmpty())
                <h1>معلومات پیدا نشول</h1>
            @else
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>د مکتوب نمبر</th>
                                <th>عنوان</th>
                                <th>غوښتونکی مرجع</th>
                                <th>ضمیمه</th>
                                <th>حالت</th>
                                <th>ضمیمه فایل</th>
                                <th>عمل/اکشن</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $document->document_no }}</td>
                                    <td>{{ $document->title }}</td>
                                    <td>{{ $document->source_name }}</td>
                                    <td><a href="{{ Storage::url($document->attachments) }}" download="{{ $document->attachments }}" class="fas fa-download"> 
                                            <span class="badge badge-success"></span>
                                        </a>
                                    </td>
                                    @if ($document->status == App\Models\Document::NEW_DOCUMENT)
                                        <td><b class="badge badge-success">نوی</b></td>
                                    @endif
                                    @if ($document->status == App\Models\Document::ASSINGED_DOCUMENT)
                                        <td><b class="badge badge-danger">لیږل شوی</b></td>
                                    @endif
                                    @if ($document->status == App\Models\Document::ARCHIVE_DOCUMENT)
                                        <td><i class="badge badge-warning">آرشیف</i></td>

                                    @endif
                                    <td>
                                        @if ($document->attachments)
                                       <a href="{{ Storage::url($document->attachments) }}"
                                           title="لمړی ضمیمه شوی فایل" download="{{ $document->title }}"><span
                                               class="fas fa-download text-success ml-3"></span>
                                       </a>
                                   @endif
                               </td>
                                    <td>
                                        <a href="{{ route('documents.show', $document->id) }}" class="fas fa-eye"
                                            title="د معلوماتو کتل"></a>
                                        @if ($document->status != App\Models\Document::ARCHIVE_DOCUMENT)
                                            <a href="{{ route('documents.edit', $document->id) }}" class="fas fa-edit"
                                                title="د مکتوب معلومات بدلول"></a>
                                            <a href="{{ route('document.destroy', $document->id) }}" id="deleteDocument"
                                                class="fas fa-window-close text-danger" title="مکتوب حذفول"></a>
                                                @role('super_admin')
                                            <a href="{{ route('document.assigned.departments', $document->id) }}"
                                                id="assignDepartments" class="fas fa-arrow-alt-circle-left"
                                                title="ډیپارمنټونو ته لیږل"></a>
                                                @endrole
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</div>

{{-- Pagination --}}
{{ $documents->links() }}
