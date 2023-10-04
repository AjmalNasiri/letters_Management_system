<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #04AA6D;
        color: white;
    }
    td{
        text-align: center;
    }
</style>

@if ($documents->isEmpty())
    <h1 class="text-center">معلومات پیدا نشول</h1>
@else
    <div class="card-body table-responsive p-0">
        <table id="customers">
            <tr>
                <th>#</th>
                <th>د مکتوب نمبر</th>
                <th>عنوان</th>
                <th>غوښتونکی مرجع</th>
            </tr>
            @foreach ($documents as $document)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $document->document_no }}</td>
                        <td>{{ $document->title }}</td>
                        <td>{{ $document->source_name }}</td>
                    </tr>
                @endforeach
          </table>
    </div>
@endif
