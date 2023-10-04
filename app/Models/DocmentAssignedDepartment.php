<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class DocmentAssignedDepartment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['department_id', 'document_id', 'user_id', 'assign_date', 'deadline', 'status', 'complation_date', 'outcome', 'attachments','supervisor_decision'];

    public static function storeDocumentAssignedDepartments($request, $documentId)
    {
        $filePath = $request->hasFile('attachments') ? Document::storeDocumentAttachment($request) : null;
        foreach ($request->department as $key => $value) {
            DocmentAssignedDepartment::create([
                'department_id' => $value,
                'document_id' => $documentId,
                'user_id' => Auth::user()->id,
                'assign_date' => Jalalian::now(),
                'deadline' => $request->deadline,
                'status' => Document::NEW_DOCUMENT,
                'attachments' => $filePath,
                'supervisor_decision' => $request->supervisor_decision
            ]);
        }
    }

    public static function changeDepartmentDocumentStatus($departmentId, $documentId, $request)
    {
        DocmentAssignedDepartment::where('department_id', $departmentId)->where('document_id', $documentId)
            ->first()
            ->update([
                'status' => $request->status,
                'outcome' => $request->outcome,
                'user_id' => Auth::user()->id,
            ]);
        if ($request->status == Document::COMPLETED_DOCUMENT) {
            DocmentAssignedDepartment::where('department_id', $departmentId)->where('document_id', $documentId)
                ->first()
                ->update([
                    'complation_date' => Jalalian::now()
                ]);
        }
    }
}
