<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\Uuid;
use Ramsey\Uuid\DeprecatedUuidMethodsTrait;

class Document extends Model
{
    use HasFactory, SoftDeletes;
    use Uuid;

    //Document Status
    const Document_UNIQUE_ID_COLUMN_NAME = 'document_unique_id';
    const REJECTED_DOCUMENT = 0;
    const ASSINGED_DOCUMENT = 1;
    const COMPLETED_DOCUMENT = 2;
    const NEW_DOCUMENT = 3;
    const ON_GOING_DOCUMENT = 4;
    const ARCHIVE_DOCUMENT = 5;

    const FILE_UPLOAD_STORAGE_LINK = 'public/documents';
    const FILE_DOWNLOAD_STORAGE_LINK = 'public/documents';

    protected $fillable = ['document_no', 'title', 'requested_from_to_source_id', 'recieved_date', 'startup_department', 'details', 'status', 'attachments', 'outcome', 'user_id'];

    public static function storeDocument($request)
    {
        $filePath = static::storeDocumentAttachment($request);
        return Document::create([
            'document_no' => $request->document_no,
            'title' => $request->title,
            'requested_from_to_source_id' => $request->requested_from_to_source,
            'recieved_date' => $request->received_date,
            'startup_department' => $request->startup_department,
            'details' => $request->details,
            'status' => static::NEW_DOCUMENT,
            'attachments' => $filePath,
            'user_id' => Auth::user()->id
        ]);
    }

    public static function updateDocument($request, $documentId)
    {
        $filePath = $request->hasFile('attachments') ? static::storeDocumentAttachment($request) : null;
        Document::where('id', $documentId)->update([
            'document_no' => $request->document_no,
            'title' => $request->title,
            'requested_from_to_source_id' => $request->requested_from_to_source,
            'recieved_date' => $request->received_date,
            'startup_department' => $request->startup_department,
            'details' => $request->details,
            'user_id' => Auth::user()->id
        ]);

        if ($filePath)
            Document::where('id', $documentId)->update([
                'attachments' => $filePath
            ]);
    }

    public static function changeDocumentStatusToAssign($documentId)
    {
        Document::find($documentId)->update(['status' => static::ASSINGED_DOCUMENT]);
    }

    public static function changeDocumentStatus($documentId, $status)
    {
        Document::find($documentId)->update(['status' => $status]);
    }

    public static function storeDocumentAttachment($request)
    {
        return $request->hasFile('attachments') ? $request->file('attachments')->store(static::FILE_UPLOAD_STORAGE_LINK) : null;
    }
}
