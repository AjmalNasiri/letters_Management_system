<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <b>مکتوبونه</b>
                </div>
                @if ($documents->isNotEmpty())
                    <div class="card-title">
                        <button href="#" onclick="$('#qataaSearchForm').submit()" class="btn btn-success"
                            id="printReport"><i class="fas fa-print"></i></button>
                    </div>
                @endif
            </div>
            @if ($documents->isEmpty())
                <h1 class="text-center">معلومات پیدا نشول</h1>
            @else
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap text-center" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>د مکتوب نمبر</th>
                                <th>عنوان</th>
                                <th>غوښتونکی مرجع</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $document->document_no }}</td>
                                    <td>{{ $document->title }}</td>
                                    <td>{{ $document->source_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</div>
