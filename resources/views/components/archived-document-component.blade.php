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
                                <th>آدرس</th>
                                <th>حالت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $document->document_no }}</td>
                                    <td>{{ $document->title }}</td>
                                    <td>{{ $document->source }}</td>
                                    <td>
                                        @if ($document->location)
                                            {{ $document->location }}
                                        @else
                                            <a class="btn btn-primary p-1" href="{{ route('archive.address.update',$document->id) }}" id="showLocationModalButton">اضافه کړی</a>
                                        @endif
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
