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
                                <th>حالت</th>
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
                                    @if ($document->status == App\Models\Document::ON_GOING_DOCUMENT)
                                        <td><b class="badge badge-warning">په جریان کی</b></td>
                                    @endif
                                    @if ($document->status == App\Models\Document::NEW_DOCUMENT)
                                        <td><b class="badge badge-info">نوی</b></td>
                                    @endif
                                    @if ($document->status == App\Models\Document::COMPLETED_DOCUMENT)
                                        <td><b class="badge badge-success">تکمیل شوی</b></td>
                                    @endif
                                    @if ($document->status == App\Models\Document::REJECTED_DOCUMENT)
                                        <td><b class="badge badge-danger">رد شوی</b></td>
                                    @endif
                                    <td>
                                        <a href="{{route('department.document.show',['departmentId' => $document->department_id,'documentId'=>$document->document_id])}}" class="fas fa-eye" title="د مکتوب معلومات کتل"></a>
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
